<section class="blog-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> <?php echo e(__('Blog Updates')); ?> </h2>
            <div class="append-blog"></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init blog-slider nav-style-one slider-inner-margin" data-appendArrows=".append-blog" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576, "settings": {"slidesToShow": 2} }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['blogs'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-slider-items">
                        <div class="single-blog-two">
                            <div class="single-blog-two-thumbs">
                                <?php
                                    $image = get_attachment_image_by_id($item->image);
                                    $image = $image['img_url'] ?? '';
                                ?>
                                <a href="<?php echo e(route('tenant.frontend.blog.single',$item->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($item->image); ?>

                                </a>
                                <div class="single-blog-two-thumbs-date">
                                    <a href="javascript:void(0)"> <span class="date"> <?php echo e($item->created_at?->format('d')); ?> </span> <span class="month"> <?php echo e($item->created_at?->format('M')); ?> </span> </a>
                                </div>
                            </div>
                            <div class="single-blog-two-contents mt-3">
                                <h4 class="single-blog-two-contents-title mt-3"> <a href="<?php echo e(route('tenant.frontend.blog.single',$item->slug)); ?>"> <?php echo e(\App\Helpers\SanitizeInput::esc_html(Str::words($item->title, 10))); ?> </a> </h4>
                                <div class="single-blog-two-contents-tags mt-3">
                                        <span class="single-blog-two-contents-tags-item">
                                            <a href="<?php echo e(route('tenant.frontend.blog.category', \App\Helpers\SanitizeInput::esc_url($item->category?->slug))); ?>"> <i class="las la-tag"></i> <?php echo e(\App\Helpers\SanitizeInput::esc_html($item->category?->title)); ?> </a>
                                        </span>
                                    <span class="single-blog-two-contents-tags-item"> <a href="<?php echo e(route('tenant.frontend.blog.single', \App\Helpers\SanitizeInput::esc_url($item->slug))); ?>">  <?php echo e(count($item->comments) ?? 0); ?> <?php echo e(__('Comments')); ?> </a> </span>
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
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/blog/blog-one.blade.php ENDPATH**/ ?>