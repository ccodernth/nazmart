<?php $__env->startSection('title'); ?>
    <?php echo __('Compare Product'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo __('Compare Product'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Compare Area Starts -->
    <section class="compare-area padding-top-75 padding-bottom-50">
        <div class="container container-one">
            <div class="row">
                <!-- Compare Area Starts -->
                <section class="compare-area padding-top-75 padding-bottom-50">
                    <div class="container container-one">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = \Gloudemans\Shoppingcart\Facades\Cart::instance("compare")->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $data = get_product_dynamic_price($product);
                                    $campaign_name = $data['campaign_name'];
                                    $regular_price = $data['regular_price'];
                                    $sale_price = $data['sale_price'];
                                    $discount = $data['discount'];

                                    $product_slug = \Modules\Product\Entities\Product::find($product->id);
                                    $product_slug = $product_slug->slug;
                                ?>

                                <div class="col-lg-4 col-md-6 mt-4">
                                    <div class="single-compare">
                                        <div class="single-compare-thumb">
                                            <a href="<?php echo e(route('tenant.shop.product.details', $product_slug)); ?>">
                                                <?php echo render_image_markup_by_attachment_id($product->options->image, '', 'grid'); ?>

                                            </a>
                                        </div>
                                        <div class="single-compare-contents mt-3">
                                            <h2 class="single-compare-contents-title fw-500 mt-2">
                                                <a href="<?php echo e(route('tenant.shop.product.details', $product_slug)); ?>"> <?php echo e($product->name); ?> </a>
                                            </h2>
                                            <h6 class="single-compare-contents-price mt-2"> <?php echo e(amount_with_currency_symbol($product->price)); ?> </h6>

                                            <?php if(!empty($product?->options['description'])): ?>
                                                <h6 class="single-compare-contents-id mt-3"> <?php echo e(__('SKU:')); ?> <strong> <?php echo e($product?->options?->sku); ?></strong> </h6>
                                            <?php endif; ?>

                                            <ul class="single-compare-contents-list">
                                                <?php if(!empty($product?->options['description'])): ?>
                                                    <li class="single-compare-contents-list-item"> <strong><?php echo e(__('Description:')); ?></strong>
                                                        <?php echo $product?->options['description']; ?>

                                                    </li>
                                                <?php endif; ?>

                                                <?php if(!empty($product->options["color_name"] ?? '')): ?>
                                                    <li class="single-compare-contents-list-item"> <strong><?php echo e(__('Color:')); ?></strong>
                                                        <ul class="list_sub_item color-ul">
                                                            <li data-color-code="<?php echo e($product->options['color_name']); ?>"><?php echo e($product->options['color_name']); ?></li>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(!empty($product->options["size_name"])): ?>
                                                    <li class="single-compare-contents-list-item"> <strong><?php echo e(__('Size:')); ?></strong>
                                                        <ul class="list_sub_item">
                                                            <li><?php echo e($product->options['size_name']); ?></li>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>

                                                <?php $__empty_2 = true; $__currentLoopData = $product->options["attributes"] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <li class="single-compare-contents-list-item"> <strong><?php echo e($key); ?></strong>
                                                        <ul class="list_sub_item">
                                                            <li><?php echo e($value); ?></li>
                                                        </ul>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <a href="javascript:void(0)"
                                           class="remove-btn close-compare compare-remove-btn mt-4"
                                           data-product_id="<?php echo e($product->rowId); ?>"
                                        > <?php echo e(__('Remove')); ?> </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-12">
                                    <h4 class="text-center"><?php echo e(__('No Product Available')); ?></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <!-- Compare Area end -->
            </div>
        </div>
    </section>
    <!-- Compare Area end -->

    <?php echo $__env->make(include_theme_path('shop.partials.shop-footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function (){
            /* ========================================
                Compare Click Close
            ======================================== */
            $(document).on('click', '.compare-remove-btn', function () {
                let product_id = $(this).data('product_id');

                $.ajax({
                    url: '<?php echo e(route('tenant.shop.compare.product.remove')); ?>',
                    type: 'GET',
                    data: {
                        product_id: product_id
                    },
                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        $('.loader').hide();

                        let sessionData = sessionStorage;
                        let ids = sessionData['products'].split(',');

                        $.each(ids, function (index ,value){
                            if (value == product_id)
                            {
                                ids.splice(index, 1);
                            }
                        });

                        let new_items = String(ids.join(","));

                        sessionStorage.clear();
                        if (new_items !== '')
                        {
                            sessionStorage.setItem('products', new_items);
                        }
                    },
                    error: function (data) {
                        $('.loader').hide();
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(route_prefix().'frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/frontend/shop/product-compare.blade.php ENDPATH**/ ?>