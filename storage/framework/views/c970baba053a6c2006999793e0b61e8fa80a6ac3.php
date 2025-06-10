<div class="shopping-icon bg-color-four justify-content-between">
    <?php if($product->inventory_detail_count < 1): ?>
            <a href="javascript:void(0)" class="cart-loading add-to-cart-btn"
               data-product_id="<?php echo e($product->id); ?>"> <?php echo e(__('Add to Cart')); ?> </a>

            <div class="icon-list">
                <a href="javascript:void(0)" class="icons cart-loading add-to-wishlist-btn"
                   data-product_id="<?php echo e($product->id); ?>">
                    <i class="lar la-heart"></i>
                </a>

                <a href="javascript:void(0)" class="icons cart-loading compare-btn"
                   data-product_id="<?php echo e($product->id); ?>">
                    <i class="las la-sync"></i>
                </a>

                <a href="javascript:void(0)" class="icons popup-modal cart-loading product-quick-view-ajax"
                   data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                    <i class="lar la-eye"></i>
                </a>
            </div>
    <?php else: ?>
        <a href="javascript:void(0)" class="cart-loading product-quick-view-ajax"
           data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>"> <?php echo e(__('Add to Cart')); ?> </a>

        <div class="icon-list">
            <a href="javascript:void(0)" class="icons cart-loading product-quick-view-ajax"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-heart"></i>
            </a>

            <a href="javascript:void(0)" class="icons cart-loading product-quick-view-ajax"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="las la-sync"></i>
            </a>

            <a href="javascript:void(0)" class="icons cart-loading product-quick-view-ajax"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-eye"></i>
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/electro/frontend/shop/partials/product-options.blade.php ENDPATH**/ ?>