





<div class="urunler-module-main-div" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="urunler-module-inside-area">
        <div class="urun-kutulari-main">
            <div class="home-product-tabs">
                <div class="home-product-tablinks active" data-country="yeni">
                    <p data-title="yeni"><?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title'])); ?></p>
                </div>
            </div>
            <section id="home-product-tabs-wrapper" style="width: 100%;">
                <div class="wrapper_tabcontent">
                    <div id="yeni" class="home-product-tabcontent active">
                        <div class="home-product-tabcontent-in" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $data = get_product_dynamic_price($product);
                                    $campaign_name = $data['campaign_name'];
                                    $regular_price = $data['regular_price'];
                                    $sale_price = $data['sale_price'];

                                    $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;
                                ?>

                                <div class="cat-detail-products-box" >
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
                                    <div class="cat-detail-products-box-img">
                                        <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                            <?php echo render_image_markup_by_attachment_id($product->image_id, 'radius-0'); ?>

                                        </a>
                                    </div>
                                    <div class="cat-detail-products-box-info">
                                        <div class="cat-detail-products-box-marka">
                                            <a href="marka/e-meyve/" style="color: #000000;"><?php echo e(get_static_option('site_title')); ?></a>
                                        </div>
                                        <div class="cat-detail-products-box-h">
                                            <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>" style="color: #000000;"><?php echo e($product->name); ?></a>
                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-fiyat">
                                        <div class="cat-detail-products-box-fiyat-out">
                                            <?php if($discount>0): ?>
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    <?php echo e(amount_with_currency_symbol($regular_price)); ?>

                                                </div>
                                            <?php else: ?>
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0; visibility: hidden">Hide</div>
                                            <?php endif; ?>
                                            <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000;">
                                                <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?>

                                            </div>
                                        </div>
                                        <?php if($discount>0): ?>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!">
                                                % <?php echo e($discount); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="about-module-main-div">
    <div class="about-module-inside-area">
    </div>
</div>










<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/fruit/product/trending_products.blade.php ENDPATH**/ ?>