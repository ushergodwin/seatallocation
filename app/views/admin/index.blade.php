@extends('admin.base')
@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-success">
                    <h5>Students <span class="badge badge-light"
                        id="site"
                        data-url="{{ url() }}"
                        data-user_key="{{ $user_key }}">{{ $students }}</span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-dark">
                    <h5>Rooms <span class="badge badge-light">{{ $rooms }}</span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-info">
                    <h5>Seats <span class="badge badge-light">{{ $seats }}</span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-warning">
                    <h5>Exams <span class="badge badge-light">{{ $exams }}</span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-danger">
                    <h5>Supervisors <span class="badge badge-light">{{ $supervisors }}</span></h5>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        var windowObjectReference;var windowFeatures = "popup";function printReport(url) {windowObjectReference = window.open(window.location.origin + url, "SANYU BABIES HOME", windowFeatures);}
    </script>
        @if (!$toured)
            <script>
                introJs().start();
                introJs.addHints();
            </script>
        @endif
        <script>
            jQuery(() => {
                let url = $("#site").data('url') + 'user/tour'
                let requestData = {"user_key": $("#site").data('user_key')}
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: requestData
                })
            })
        </script>
@endsection