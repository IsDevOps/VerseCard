<?php echo e(Form::model($webhook, array('route' => array('webhook.update', $webhook->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Module', __('Module'), ['class' => 'form-label'])); ?>

        <select name="module" class="form-control select2"
            id="module" >
            <?php $__currentLoopData = $module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value = "<?php echo e($key); ?>" <?php echo e($key == $webhook->module ? 'selected' : ''); ?>><?php echo e(__($value)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['module'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="invalid-module" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
            </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Method', __('Method'), ['class' => 'form-label'])); ?>

        <select name="method" class="form-control select2"
            id="method" >
            <?php $__currentLoopData = $method; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value = "<?php echo e($key); ?>" <?php echo e($key == $webhook->method ? 'selected' : ''); ?>><?php echo e(__($value)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="invalid-method" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
            </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group col-md-12">
        <?php echo e(Form::label('url', __('URL'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::text('url', $webhook->url, ['class' => 'form-control', 'placeholder' => __('Enter URL'), 'required' => 'required'])); ?>

        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="invalid-name" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
            </small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary'])); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\wamp64\www\firstlink\resources\views/webhook/edit.blade.php ENDPATH**/ ?>