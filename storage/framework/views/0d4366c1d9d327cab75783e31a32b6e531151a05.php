<div id="tab-grid2" class="tab-content-item active">
    <div class="row mt-4 gy-5">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
                $discount = $data['discount'];

                $final_price = calculatePrice($sale_price, $product);
            ?>

            <div class="col-xxl-3 col-lg-4 col-sm-4 col-<?php echo e(productCards()); ?>">
                <div class="global-card no-shadow radius-0 pb-0">
                    <div class="global-card-thumb">
                        <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($product->image_id, '', 'grid'); ?>

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

                        <?php echo $__env->make(include_theme_path('shop.partials.product-options'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="global-card-contents">
                        <div class="global-card-contents-flex">
                            <h5 class="global-card-contents-title text-capitalize">
                                <a href="<?php echo e(to_product_details($product->slug)); ?>"> <?php echo Str::words($product->name, 15); ?> </a>
                            </h5>
                            <?php echo render_product_star_rating_markup_with_count($product); ?>

                        </div>
                        <div class="price-update-through mt-3">
                            <span class="flash-prices color-two"> <?php echo e(amount_with_currency_symbol($final_price)); ?> </span>
                            <span
                                class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div class="pagination mt-60">
                <ul class="pagination-list">
                    <?php if(count($links) > 1): ?>
                        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a data-page="<?php echo e($loop->iteration); ?>" href="<?php echo e($link); ?>" class="page-number <?php echo e($loop->iteration === $current_page ? "current" : ""); ?>"><?php echo e($loop->iteration); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/medicom/frontend/shop/partials/product-partials/grid-products.blade.php ENDPATH**/ ?>