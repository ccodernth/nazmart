<div class="group-urun-module-main-div" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="group-urun-module-inside-area">
        <div class="urun-kutulari-main">

            <?php
                $image1_url = get_attachment_image_by_id($data['image_1']);
                $image2_url = get_attachment_image_by_id($data['image_2']);
            ?>

                <!-- Section 1 -->
            <div class="group-product-main-box">
                <a href="<?php echo e(\App\Helpers\SanitizeInput::esc_html($data['image_1_url']) ?? 'javascript:void(0)'); ?>"
                   style="color: #000000;">
                    <div class="group-product-main-box-img">
                        <img src="<?php echo e($image1_url['img_url'] ?? ''); ?>" alt="Sizin üçün tövsiyə olunur">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-header">
                        <div class="group-product-main-box-container-header-left">
                            <div class="group-product-main-box-container-header-left-h" style="color: #000000;">
                                <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''); ?>

                            </div>
                        </div>
                    </div>
                    <div class="group-product-main-box-container-boxex">
                        <div class="swiper-product-list" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $data['section_1']['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $data1 = get_product_dynamic_price($product);
                                        $campaign_name = $data1['campaign_name'];
                                        $regular_price = $data1['regular_price'];
                                        $sale_price = $data1['sale_price'];

                                        $discount = $regular_price ? (100 - round(($sale_price / $regular_price) * 100)) : 0;
                                    ?>



                                    <div class="swiper-slide" style="margin-right: 13px;">
                                        <div class="cat-detail-products-box-caturunvitrin w-100">
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
                                            <div class="cat-detail-products-box-caturunvitrin-img">
                                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                                    <?php echo render_image_markup_by_attachment_id($product->image_id, 'radius-0'); ?>

                                                </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-info">
                                                <div class="cat-detail-products-box-marka">
                                                    <a href="marka/e-meyve/"
                                                       style="color: #000000;"><?php echo e(get_static_option('site_title')); ?></a>
                                                </div>
                                                <div class="cat-detail-products-box-caturunvitrin-h">
                                                    <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"
                                                       style="color: #000000;"><?php echo e($product->name); ?></a>
                                                </div>
                                            </div>

                                            <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                                <div class="cat-detail-products-box-fiyat-out">

                                                    <?php if($discount>0): ?>
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0;">
                                                            <?php echo e(amount_with_currency_symbol($regular_price)); ?>

                                                        </div>
                                                    <?php else: ?>
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0; visibility: hidden">Hide
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="cat-detail-products-box-fiyat-mevcut"
                                                         style="color: #000000;">
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
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="group-product-main-box">
                <a href="<?php echo e(\App\Helpers\SanitizeInput::esc_html($data['image_2_url']) ?? 'javascript:void(0)'); ?>"
                   style="color: #000000;">
                    <div class="group-product-main-box-img">
                        <img src="<?php echo e($image2_url['img_url'] ?? ''); ?>" alt="">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-boxex">
                        <div class="swiper-product-list" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $data['section_2']['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $data2 = get_product_dynamic_price($product);
                                        $campaign_name = $data2['campaign_name'];
                                        $regular_price = $data2['regular_price'];
                                        $sale_price = $data2['sale_price'];

                                        $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;
                                    ?>


                                    <div class="swiper-slide" style="margin-right: 13px;">
                                        <div class="cat-detail-products-box-caturunvitrin w-100">
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
                                            <div class="cat-detail-products-box-caturunvitrin-img">
                                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                                    <?php echo render_image_markup_by_attachment_id($product->image_id, 'radius-0'); ?>

                                                </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-info">
                                                <div class="cat-detail-products-box-marka">
                                                    <a href="ja"
                                                       style="color: #000000;"><?php echo e(get_static_option('site_title')); ?></a>
                                                </div>
                                                <div class="cat-detail-products-box-caturunvitrin-h">
                                                    <a href="<?php echo e($product->link); ?>"
                                                       style="color: #000000;"><?php echo e($product->name); ?></a>
                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                                <div class="cat-detail-products-box-fiyat-out">


                                                    <?php if($discount>0): ?>
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0;">
                                                            <?php echo e(amount_with_currency_symbol($regular_price)); ?>

                                                        </div>
                                                    <?php else: ?>
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0; visibility: hidden">Hide
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="cat-detail-products-box-fiyat-mevcut"
                                                         style="color: #000000;">
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
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/fruit/product/recommended_product.blade.php ENDPATH**/ ?>