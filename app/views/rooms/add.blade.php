@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body">
                <form action="{{ url('dashboard/rooms/store') }}" method="POST" id="roomForm">
                    @csrf
                    <div class="row" id="roomsDiv">
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Room Name
                                <input type="text" name="room_name[]" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Capacity
                                <input type="text" name="capacity[]" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary" id="roomAddBtn">
                                <i class="fa fa-plus"></i>
                                Add Room
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success" id="roomFormBtn">
                                <i class="fa fa-check"></i>
                                Save Rooms
                            </button>
                        </div>
                    </div>
                    <div class="response" id="response"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(()=> {
            $("#roomAddBtn").on('click', function(){

                let content = '<div class="col-lg-6"><label for="st_no" class="w-100">Room Name<input type="text" name="room_name[]" class="form-control" autocomplete="off" required/></label></div> <div class="col-lg-6"><label for="st_no" class="w-100">Capacity<input type="text" name="capacity[]" class="form-control" autocomplete="off" required/></label></div></div>'
                $("#roomsDiv").append(content)
            })
        })
        request({form: 'roomForm', btn: 'roomFormBtn'})
    </script>
@endsection
