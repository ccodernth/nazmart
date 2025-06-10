<section class="release-area position-relative" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="release-wrapper bg-item-four">
            <div class="release-contents">
                <h2 class="release-title">
                    <?php echo highlighted_text($data['title'] ?? [], 'release-top color-four'); ?>

                </h2>

                <span class="release-price ff-rubik color-four margin-top-30"> <?php echo e(amount_with_currency_symbol($data['price'] ?? '')); ?> </span>

                <?php if(!empty($data['button_url']) && !empty($data['button_text'])): ?>
                    <div class="btn-wrapper margin-top-40">
                        <a href="<?php echo e($data['button_url']); ?>" class="cmn-btn btn-bg-4 radius-0"> <?php echo e($data['button_text']); ?> </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="release-image wow fadeInUp" data-wow-delay=".3s">
                <?php echo render_image_markup_by_attachment_id($data['image']); ?>

            </div>

            <div class="release-shapes">
                <?php echo render_image_markup_by_attachment_id($data['background_image']); ?>

            </div>

            <?php if(!empty($data['floating_text'])): ?>
                <?php
                    $tags = str_replace(',', '<br>',$data['floating_text']);
                ?>
                <span class="sale-offer ff-rubik style-02 bg-color-four"> <?php echo $tags; ?> </span>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/common/new-release-card.blade.php ENDPATH**/ ?>