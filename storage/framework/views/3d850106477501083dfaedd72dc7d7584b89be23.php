<!-- Special area starts -->
<section class="special-area padding-top-25 padding-bottom-50" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container custom-container-one">
        <div class="row">
            <?php $__currentLoopData = $data['repeater']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title = $data['repeater']['repeater_title_'][$key] ?? '';
                    $subtitle = $data['repeater']['repeater_subtitle_'][$key] ?? '';

                    $image_id = $data['repeater']['repeater_image_'][$key] ?? null;
                    $image = get_attachment_image_by_id($image_id);
                    $image_url = !empty($image) ? $image['img_url'] : '';

                    $background_color = $data['repeater']['repeater_background_color_'][$key] ?? 'rgba(58, 184, 235, 0.1)';
                    $background_color = 'background-color:'.$background_color;

                    $button_text = $data['repeater']['repeater_button_text_'][$key] ?? '';
                    $button_url = $data['repeater']['repeater_button_url_'][$key] ?? '#';
                    $button_color = $data['repeater']['repeater_button_color_'][$key] ?? 'rgba(58, 184, 235, 0.1)';

                    $button_target = array_key_exists('repeater_button_target_', $data['repeater']);
                    $button_target = $button_target && array_key_exists($key, $data['repeater']['repeater_button_target_']) ? 'target="_blank"' : '';
                ?>
                <div class="col-xl-6 mt-4">
                    <div class="single-special special-padding bg-color-one" style="<?php echo e($background_color); ?>">
                        <div class="single-special-flex">
                            <div class="single-special-contents">
                                <span
                                    class="single-special-contents-subtitle mb-2 mb-md-3"> <?php echo e($title); ?> </span>
                                <h2 class="single-special-contents-title"> <?php echo e($subtitle); ?> </h2>
                                <div class="btn-wrapper">
                                    <a href="<?php echo e($button_url); ?>"
                                       class="browse-btn mt-3 mt-md-4" style="color: <?php echo e($button_color); ?>" <?php echo e($button_target); ?>> <?php echo e($button_text); ?> <i
                                            class="las la-angle-right"></i> </a>
                                </div>
                            </div>
                            <div class="single-special-thumb">
                                <img class="lazyloads" data-src="<?php echo e($image_url); ?>" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Special area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/bookpoint/common/collection-card.blade.php ENDPATH**/ ?>