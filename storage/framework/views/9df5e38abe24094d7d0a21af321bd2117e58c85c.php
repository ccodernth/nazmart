<?php
    $campaign_id = $data['campaign'] ?? '';

    $campaign = new stdClass();
    if ($campaign_id)
    {
        $campaign = \Modules\Campaign\Entities\Campaign::where('id', $campaign_id)->first();
    }

    $title = $data['title'] ?? ($campaign->title ?? '');
    $button_url = $data['button_url'] ?? (!empty($campaign_id) ? route('tenant.campaign.index', $campaign_id) : '#');
?>


<!-- Flash Sale area Starts -->
<section class="flash-sale-area overflow-hidden" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-two">
        <div class="flash-sale-wrapper bg-item-four radius-30">
            <div class="flash-sale-contents">
                <h2 class="flas-sale-title ff-jost"> <?php echo e($title); ?> </h2>
                <div class="flash-countdown margin-top-20">
                    <?php if(!empty($campaign)): ?>
                        <?php if(\Carbon\Carbon::parse($campaign->start_date) > now()): ?>
                            <h4><?php echo e(__('The campaign has not started yet. Please check back later for updates')); ?></h4>
                        <?php else: ?>
                            <div class="global-timer simple-timer-two"
                                 data-year="<?php echo e($campaign->end_date->format('Y') ?? ''); ?>"
                                 data-month="<?php echo e($campaign->end_date->format('m') ?? ''); ?>"
                                 data-day="<?php echo e($campaign->end_date->format('d') ?? ''); ?>"
                            ></div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="flash-btn">
                    <a href="<?php echo e($button_url); ?>" class="flash-store"> <?php echo e($data['button_text'] ?? ''); ?> </a>
                </div>
            </div>
            <div class="flash-sale-image wow slideInUp" data-wow-delay=".3s">
                <?php echo render_image_markup_by_attachment_id($data['image'], 'lazyloads'); ?>

            </div>
            <div class="flash-middle-shapes">
                <?php echo render_image_markup_by_attachment_id($data['background_shape']); ?>

            </div>
            <span class="sale-offer ff-jost fw-600 bg-color-one"> <?php echo e(sprintf("%s%% OFF", ($data['discount'] ?? ''))); ?> </span>
        </div>
    </div>
</section>
<!-- Flash Sale area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/casual/common/campaign_sale.blade.php ENDPATH**/ ?>