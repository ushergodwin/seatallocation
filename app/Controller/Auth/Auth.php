<?php 
 namespace App\Controller\Auth; 
 use App\Controller\BaseController;
use App\Models\PasswordReset;
use App\Models\Student;
use App\Models\User;
use System\Http\Request\Request;

class Auth extends BaseController 
 { 
    public function authenticate(Request $request)
    {
        $username = $request->post('username');
        $password = $request->post('password');

        $is_email = filter_var($username, FILTER_VALIDATE_EMAIL);

        $password = sha1($password);

        if(!$is_email)
        {
            $user_data = Student::find($username, 'st_no')->get('name, st_no, reg_no, secret as password');
        }else {
            $user_data = User::find($username, 'email')->get("first_name as name, last_name, password, account_type, email");
        }
        
        if(empty($user_data))
        {
            return response()->json(202,"There is no account that matches your login details");
        }

        if($password !== $user_data->password)
        {
            return response()->json(202, "Invalid user ID or password");
        }
        
        $session_data = [];

        if(count(object_to_array($user_data)) > 4)
        {
            foreach($user_data as $key => $value)
            {
                $session_data[$key] = $value;
            }
        }else {

            foreach($user_data as $key => $value)
            {
                $session_data[$key] = $value;
            }
            $session_data['account_type'] = "Student";
        }
        $session_data['is_logged_in'] = true;
        session($session_data);
        if($this->isPasswordReset($username))
        {
            return response()->json(200, [
                "message" => "Authenticated successfully",
                "redirect" => url('dashboard')
            ]);
        }

    }

    /**
     * Force Login
     *
     * @param callable $callback
     * @return void
     */
    public static function required($callback = null)
    {
        $self = new self;
        if(!$self->session()->contains('is_logged_in'))
        {
            return redirect('');
        }
        
        if($callback !== null)
        {
            return call_user_func($callback);
        }
    }



    public function resetPassword(Request $request)
    {
        $c_password = sha1($request->post('c_password'));
        $security_check = (int) $request->post('security_check', 202);
        $currentUser = session('account_type') === 'Student' ? Student::where('secret', $c_password)->where('st_no', session('st_no')) : User::where('email', session('email'))->where('password', $c_password);

        if(empty($currentUser->get()))
        {
            return response()->json(202, "Invalid current password. Please provide a valid current password to set a new password");
        }

        $password = sha1($request->post('password'));
        $username = "";

        if(session('account_type') === 'Student')
        {
            $username = session('st_no');
            $password_reset = Student::where('st_no', $username)->update(['secret' => $password]);
        }else {
            $username = session('email');
            $password_reset = User::where('email', $username)->update(['password' => $password]);
        }

        if(!$password_reset)
        {
            return response()->json(202, "Password reset failed");
        }
        $reset = new PasswordReset(['email' => $username, 'token' => uniqid("_", true)]);
        $reset->save();
        return response()->json(200, 
        [
            "message" => "Password reset successfully! Login with your new password next time",
            "isSecCheck" => $security_check
        ]);
    }


    protected function isPasswordReset($user_id)
    {
        if(empty(PasswordReset::where('email', $user_id)->get()))
        {
            return response()->json(200, [
                "message" => "Security check required",
                "redirect" => url('user/security/password/change')
            ]);
        }
        return true;
    }


    public function logout()
    {
        return $this->session()->end();
    }
 }