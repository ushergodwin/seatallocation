<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Controller\SMS;
use App\Models\Exam;
use App\Models\Room;
use App\Models\Seat;
use App\Models\SittingArrangement;
use App\Models\Student;
use System\Database\DB;
use System\Http\Request\Request;

class SittingArrangementController extends BaseController 
 { 


    public function index()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Seats >> Allocation",
            'collection' => Exam::all('id, e_name')
        ];

        return render('rooms/seat-allocation', $context);
    }


    public function vewSittingArrangment($exam_id)
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Seats >> Sitting Arrangement | " . Exam::find($exam_id)->value('e_name'),
            'collection' => SittingArrangement::with(Room::class)->join('students', 'sitting_arrangements.s_no', 'students.st_no')->where('sitting_arrangements.exam_id', $exam_id)->get("seat_id, dated, room_name, students.name as st_name, students.st_no, students.reg_no"),
            'exams' => Exam::all('id, e_name'),
            'exam_id' => $exam_id
        ];
        
        return render('rooms/seat-arragement', $context); 
    }

    
    public function allocateSeatsToStudents(Request $request)
    {
        echo "Getting the exams ID... <span class='text-success'>OK</span><br>";

        $exam_id = $request->post('exam_id');

        echo "Fetching Exam details... <span class='text-success'>OK</span><br/>";

        $exam = Exam::find($exam_id)->get('e_date');

        echo "Fetching all students... <span class='text-success'>OK</span><br/>";

        $students = Student::all(['st_no', 'phone_number', 'email']);

        $seats = DB::table('seats')->orderBy('available', "DESC")->get(['room_id', 'available', 'occupied']);

        echo "Fetching all seats... <span class='text-success'>OK</span><br/>";

        $available_seats = Seat::where('occupied', 0)->sum('available');

        $students_array = object_to_array($students);

        echo "Checking the number of seats against the number of students...";

        if(count($students_array) > $available_seats)
        {
            echo " <span class='text-danger'>Failed</span> <br/>";
            return response()->send(202, alert()->failure("The available number of seats does not match the number of students. Please add more rooms and seats and try again."));
        }

        echo " <span class='text-success'>OK</span><br/>";

        echo "Extracting student numbers... <span class='text-success'>OK</span><br/>";

        $student_numbers = array();

        foreach($students as $student)
        {
            $student_numbers[] = $student->st_no;

        }

        echo "Shuffling students... <span class='text-success'>OK</span><br/>";

        shuffle($student_numbers);

        echo "<u>Allocating seats to students...</u><br/>";

        $student_numbers_count = count($student_numbers) + 1;

        foreach($seats as $seat)
        {

            for($i = 0; $i < $seat->available; $i++)
            {

                if($student_numbers_count - $i == 1)
                {
                    break;
                }

                $seat_id = date("Ymd", strtotime($exam->e_date)).$i;

                $seatAllocation = array(
                    'room_id' => $seat->room_id,
                    'seat_id' => $seat_id,
                    's_no' => $student_numbers[$i],
                    'exam_id' => $exam_id,
                    'dated' => $exam->e_date
                );

                $student_already_has_a_seat = SittingArrangement::where('s_no', $student_numbers[$i])->where('dated', $exam->e_date)->get('id');

                if(!empty($student_already_has_a_seat))
                {
                    continue;
                }
                
                $seatAllocation = new SittingArrangement($seatAllocation);

                if(!$seatAllocation->save())
                {
                    echo "Allocating seat number {$seat_id} to {$student_numbers[$i]}... <span class='text-danger'>Failed</span><br/>";
                }

                echo "Allocating seat number {$seat_id} to {$student_numbers[$i]}... <span class='text-success'>OK</span><br/>";
            }

        }


        // sending notifications
        echo "Sending SMS and Email to students... ";

        $headers  = "From: SEAT ALLOCATION <info@seat.mak.ac.ug>\n";
        $headers .= "Cc: testsite <mail@testsite.com>\n"; 
        $headers .= "X-Sender: testsite <mail@testsite.com>\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "Return-Path: mail@testsite.com\n"; // Return path for errors
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        for($i = 0; $i < $student_numbers_count; $i++)
        {
            $seatDetails = SittingArrangement::with(Room::class)->join('exams', 'sitting_arrangements.exam_id', 'exams.id')->join('students', 'sitting_arrangements.s_no', 'students.st_no')->get('seat_id, room_name, e_name, e_date, start_time, end_time, name, st_no, reg_no, phone_number, email');

            foreach($seatDetails as $detail)
            {
                $e_date = date('D d M, Y', strtotime($detail->e_date));

                $message = "Hello, {$detail->name}. You have the {$detail->e_name} exam scheduled on {$e_date}, starting at {$detail->start_time} and ending at {$detail->end_time}. \n\n You will do this paper from {$detail->room_name} Examination Room on Seat Number {$detail->seat_id}. \nThank you.";

                // send email
               // mail($detail->email, "EXAMINATION SEAT ALLOCATION", $message, $headers);

                // send SMS
                if($detail->st_no == "1800722864")
                {
                    SMS::send("+".$detail->phone_number, env("TWILIO_DEFAULT_SENDER"), $message);
                }
            }
        }

        echo " <span class='text-success'>OK</span><br/>";

        echo " <i class='fa fa-check-circle text-success'></i> process complete.";

    }
 }