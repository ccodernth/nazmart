<!DOCTYPE html>
<html lang="<?php echo e(\App\Facades\GlobalLanguage::user_lang_slug()); ?>"
      dir="<?php echo e(\App\Facades\GlobalLanguage::user_lang_dir()); ?>">

<head>
    <?php echo renderHeadStartHooks(); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="canonical" href="<?php echo e(canonical_url()); ?>" />


    <?php
        $theme_slug = getSelectedThemeSlug();
        $theme_header_css_files = \App\Facades\ThemeDataFacade::getHeaderHookCssFiles();
        $theme_header_rtl_css_files = \App\Facades\ThemeDataFacade::getHeaderHookRtlCssFiles();
        $theme_header_js_files = \App\Facades\ThemeDataFacade::getHeaderHookJsFiles();
    ?>

    <?php echo load_google_fonts($theme_slug); ?>

    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>


    <title>
        <?php if(!request()->routeIs('tenant.frontend.homepage')): ?>
            <?php echo $__env->yieldContent('title'); ?>
            -
            <?php echo e(get_static_option('site_title')); ?>

        <?php else: ?>
            <?php echo e(get_static_option('site_title')); ?>

            <?php if(!empty(get_static_option('site_tag_line'))): ?>
                - <?php echo e(get_static_option('site_tag_line')); ?>

            <?php endif; ?>
        <?php endif; ?>
    </title>

    <?php echo render_favicon_by_id(filter_static_option_value('site_favicon', $global_static_field_data)); ?>


    <?php
        $loadCoreStyle = loadCoreStyle();
    ?>

    <?php if(in_array('bootstrap.min', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/bootstrap.min.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('animate', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/animate.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('slick', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/slick.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('nice-select', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/nice-select.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('line-awesome.min', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/line-awesome.min.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('jquery.ihavecookies', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/jquery.ihavecookies.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('odometer', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/odometer.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('common', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/common.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('magnific-popup', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/magnific-popup.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('helpers', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/helpers.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('toastr', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/toastr.css')); ?>">
    <?php endif; ?>
    <?php if(in_array('loader', $loadCoreStyle)): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/loader.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/footer-style.css')); ?>">

    <?php $__currentLoopData = $theme_header_css_files ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cssFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(loadCss($cssFile)); ?>" type="text/css" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
        <?php $__currentLoopData = $theme_header_rtl_css_files ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cssFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link rel="stylesheet" href="<?php echo e(loadCss($cssFile)); ?>" type="text/css" />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/custom-style.css')); ?>">

    <?php if(request()->routeIs('tenant.frontend.homepage')): ?>
        <?php echo $__env->make('tenant.frontend.partials.meta-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->yieldContent('meta-data'); ?>
    <?php endif; ?>

    <?php echo $__env->make('tenant.frontend.partials.css-variable', ['theme_slug' => $theme_slug], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/shop-order-custom.css')); ?>">
    <?php if(getSelectedThemeSlug() == 'bookpoint'): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/digital-shop-common.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/digital-shop-common.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/shop-common.css')); ?>">
    <?php endif; ?>


    <?php echo $__env->yieldContent('style'); ?>

    <?php
        $tenant_id = !empty(tenant()) ? tenant()->id : '';
        $file = file_exists('assets/tenant/frontend/css/'.$tenant_id.'/dynamic-style.css');
    ?>
    <?php if($file): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/frontend/css/'. $tenant_id .'/dynamic-style.css')); ?>">
    <?php endif; ?>

    <?php $__currentLoopData = $theme_header_js_files ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jsFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(loadJs($jsFile)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo renderHeadEndHooks(); ?>

</head>

<body class="<?php echo e($theme_slug); ?>">
<?php echo renderBodyStartHooks(); ?>


<?php echo $__env->make('tenant.frontend.partials.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('tenant.frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="search-suggestion-overlay"></div>



<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/header.blade.php ENDPATH**/ ?>