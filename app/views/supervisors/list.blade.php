@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->sup_name }}</td>
                            <td>{{ date("D d M Y", strtotime($item->created_at)) }}</td>
                            <th>
                                <a href="#examsModal" class="exams" data-toggle="modal"
                                 data-id="{{ $item->id }}"
                                 data-sup_name="{{ $item->sup_name }}"
                                 data-url="{{ url('dashboard/supervisor/'. $item->id .'/exams') }}">
                                    <i class="fa fa-eye"></i>
                                    Exams Supervised
                                </a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal HTML -->
    <div id="examsModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Exams Supervised by <span id="sup_name" class="text-primary"></span></h5>
                </div>
                <div class="modal-body" id="exam-table">
                    
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/script.js') }}"></script>
@endsection
