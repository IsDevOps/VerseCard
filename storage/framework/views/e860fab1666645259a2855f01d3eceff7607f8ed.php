<div class="form-control-label"><?php echo e(__('Bussiness Card')); ?> : </div>
    <p class="text-muted mb-4">
        <?php echo e($ad->getBussinessName()); ?>

    </p>
    <div class="form-control-label"><?php echo e(__('Name')); ?> </div>
    <p class="text-muted mb-4">
        <?php echo e($ad->name); ?>

    </p>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-control-label"><?php echo e(__('Email')); ?> </div>
            <p class="text-muted mb-4">
                <?php echo e($ad->email); ?>

            </p>
        </div>
        <div class="col-md-6">
            <div class="form-control-label"><?php echo e(__('Phone')); ?> </div>
            <p class="text-muted mb-4">
                <?php echo e($ad->phone); ?>

            </p>
        </div>
        <div class="col-md-6">
            <div class="form-control-label"><?php echo e(__('Date')); ?></div>
            <p class="mt-1"><?php echo e($ad->date); ?></p>
        </div>
        <div class="col-md-6">
            <div class="form-control-label"><?php echo e(__('Time')); ?></div>
            <p class="mt-1"><?php echo e($ad->time); ?></p>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\firstlink\resources\views/appointments/calender-modal.blade.php ENDPATH**/ ?>