@extends('admin.base')
@section('content')
        <div class="container-fluid mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-body shadow">
                        @if (session('account_type') === 'Student')
                            
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="{{asset('img/undraw_profile.svg')}}" class="rounded-circle" alt="profile photo"/>
                                    <h5 class="text-center">{{ $collection->reg_no }}</h5>
                                    <h5 class="text-center">{{ $collection->st_no }}</h5>
                                </div>
                                <div class="col-lg-8">
                                    <h5>NAME: {{ $collection->name }}</h5>
                                    <h5>Reg: {{ $collection->reg_no }}</h5>
                                    <h5>StNo: {{ $collection->st_no }}</h5>
                                    <h5>Course: {{ $collection->course }}</h5>
                                    <h5>Tell: {{ $collection->phone_number}}</h5>
                                    <h5>Email: {{ $collection->email }}</h5>
                                    <hr>
                                    <h5>Registered on: {{ date("D d M, Y", strtotime($collection->joined)) }}</h5>
                                </div>
                            </div>
                        @else
                            
                        @endif
                        <div class="response"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body shadow bg-info text-light">
                        <h4>Reset Password</h4>
                        <form action="{{ url('api/auth/user/password/reset') }}" method="post" id="resetPasswordForm">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="w-100">
                                    Current Password <a href="#!" class="text-light" id="show-password">
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </a>
                                    <input type="password" name="c_password" class="form-control bg-light password" 
                                        autocomplete="off" required/>
                                </label>           
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Password
                                    <input type="password" name="password" id="password1" 
                                        class="form-control bg-light password"
                                        autocomplete="off" required/>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Retype Password
                                    <input type="password" name="password" id="password2"
                                        class="form-control bg-light password"
                                        autocomplete="off" required/>
                                </label>
                                <span id="password-error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-light reset-password-btn">RESET PASSWORD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{ url('js/script.js') }}"></script>
@endsection