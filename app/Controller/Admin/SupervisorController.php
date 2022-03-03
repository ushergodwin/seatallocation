<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supervisor;
use App\Models\User;
use System\Http\Request\Request;

class SupervisorController extends BaseController 
 { 

    public function index()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Supervisors >> List",
            'collection' => Supervisor::all()
        ];

        return render('supervisors/list', $context);
    }
    public function create()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Supervisors >> Add"
        ];

        return render('supervisors/add', $context);
    }

    public function store(Request $request)
    {
        $fname = $request->post('fname');
        $lname = $request->post('lname');
        $title = $request->post('title');
        $email = $request->post('email');
        $phone = $request->post('phone');

        $fullName = "{$title} {$fname} {$lname}";

        $supervisors = array(
            'sup_name' => $fullName
        );

        $user_data = array(
            'first_name' => $fname,
            'last_name' => $lname,
            'email' => $email,
            'phone_number' => $phone,
            'password' => password()->sha1($email)
        );

        $supervisors = new Supervisor($supervisors); 

        if(!$supervisors->save())
        {
            return response()->send(202, alert()->danger("supervisors not saved! Please try again"));
        }
        $user = new User($user_data);
        $user->save();
        return response()->send(200, alert()->success("Supervisor, {$fullName} has been saved successfully."));
    }
 }