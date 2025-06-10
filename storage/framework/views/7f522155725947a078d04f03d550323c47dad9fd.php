<section class="deal-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="deal-wrapper section-bg-2">
            <div class="deal-wrapper-thumb">
                <?php echo render_image_markup_by_attachment_id($data['bg_image'] ?? ''); ?>

            </div>
            <div class="deal-content">
                <h2 class="deal-content-title"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''); ?> </h2>
                <p class="deal-content-para mt-3"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['short_description']) ?? ''); ?> </p>
                <div class="global-timer mt-4"></div>
                <div class="btn-wrapper mt-4">
                    <a href="<?php echo e(empty($data['button_url']) ? route('tenant.campaign.index', $data['campaign']) : \App\Helpers\SanitizeInput::esc_url($data['button_url'])); ?>" class="cmn-btn cmn-btn-bg-2 radius-0"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['button_text'])); ?> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/common/deal-area.blade.php ENDPATH**/ ?>