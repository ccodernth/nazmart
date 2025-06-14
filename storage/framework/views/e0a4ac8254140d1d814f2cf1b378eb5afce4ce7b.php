<section class="category-area category-inner-border" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-three">
            <h2 class="title"> <?php echo e($data['section_title']); ?> </h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="global-slick-init category-slider nav-style-one nav-color-four slider-inner-margin" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="5" data-swipeToSlide="true" data-autoplay="false" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 5}},{"breakpoint": 1600,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 576,"settings": {"slidesToShow": 2} }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['categories_info'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-slider-item">
                            <div class="single-category center-text">
                                <div class="single-category-thumb">
                                    <a href="<?php echo e(route('tenant.shop.category.products', [$category->slug, 'category'])); ?>">
                                        <?php echo render_image_markup_by_attachment_id($category->image_id); ?>

                                    </a>
                                </div>
                                <div class="single-category-contents mt-4">
                                    <h3 class="single-category-contents-title fw-400">
                                        <a href="<?php echo e(route('tenant.shop.category.products', [$category->slug, 'category'])); ?>">
                                            <?php echo e($category->name); ?>

                                        </a>
                                    </h3>
                                    <p class="single-product-item-contents-subtitle mt-2"><?php echo e($category->product_count ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/medicom/product/categories-slider.blade.php ENDPATH**/ ?>