<section class="promo-area my-5">
    <div class="container container-one">
        <div class="row">
            <?php $__currentLoopData = $data['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-3 col-xl-4 col-md-6 mt-4">
                    <div class="single-promo center-text single-border promo-padding">
                        <div class="single-promo-icon">
                            <i class="<?php echo e($data['repeater_icon_'][$key] ?? ''); ?>"></i>
                        </div>
                        <div class="single-promo-contents mt-2">
                            <h4 class="single-promo-contents-title fw-500"> <a href="javascript:void(0)"> <?php echo e(esc_html($title)); ?></a> </h4>
                            <p class="single-promo-contents-para mt-2"> <?php echo e(esc_html($data['repeater_subtitle_'][$key]) ?? ''); ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/WidgetBuilder/views/tenant/shop_footer.blade.php ENDPATH**/ ?>