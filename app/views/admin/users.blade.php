@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <a href="#myModal" class="btn btn-outline-info" data-toggle="modal">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
            <br/>
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Account Type</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($collection as $item)
                        @php
                            $i  ++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->first_name . " " . $item->last_name}}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <td>{{ $item->account_type }}</td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('dashboard/users/add') }}" method="POST" id="userForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="w-100">
                                            Email Address
                                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="w-100">
                                            Phone Number
                                            <input type="text" name="phone_number" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name" class="w-100">
                                            First Name
                                            <input type="text" name="first_name" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="last_name" class="w-100">
                                            Last Name
                                            <input type="text" name="last_name" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="account_type" class="w-100">
                                            Account Type
                                            <select name="account_type" class="form-control" required>
                                                <option value="">select account type</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password" class="w-100">
                                            Password
                                            <input type="password" id="password" name="password" class="form-control" readonly/>
                                        </label>
                                        <small class="text-muted">The password is the same as the email address. This can be later changed in the user settings</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="response"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="userBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(()=> {
            $("#userBtn").on('click', function(){
                $.ajax({
                    type: 'POST',
                    url: $("#userForm").attr('action'),
                    data: $("#userForm").serializeArray(),
                    beforeSend: () => {
                        $(this).attr('disabled', true)
                        .html("<span class='spinner-border spinner-border-sm'></span> processing...")
                    },
                    success: (res) => {
                        $(".response").html(res)
                    },
                    complete: ()=> {
                        $(this).attr('disabled', false)
                        .html("Save Changes")
                        setTimeout(() => {
                            window.location.reload()
                        }, 5000);
                    }
                })
            })
            $("#email").on('keyup', function(){
                $("#password").val($(this).val())
            })
        })
    </script>
@endsection
