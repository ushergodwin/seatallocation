@extends('base')
@section('content')
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="response"></div>
                    <div class="card card-body shadow bg-info text-light">
                        <h3 id="redirecting"></h3>
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
                                        autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                                        title="Must have at least 8 characters, 1 lower case and upper case letters, 1 digit and 1 none alphernumeric character" required>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Retype Password
                                    <input type="password" name="password" id="password2"
                                        class="form-control bg-light password"
                                        autocomplete="off" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" 
                                        title="Must have at least 8 characters, 1 lower case and upper case letters, 1 digit and 1 none alphernumeric character" required>
                                        <span>Password must have at least 8 characters, 1 lower case and upper case letters, 1 digit and 1 none alphernumeric character</span>
                                </label>
                                <span id="password-error"></span>
                                <input type="hidden" name="security_check" value="200"/>
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