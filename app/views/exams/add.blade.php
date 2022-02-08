@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="{{ url('dashboard/exams/store') }}" method="POST" id="studentForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="e_name" class="w-100">
                                Exam Name
                                <input type="text" name="e_name" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="e_date" class="w-100">
                                Exam Date
                                <input type="date" name="e_date" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="start_time" class="w-100">
                                Start Time
                                <input type="time" name="start_time" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="end_time" class="w-100">
                                End Time
                                <input type="time" name="end_time" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="e_room_id" class="w-100">
                                    Examination Room
                                    <select name="e_room_id" class="custom-select" required>
                                        <option value="">-- select room --</option>
                                        @foreach ($rooms as $item)
                                            <option value="{{ $item->id }}"> {{ $item->room_name}} </option>
                                        @endforeach
        
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supervisor_id" class="w-100">
                                    Supervisors
                                    @foreach ($supervisors as $item)
                                        <div class="d-flex ml-2">
                                            <input type="checkbox" name="supervisor_id[]" value="{{ $item->id }}"/> &nbsp;{{ $item->sup_name }}
                                        </div>
                                    @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success" id="studentFormBtn">
                            <i class="fa fa-check"></i>
                            Save Examination
                        </button>
                    </div>
                    <div class="response" id="response"></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        request({form: 'studentForm', btn: 'studentFormBtn'})
    </script>
@endsection
