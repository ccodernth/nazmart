<ul class="collection-icon-list color-three">
    <?php if($product->inventory_detail_count < 1): ?>
        <li class="lists add-to-wishlist-btn" title="<?php echo e(__('View')); ?>">
            <a class="icon cart-loading add-to-wishlist-btn" href="javascript:void(0)"
               data-product_id="<?php echo e($product->id); ?>">
                <i class="lar la-heart"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon popup-modal cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-eye"></i>
            </a>
        </li>
        <li class="lists" title="<?php echo e(__('Add to Cart')); ?>">
            <a class="icon cart-loading add-to-cart-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)">
                <i class="las la-shopping-bag"></i>
            </a>
        </li>
    <?php else: ?>
        <li class="lists">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-heart"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon popup-modal cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-eye"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="las la-shopping-bag"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php
        $image_array = array();
        $img = get_attachment_image_by_id($product->image_id);
        array_push($image_array, $img['img_url'] ?? []);

        if (count($product->gallery_images) > 0) {
            foreach ($product->gallery_images ?? [] as $image)
                {
                    $img = get_attachment_image_by_id($image->id);
                    array_push($image_array, $img['img_url']);
                }
        }
    ?>
</ul>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/casual/frontend/shop/partials/product-options.blade.php ENDPATH**/ ?>