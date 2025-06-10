<section class="counter-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e($data['section_id']); ?>">
    <div class="container">
        <div class="counter-wrapper counter-wrapper-border bg-white">
            <div class="row">
                <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                    <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                            <div class="single-counter center-text">
                                <div class="single-counter-count border-counter">
                                    <span class="odometer" data-odometer-final="<?php echo e($data['repeater_data']['repeater_number_'][$key]); ?>"></span>
                                    <h4 class="single-counter-count-title">+</h4>
                                </div>
                                <p class="single-counter-para color-light mt-3"> <?php echo e($data['repeater_data']['repeater_title_'][$key]); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/number_counter.blade.php ENDPATH**/ ?>