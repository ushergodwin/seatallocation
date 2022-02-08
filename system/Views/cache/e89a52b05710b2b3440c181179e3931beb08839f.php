

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <a href="#myModal" class="btn btn-outline-info" data-toggle="modal">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
            <br/>
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Account Type</th>
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
                            <td><?php echo e($item->first_name . " " . $item->last_name); ?></td>
                            <td><?php echo e($item->phone_number); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td>
                                <td><?php echo e($item->account_type); ?></td>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New User</h5>
                        
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(url('dashboard/users/add')); ?>" method="POST" id="userForm">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="w-100">
                                            Email Address
                                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="w-100">
                                            Phone Number
                                            <input type="text" name="phone_number" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name" class="w-100">
                                            First Name
                                            <input type="text" name="first_name" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="last_name" class="w-100">
                                            Last Name
                                            <input type="text" name="last_name" class="form-control" autocomplete="off" required/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="account_type" class="w-100">
                                            Account Type
                                            <select name="account_type" class="form-control" required>
                                                <option value="">select account type</option>
                                                <option value="Supervisor">Supervisor</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="password" class="w-100">
                                            Password
                                            <input type="password" id="password" name="password" class="form-control" readonly/>
                                        </label>
                                        <small class="text-muted">The password is the same as the email address. This can be later changed in the user settings</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="response"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" id="userBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        jQuery(()=> {
            $("#userBtn").on('click', function(){
                $.ajax({
                    type: 'POST',
                    url: $("#userForm").attr('action'),
                    data: $("#userForm").serializeArray(),
                    beforeSend: () => {
                        $(this).attr('disabled', true)
                        .html("<span class='spinner-border spinner-border-sm'></span> processing...")
                    },
                    success: (res) => {
                        $(".response").html(res)
                    },
                    complete: ()=> {
                        $(this).attr('disabled', false)
                        .html("Save Changes")
                        setTimeout(() => {
                            window.location.reload()
                        }, 5000);
                    }
                })
            })
            $("#email").on('keyup', function(){
                $("#password").val($(this).val())
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/admin/users.blade.php ENDPATH**/ ?>