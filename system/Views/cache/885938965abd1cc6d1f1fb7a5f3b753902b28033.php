

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="<?php echo e(url('dashboard/exams/store')); ?>" method="POST" id="studentForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="e_name" class="w-100">
                                Exam Name
                                <input type="text" name="e_name" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="e_date" class="w-100">
                                Exam Date
                                <input type="date" name="e_date" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="start_time" class="w-100">
                                Start Time
                                <input type="time" name="start_time" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="end_time" class="w-100">
                                End Time
                                <input type="time" name="end_time" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="e_room_id" class="w-100">
                                    Examination Room
                                    <select name="e_room_id" class="custom-select" required>
                                        <option value="">-- select room --</option>
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"> <?php echo e($item->room_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="supervisor_id" class="w-100">
                                    Supervisors
                                    <?php $__currentLoopData = $supervisors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex ml-2">
                                            <input type="checkbox" name="supervisor_id[]" value="<?php echo e($item->id); ?>"/> &nbsp;<?php echo e($item->sup_name); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success" id="studentFormBtn">
                            <i class="fa fa-check"></i>
                            Save Examination
                        </button>
                    </div>
                    <div class="response" id="response"></div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        request({form: 'studentForm', btn: 'studentFormBtn'})
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/exams/add.blade.php ENDPATH**/ ?>