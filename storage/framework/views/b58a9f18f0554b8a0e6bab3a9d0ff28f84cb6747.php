
<!-- Counter area starts -->
<section class="counter-area color-two <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['section_class'])); ?>" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e(\App\Helpers\SanitizeInput::esc_html($data['section_id'])); ?>">
    <div class="container container-one">
        <div class="counter-wrapper counter-wrapper-border bg-white">
            <div class="row">
                <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                    <div class="single-counter center-text">
                        <div class="single-counter-count border-counter">
                            <span class="odometer fw-500" data-odometer-final="<?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_number_'][$key])); ?>"></span>
                            <h4 class="single-counter-count-title fw-400">+</h4>
                        </div>
                        <p class="single-counter-para color-light mt-3"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_title_'][$key])); ?> </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Counter area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/about/number_counter.blade.php ENDPATH**/ ?>