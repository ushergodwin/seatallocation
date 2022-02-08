<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Student;
use System\Http\Request\Request;

class StudentController extends BaseController 
 { 

    public function index()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Students >> List",
            'collection' => Student::all()
        ];

        return render('students/list', $context);
    }


    public function create()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Students >> Add"
        ];

        return render('students/add', $context);
    }


    public function store(Request $request)
    {
        $student = $request->except([crsf(), 'secret']);
        $student = new Student($student);
        
        if(!$student->save())
        {
            return response()->send(202, alert()->danger("Student not added! Please try again"));
        }
        return response()->send(200, alert()->success("Student added successfully."));
    }


 }