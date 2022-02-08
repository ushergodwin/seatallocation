@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Student No</th>
                        <th>Registration No</th>
                        <th>Program</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
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
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->st_no }}</td>
                            <td>{{ $item->reg_no }}</td>
                            <td>{{ $item->course }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        request({form: 'studentForm', btn: 'studentFormBtn'})
    </script>
@endsection
