<div class="comingsoon-area" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row margin-top-10">
            <?php $__currentLoopData = $data['repeater']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $campaign_id = $data['repeater']['repeater_campaign_'][$index];
                    $campaign = \Modules\Campaign\Entities\Campaign::find($campaign_id);

                    $title = $data['repeater']['repeater_title_'][$index] ?? $campaign?->title;
                    $slogan = $data['repeater']['repeater_slogan_'][$index] ?? $campaign?->subtitle;

                    $image_id = $data['repeater']['repeater_image_'][$index] ?? $campaign?->image;

                    $campaign_url = route('frontend.products.campaign', $campaign_id);
                    $button_text = $data['repeater']['repeater_button_text_'][$index] ?? __('Order Now');
                    $button_url = $data['repeater']['repeater_button_url_'][$index] ?? $campaign_url;
                    $button_target = $data['repeater']['repeater_button_target_'][$index] ? 'target="_blank"' : '';
                ?>

                <div class="col-lg-6 margin-top-30">
                    <div class="single-coming-soon-ad bg-item-four radius-10">
                        <div class="coming-soon-image-contents">
                            <div class="coming-soon-flex">
                                <div class="coming-soon-contents mt-4 mt-sm-0">
                                    <span class="coming-soon-top color-heading"> <?php echo e($title); ?> </span>
                                    <h2 class="coming-soon-title color-three">
                                        <a href="<?php echo e($button_url); ?>">
                                            <?php echo get_tenant_highlighted_text($slogan, 'title-small'); ?>

                                        </a>
                                    </h2>

                                    <a href="<?php echo e($button_url); ?>" class="preorder-btn mt-4" <?php echo e($button_target); ?>>
                                        <span class="icon">
                                            <i class="las la-arrow-right"></i>
                                        </span>
                                        <?php echo e($button_text); ?>

                                    </a>
                                </div>
                                <div class="coming-soon-img">
                                    <?php echo render_image_markup_by_attachment_id($image_id); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/common/campaign-card.blade.php ENDPATH**/ ?>