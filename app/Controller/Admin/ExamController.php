<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Exam;
use App\Models\Room;
use App\Models\Student;
use App\Models\Supervisor;
use System\Http\Request\Request;

class ExamController extends BaseController 
 { 
        
    public function index()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Exams >> List",
            'collection' => Exam::join('rooms', 'exams.e_room_id', 'rooms.id')->get('exams.id, e_name, e_date, start_time as start, end_time as end, supervisor_id, room_name')
        ];

        return render('exams/list', $context);
    }


    public function create()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Exams >> Add",
            'rooms' => Room::all(),
            'supervisors' => Supervisor::all()
        ];

        return render('exams/add', $context);
    }


    public function examsForSupervisor($sup_id)
    {

        $collection = Exam::join('rooms', 'exams.e_room_id', 'rooms.id')->like('supervisor_id', "%$sup_id%")->get('exams.id, e_name, e_date, start_time as start, end_time as end, room_name');

        echo '
            <table class="table table-borderless shadow" id="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Scheduled On</th>
                    <th>Starts At</th>
                    <th>End At</th>
                    <th>Examination Room</th>
                </tr>
            </thead>
            <tbody>
        ';
        if(empty($collection))
        {
            response()->send(200, alert()->info("There are not exams supervised this supervisor"));
        }
            
        if(!empty($collection))
        {
            foreach ($collection as $item):
                echo '
                    <tr>
                        <td> ' . $item->e_name .'</td>
                        <td> '. $item->e_date .'</td>
                        <td> '. $item->start .'</td>
                        <td> '. $item->end .'</td>
                        <td> '. $item->room_name .'</td>
                    </tr>
                    ';
            endforeach;
        }
        echo "</tbody> </table>";
    }


    public function supervisorsForExam($e_id)
    {
        $exam_supervisors = explode(',', $collection = Exam::find($e_id)->value('supervisor_id'));

        $supervisors_count = count($exam_supervisors);
        $collection = array();

        for($i = 0; $i < $supervisors_count; $i++)
        {
            $collection[] = array('id' => ($i + 1), 'name' => Supervisor::find($exam_supervisors[$i])->value('sup_name'));
        }

        echo '
            <table class="table table-borderless shadow" id="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
        ';

        if(empty($collection))
        {
            response()->send(200, alert()->info("There are not exams supervised this supervisor"));
        }
        $collection = array_to_object($collection);
        if(!empty($collection))
        {
            foreach ($collection as $item):
                echo '
                    <tr>
                        <td> ' . $item->id .'</td>
                        <td> '. $item->name .'</td>
                    </tr>
                    ';
            endforeach;
        }
        echo "</tbody> </table>";
    }


    public function store(Request $request)
    {
        $exam = $request->except([crsf(), 'supervisor_id']);
        $exam['supervisor_id'] = implode(',', $request->post('supervisor_id'));

        $e_date = $request->post('e_date');
        $supervisors = $request->post('supervisor_id');

        $supervisors_count = count($supervisors);
        $e_date_record = Exam::where('e_date', $e_date)->get();

        if(!empty($e_date_record))
        {
            for($i = 0; $i < $supervisors_count; $i++)
            {
                $e_date_count = Exam::where('e_date', $e_date)
                ->like('supervisor_id', $supervisors[$i])->count('id');
                if($e_date_count == 2)
                {
                    $sup_name = Supervisor::find($supervisors[$i])->value('sup_name');
                    return response()->send(202, alert()->danger("$sup_name can not supervise more than 2 exams on the same day. Please pick another supervisor, and try again."));
                }
            }
        }
        $exam = new Exam($exam);

        if(!$exam->save())
        {
            return response()->send(202, alert()->danger('Failed to add the exam. Please try again.'));
        }

        return response()->send(200, alert()->success("The Exam has been saved succussfully"));
    }
 }