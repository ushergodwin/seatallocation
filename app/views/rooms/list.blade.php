@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td><i class="fa fa-home"></i> {{ $item->room_name }}</td>
                            <td>{{ $item->capacity }}</td>
                            <td>
                                <a href="{{ url('dashboard/rooms/' .$item->id . '/add-seats') }}">
                                    <i class="fas fa-fw fa-chair"></i> Seats
                                </a>
                            </td>
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
