<?php use Modules\Product\Entities\Product; ?>
<div id="tab-grid2" class="tab-content-item active">
    <div class="row mt-4 gy-5">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
/*                            $discount = $data['discount'];*/
                $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;

            ?>

            <div class="cat-detail-products-box">

                <div class="cat-detail-products-box-cart-1">

                    <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <a href="javascript:void(0)" data-product_id="<?php echo e($product->id); ?>"
                       data-tooltip="<?php echo e(__('Add to Cart')); ?>"
                       class="add-to-cart-btn tooltip-right">
                        <i class="las la-shopping-basket"></i>
                    </a>

                    <a class="icon add-to-wishlist-btn tooltip-right"
                       data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)"
                       data-tooltip="<?php echo e(__('Add to Wishlist')); ?>">
                        <i class="lar la-heart"></i>
                    </a>

                    <a class="icon compare-btn tooltip-right"
                       data-product_id="<?php echo e($product->id); ?>"
                       data-tooltip="<?php echo e(__('Add to Compare')); ?>" href="javascript:void(0)">
                        <i class="las la-retweet"></i>
                    </a>

                </div>
                <div class="cat-detail-products-box-img ">
                    <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                        <?php echo render_image_markup_by_attachment_id($product->image_id, '', 'grid'); ?>

                    </a>
                </div>

                <div class="cat-detail-products-box-info">


                    <div class="cat-detail-products-box-marka">
                        <a href="marka/e-meyve/" style="color: #000000;">
                            <?php echo e(get_static_option('site_title')); ?> </a>
                    </div>
                    <div class="cat-detail-products-box-h">
                        <a href="<?php echo e(to_product_details($product->slug)); ?>"
                           style="color: #000000;">
                            <?php echo product_limited_text($product->name); ?> </a>
                    </div>
                </div>
                <div class="cat-detail-products-box-fiyat">
                    <div class="cat-detail-products-box-fiyat-out">
                        <?php if($discount>0): ?>
                            <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                <?php echo e(amount_with_currency_symbol($regular_price)); ?>

                            </div>
                        <?php else: ?>
                            <div class="cat-detail-products-box-fiyat-eski"
                                 style="color: #b0b0b0; visibility: hidden">Hide
                            </div>
                        <?php endif; ?>
                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000;">
                            <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?>

                        </div>
                    </div>
                    <?php if($discount>0): ?>
                        <div class="cat-detail-products-box-indirim tooltip-bottom"
                             data-tooltip="Məhsul satışdadır!">
                            % <?php echo e($discount); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        

        

        

            <div class="category-pagination-out mt-60">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?php if(count($links) > 1): ?>
                            <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="page-item <?php echo e($loop->iteration === $current_page ? 'active' : ''); ?>">
                                    <a data-page="<?php echo e($loop->iteration); ?>"
                                       class="page-link <?php echo e($loop->iteration === $current_page ? 'active' : ''); ?>"
                                       href="<?php echo e($link); ?>">
                                        <?php echo e($loop->iteration); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/fruit/frontend/shop/partials/product-partials/grid-products.blade.php ENDPATH**/ ?>