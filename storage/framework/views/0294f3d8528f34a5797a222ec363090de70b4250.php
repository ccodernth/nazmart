<section class="promo-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row gy-5 promo-inner-border">
            <?php
                $index = 1;
            ?>
            <?php $__currentLoopData = $data['repeater_data']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                <div class="single-promo theme-three-padding">
                    <div class="single-promo-flex">
                        <div class="single-promo-icon">
                            <span> <?php echo e($index++); ?> </span>
                        </div>
                        <div class="single-promo-contents mt-2">
                            <h4 class="single-promo-contents-title fw-400">
                                <a href="javascript:void(0)"> <?php echo e(esc_html($title)); ?> </a>
                            </h4>
                            <p class="single-promo-contents-para mt-2"> <?php echo e(esc_html($data['repeater_data']['repeater_subtitle_'][$key]) ?? ''); ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/medicom/common/services.blade.php ENDPATH**/ ?>