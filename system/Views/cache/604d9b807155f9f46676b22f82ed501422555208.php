

<?php $__env->startSection('content'); ?>
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body shadow">
                    <form action="<?php echo e(url('dashboard/seats/allocate')); ?>" method="POST" id="seatAllocationForm">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <label for="exam_id" class="w-100">
                                    <select name="exam_id" id="exam_id" class="form-control" required>
                                        ><option value="">-- select exam --</option>
                                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->e_name); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <?php if(session('account_type') == 'Admin'): ?>
                                    <button type="submit" class="btn btn-success"
                                    id="seatAllocationBtn">Begin Seat Allocation</button>
                                <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/data-visualization.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/rooms/seat-allocation.blade.php ENDPATH**/ ?>