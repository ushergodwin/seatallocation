<?php 
 namespace App\Controller\Admin; 
 use App\Controller\BaseController;
use App\Models\Room;
use App\Models\Seat;
use System\Http\Request\Request;

class RoomController extends BaseController 
 { 
    
    public function index()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Rooms >> List",
            'collection' => Room::all()
        ];

        return render('rooms/list', $context);
    }


    public function create()
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Rooms >> Add"
        ];

        return render('rooms/add', $context);
    }

    public function store(Request $request)
    {
        $room = $request->post('room_name');
        $capacity = $request->post('capacity');
        $room_count = count($room);

        $rooms = [];

        for($i = 0; $i < $room_count; $i++)
        {
            $rooms[] = array('room_name' => $room[$i], 'capacity' => $capacity[$i]);
        }

        $rooms = new Room($rooms); 
        if(!$rooms->save())
        {
            return response()->send(202, alert()->danger("Rooms not saved! Please try again"));
        }
        return response()->send(200, alert()->success("{$room_count} Rooms saved successfully."));
    }


    public function addSeats($room_id)
    {
        $context = [
            'title' => "DASHBOARD",
            'page' => "Rooms >> Seats",
            'collection' => Seat::with(Room::class)->where('room_id', $room_id)->get(),
            'room' => Room::find($room_id)->get()
        ];

        return render('rooms/add-seats', $context);
    }



    public function storeSeatInRoom(Request $request)
    {
        $capacity = $request->post('capacity');
        $room_id = $request->post('room_id');
        $no_of_seats = $request->post('no_of_seats');
        $room_seats = Seat::find($room_id, 'room_id')->get();

        if($no_of_seats > $capacity)
        {
            return response()->send(202, alert()->danger("Only {$capacity} seats are available in this Examination room."));
        }

        $seats = new Seat();
        if(!empty($room_seats))
        {
            if($no_of_seats > $room_seats->available)
            {
                return response()->send(202, alert()->danger("Only {$room_seats->available} seats are available in this Examination room."));
            }

             $available = ($room_seats->available - $no_of_seats);

             $data = [
                 'occupied' => ($no_of_seats + $room_seats->occupied),
                 'available' => $available
             ];

             if(!Seat::find($room_id, 'room_id')->update($data))
             {
                return response()->send(202, alert()->danger("Seats not saved in Room! Please try again"));
             }

             return response()->send(200, alert()->success("{$no_of_seats} Seats saved in Room successfully."));
        }

        $available = ($capacity - $no_of_seats);
        $seats->room_id = $room_id;
        $seats->occupied = $no_of_seats;
        $seats->available = $available;
        
        if(!$seats->save())
        {
            return response()->send(202, alert()->danger("Seats not saved in Room! Please try again"));
        }
        return response()->send(200, alert()->success("{$no_of_seats} Seats saved in Room successfully."));
    }

    public function resetSeatsInRoom(Request $request)
    {
        $room_id = $request->post('room_id');
        $capacity = $request->post('capacity');

        if(!Seat::find($room_id, 'room_id')->update(['available' => $capacity, 'occupied' => 0]))
        {
            return response()->send(202, alert()->danger("Seats in Room not reset! Please try again"));
        }

        return response()->send(200, alert()->success("Seats in Room reset successfully."));
    }
 }