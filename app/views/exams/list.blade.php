@extends('admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Scheduled On</th>
                        <th>Starts At</th>
                        <th>End At</th>
                        <th>Examination Room</th>
                        <th>Supervisors</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                        <tr>
                            <td>{{ $item->e_name }}</td>
                            <td>{{ date("D d M, Y", strtotime($item->e_date))}}</td>
                            <td>{{ $item->start }}</td>
                            <td>{{ $item->end }}</td>
                            <td>{{ $item->room_name }}</td>
                            <td>
                                <a href="#examsModal" class="exams" data-toggle="modal"
                                data-sup_name="{{ $item->e_name }}"
                                 data-url="{{ url('dashboard/exam/supervisor/'. $item->id) }}">
                                    <i class="fa fa-eye"></i> &nbsp; View
                                </a>
                            </td>
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
                    <h5 class="modal-title">Supervisors the <span id="sup_name" class="text-primary"></span> Exam</h5>
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
