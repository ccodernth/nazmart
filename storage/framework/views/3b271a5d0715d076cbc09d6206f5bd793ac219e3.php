<?php
    $primary_image = get_attachment_image_by_id($data['primary_image']);
    $primary_image = !empty($primary_image) ? $primary_image['img_url'] : '';

    $particle_image_one = get_attachment_image_by_id($data['particle_image_one']);
    $particle_image_one = !empty($particle_image_one) ? $particle_image_one['img_url'] : theme_assets('img/shape1.png');

    $particle_image_two = get_attachment_image_by_id($data['particle_image_two']);
    $particle_image_two = !empty($particle_image_two) ? $particle_image_two['img_url'] : theme_assets('img/shape2.png');

    $particle_image_three =  get_attachment_image_by_id($data['particle_image_three']);
    $particle_image_three = !empty($particle_image_three) ? $particle_image_three['img_url'] : theme_assets('img/shape3.png');

    $particle_image_four = get_attachment_image_by_id($data['particle_image_four']);
    $particle_image_four = !empty($particle_image_four) ? $particle_image_four['img_url'] : theme_assets('img/shape4.png');

    $particle_image_five = get_attachment_image_by_id($data['particle_image_five']);
    $particle_image_five = !empty($particle_image_five) ? $particle_image_five['img_url'] : theme_assets('img/index-4-s1.png');

    $particle_image_six = get_attachment_image_by_id($data['particle_image_six']);
    $particle_image_six = !empty($particle_image_six) ? $particle_image_six['img_url'] : theme_assets('img/index-5-round.png');

    $background_shape = get_attachment_image_by_id($data['background_shape']);
    $background_shape = !empty($background_shape) ? $background_shape['img_url'] : theme_assets('img/index-5-big1.png');
?>

<!-- Banner area Starts -->
<?php if(!empty($data['background_color'])): ?>
    <style>
        .banner-five .banner-five-shapes::before{
            background: <?php echo e($data['background_color']); ?>

    }
    </style>
<?php endif; ?>

<div class="banner-area banner-five position-relative body-bg-2">
    <div class="banner-shapes shapes-five">
        <img src="<?php echo e($particle_image_one); ?>" alt="">
        <img src="<?php echo e($particle_image_two); ?>" alt="">
        <img src="<?php echo e($particle_image_three); ?>" alt="">
        <img src="<?php echo e($particle_image_four); ?>" alt="">
        <img src="<?php echo e($particle_image_five); ?>" alt="">
        <img src="<?php echo e($particle_image_six); ?>" alt="">
    </div>
    <div class="banner-big-shape">
        <img src="<?php echo e($background_shape); ?>" alt="">
    </div>
    <div class="container-three">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-images-rights text-right wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-banner-five banner-five-shapes">
                        <img class="lazyloads" src="<?php echo e($primary_image); ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-contents">
                    <span class="banner-store fs-30 color-heading"> <?php echo e($data['pre_title']); ?> </span>
                    <h2 class="title ff-playfair fw-400"> <?php echo e($data['title']); ?> </h2>

                    <?php if(!empty($data['button_text']) && !empty($data['button_url'])): ?>
                        <div class="btn-wrapper margin-top-40">
                            <a href="<?php echo e($data['button_url']); ?>" class="cmn-btn btn-bg-1 radius-0"> <?php echo e($data['button_text']); ?> </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/header/header-one.blade.php ENDPATH**/ ?>