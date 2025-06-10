<div class="shop-grid-contents">
    <div class="row gy-4 gy-lg-5">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $data_info = get_digital_product_dynamic_price($product);
                $regular_price = $data_info['regular_price'];
                $sale_price = $data_info['sale_price'];
                $discount = $data_info['discount'];

                $price = $sale_price > 0 ? $sale_price : $regular_price;
            ?>

            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6">
            <div class="global-card hover-overlay center-text bg-white book-filter-padding">
                <div class="global-card-thumb">
                    <a href="<?php echo e(route('tenant.digital.shop.product.details', $product->slug)); ?>">
                        <?php echo render_image_markup_by_attachment_id($product->image_id, 'product-image'); ?>

                    </a>

                    <?php if($discount > 0): ?>
                        <div class="global-badge left-side">
                            <span class="global-badge-box"> <?php echo e($discount); ?>% <?php echo e(__('off')); ?> </span>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($product->additionalFields?->badge_id)): ?>
                        <div class="global-badge left-side">
                            <span class="global-badge-box bg-new"> <?php echo e($product->additionalFields?->badge?->name); ?> </span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Product options start -->
                <?php echo $__env->make(include_theme_path('digital-shop.partials.product-options'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Product options end -->

                <div class="global-card-contents mt-3">
                    <h5 class="global-card-contents-title-two">
                        <a href="<?php echo e(route('tenant.digital.shop.product.details', $product->slug)); ?>"> <?php echo Str::words($product->name, 15); ?> </a>
                    </h5>
                    <span class="global-card-contents-subtitle mt-2"> <?php echo e($product->additionalFields?->author?->name); ?> </span>
                    <div class="price-update-through mt-3">
                        <span class="flash-prices color-one"> <?php echo e(float_amount_with_currency_symbol($price)); ?> </span>
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
<?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/frontend/digital-shop/partials/product-partials/grid-products.blade.php ENDPATH**/ ?>