<section class="question-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom'] ?? ''); ?>">
    <div class="container">
        <div class="section-title">
            <?php echo get_modified_title($data['title']); ?>

            <p class="section-para"> <?php echo e($data['subtitle']); ?> </p>
        </div>
        <div class="row align-items-center justify-content-center mt-4">
            <div class="col-xl-5 mt-4">
                <div class="question-thumb-wrapper">
                    <?php echo \App\Facades\ImageRenderFacade::getParent($data['left_image'] ?? '', 'thumb center-text')->getGrandChild(is_lazy: true)->render(); ?>

                </div>
            </div>
            <div class="col-xl-7 col-lg-9 mt-4">
                <div class="faq-wrapper">
                    <div class="faq-contents">
                        <?php
                            $i = 1;
                        ?>

                        <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                            <?php $__currentLoopData = $data['repeater_data']['repeater_title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="faq-item wow fadeInLeft <?php echo e($key==1 ? 'active open' : ''); ?>" data-wow-delay=".<?php echo e($i++); ?>s">
                                    <div class="faq-title">
                                        <?php echo e($data['repeater_data']['repeater_title_'][$key] ?? ''); ?>

                                    </div>
                                    <div class="faq-panel">
                                        <p class="faq-para"> <?php echo e($data['repeater_data']['repeater_description_'][$key] ?? ''); ?> </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/faq.blade.php ENDPATH**/ ?>