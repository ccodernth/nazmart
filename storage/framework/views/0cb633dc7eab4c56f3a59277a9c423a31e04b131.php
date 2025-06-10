<div class="single-product-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="global-slick-init recent-slider nav-style-one slider-inner-margin" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="6" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 5}},{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 576, "settings": {"slidesToShow": <?php echo e(phoneScreenProducts()); ?> } }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['categories_info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-slider-item">
                            <div class="single-product-item center-text single-product-item-padding single-product-item-border">
                                <a href="<?php echo e(route('tenant.shop.category.products', ['category', $info->slug])); ?>" class="single-product-item-thumb">
                                    <?php echo render_image_markup_by_attachment_id($info->image_id); ?>

                                </a>
                                <div class="single-product-item-contents mt-3">
                                    <h3 class="single-product-item-contents-title fw-400">
                                        <a href="<?php echo e(route('tenant.shop.category.products', ['category', $info->slug])); ?>"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($info->name)); ?> </a>
                                    </h3>

                                    <?php if($data['product_count'] == 'on'): ?>
                                        <span class="single-product-item-contents-subtitle mt-2"> <?php echo e(count($info->product_categories)); ?> <?php echo e(__('Items')); ?> </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/furnito/common/categories-slider.blade.php ENDPATH**/ ?>