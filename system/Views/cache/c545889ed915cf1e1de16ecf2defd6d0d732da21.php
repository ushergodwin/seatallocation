
<?php $__env->startSection('content'); ?>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card card-body shadow bg-info text-light">
                        
                        <form action="<?php echo e(url('/api/auth/user')); ?>" method="post" id="loginForm">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="username" class="w-100">Student No or Other ID 
                                    <i class="fas fa-user text-light"></i> 
                                    <input type="text" name="username" class="form-control bg-light" 
                                        autocomplete="off" required/>
                                </label>           
                            </div>
                            <div class="mb-3">
                                <label for="password" class="w-100">
                                    Password <a href="#!" class="text-light" id="show-password">
                                        <i class="fas fa-eye-slash" id="eye"></i>
                                    </a>
                                    <input type="password" name="password" id="password" 
                                        class="form-control bg-light"
                                        autocomplete="off" required/>
                                </label>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-light w-100 login-btn">LOGIN</button>
                            </div>
                        </form>
                    <div class="response"></div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('js/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/index.blade.php ENDPATH**/ ?>