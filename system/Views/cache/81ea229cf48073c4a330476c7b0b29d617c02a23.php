
<?php $__env->startSection('content'); ?>
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-success">
                    <h5>Students <span class="badge badge-light"
                        id="site"
                        data-url="<?php echo e(url()); ?>"
                        data-user_key="<?php echo e($user_key); ?>"><?php echo e($students); ?></span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-dark">
                    <h5>Rooms <span class="badge badge-light"><?php echo e($rooms); ?></span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-info">
                    <h5>Seats <span class="badge badge-light"><?php echo e($seats); ?></span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-warning">
                    <h5>Exams <span class="badge badge-light"><?php echo e($exams); ?></span></h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body shadow mt-2 bg-danger">
                    <h5>Supervisors <span class="badge badge-light"><?php echo e($supervisors); ?></span></h5>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var windowObjectReference;var windowFeatures = "popup";function printReport(url) {windowObjectReference = window.open(window.location.origin + url, "SANYU BABIES HOME", windowFeatures);}
    </script>
        <?php if(!$toured): ?>
            <script>
                introJs().start();
                introJs.addHints();
            </script>
        <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/admin/index.blade.php ENDPATH**/ ?>