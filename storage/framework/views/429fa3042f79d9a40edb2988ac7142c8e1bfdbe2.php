
<!-- Feedback area starts -->
<section class="feedback-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title'])); ?> </h2>
            <div class="append-feedback"></div>
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-lg-12 mt-4">
                <div class="feedback-slide-right">
                    <div class="global-slick-init feedback-right-slider nav-style-one slider-inner-margin" data-appendArrows=".append-feedback" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="3" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                         data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 480, "settings": {"slidesToShow": 1} }]'
                         data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                        <?php $__currentLoopData = $data['testimonial'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $image = get_attachment_image_by_id($item->image);
                                $image_path = !empty($image) ? $image['img_url'] : '';
                            ?>

                            <div class="slick-slider-items">
                                <div class="single-feedback-two">
                                    <div class="single-feedback-two-contents">
                                        <div class="single-feedback-two-contents-thumb">
                                            <img class="radius-parcent-50" src="<?php echo e($image_path); ?>" alt="">
                                        </div>
                                        <p class="single-feedback-two-contents-para-two mt-3"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($item->description)); ?> </p>
                                        <div class="single-feedback-two-contents-bottom feedback-two-border">
                                            <div class="single-feedback-two-contents-bottom-flex">
                                                <div class="single-feedback-two-contents-bottom-details">
                                                    <h3 class="single-feedback-two-contents-bottom-details-title mt-3"> <a href="javascript:void(0)"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($item->name)); ?> </a> </h3>
                                                    <?php echo render_star_rating_markup($item->rating); ?>

                                                </div>
                                                <div class="single-feedback-two-contents-bottom-quote">
                                                    <i class="las la-quote-left"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feedback area ends -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/common/testimonial_two.blade.php ENDPATH**/ ?>