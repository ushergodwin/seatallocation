

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <select name="exam_id" id="exam_id" class="form-control" required>
                >
                <option value="">-- select exam --</option>
                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $exam_id ? "selected" : ''); ?>><?php echo e($item->e_name); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <table class="table mt-2" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Registration Number</th>
                        <th>Seat Number</th>
                        <th>Room</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->st_name); ?></td>
                            <td><?php echo e($item->st_no); ?></td>
                            <td><?php echo e($item->reg_no); ?></td>
                            <td><?php echo e($item->seat_id); ?></td>
                            <td><?php echo e($item->room_name); ?></td>
                            <td><?php echo e(date("D d M, Y", strtotime($item->dated))); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        jQuery(()=> {
            $("#exam_id").on('change', function(){
                let exam_id = $(this).val();
                if(exam_id.length < 1)
                {
                    return alert("Please select an exam to view its sitting arrangement")
                }
                window.location.href = window.location.origin  + "/admin/dashboard/seats/exam/" + exam_id + '/arrangement'
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/rooms/seat-arragement.blade.php ENDPATH**/ ?>