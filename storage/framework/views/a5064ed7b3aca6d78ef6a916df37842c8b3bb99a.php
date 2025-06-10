<!-- Author area starts -->
<section class="author-area padding-top-50 padding-bottom-50" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container custom-container-one">
        <div class="section-title text-left">
            <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>
            <div class="append-author"></div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="global-slick-init recent-slider nav-style-one slider-inner-margin" data-appendArrows=".append-author" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1500,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}}]'
                     data-rtl="<?php echo e(get_user_lang_bool_direction()); ?>">
                    <?php
                        $color_class = ['bg-color-one','bg-color-two','bg-color-three','bg-color-four'];
                        $index = 0;
                    ?>
                    <?php $__currentLoopData = $data['authors'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-slider-item">
                            <div class="single-author author-padding <?php echo e($color_class[$index == count($color_class) ? 0 : $index++]); ?>">
                                <div class="single-author-flex">
                                    <div class="single-author-contents">
                                        <h3 class="single-author-contents-title">
                                            <a href="javascript:void(0)"> <?php echo e($author->name); ?> </a>
                                        </h3>

                                        <?php if($author->additional_fields_count): ?>
                                            <span class="single-author-contents-subtitle"> <?php echo e($author->additional_fields_count); ?> <?php echo e(__('Books')); ?> </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="single-author-thumb">
                                        <?php
                                            $image = get_attachment_image_by_id($author->image_id);
                                            $image_url = !empty($image) ? $image['img_url'] : '';
                                        ?>
                                        <a href="javascript:void(0)">
                                            <img class="lazyloads" data-src="<?php echo e($image_url); ?>" alt="author">
                                        </a>
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
<!-- Author area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/bookpoint/common/top-author.blade.php ENDPATH**/ ?>