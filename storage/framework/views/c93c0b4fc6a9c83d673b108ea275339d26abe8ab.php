<div id="tab-grid" class="tab-content-item">
    <div class="row mt-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
                $discount = $data['discount'];

                $final_price = calculatePrice($sale_price, $product);
            ?>

            <div class="col-sm-12 mt-4">
                <div class="global-flex-card">
                    <div class="global-card-thumb global-flex-card-thumb"
                        <?php echo render_background_image_markup_by_attachment_id($product->image_id); ?>>
                        <div class="global-card-thumb-badge right-side">
                            <?php if($discount != null): ?>
                                <span
                                    class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount); ?>% <?php echo e(__('off')); ?> </span>
                            <?php endif; ?>

                            <?php if(!empty($product->badge)): ?>
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> <?php echo e($product?->badge?->name); ?> </span>
                            <?php endif; ?>

                            <?php if(!is_null($campaign_name)): ?>
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> <?php echo e($campaign_name); ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="global-flex-card-contents">
                        <?php echo render_product_star_rating_markup_with_count($product); ?>

                        <h5 class="global-flex-card-contents-title fw-500 mt-3">
                            <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo Str::words($product->name, 15); ?> </a>
                        </h5>
                        <div class="price-update-through mt-4">
                            <span class="flash-prices color-two"> <?php echo e(amount_with_currency_symbol($final_price)); ?> </span>
                            <span class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
                        </div>
                        <p class="global-flex-card-contents-para extra-padding-right mt-4"> <?php echo e(Str::words($product->summary, 30)); ?> </p>
                        <div class="global-flex-card-contents-bottom border-flex-card pt-4 mt-4 pt-lg-5 mt-lg-5">
                            <div class="global-flex-card-contents-icon">
                                <?php if($product->inventory_detail_count < 1): ?>
                                    <div class="btn-wrapper" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Cart')); ?>">
                                        <a href="javascript:void(0)" data-product_id="<?php echo e($product->id); ?>" class="add-to-cart-btn cmn-btn cmn-btn-bg-2 radius-0"> <?php echo e(__('Add to Cart')); ?> </a>
                                    </div>
                                    <div class="icon-list wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Wishlist')); ?>">
                                        <a class="add-to-wishlist-btn icon cart-loading" data-product_id="<?php echo e($product->id); ?>" href="javascript:void(0)"> <i class="lar la-heart"></i>
                                        </a>
                                    </div>
                                    <div class="icon-list compare-btn" data-product_id="<?php echo e($product->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Compare')); ?>">
                                        <a class="icon cart-loading compare-btn" href="javascript:void(0)"> <i
                                                class="las la-retweet"></i> </a>
                                    </div>
                                <?php else: ?>
                                    <div class="btn-wrapper" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Cart')); ?>">
                                        <a href="javascript:void(0)" class="product-quick-view-ajax cmn-btn cmn-btn-bg-2 radius-0" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>"> <?php echo e(__('Add to Cart')); ?> </a>
                                    </div>
                                    <div class="icon-list wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Wishlist')); ?>">
                                        <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>"> <i class="lar la-heart"></i>
                                        </a>
                                    </div>
                                    <div class="icon-list compare-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="<?php echo e(__('Add to Compare')); ?>">
                                        <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>"> <i
                                                    class="las la-retweet"></i> </a>
                                    </div>
                                <?php endif; ?>

                                <?php
                                    $image_array = array();
                                    $img = get_attachment_image_by_id($product->image_id);
                                    array_push($image_array, $img['img_url'] ?? []);

                                    if (count($product->gallery_images) > 0)
                                        {
                                            foreach ($product->gallery_images ?? [] as $image)
                                                {
                                                    $img = get_attachment_image_by_id($image->id);
                                                    array_push($image_array, $img['img_url']);
                                                }
                                        }
                                ?>
                                <div class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview">
                                    <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="<?php echo e(route('tenant.products.single-quick-view', $product->slug)); ?>"> <i
                                            class="lar la-eye"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <ul class="pagination">
            <?php if(count($links) > 1): ?>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="page-item"><a data-page="<?php echo e($loop->iteration); ?>" class="page-link <?php echo e($loop->iteration === $current_page ? "active" : ""); ?>" href="<?php echo e($link); ?>"><?php echo e($loop->iteration); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/furnito/frontend/shop/partials/product-partials/list-products.blade.php ENDPATH**/ ?>