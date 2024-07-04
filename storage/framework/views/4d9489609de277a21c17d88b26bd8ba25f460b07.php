<?php
    $users = \Auth::user();
    $businesses = App\Models\Business::allBusiness();
    $currantBusiness = $users->currentBusiness();
    $bussiness_id = $users->current_business;
?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('MFA')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('MFA')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('MFA')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .export-btn {
            float: right;
        }
    </style>
    <div class="container" style="margin-top:20px">
        <div class="row justify-content-md-left">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="border-bottom:none; font-weight:600"><strong>Multi Factor Authentication</strong></div>
                    <div class="card-body">
                        <p>Multi Factor Authentication (MFA) strengthens access security by requiring at least two methods to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($data['user']->loginSecurity == null): ?>
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('generate2faSecret')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Generate Secret Key to Enable 2FA
                                    </button>
                                </div>
                            </form>
                        <?php elseif(!$data['user']->loginSecurity->google2fa_enable): ?>
                            1. Scan this QR code with your Microsoft Authenticator App. Alternatively, you can use the code: <strong><code><?php echo e($data['secret']); ?></code></strong><br/>
                            <img src="<?php echo e($data['google2fa_url']); ?>" alt="">
                            <br/><br/>
                            2. Enter the pin from Google Authenticator app:<br/><br/>
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('enable2fa')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group<?php echo e($errors->has('verify-code') ? ' has-error' : ''); ?>">
                                    <label for="secret" class="control-label">Authenticator Code</label>
                                    <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                                    <?php if($errors->has('verify-code')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('verify-code')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Enable MFA
                                </button>
                            </form>
                        <?php elseif($data['user']->loginSecurity->google2fa_enable): ?>
                            <div class="alert alert-success">
                                MFA is currently <strong>enabled</strong> on your account.
                            </div>
							
							<p>If you are looking to disable Multi Factor Authentication. Please confirm your password and Click Disable MFA Button.</p>
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('disable2fa')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group<?php echo e($errors->has('current-password') ? ' has-error' : ''); ?>">
                                    <label for="change-password" class="control-label">Current Password</label>
                                        <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                        <?php if($errors->has('current-password')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('current-password')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-primary ">Disable MFA</button>
                            </form>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\finalbank\resources\views/auth/2fa_settings.blade.php ENDPATH**/ ?>