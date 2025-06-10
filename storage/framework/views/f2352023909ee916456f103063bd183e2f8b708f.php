<!-- Trendy area starts -->
<section class="trendy-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-two">
            <h2 class="title fw-400"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title']) ?? 'Title'); ?> </h2>
            <p class="para"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''); ?> </p>
        </div>
        <div class="row gy-4 mt-3">
            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $data = get_product_dynamic_price($product);
                    $campaign_name = $data['campaign_name'];
                    $regular_price = $data['regular_price'];
                    $sale_price = $data['sale_price'];
                    $discount = $data['discount'];
                ?>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?>">
                <div class="global-card center-text no-shadow radius-0 pb-0">
                    <div class="global-card-thumb">
                        <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($product->image_id, 'rounded', 'grid'); ?>

                        </a>

                        <div class="global-card-thumb-badge right-side">
                            <?php if($discount != null): ?>
                                <span
                                    class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount); ?>% <?php echo e(__('off')); ?> </span>
                            <?php endif; ?>
                            <?php if(!empty($product->badge)): ?>
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> <?php echo e($product?->badge?->name); ?> </span>
                        <?php endif; ?>
                        </div>

                        <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="global-card-contents">
                        <h5 class="global-card-contents-title">
                            <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a>
                        </h5>

                        <?php echo render_product_star_rating_markup_with_count($product); ?>


                        <div class="price-update-through mt-3">
                            <span class="flash-prices color-three"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </span>
                            <span class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
                        </div>

                        <div class="btn-wrapper">
                            <?php if($product->inventory_detail_count < 1): ?>
                                <a href="javascript:void(0)" data-product_id="<?php echo e($product->id); ?>" class="cmn-btn cmn-btn-outline-three radius-0 mt-3 add-to-cart-btn"> <?php echo e(__('Add to Cart')); ?> </a>
                            <?php else: ?>
                                <a href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>" class="cmn-btn cmn-btn-outline-three radius-0 mt-3 product-quick-view-ajax"> <?php echo e(__('Add to Cart')); ?> </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Trendy area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/furnito/product/trending_products.blade.php ENDPATH**/ ?>