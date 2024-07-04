<?php echo e(Form::model($user,array('route' => array('users.update', $user->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group ">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter User Name')))); ?>

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
    <div class="col-md-6">
        <div class="form-group">
            <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small class="invalid-email" role="alert">
                <strong class="text-danger"><?php echo e($message); ?></strong>
            </small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <?php if(\Auth::user()->type != 'super admin'): ?>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('role', __('User Role'),['class'=>'form-label'])); ?>

            <?php echo Form::select('role', $roles, $user->roles,array('class' => 'form-control select2','required'=>'required')); ?>

            <?php $__errorArgs = ['role'];
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
		
    <?php endif; ?>
</div>
 <div class="modal-footer p-0 pt-3">
    <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input class="btn btn-primary" type="submit" value="<?php echo e(__('Update')); ?>">
</div>
<?php echo e(Form::close()); ?><?php /**PATH C:\wamp64\www\firstlink\resources\views/user/edit.blade.php ENDPATH**/ ?>