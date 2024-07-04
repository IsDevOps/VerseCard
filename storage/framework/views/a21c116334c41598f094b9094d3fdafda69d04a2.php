<?php
    
    // get theme color
    $setting = App\Models\Utility::colorset();
    $layout_setting = App\Models\Utility::getLayoutsSetting();
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';
    $company_logo = \App\Models\Utility::GetLogo();
    
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    // $company_logo = \App\Models\Utility::get_superadmin_logo()
    $company_favicon = Utility::getValByName('company_favicon');
    $SITE_RTL = env('SITE_RTL');
    $set_cookie = App\Models\Utility::cookie_settings();
    $lang = app()->getLocale('lang');
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }
    $langSetting=App\Models\Utility::langSetting();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'vCardGo')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <!-- Favicon -->
    
    <link rel="icon" href="<?php echo e($logo . '/favicon.png'); ?>" type="image/x-icon" />
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!-- vendor css -->
    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/custom.css')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>

    <style type="text/css">
        img.navbar-brand-img {
           width: 245px;
           height: 61px;
       } 
   </style>
</head>


<body class="<?php echo e($color); ?>">
    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <div class="auth-wrapper auth-v3">
                <div class="bg-auth-side bg-primary"></div>
                <div class="auth-content">
                    <nav class="navbar navbar-expand-md navbar-light default">
                        <div class="container-fluid pe-2">
                            <a class="navbar-brand" href="#">
                                <?php if($setting['cust_darklayout'] == 'on'): ?>
                                    <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png').'?'.time()); ?>"
                                        alt="" class="img-fluid" />
                                <?php else: ?>
                                    <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png').'?'.time()); ?>"
                                        alt="" class="img-fluid" />
                                <?php endif; ?>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                                <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Supports</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Terms</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <?php echo $__env->yieldContent('language-bar'); ?>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <?php echo $__env->yieldContent('content'); ?>
                    <div class="auth-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <p class="">
                                        <?php echo e(__('Copyright © ')); ?><?php echo e(isset($langSetting['footer_text']) ? $langSetting['footer_text'] : config('app.name', 'vCardGo-SaaS')); ?> <?php echo e(date('Y')); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Required Js -->
    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script>
        feather.replace();
    </script>
  <script>
    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
       document.addEventListener('DOMContentLoaded', (event) => {
       const recaptcha = document.querySelector('.g-recaptcha');
       recaptcha.setAttribute("data-theme", "dark");
       });
   <?php endif; ?>
</script>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>

</body>
<?php if($set_cookie['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

</html>
<?php /**PATH C:\wamp64\www\fvcard\resources\views/layouts/auth.blade.php ENDPATH**/ ?>