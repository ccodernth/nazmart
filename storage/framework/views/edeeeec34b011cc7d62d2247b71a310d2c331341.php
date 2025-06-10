<section class="store-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-three">
            <h2 class="title"> <?php echo e($data['title']); ?> </h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mt-4">
                <div class="store-isotope">
                    <?php
                        $all = !empty($data['categories']) ? $data['categories']->pluck('id')->toArray() : '';
                        $allIds = implode(',', $all);
                    ?>
                    <ul class="store-isotope-list filter-list store-tabs">
                        <li class="list active" data-limit="<?php echo e($data['product_limit']); ?>"
                            data-tab="all" data-all-id="<?php echo e($allIds); ?>" data-sort_by="<?php echo e($data['sort_by']); ?>" data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e(__('All')); ?> </li>
                        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-tab="<?php echo e($category->slug); ?>"
                                data-limit="<?php echo e($data['product_limit']); ?>" data-sort_by="<?php echo e($data['sort_by']); ?>" data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e($category->name); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row gy-5 mt-3 markup_wrapper">
            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $data_info = get_product_dynamic_price($product);
                    $campaign_name = $data_info['campaign_name'];
                    $regular_price = $data_info['regular_price'];
                    $sale_price = $data_info['sale_price'];
                    $discount = $data_info['discount'];
                ?>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?>">
                    <div class="global-card center-text no-shadow radius-0 pb-0">
                        <div class="global-card-thumb single-border">
                            <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($product->image_id); ?>

                            </a>
                            <div class="global-card-thumb-badge right-side">
                                <?php if($discount != null): ?>
                                    <span
                                        class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount.'% '. __('Off')); ?> </span>
                                <?php endif; ?>
                            </div>

                            <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="global-card-contents">
                            <h5 class="global-card-contents-title">
                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a>
                            </h5>

                            <?php echo render_product_star_rating_markup_with_count($product); ?>


                            <div class="price-update-through mt-3">
                                <span class="flash-prices color-three"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </span>
                                <span class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<?php $__env->startSection("scripts"); ?>
    <script>
        $(function () {
            $(document).on('click', '.store-tabs .list', function (e) {
                e.preventDefault();

                let el = $(this);
                let tab = el.data('tab');
                let limit = el.data('limit');
                let allId = el.data('all-id');
                let sort_by = el.data('sort_by');
                let sort_to = el.data('sort_to');

                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('tenant.category.wise.product.three')); ?>",
                    data: {
                        category: tab,
                        limit: limit,
                        sort_by: sort_by,
                        sort_to: sort_to,
                        allId: allId
                    },
                    beforeSend: function () {
                        $('.loader').fadeIn(200);
                    },
                    success: function (data) {
                        let tab = $('li.list[data-tab='+data.category+']');
                        let markup_wrapper = $('.markup_wrapper');

                        $('li.list').removeClass('active');
                        tab.addClass('active');
                        markup_wrapper.hide();
                        markup_wrapper.html(data.markup);
                        markup_wrapper.fadeIn();
                        $('.loader').fadeOut(200);
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/medicom/product/product_type_list.blade.php ENDPATH**/ ?>