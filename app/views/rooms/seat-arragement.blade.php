@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <select name="exam_id" id="exam_id" class="form-control" required>
                >
                <option value="">-- select exam --</option>
                @foreach ($exams as $item)
                    <option value="{{$item->id}}" {{ $item->id == $exam_id ? "selected" : ''}}>{{ $item->e_name}} </option>
                @endforeach
            </select>
            <table class="table mt-2" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Registration Number</th>
                        <th>Seat Number</th>
                        <th>Room</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{ $item->st_name }}</td>
                            <td>{{ $item->st_no }}</td>
                            <td>{{ $item->reg_no }}</td>
                            <td>{{ $item->seat_id }}</td>
                            <td>{{ $item->room_name }}</td>
                            <td>{{ date("D d M, Y", strtotime($item->dated)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(()=> {
            $("#exam_id").on('change', function(){
                let exam_id = $(this).val();
                if(exam_id.length < 1)
                {
                    return alert("Please select an exam to view its sitting arrangement")
                }
                window.location.href = window.location.origin  + "/dashboard/seats/exam/" + exam_id + '/arrangement'
            })
        })
    </script>
@endsection
