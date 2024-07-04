<?php echo e(Form::open(array('route'=>'pixel.store','method'=>'post'))); ?>

<div class="card">
    <div class="row">
        <div class="col-12">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('platform', __('Platform'),['class'=>'form-label'])); ?>

                <?php echo Form::select('platform', $pixals_platforms, null,array('class' => 'form-control select2','required'=>'required')); ?>

                <?php $__errorArgs = ['platform'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="invalid-role" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group col-md-12">
            <?php echo e(Form::label('pixel_id',__('Pixel ID'))); ?>

            <?php echo e(Form::text('pixel_id',null,array('class'=>'form-control','placeholder'=>__('Enter Pixel ID')))); ?>

            <?php $__errorArgs = ['pixel_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-name" role="alert">
                        <strong class="text-danger"><?php echo e($message); ?></strong>
                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <input type="hidden" name="business_id" value="<?php echo e($business_id); ?>">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\wamp64\www\firstlink\resources\views/pixelfield/create.blade.php ENDPATH**/ ?>