<!-- Popular Collection area Starts -->
<section class="collection-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left section-title-two">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>

                    <?php if(!empty($data['see_all_url']) && !empty($data['see_all_text'])): ?>
                        <a href="<?php echo e($data['see_all_url']); ?>">
                            <span class="see-all fs-18"> <?php echo e($data['see_all_text']); ?> </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $sale_data = get_product_dynamic_price($product);
                    $regular_price = $sale_data['regular_price'];
                    $sale_price = $sale_data['sale_price'];
                    $discount = $sale_data['discount'];

                    $delay = '.1s';
                    $class = 'fadeInUp';

                    if ($loop->even)
                    {
                        $delay = '.2s';
                        $class = 'fadeInDown';
                    }
                ?>

                <div class="col-xl-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="signle-collection bg-item-four radius-20">
                        <div class="collction-thumb">
                            <a href="<?php echo e(to_product_details($product->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($product->image_id, 'lazyloads'); ?>

                            </a>

                            <?php echo $__env->make(include_theme_path('shop.partials.product-options'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php if(!empty($discount)): ?>
                                <span class="sale bg-color-one sale-radius-1"> <?php echo e(__('Sale')); ?> </span>
                            <?php endif; ?>
                        </div>
                        <div class="collection-contents">
                            <h2 class="collection-title ff-jost">
                                <a href="<?php echo e(to_product_details($product->slug)); ?>"> <?php echo product_limited_text($product->name, 'title'); ?> </a>
                            </h2>
                            <div class="collection-flex">
                                <div class="price-update-through margin-top-15">
                                    <span class="fs-22 ff-roboto fw-500 flash-prices color-one"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </span>
                                    <span class="fs-18 flash-old-prices"> <?php echo e(amount_with_currency_symbol($regular_price)); ?> </span>
                                </div>
                                <div class="collection-flex-icon">
                                    <?php if($product->inventory_detail_count < 1): ?>
                                        <a href="javascript:void(0)" class="shopping-icon cart-loading add-to-cart-btn" data-product_id="<?php echo e($product->id); ?>">
                                            <i class="las la-shopping-bag"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)" class="shopping-icon cart-loading product-quick-view-ajax"
                                           data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                                            <i class="las la-shopping-bag"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Popular Collection area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/casual/product/popular_collection.blade.php ENDPATH**/ ?>