<?php 
 namespace App\Controller\Admin;

use App\Controller\Auth\Auth;
use App\Controller\BaseController;
use App\Controller\Home;
use App\Models\Student;
use App\Models\User;
use System\Database\DB;
use System\Http\Request\Request;

class AdminDashboard extends BaseController 
 { 
     protected $user_key;

     public function __construct()
     {
         Auth::required();
         if(session('account_type') == "Student")
         {
             $this->user_key = session('st_no');
         }else {
            $this->user_key = session('email');
         }
         
     }
        public function index()
        {
            $context = [
                'title' => "DASHBOARD",
                'page' => "Home",
                'seats' => DB::table('rooms')->sum('capacity'),
                'students' => DB::table('students')->count(),
                'exams' => DB::table('exams')->count(),
                'rooms' => DB::table('rooms')->count(),
                'supervisors' => DB::table('supervisors')->count(),
                'toured' => Home::tour($this->user_key),
                'user_key' => $this->user_key
            ];

            return render('admin/index', $context);
        }

        public function users()
        {
            $context = [
                'title' => "DASHBOARD",
                'page' => "Users",
                'collection' => User::all()
            ];

            return render('admin/users', $context);
        }

        public function addUser(Request $request)
        {
            $user = $request->except([crsf()]);
            $user['password'] = password()->sha1($user['password']);

            $user_details = $user;
            $user = new User($user_details);

            if(!$user->save())
            {
                return response()->send(202, alert()->danger("User not added!"));
            }
            $message = "User added successfuuly. <br/> <u>Account Details:</u> <br/>";
            foreach ($user_details as $key => $value) {
                $key = strtoupper(str_replace('_', ' ', $key));
                $message .= "{$key}: {$value} <br>";
            }
            return response()->send(202, alert()->success($message));
        }


        public function userProfile()
        {
            $user_id = session('account_type') === 'Student' ? session('st_no') : session('email');

            $context = [
                'title' => "DASHBOARD",
                'page' => "Settings",
                'collection' => session('account_type') === 'Student' ? Student::find($user_id, 'st_no')->get() : User::find($user_id, 'email')->get()
            ];

            return render('admin/settings', $context);
        }
 }