
<!-- About area Starts -->
<section class="about-theme-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 mt-4">
                <div class="about-thumb-wrappers">
                    <div class="about-thumbs">
                        <?php echo render_image_markup_by_attachment_id($data['primary_image']); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="about-content-wrapper">
                    <div class="about-content-theme">
                        <h2 class="about-content-theme-title fw-600"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['primary_title'])); ?></h2>
                        <p class="about-content-theme-para mt-4"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['primary_description'])); ?> </p>

                        <div class="row g-5 mt-3">
                                <div class="col-lg-6">
                                    <div class="about-content-theme-single">
                                        <?php if(!empty($data['secondary_title_one'])): ?>
                                        <h3 class="about-content-theme-single-title fw-500"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['secondary_title_one'])); ?> </h3>
                                        <?php endif; ?>

                                        <?php if(!empty($data['secondary_description_one'])): ?>
                                            <p class="about-content-theme-single-para mt-4"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['secondary_description_one'])); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="about-content-theme-single">
                                        <?php if(!empty($data['secondary_title_two'])): ?>
                                        <h3 class="about-content-theme-single-title fw-500"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['secondary_title_two'])); ?> </h3>
                                        <?php endif; ?>

                                        <?php if(!empty($data['secondary_description_two'])): ?>
                                            <p class="about-content-theme-single-para mt-4"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['secondary_description_two'])); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/about/about_story.blade.php ENDPATH**/ ?>