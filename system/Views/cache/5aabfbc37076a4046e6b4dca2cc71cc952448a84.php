

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Student No</th>
                        <th>Registration No</th>
                        <th>Program</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $i  ++;
                        ?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->st_no); ?></td>
                            <td><?php echo e($item->reg_no); ?></td>
                            <td><?php echo e($item->course); ?></td>
                            <td><?php echo e($item->phone_number); ?></td>
                            <td><?php echo e($item->email); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        request({form: 'studentForm', btn: 'studentFormBtn'})
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/students/list.blade.php ENDPATH**/ ?>