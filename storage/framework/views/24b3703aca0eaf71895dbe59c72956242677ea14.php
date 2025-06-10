<section class="featured-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> <?php echo e($data['title']); ?></h2>
            <div class="append-featured"></div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init recent-slider nav-style-one slider-inner-margin" data-appendArrows=".append-featured" data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>' data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>' data-responsive='[{"breakpoint": 1800,"settings": {"slidesToShow": 4}},{"breakpoint": 1600,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768, "settings": {"slidesToShow": <?php echo e(phoneScreenProducts()); ?> } }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($loop->odd) {
                                    $delay = 1;
                                    $class = 'fadeInDown';
                                }
                            else {
                                $delay = 2;
                                $class = 'fadeInUp';
                            }

                            $data = get_product_dynamic_price($product);
                            $campaign_name = $data['campaign_name'];
                            $regular_price = $data['regular_price'];
                            $sale_price = $data['sale_price'];
                            $discount = $data['discount'];
                        ?>

                    <div class="slick-slider-items wow <?php echo e($class); ?>" data-wow-delay=".<?php echo e($delay); ?>s">
                        <div class="global-card no-shadow radius-0 pb-0">
                            <div class="global-card-thumb">
                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($product->image_id,); ?>

                                </a>

                                <?php if($discount != null): ?>
                                    <div class="global-card-thumb-badge right-side">
                                        <span class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount.'%'); ?> <?php echo e(__('Off')); ?> </span>

                                        <?php if(!empty($product->badge)): ?>
                                            <span class="global-card-thumb-badge-box bg-color-new"> <?php echo e($product?->badge?->name); ?> </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="global-card-contents">
                                <div class="global-card-contents-flex">
                                    <h5 class="global-card-contents-title"> <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a> </h5>
                                    <?php echo render_product_star_rating_markup_with_count($product); ?>

                                </div>
                                <div class="price-update-through mt-3">
                                    <span class="flash-prices color-two"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </span>
                                    <span
                                        class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
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
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/product/featured_product_slider.blade.php ENDPATH**/ ?>