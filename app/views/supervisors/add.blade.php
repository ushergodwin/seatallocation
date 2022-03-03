@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="{{ url('dashboard/supervisors/store') }}" method="POST" id="roomForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="email" class="w-100">
                                Email
                                <input type="text" name="email" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone" class="w-100">
                                Phone Number
                                <input type="text" name="phone" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-2">
                            <label for="title" class="w-100">
                                Title
                                <select name="title" class="form-control" required>
                                    <option value="" selected>selecet</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr.">Dr.</option>
                                </select>
                            </label>
                        </div>
                        <div class="col-lg-5">
                            <label for="fname" class="w-100">
                                First Name
                                <input type="text" name="fname" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-5">
                            <label for="lname" class="w-100">
                                Last Name
                                <input type="text" name="lname" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div id="roomsDiv"> </div>
                    <span class="text-muted">The default password is the supervisor's email address</span>
                    <div class="d-flex justify-content-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success" id="roomFormBtn">
                                <i class="fa fa-check"></i>
                                Save Supervisor
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
        request({form: 'roomForm', btn: 'roomFormBtn'})
    </script>
@endsection
