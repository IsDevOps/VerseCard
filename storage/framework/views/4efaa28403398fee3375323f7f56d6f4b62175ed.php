
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-md-left">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header" style="border-bottom: none; font-weight:600">Multi Factor Authentication</div>
                    <div class="card-body">
                        <p>Multi Factor Authentication (MFA) strengthens access security by requiring at least two methods to verify your identity. <br><br> Multi factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        Enter the pin from Microsoft Authenticator app:<br/><br/>
                        <form class="form-horizontal" action="<?php echo e(route('2faVerify')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('one_time_password-code') ? ' has-error' : ''); ?>">
                                <label for="one_time_password" class="control-label">One Time Password</label>
                                <input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="text" required/>
                            </div>
                            <button class="btn btn-primary" type="submit">Authenticate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\firstlink\resources\views/auth/2fa_verify.blade.php ENDPATH**/ ?>