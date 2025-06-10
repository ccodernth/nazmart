<?php if($product->inventory_detail_count < 1): ?>
    <a class="collection-cart fs-20 fw-500 ff-roboto color-three add-to-cart-btn" href="javascript:void(0)" data-product_id="<?php echo e($product->id); ?>">
        <?php echo e(__('Add to Cart')); ?> </a>
<?php else: ?>
    <a class="collection-cart fs-20 fw-500 ff-roboto color-three product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
        <?php echo e(__('Add to Cart')); ?> </a>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/aromatic/frontend/shop/partials/product-options-bottom.blade.php ENDPATH**/ ?>