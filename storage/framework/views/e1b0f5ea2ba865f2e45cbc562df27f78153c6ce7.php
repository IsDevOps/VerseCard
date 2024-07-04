<?php echo e(Form::model($user,array('route' => array('user.password.update', $user->id), 'method' => 'post'))); ?>

<div class="row">
    <div class="form-group col-md-6">
        <?php echo e(Form::label('password',__('Password'),['class'=>'form-label'])); ?>

       <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">
       <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
       <span class="invalid-feedback" role="alert">
               <strong><?php echo e($message); ?></strong>
           </span>
       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('password_confirmation', __('Confirm Password'),['class'=>'form-label'])); ?>

        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
<div class="modal-footer p-0 pt-3">
    <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input class="btn btn-primary" type="submit" value="<?php echo e(__('Reset')); ?>">
</div>
<?php echo e(Form::close()); ?><?php /**PATH C:\wamp64\www\firstlink\resources\views/user/reset.blade.php ENDPATH**/ ?>