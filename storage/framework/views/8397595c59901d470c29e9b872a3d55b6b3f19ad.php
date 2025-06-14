<div class="promo-collection-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <?php $__currentLoopData = $data['repeater']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $image_id = $data['repeater']['repeater_image_'][$key];
                    $image = get_attachment_image_by_id($image_id);
                    $image_url = !empty($image) ? $image['img_url'] : '#';

                    $background = $data['repeater']['repeater_background_color_'][$key] ?? '';
                    $background_color = 'background-color:'.$background;

                    $button_target = array_key_exists('repeater_button_target_', $data['repeater']);
                    $button_target = $button_target && array_key_exists($key, $data['repeater']['repeater_button_target_']) ? 'target="_blank"' : '';

                    $title = esc_html($data['repeater']['repeater_title_'][$key] ?? '');
                    $title = str_replace('{break}', '<br>', $title)
                ?>

                <div class="col-xl-4 col-md-6 margin-top-30 responsive-child">
                <div class="single-promo-collection bg-item-five radius-10">
                    <div class="promo-collection-image-contents" style="<?php echo e($background ? $background_color : ''); ?>">
                        <div class="promo-collection-flex different-img">
                            <div class="promo-collection-img">
                                <img src="<?php echo e($image_url); ?>" alt="">
                            </div>
                            <div class="promo-collection-contents mt-4 mt-sm-0">
                                <h2 class="promo-collection-title color-heading">
                                    <a href="<?php echo e(esc_url($data['repeater']['repeater_button_url_'][$key]) ?? '#'); ?>"> <?php echo $title; ?> </a>
                                </h2>
                                <a href="<?php echo e(esc_url($data['repeater']['repeater_button_url_'][$key]) ?? '#'); ?>" class="shop-btn color-three mt-3">
                                    <?php echo e(esc_url($data['repeater']['repeater_button_text_'][$key]) ?? '#'); ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/common/collection-card.blade.php ENDPATH**/ ?>