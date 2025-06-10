<section class="collection-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="collection-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-collection section-bg-2">
                        <div class="single-collection-thumb">
                            <?php echo render_image_markup_by_attachment_id($data['left_image'] ?? ''); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-collection section-bg-2">
                        <div class="single-collection-thumb">
                            <?php echo render_image_markup_by_attachment_id($data['right_image'] ?? ''); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="collection-wrapper-contents center-text bg-white">
                <span class="collection-wrapper-contents-subtitle color-two"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''); ?> </span>
                <h2 class="collection-wrapper-contents-title mt-2"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''); ?> </h2>
                <div class="btn-wrapper mt-4">
                    <a href="<?php echo e(empty($data['button_url']) ? route('tenant.campaign.index', $data['campaign']) : \App\Helpers\SanitizeInput::esc_url($data['button_url'])); ?>" class="cmn-btn cmn-btn-bg-2 radius-0"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['button_text']) ?? ''); ?> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/common/collection-area.blade.php ENDPATH**/ ?>