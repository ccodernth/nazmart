<section class="collection-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="collection-wrapper">
            <div class="row gy-4">
                <?php $__currentLoopData = $data['repeater']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $image_id = $data['repeater']['repeater_image_'][$key];
                        $image = get_attachment_image_by_id($image_id);
                        $image_url = !empty($image) ? $image['img_url'] : '#';

                        $background_color = $data['repeater']['repeater_background_color_'][$key] ?? '#FFFFFF';
                        $background_color = 'background-color:'.$background_color;

                        $button_target = array_key_exists('repeater_button_target_', $data['repeater']);
                        $button_target = $button_target && array_key_exists($key, $data['repeater']['repeater_button_target_']) ? 'target="_blank"' : '';
                    ?>

                    <div class="col-lg-6">
                    <div class="single-collection-two collection-padding section-bg-4" style="<?php echo e($background_color); ?>">
                        <div class="single-collection-two-flex d-flex align-items-center">
                            <div class="single-collection-two-contents">
                                <h3 class="single-collection-two-contents-title fw-500"> <?php echo e($info); ?> </h3>
                                <a href="<?php echo e(\App\Helpers\SanitizeInput::esc_url($data['repeater']['repeater_button_url_'][$key]) ?? '#'); ?>" class="shop-now-btn shop-now-border mt-4" <?php echo $button_target; ?>> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater']['repeater_button_text_'][$key])); ?> </a>
                            </div>

                            <div class="single-collection-two-thumb">
                                <img src="<?php echo e($image_url); ?>" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/furnito/common/collection_card.blade.php ENDPATH**/ ?>