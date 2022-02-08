@extends('admin.base')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body shadow">
                    <form action="{{ url('dashboard/seats/allocate') }}" method="POST" id="seatAllocationForm">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <label for="exam_id" class="w-100">
                                    <select name="exam_id" id="exam_id" class="form-control" required>
                                        ><option value="">-- select exam --</option>
                                        @foreach ($collection as $item)
                                            <option value="{{$item->id}}">{{ $item->e_name}}
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                @if (session('account_type') == 'Admin')
                                    <button type="submit" class="btn btn-success"
                                    id="seatAllocationBtn">Begin Seat Allocation</button>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-info"
                                id="seatArrangementBtn"><i class="fa fa-eye"></i> View Sitting Arrangement</button>
                            </div>
                        </div>
                    </form>
                    <div class="response-section"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/data-visualization.js') }}"></script>
    <script type="text/javascript">
        jQuery(()=> {
            $("#seatAllocationForm").on('submit', function(e){
                e.preventDefault()
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serializeArray(),
                    beforeSend: () => {
                        $("#seatAllocationBtn").attr('disabled', true)
                        .html("<span class='spinner-border spinner-border-sm'></span> loading...")
                        $(".response-section").html("<span class='spinner-border spinner-border-sm'></span> working, please wait...")
                    },
                    success: (res) => {
                        $(".response-section").html(res).css(
                            {
                                border: '2px solid green',
                                borderRadius: '5px',
                                padding: '10px'
                            })
                    },
                    complete: ()=> {
                        $("#seatAllocationBtn").attr('disabled', false)
                        .html("Begin Seat Allocation")
                    }
                })
            })

            $("#seatArrangementBtn").on('click', ()=> {
                let exam_id = $("#exam_id").val();
                if(exam_id.length < 1)
                {
                    return alert("Please select an exam to view its sitting arrangement")
                }
                window.location.href = window.location.origin  + "/dashboard/seats/exam/" + exam_id + '/arrangement'
            })
        })
    </script>
@endsection
