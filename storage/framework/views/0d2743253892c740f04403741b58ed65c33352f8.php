<!-- Collection area starts -->
<section class="collection-area body-bg-2" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-three text-center">
                    <h2 class="title">
                        <?php if(!empty($data['title_line'])): ?>
                            <?php
                                $title_line = get_attachment_image_by_id(get_static_option('title_shape_image'));
                                $title_line_image = !empty($title_line) ? $title_line['img_url'] : '';
                            ?>

                            <img class="line-round" src="<?php echo e($title_line_image); ?>" alt="">
                        <?php endif; ?>
                        <?php echo e($data['title'] ?? ''); ?>

                    </h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-40">
            <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $data = get_product_dynamic_price($product);
                    $campaign_name = $data['campaign_name'];
                    $regular_price = $data['regular_price'];
                    $sale_price = $data['sale_price'];
                    $discount = $data['discount'];

                    $delay = $loop->odd ? '.1s' : '.2s';
                    $fadeClass = $loop->odd ? 'fadeInUp' : 'fadeInDown';
                ?>

                <div class="col-xl-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 wow <?php echo e($fadeClass); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="signle-collection text-center padding-0">
                        <div class="collction-thumb">
                            <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($product->image_id, 'radius-0'); ?>

                            </a>

                            <?php echo $__env->make(include_theme_path('shop.partials.product-options'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="collection-contents">
                            <!--Product rating markup-->
                            <?php echo mares_product_star_rating($product?->rating, 'collection-review color-three justify-content-center margin-bottom-10'); ?>


                            <h2 class="collection-title color-three ff-playfair">
                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name, 'title'); ?> </a>
                            </h2>
                            <div class="collection-bottom margin-top-15">
                                <!--product bottom add to cart button-->
                                <?php echo $__env->make(include_theme_path('shop.partials.product-options-bottom'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <h3 class="common-price-title color-three fs-20 ff-roboto"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Collection area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/product/new_collection.blade.php ENDPATH**/ ?>