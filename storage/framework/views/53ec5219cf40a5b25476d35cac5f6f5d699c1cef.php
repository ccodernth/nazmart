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

<section class="blog-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>"  id="<?php echo e($data['section_id']); ?>">
    <div class="container">
        <div class="section-title">
            <?php echo $final_title; ?>

            <p class="section-para"> <?php echo e($data['subtitle']); ?> </p>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <?php
                    $lang_rtl_con = get_user_lang_direction() == 1 ? 'true' : 'false';
                ?>
                <div class="global-slick-init slider-inner-margin dot-style-one" data-rtl="<?php echo e($lang_rtl_con); ?>" data-infinite="true" data-arrows="false" data-dots="true" data-slidesToShow="3" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-responsive='[{"breakpoint": 1600,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768, "settings": {"slidesToShow": 1}},{"breakpoint": 576, "settings": {"slidesToShow": 1}}]'>
                    <?php $__currentLoopData = $data['blogs'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-slider-item">
                            <div class="single-blog">
                                <div class="single-blog-thumb">
                                    <?php echo render_image_markup_by_attachment_id($blog->image ?? '', '', 'full', false); ?>

                                </div>
                                <div class="single-blog-contents mt-4">
                                    <h2 class="single-blog-contents-title">
                                        <a href="<?php echo e(route('landlord.frontend.blog.single',$blog['slug'])); ?>"> <?php echo e($blog->title); ?> </a>
                                    </h2>
                                    <div class="single-blog-contents-bottom mt-4">
                                        <a href="<?php echo e(route('landlord.frontend.blog.single',$blog['slug'])); ?>" class="reading-btn"> <?php echo e(__('Keep Reading')); ?> <i class="las la-arrow-right"></i> </a>
                                        <span class="min-reading"> <?php echo e($blog->created_at->format('d M Y')); ?> </span>
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
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/blog/blog-slider-one.blade.php ENDPATH**/ ?>