

<?php $__env->startSection('content'); ?>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between">
                <?php
                    $available = $room->capacity;
                ?>
                <div class="mb-3">
                        Room Capacity: <span class="badge badge-primary"><?php echo e($room->capacity); ?></span> seats 
                </div>
                <?php if(!empty($collection)): ?>
                    <div class="mb-3">
                        Occupied: <span class="badge badge-primary"><?php echo e($collection[0]->occupied); ?></span> seats 
                    </div>
                    <div class="mb-3">
                        Available: <span class="badge badge-primary"><?php echo e($collection[0]->available); ?></span> seats 
                    </div>
                    <?php
                        $available = $collection[0]->available;
                    ?>
                <?php else: ?>
                    <div class="mb-3">
                        Occupied: <span class="badge badge-primary">0</span> seats 
                    </div>
                    <div class="mb-3">
                        Available: <span class="badge badge-primary"><?php echo e($room->capacity); ?></span> seats 
                    </div>
                <?php endif; ?>
            </div>
            <div class="card card-body">
                <form action="<?php echo e(url('dashboard/room/seats/store')); ?>" method="POST" id="roomForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="room_id" value="<?php echo e($room->id); ?>"/>
                    <input type="hidden" name="capacity" value="<?php echo e($room->capacity); ?>"/>
                    <div class="row" id="roomsDiv">
                        <div class="col-lg-6">
                            <label for="room_name" class="w-100">
                                Room Name
                                <input type="text" name="room_name" class="form-control" value="<?php echo e($room->room_name); ?>" autocomplete="off" readonly/>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="no_of_seats" class="w-100">
                                Number of seats
                                <input type="text" name="no_of_seats" value="<?php echo e($room->capacity); ?>" class="form-control" autocomplete="off" required/>
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-danger" id="roomResetBtn"
                            data-room_id="<?php echo e($room->id); ?>"
                            data-room_name="<?php echo e($room->room_name); ?>"
                            data-capacity="<?php echo e($room->capacity); ?>"
                            data-url="<?php echo e(url('dashboard/room/seats/reset')); ?>"
                            data-_token="<?php echo e(_token()); ?>">
                                <i class="fa fa-times"></i>
                                Reset Seats
                            </button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success" id="roomFormBtn"
                             <?php echo e($available == 0 ? 'disabled' : ''); ?>>
                                <i class="fa fa-check"></i>
                                <?php echo e($available == 0 ? 'Fully Occupied' : 'Save Seats in Room ' . $room->room_name); ?>

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
        request({form: 'roomForm', btn: 'roomFormBtn'})
        $("#roomResetBtn").on('click', function(){
            let conset = confirm("Reset seats in Room " + $(this).data('room_name') + "? \nThis will clear all occupied seats!\n All students who had these seats allocated to them will have no seats!")
            if(!conset)
            {
                alert("Operation cancelled.")
                return false;
            }
            
            return elementDataRequest({target: '#roomResetBtn', method: 'POST'})
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seatallocation\app\views/rooms/add-seats.blade.php ENDPATH**/ ?>