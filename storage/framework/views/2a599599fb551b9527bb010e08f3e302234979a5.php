<div class="single-shop-details-wrapper">
    <?php if($campaign_product !== null && $campaign_product->status !== 'draft'): ?>
        <div class="campaign_countdown_wrapper mb-5">
            <h3 class="text-capitalize text-start mb-3"><?php echo e($campaign_name); ?></h3>

            <?php if($is_expired): ?>
                <div class="global-timer"></div>
            <?php else: ?>
                <div class="text-capitalize alert alert-warning">
                    <h5><?php echo e(__('The Campaign is over or not yet started')); ?></h5>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="name_badge">
        <h2 class="details-title"> <?php echo $product->name; ?>

            <?php if(!empty($product->badge)): ?>
                <span class="global-card-thumb-badge-box global-card-thumb-badge-box-product-details  bg-color-new "> <?php echo e($product?->badge?->name); ?> </span>
            <?php endif; ?>
        </h2>
    </div>

    <?php echo render_product_star_rating_markup_with_count($product); ?>

    <div class="status-details d-flex align-items-center mt-4">
        <span class="status-details-title fw-500 me-5"> <?php echo e(__('Status')); ?> </span>
        <a id="<?php echo e($quickView ? "quick_view_" : ""); ?>stock" href="javascript:void(0)"
           data-stock-text='<?php echo $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>'; ?>'
           class="status-details-title color-stock fw-600"> <?php echo $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>'; ?> </a>
    </div>

    <?php
       $final_price = calculatePrice($sale_price, $product);
    ?>

    <div class="price-update-through mt-4">
        <h3 class="ff-rubik flash-prices"
            data-main-price="<?php echo e($final_price); ?>"
            data-currency-symbol="<?php echo e(site_currency_symbol()); ?>"
            id="<?php echo e($quickView ? "quick-view-price" : "price"); ?>"
        > <?php echo e(amount_with_currency_symbol($final_price)); ?> </h3>
        <span
            class="fs-22 flash-old-prices"> <?php echo e($deleted_price != null ? amount_with_currency_symbol($deleted_price) : ''); ?> </span>
    </div>

    <div class="value-input-area">
        <?php if($productSizes->count() > 0 && !empty(current(current($productSizes)))): ?>
            <div
                class="value-input-area single-input-list mt-4 size_list  <?php echo e($quickView ? "quick-view-value-input-area" : ""); ?>">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> <?php echo e(__('Size:')); ?> </strong>
                        <input readonly class="form--input value-size" name="size" type="text" value="">
                        <input type="hidden" id="selected_size">
                    </span>
                <ul class="size-lists select-list <?php echo e($quickView ? "quick-view-size-lists" : ""); ?>" data-type="Size">
                    <?php $__currentLoopData = $productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($product_size)): ?>
                            <li class="list"
                                data-value="<?php echo e(optional($product_size)->id); ?>"
                                data-display-value="<?php echo e(optional($product_size)->name); ?>"
                            > <?php echo e(optional($product_size)->size_code); ?> </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if($productColors->count() > 0 && current(current($productColors))): ?>
            <div
                class="value-input-area single-input-list mt-4 color_list  <?php echo e($quickView ? "quick-view-value-input-area" : ""); ?>">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> <?php echo e(__('Color:')); ?> </strong>
                        <input readonly class="form--input value-size" name="color" type="text" value="">
                        <input type="hidden" id="selected_color">
                    </span>
                <ul class="size-lists color-list <?php echo e($quickView ? "quick-view-size-lists" : ""); ?>" data-type="Color">
                    <?php $__currentLoopData = $productColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($product_color)): ?>
                            <li style="background-color: <?php echo e($product_color->color_code); ?>"
                                data-value="<?php echo e(optional($product_color)->id); ?>"
                                data-display-value="<?php echo e(optional($product_color)->name); ?>"
                            ></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>


        <?php $__currentLoopData = $available_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="value-input-area single-input-list mt-4 attribute_options_list  <?php echo e($quickView ? "quick-view-value-input-area" : ""); ?>">
                        <span class="input-title fw-500 color-heading input-list">
                            <strong class="color-light"> <?php echo e($attribute); ?> </strong>
                            <input readonly class="form--input value-size" type="text" value="">
                            <input type="hidden" id="selected_attribute_option" name="selected_attribute_option">
                        </span>
                <ul class="size-lists <?php echo e($quickView ? "quick-view-size-lists" : ""); ?>" data-type="<?php echo e($attribute); ?>">
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list"
                            data-value="<?php echo e($option); ?>"
                            data-display-value="<?php echo e($option); ?>"
                        > <?php echo e($option); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="quantity-area mt-4">
        <div class="quantity-flex">
            <span class="quantity-title color-heading fw-500"> <?php echo e(__('Quantity:')); ?> </span>
            <div class="product-quantity">
                <span class="<?php echo e($quickView ? "quick-view-" : ""); ?>substract  substract"><i
                        class="las la-minus"></i></span>
                <input class="<?php echo e($quickView ? "quick-view-" : ""); ?>quantity-input quantity-input qty_" type="number"
                       id="<?php echo e($quickView ? "quick-view-" : ""); ?>quantity" name="quantity" value="1">
                <span class="<?php echo e($quickView ? "quick-view-" : ""); ?>plus plus"><i class="las la-plus"></i></span>
            </div>

            <?php
                if ($product?->inventory?->stock_count > 0)
                    {
                        $text_color = 'text-success';
                        $text = __('Only!').' '.$product?->inventory?->stock_count.' '.__('Item Left');
                    } else {
                        $text_color = 'text-danger';
                        $text = __('No Item Left!');
                    }
            ?>
            <a class="stock-available color-stock <?php echo e($text_color); ?>" href="javascript:void(0)"
               id="<?php echo e($quickView ? "quick_view_" : ""); ?>item_left" data-stock-text="<?php echo e($text); ?>"> <?php echo e($text); ?> </a>
        </div>
        <div class="quantity-btn mt-4">
            <div class="btn-wrapper">
                <a href="javascript:void(0)"
                   class="<?php echo e($quickView ? "quick_view_add_to_cart" : "add_to_cart_single_page"); ?> cmn-btn cmn-btn-bg-heading radius-0 w-100 cart-loading"><?php echo e(__('Add to Cart')); ?> </a>
            </div>
            <div class="btn-wrapper">
                <a href="javascript:void(0)"
                   class="<?php echo e($quickView ? "quick_view_but_now" : "but_now_single_page"); ?>  cmn-btn cmn-btn-bg-steam radius-0 w-100 cart-loading"> <?php echo e(__('Buy Now')); ?> </a>
            </div>
        </div>
    </div>
    <div class="wishlist-compare mt-4">
        <div class="wishlist-compare-btn">
            <a href="javascript:void(0)"
               class="<?php echo e($quickView ? "quick_view_add_to_wishlist" : "add_to_wishlist_single_page"); ?> btn-wishlist share-icon fw-500">
                <span class="icon">
                    <i class="lar la-heart"></i>
                </span>
            </a>
            <a href="javascript:void(0)"
               class="btn-wishlist share-icon fw-500 <?php echo e($quickView ? "quick-view-" : ""); ?>compare-btn"
               data-product_id="<?php echo e($product->id); ?>"
               data-bs-toggle="tooltip"
               data-bs-placement="top"
               title="<?php echo e(__('Add to Compare')); ?>">
                    <span class="icon">
                        <i class="las la-retweet"></i>
                    </span>
            </a>
        </div>
        <div class="wishlist-share social_share_parent">
            <a href="javascript:void(0)" class="share-icon fw-500">
                    <span class="icon">
                        <i class="las la-share-alt"></i>
                    </span>
            </a>

            <?php
                $product_primary_image = get_attachment_image_by_id($product->image_id);
                $product_primary_image = $product_primary_image ? $product_primary_image['img_url'] : '';
            ?>
            <ul class="social_share_wrapper_item">
                <?php echo single_post_share($product->slug, $product->name, $product_primary_image); ?>

            </ul>
        </div>
    </div>
    <div class="shop-details-stock shop-border-top pt-4 mt-4">
        <ul class="stock-category">
            <li class="category-list">
                <span class="list-item fw-600">
                    <a href="<?php echo e(route('tenant.shop.category.products', [$product?->category?->slug, 'category'])); ?>"><?php echo e($product?->category?->name); ?></a>

                    <?php if($product?->subCategory?->slug): ?>
                        |
                        <a href="<?php echo e(route('tenant.shop.category.products', [$product?->subCategory?->slug, 'subcategory'])); ?>"><?php echo e($product?->subCategory?->name); ?></a>
                    <?php endif; ?>

                    <?php $__currentLoopData = $product->childCategory ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->first): ?>
                            |
                        <?php endif; ?>
                        <a href="<?php echo e(route('tenant.shop.category.products', [$child_category?->slug, 'child-category'])); ?>"> <?php echo e($child_category->name); ?> </a>

                        <?php if(!$loop->last): ?>
                            ,
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>
            </li>
            <?php if($product->uom != null): ?>
                <li class="category-list">
                    <span> <?php echo e(__('Unit:')); ?> </span>
                    <a class="list-item fw-600" href="javascript:void(0)">
                        <span><?php echo e($product?->uom?->quantity); ?></span>
                        <span><?php echo e($product?->uom?->uom_details?->name); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="category-list">
                <span> <?php echo e(__('SKU:')); ?> </span>
                <a class="list-item fw-600" href="javascript:void(0)"> <?php echo e($product?->inventory?->sku); ?> </a>
            </li>
        </ul>
        <div class="delivery-options delivery-parent mt-4">
            <?php if($product->product_delivery_option != null): ?>
                <?php $__currentLoopData = $product->product_delivery_option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="delivery-item d-flex">
                        <div class="icon">
                            <i class="<?php echo e($option->icon); ?>"></i>
                        </div>
                        <div class="content">
                            <h6 class="title"><?php echo e($option->title); ?></h6>
                            <p><?php echo e($option->sub_title); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="details-checkout-shop shop-border-top pt-4 mt-4">
            <span class="guaranteed-checkout fw-500 color-heading"> <?php echo e(__('Guaranteed Safe Checkout')); ?> </span>
            <?php
                $payment_gateway_images = \App\Models\PaymentGateway::where('status', 1)->permittedPaymentGateway()->get('image')->pluck('image');
            ?>

            <ul class="payment-list mt-3">
                <?php $__currentLoopData = $payment_gateway_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="single-list">
                        <a href="javascript:void(0)">
                            <?php echo render_image_markup_by_attachment_id($image); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/frontend/shop/product_details/partials/product-options.blade.php ENDPATH**/ ?>