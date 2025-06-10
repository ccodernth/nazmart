<!DOCTYPE html>
<html dir="<?php echo e(\App\Facades\GlobalLanguage::user_lang_dir()); ?>" lang="<?php echo e(\App\Facades\GlobalLanguage::user_lang_slug()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title><?php echo e(__('404 Not Found')); ?></title>

    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/odometer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/common/css/helpers.css')); ?>">

    <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/rtl.css')); ?>">
    <?php endif; ?>
</head>
<body>
    <!-- 404 Area Starts -->
    <section class="single-page-area padding-top-100 padding-bottom-50">
        <div class="container container-one">
            <div class="single-page-wrapper center-text">
                <div class="single-page">
                    <div class="single-page-thumb">
                        <?php if(!empty(get_static_option_convert('error_image')[app()->getLocale()])): ?>
                            <?php echo render_image_markup_by_attachment_id(get_static_option_convert('error_image')[app()->getLocale()]); ?>

                        <?php else: ?>
                            <img src="<?php echo e(global_asset('assets/landlord/uploads/media-uploader/404.png')); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="single-page-contents mt-4 mt-lg-5">
                        <?php if(!empty(get_static_option_convert('error_404_page_subtitle')[app()->getLocale()])): ?>
                            <h2 class="single-page-contents-title fw-600"> <?php echo e(get_static_option_convert('error_404_page_subtitle')[app()->getLocale()]); ?> </h2>
                        <?php else: ?>
                            <h2 class="single-page-contents-title fw-600"> <?php echo e(__('Sorry! We can\'t find that page')); ?> </h2>
                        <?php endif; ?>

                        <div class="btn-wrapper">
                            <?php if(!empty(get_static_option_convert('error_404_page_button_text')[app()->getLocale()])): ?>
                                <h2 class="single-page-contents-title fw-600"> <?php echo e(get_static_option_convert('error_404_page_button_text')[app()->getLocale()]); ?> </h2>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>" class="cmn-btn cmn-btn-bg-2 radius-0 mt-4"> <?php echo e(__('Back to Home')); ?> </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 404 Area end -->
</body>
<?php /**PATH /home/crux/public_html/core/resources/views/errors/404.blade.php ENDPATH**/ ?>