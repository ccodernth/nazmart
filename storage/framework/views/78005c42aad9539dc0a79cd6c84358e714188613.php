<ul class="global-card-thumb-icons">
    <?php if($product->inventory_detail_count < 1): ?>
        <li class="icon-list" title="<?php echo e(__('Add to Cart')); ?>">
            <a class="icon add-to-cart-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)">
                <i class="las la-shopping-cart"></i>
            </a>
        </li>

        <li class="icon-list add-to-wishlist-btn" title="<?php echo e(__('Add to Wishlist')); ?>">
            <a class="icon add-to-wishlist-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)">
                <i class="lar la-heart"></i>
            </a>
        </li>

        <li class="icon-list" title="<?php echo e(__('Add to Compare')); ?>">
            <a class="icon cart-loading compare-btn" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)">
                <i class="las la-retweet"></i>
            </a>
        </li>

    <?php else: ?>
        <li class="icon-list" title="<?php echo e(__('Add to Cart')); ?>">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="las la-shopping-cart"></i>
            </a>
        </li>

        <li class="icon-list wishlist-btn" title="<?php echo e(__('Add to Wishlist')); ?>">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="lar la-heart"></i>
            </a>
        </li>

        <li class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Add to Compare')); ?>">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
                <i class="las la-retweet"></i>
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
    <li class="icon-list">
        <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>">
            <i class="lar la-eye"></i></a>
    </li>
</ul>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/frontend/shop/partials/product-options.blade.php ENDPATH**/ ?>