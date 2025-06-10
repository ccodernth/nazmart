<section class="featured-area padding-top-50 padding-bottom-50">
    <div class="container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> <?php echo e(__('Related Product')); ?> </h2>
            <div class="append-featured"></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init recent-slider nav-style-one slider-inner-margin"
                     data-appendArrows=".append-featured" data-infinite="true" data-arrows="true" data-dots="false"
                     data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>'
                     data-responsive='[{"breakpoint": 1600,"settings": {"slidesToShow": 3}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1} }]'>
                    <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($loop->odd) {
                                    $delay = 1;
                                    $class = 'fadeInDown';
                                }
                            else {
                                $delay = 2;
                                $class = 'fadeInUp';
                            }

                            $img_data = get_attachment_image_by_id($product->image_id, 'grid');
                            $img = !empty($img_data) ? $img_data['img_url'] : '';
                            $alt = !empty($img_data) ? $img_data['img_alt'] : '';

                            $discount = null;
                            if ($product->price)
                            {
                                $discount = round((($product->price - $product->sale_price) / $product->price)  * 100);
                            }
                        ?>

                        <div class="slick-slider-items wow <?php echo e($class); ?>" data-wow-delay=".<?php echo e($delay); ?>s">
                            <div class="global-card no-shadow radius-0 pb-0">
                                <div class="global-card-thumb">
                                    <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                        <img src="<?php echo e($img); ?>" alt="<?php echo e($alt); ?>">
                                    </a>

                                    <?php if($discount != null): ?>
                                        <div class="global-card-thumb-badge right-side">
                                            <span
                                                class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount.'%'); ?> <?php echo e(__('Off')); ?> </span>

                                            <?php if(!empty($product->badge)): ?>
                                                <span
                                                    class="global-card-thumb-badge-box bg-color-new"> <?php echo e($product?->badge?->name); ?> </span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>























                                </div>
                                <div class="global-card-contents">
                                    <div class="global-card-contents-flex">
                                        <h5 class="global-card-contents-title">
                                            <a href="javascript:void(0)"> <?php echo product_limited_text($product->name); ?> </a>
                                        </h5>

                                         <?php echo render_product_star_rating_markup_with_count($product); ?>


                                    </div>
                                    <div class="price-update-through mt-3">
                                        <?php echo product_prices($product, 'color-two'); ?>

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
<?php /**PATH /home/crux/public_html/core/resources/views/themes/fruit/frontend/shop/product_details/partials/featured-product.blade.php ENDPATH**/ ?>