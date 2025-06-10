<!-- Explore Category area starts -->
<section class="explore-category-area digital-explore-category-area padding-top-100 padding-bottom-50"
         data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container custom-container-one">
        <div class="section-title text-left">
            <h2 class="title"> <?php echo e($data['title']); ?> </h2>
            <div class="btn-wrapper">
                <a href="<?php echo e($data['view_all_url']); ?>"
                   class="view-all color-heading fw-500"> <?php echo e($data['view_all_text']); ?> </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="category-list-wrapper">
                    <?php
                        $all = !empty($data['categories']) ? $data['categories']->pluck('id')->toArray() : '';
                        $allIds = implode(',', $all);
                    ?>
                    <ul class="category-grid-list filter-list store-tabs">
                        <li class="list active" data-limit="<?php echo e($data['product_limit']); ?>"
                            data-tab="all" data-all-id="<?php echo e($allIds); ?>" data-sort_by="<?php echo e($data['sort_by']); ?>"
                            data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e(__('All')); ?> </li>
                        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-tab="<?php echo e($category->slug); ?>"
                                data-limit="<?php echo e($data['product_limit']); ?>" data-sort_by="<?php echo e($data['sort_by']); ?>"
                                data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e($category->name); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="imageloaded">
            <div class="row grid-category mt-4 markup_wrapper">
                <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $data_info = get_digital_product_dynamic_price($product);
                        $regular_price = $data_info['regular_price'];
                        $sale_price = $data_info['sale_price'];
                        $discount = $data_info['discount'];

                        $price = $sale_price > 0 ? $sale_price : $regular_price;
                    ?>
                    <div class="grid-item col-xxl-4 col-lg-6 mt-4">
                        <div class="global-flex-card hover-overlay featured-card-padding radius-10">
                            <div class="global-flex-card-thumb radius-5">
                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($product->image_id, 'product-image'); ?>

                                </a>
                            </div>
                            <a href="javascript:void(0)"
                               class="product-cart-btn cart-btn-absolute radius-5 digital-add-to-cart-btn"
                               data-product_id="<?php echo e($product->id); ?>"> <?php echo e(__('Add to Cart')); ?> </a>
                            <a href="<?php echo e(route('tenant.digital.shop.product.details', $product->slug)); ?>"
                               class="cart-details-btn cart-details-absolute radius-5"><?php echo e(__('View Details')); ?></a>
                            <div class="global-flex-card-contents">
                                <?php if($discount > 0): ?>
                                    <div class="global-badge">
                                        <span class="global-badge-box bg-one"> <?php echo e($discount); ?>% <?php echo e(__('off')); ?> </span>
                                    </div>
                                <?php endif; ?>

                                <?php if(!empty($product->additionalFields?->badge_id)): ?>
                                    <div class="global-badge">
                                        <span
                                            class="global-badge-box bg-new"> <?php echo e($product->additionalFields?->badge?->name); ?> </span>
                                    </div>
                                <?php endif; ?>

                                <h6 class="global-flex-card-contents-title">
                                    <a href="<?php echo e(route('tenant.digital.shop.product.details', $product->slug)); ?>"> <?php echo e(Str::words($product->name, 4)); ?> </a>
                                </h6>

                                <span
                                    class="global-flex-card-contents-subtitle mt-2"> <?php echo e($product->additionalFields?->author?->name); ?> </span>

                                <?php echo render_product_star_rating_markup_with_count($product); ?>


                                <div class="price-update-through mt-3">
                                    <span
                                        class="fs-24 fw-500 flash-prices color-one"> <?php echo e(float_amount_with_currency_symbol($price)); ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Explore Category area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/bookpoint/product/product_type_list.blade.php ENDPATH**/ ?>