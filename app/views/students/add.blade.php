@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body">
                <form action="{{ url('dashboard//students/store') }}" method="POST" id="studentForm">
                    @csrf
                   <div class="row">
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="w-100">
                                    Student Name 
                                    <input type="text" name="name" class="form-control" required/>
                                </label>
                            </div>
                       </div>
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="w-100">
                                    Student Email Address
                                    <input type="email" name="email" class="form-control" required/>
                                </label>
                            </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Student No
                                <input type="text" name="st_no" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Registration No
                                <input type="text" name="reg_no" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="course" class="w-100">
                                    Program
                                    <select name="course" class="custom-select" required>
                                        <option value="">-- select course --</option>
                                        <option value="BSE">BACHELOR OF SOFTWARE ENGINEERING</option>
                                        <option value="BCS">BACHELOR OF COMPUTER SCIENCE</option>
                                        <option value="BIST">BACHELOR OF INFORMATION SYSTEMS AND TECHNOLOGY</option>
        
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone_number" class="w-100">
                                Phone Number
                                <input type="number" name="phone_number" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="w-100">
                            Student Default Password 
                            <input type="text" name="secret" class="form-control" value="student@seats" disabled/>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" id="studentFormBtn">
                            <i class="fa fa-plus"></i>
                            Add Student
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
