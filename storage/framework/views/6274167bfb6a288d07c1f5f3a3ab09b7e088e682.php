<!-- About area starts -->
<section class="about-area <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['section_class'])); ?>" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e(\App\Helpers\SanitizeInput::esc_html($data['section_id'])); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-thumb-wrapper">
                    <div class="about-thumb">
                        <?php $__currentLoopData = $data['repeater_data']['repeater_image_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo render_image_markup_by_attachment_id($image); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row align-items-center margin-top-10 padding-top-10">
                        <div class="col-xl-8 margin-top-30">
                            <div class="single-about-content bg-item-four">
                                <h2 class="about-title fs-46"> <?php echo e($data['primary_title'] ?? ''); ?> </h2>
                                <p class="about-para"> <?php echo $data['primary_description'] ?? ''; ?> </p>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 margin-top-30">
                            <div class="single-about-address">
                                <h2 class="title"> <?php echo e($data['secondary_title']); ?> </h2>
                                <ul class="about-location-list">
                                    <?php echo $data['secondary_description']; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/about/about_image.blade.php ENDPATH**/ ?>