<div class="shop-grid-contents">
    <?php echo $__env->make(include_theme_path('shop.partials.filter-partials.shop-filters'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="grid-product-list">
        <?php echo $__env->make(include_theme_path('shop.partials.product-partials.grid-products'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="list-product-list">
        <?php echo $__env->make(include_theme_path('shop.partials.product-partials.list-products'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/furnito/frontend/shop/partials/shop-grid-products.blade.php ENDPATH**/ ?>