<!doctype html>
<html lang="<?php echo e(\App\Facades\GlobalLanguage::default_slug()); ?>" dir="<?php echo e(\App\Facades\GlobalLanguage::default_dir()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>
            <?php if(!request()->routeIs('landlord.admin.home')): ?>
                <?php echo $__env->yieldContent('title'); ?>  -
            <?php endif; ?>
            <?php echo e(get_static_option('site_title', __('Xgenious'))); ?>

            <?php if(!empty(get_static_option('site_tag_line'))): ?>
                - <?php echo e(get_static_option('site_tag_line')); ?>

            <?php endif; ?>
        </title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>

    <!-- Styles -->
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/materialdesignicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/vendor.bundle.base.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/common/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/common/css/flatpickr.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/common/css/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/frontend/css/line-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/nice-select.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/common/css/toastr.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/common/css/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/custom-style.css')); ?>">

    <!-- dark mode css  -->
    <?php if(!empty(get_static_option('dark_mode_for_admin_panel'))): ?>
        <link href="<?php echo e(global_asset('assets/landlord/admin/css/dark-mode.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <!-- rtl mode -->
    <?php if(\App\Enums\LanguageEnums::getdirection(get_user_lang_direction()) === 'rtl'): ?>
        <link href="<?php echo e(global_asset('assets/landlord/admin/css/rtl.css')); ?>" rel="stylesheet">
    <?php endif; ?>

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>

<div class="container-scroller">
<?php echo $__env->make('landlord.admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
<?php echo $__env->make('landlord.admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/partials/header.blade.php ENDPATH**/ ?>