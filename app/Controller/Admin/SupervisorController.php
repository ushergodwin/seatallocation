<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Supervisor;
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
        $supervisor = $request->post('sup_name');
        $supervisors_count = count($supervisor);

        $supervisors = [];

        for($i = 0; $i < $supervisors_count; $i++)
        {
            $supervisors[] = array('sup_name' => $supervisor[$i]);
        }

        $supervisors = new Supervisor($supervisors); 
        if(!$supervisors->save())
        {
            return response()->send(202, alert()->danger("supervisors not saved! Please try again"));
        }
        return response()->send(200, alert()->success("{$supervisors_count} supervisors saved successfully."));
    }
 }