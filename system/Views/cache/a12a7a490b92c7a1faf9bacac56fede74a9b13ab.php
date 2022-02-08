

<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->e_name); ?></td>
                            <td><?php echo e(date("D d M, Y", strtotime($item->e_date))); ?></td>
                            <td><?php echo e($item->start); ?></td>
                            <td><?php echo e($item->end); ?></td>
                            <td><?php echo e($item->room_name); ?></td>
                            <td>
                                <a href="#examsModal" class="exams" data-toggle="modal"
                                data-sup_name="<?php echo e($item->e_name); ?>"
                                 data-url="<?php echo e(url('dashboard/exam/supervisor/'. $item->id)); ?>">
                                    <i class="fa fa-eye"></i> &nbsp; View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url('js/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/exams/list.blade.php ENDPATH**/ ?>