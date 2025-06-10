    <div class="banner-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="banner-social-content">
        <?php $__currentLoopData = $data['social_repeater']['social_media_name_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($data['social_repeater']['social_media_url_'][$key]); ?>" class="item"> <?php echo e($value); ?> </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="jacket-text-shape">
        <?php echo render_image_markup_by_attachment_id($data['foreground_image'] ?? ''); ?>

    </div>
    <div class="container container-one">
        <div class="row justify-content-center section-bg-2">
            <div class="col-lg-12">
                <div class="banner-content-wrapper">
                    <div class="global-slick-init dot-style-one dot-color-two banner-dots dot-absolute"
                         data-infinite="true" data-arrows="true" data-dots="true" data-autoplaySpeed="3000"
                         data-autoplay="true" data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                        <?php $__currentLoopData = $data['repeater_data']['title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title = \App\Helpers\SanitizeInput::esc_html($value) ?? '';
                                $subtitle = \App\Helpers\SanitizeInput::esc_html($data['repeater_data']['subtitle_'][$key]) ?? '';
                                $button_text = \App\Helpers\SanitizeInput::esc_html($data['repeater_data']['shop_button_text_'][$key]) ?? '';
                                $button_url = \App\Helpers\SanitizeInput::esc_url($data['repeater_data']['shop_button_url_'][$key]) ?? '';
                                $background_image = $data['repeater_data']['background_image_'][$key] ?? '';
                                $figure_image = $data['repeater_data']['figure_image_'][$key] ?? '';

                                $image_shape = get_attachment_image_by_id($background_image)['img_url'] ?? '';
                            ?>
                            <div class="banner-image">
                                <style>
                                    .banner-content-wrapper .after-shape-<?php echo e($key); ?>::after{
                                        background-image: url("<?php echo e($image_shape); ?>");
                                    }
                                </style>
                                <div class="banner-image-thumb after-shape-<?php echo e($key); ?>">
                                    <?php echo render_image_markup_by_attachment_id($figure_image ?? ''); ?>

                                </div>
                                <div class="banner-image-content">
                                    <h1 class="banner-image-content-title fw-500 mt-3">
                                        <a href="javascript:void(0)"> <?php echo get_tenant_highlighted_text($title); ?> </a>
                                    </h1>
                                    <p class="banner-image-content-para mt-3"> <?php echo e($subtitle); ?> </p>

                                    <?php if(!empty($button_url)): ?>
                                        <div class="btn-wrapper">
                                            <a href="<?php echo e($button_url); ?>" class="cmn-btn cmn-btn-bg-2 radius-0 mt-4 mt-lg-5"> <?php echo e($button_text); ?> </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/header/header-one.blade.php ENDPATH**/ ?>