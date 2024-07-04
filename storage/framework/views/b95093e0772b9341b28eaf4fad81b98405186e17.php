<?php echo e(Form::open(['url' => 'webhook', 'method' => 'post'])); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('Module', __('Module'), ['class' => 'form-label'])); ?>

        <?php echo Form::select('module', $module, null, ['class' => 'form-control select2', 'required' => 'required']); ?>

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

        <?php echo Form::select('method', $method, null, ['class' => 'form-control select2', 'required' => 'required']); ?>

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

        <?php echo e(Form::text('url', null, ['class' => 'form-control', 'placeholder' => __('Enter URL'), 'required' => 'required'])); ?>

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
    <?php echo e(Form::submit(__('Create'), ['class' => 'btn btn-primary'])); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH C:\wamp64\www\firstlink\resources\views/webhook/create.blade.php ENDPATH**/ ?>