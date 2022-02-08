

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body">
                <form action="<?php echo e(url('admin/dashboard/supervisors/store')); ?>" method="POST" id="roomForm">
                    <?php echo csrf_field(); ?>
                    <div class="row" id="roomsDiv">
                        <div class="col-lg-12">
                            <label for="sup_name" class="w-100">
                                Supervisor's Name
                                <input type="text" name="sup_name[]" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-primary" id="roomAddBtn">
                                <i class="fa fa-plus"></i>
                                Add More Supervisor
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success" id="roomFormBtn">
                                <i class="fa fa-check"></i>
                                Save Supervisors
                            </button>
                        </div>
                    </div>
                    <div class="response" id="response"></div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        jQuery(()=> {
            $("#roomAddBtn").on('click', function(){

                let content = '<div class="col-lg-12"><label for="sup_name" class="w-100">Another Supersor\'s Name<input type="text" name="sup_name[]" class="form-control" autocomplete="off" required/></label></div>'
                $("#roomsDiv").append(content)
            })
        })
        request({form: 'roomForm', btn: 'roomFormBtn'})
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/supervisors/add.blade.php ENDPATH**/ ?>