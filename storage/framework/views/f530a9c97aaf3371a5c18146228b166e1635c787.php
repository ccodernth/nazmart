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
        <?php echo e(get_static_option('site_title',__('Xgenious'))); ?>

        <?php if(!empty(get_static_option('site_tag_line'))): ?>
            - <?php echo e(get_static_option('site_tag_line')); ?>

        <?php endif; ?>
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="<?php echo e(global_asset('assets/landlord/admin/css/materialdesignicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/vendor.bundle.base.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(global_asset('assets/landlord/admin/css/style.css')); ?>" rel="stylesheet">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
           <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>


<script src="<?php echo e(global_asset('assets/landlord/admin/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/hoverable-collapse.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/off-canvas.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/admin/js/misc.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/landlord/common/js/axios.min.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/crux/public_html/core/resources/views/layouts/app.blade.php ENDPATH**/ ?>