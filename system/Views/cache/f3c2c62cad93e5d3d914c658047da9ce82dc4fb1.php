

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-body">
                <form action="<?php echo e(url('dashboard//students/store')); ?>" method="POST" id="studentForm">
                    <?php echo csrf_field(); ?>
                   <div class="row">
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="w-100">
                                    Student Name 
                                    <input type="text" name="name" class="form-control" required/>
                                </label>
                            </div>
                       </div>
                       <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="w-100">
                                    Student Email Address
                                    <input type="email" name="email" class="form-control" required/>
                                </label>
                            </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Student No
                                <input type="text" name="st_no" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="st_no" class="w-100">
                                Registration No
                                <input type="text" name="reg_no" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="course" class="w-100">
                                    Program
                                    <select name="course" class="custom-select" required>
                                        <option value="">-- select course --</option>
                                        <option value="BSE">BACHELOR OF SOFTWARE ENGINEERING</option>
                                        <option value="BCS">BACHELOR OF COMPUTER SCIENCE</option>
                                        <option value="BIST">BACHELOR OF INFORMATION SYSTEMS AND TECHNOLOGY</option>
        
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone_number" class="w-100">
                                Phone Number
                                <input type="number" name="phone_number" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="w-100">
                            Student Default Password 
                            <input type="text" name="secret" class="form-control" value="student@seats" disabled/>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" id="studentFormBtn">
                            <i class="fa fa-plus"></i>
                            Add Student
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

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/students/add.blade.php ENDPATH**/ ?>