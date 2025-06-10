<?php
    if (str_contains($data['title'], '{h}') && str_contains($data['title'], '{/h}'))
    {
        $text = explode('{h}',$data['title']);

        $highlighted_word = explode('{/h}', $text[1])[0];

        $highlighted_text = '<span class="section-shape title-shape">'. $highlighted_word .'</span>';
        $final_title = '<h2 class="title">'.str_replace('{h}'.$highlighted_word.'{/h}', $highlighted_text, $data['title']).'</h2>';
    } else {
        $final_title = '<h2 class="title">'. $data['title'] .'</h2>';
    }
?>

<section class="feedback-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e($data['section_id']); ?>">
    <div class="container">
        <div class="section-title">
            <?php echo $final_title; ?>

            <p class="section-para"> <?php echo e($data['subtitle']); ?> </p>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="global-slick-init slider-inner-margin dot-style-one" data-infinite="true" data-arrows="false" data-dots="true" data-slidesToShow="3" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-responsive='[{"breakpoint": 1600,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768, "settings": {"slidesToShow": 1}},{"breakpoint": 576, "settings": {"slidesToShow": 1}}]'>
                    <?php $__currentLoopData = $data['testimonial'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-slider-item">
                        <div class="single-feedback bg-white radius-10">
                            <div class="single-feedback-content">
                                <span class="single-feedback-content-icon"> <i class="las la-quote-left"></i> </span>
                                <p class="single-feedback-content-para"> <?php echo $info->description; ?> </p>
                            </div>
                            <div class="single-feedback-author author-border">
                                <div class="single-feedback-author-flex">
                                    <div class="single-feedback-author-thumb">
                                        <a href="javascript:void(0)">
                                            <?php echo render_image_markup_by_attachment_id($info->image); ?>

                                        </a>
                                    </div>
                                    <div class="single-feedback-author-content">
                                        <h3 class="single-feedback-author-content-title"> <a href="javascript:void(0)"> <?php echo e($info->name); ?></a> </h3>
                                        <span class="single-feedback-author-content-subtitle"> <?php echo e($info->company); ?> </span>
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
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/feedback.blade.php ENDPATH**/ ?>