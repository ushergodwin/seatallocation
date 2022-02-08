
<?php $__env->startSection('content'); ?>
        <div class="container-fluid mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-body shadow">
                        <?php if(session('account_type') === 'Student'): ?>
                            
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="<?php echo e(asset('img/undraw_profile.svg')); ?>" class="rounded-circle" alt="profile photo"/>
                                    <h5 class="text-center"><?php echo e($collection->reg_no); ?></h5>
                                    <h5 class="text-center"><?php echo e($collection->st_no); ?></h5>
                                </div>
                                <div class="col-lg-8">
                                    <h5>NAME: <?php echo e($collection->name); ?></h5>
                                    <h5>Reg: <?php echo e($collection->reg_no); ?></h5>
                                    <h5>StNo: <?php echo e($collection->st_no); ?></h5>
                                    <h5>Course: <?php echo e($collection->course); ?></h5>
                                    <h5>Tell: <?php echo e($collection->phone_number); ?></h5>
                                    <h5>Email: <?php echo e($collection->email); ?></h5>
                                    <hr>
                                    <h5>Registered on: <?php echo e(date("D d M, Y", strtotime($collection->joined))); ?></h5>
                                </div>
                            </div>
                        <?php else: ?>
                            
                        <?php endif; ?>
                        <div class="response"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-body shadow bg-info text-light">
                        <h4>Reset Password</h4>
                        <form action="<?php echo e(url('api/auth/user/password/reset')); ?>" method="post" id="resetPasswordForm">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="username" class="w-100">
                                    Current Password <a href="#!" class="text-light" id="show-password">
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </a>
                                    <input type="password" name="c_password" class="form-control bg-light password" 
                                        autocomplete="off" required/>
                                </label>           
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Password
                                    <input type="password" name="password" id="password1" 
                                        class="form-control bg-light password"
                                        autocomplete="off" required/>
                                </label>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Retype Password
                                    <input type="password" name="password" id="password2"
                                        class="form-control bg-light password"
                                        autocomplete="off" required/>
                                </label>
                                <span id="password-error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-light reset-password-btn">RESET PASSWORD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('js/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/admin/settings.blade.php ENDPATH**/ ?>