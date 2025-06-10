<!-- Store area Starts -->
<section class="stoere-area body-bg-2" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-three text-center">
                    <h2 class="title">
                        <?php if(!empty($data['title_line'])): ?>
                            <img class="line-round" src="<?php echo e(title_underline_image_src()); ?>" alt="">
                        <?php endif; ?>

                        <?php echo e($data['title']); ?></h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-65">
            <div class="col-lg-12">
                <div class="product-list">
                    <ul class="product-button isootope-button justify-content-center colors-heading">
                        <?php
                            $all = !empty($data['categories']) ? $data['categories']->pluck('id')->toArray() : '';
                            $allIds = implode(',', $all);
                        ?>

                        <li class="list active"
                            data-limit="<?php echo e($data['product_limit']); ?>"
                            data-tab="all"
                            data-all-id="<?php echo e($allIds); ?>"
                            data-sort_by="<?php echo e($data['sort_by']); ?>"
                            data-sort_to="<?php echo e($data['sort_to']); ?>"
                            data-filter="*"><?php echo e(__('All')); ?></li>
                        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list"
                                data-tab="<?php echo e($category->slug); ?>"
                                data-limit="<?php echo e($data['product_limit']); ?>"
                                data-sort_by="<?php echo e($data['sort_by']); ?>"
                                data-sort_to="<?php echo e($data['sort_to']); ?>"><?php echo e($category->name); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="imageloaded">
            <div class="row grid margin-top-40 markup_wrapper">
                <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $data_info = get_product_dynamic_price($product);
                        $campaign_name = $data_info['campaign_name'];
                        $regular_price = $data_info['regular_price'];
                        $sale_price = $data_info['sale_price'];
                        $discount = $data_info['discount'];

                        if ($loop->odd)
                            {
                                $delay = '.1s';
                                $fadeClass = 'fadeInUp';
                            } else {
                                $delay = '.2s';
                                $fadeClass = 'fadeInDown';
                            }
                    ?>

                    <div class="col-xl-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 grid-item st1 st2 st3 st4 wow <?php echo e($fadeClass); ?>" data-wow-delay="<?php echo e($delay); ?>">
                        <div class="signle-collection text-center padding-0">
                            <div class="collction-thumb">
                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($product->image_id, 'radius-0'); ?>

                                </a>

                                <?php echo $__env->make(include_theme_path('shop.partials.product-options'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="collection-contents">
                                <?php echo mares_product_star_rating($product?->rating, 'collection-review color-three justify-content-center margin-bottom-10'); ?>


                                <h2 class="collection-title color-three ff-playfair">
                                    <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name, 'title'); ?> </a>
                                </h2>
                                <div class="collection-bottom margin-top-15">
                                    <?php echo $__env->make(include_theme_path('shop.partials.product-options-bottom'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <h3 class="common-price-title color-three fs-20 ff-roboto"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Store area end -->



<?php $__env->startSection("scripts"); ?>
    <script>
        $(function () {
            $(document).on('click', '.product-list .list', function (e) {
                e.preventDefault();

                let el = $(this);
                let tab = el.data('tab');
                let limit = el.data('limit');
                let sort_by = el.data('sort_by');
                let sort_to = el.data('sort_to');
                let allId = el.data('all-id');

                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('tenant.category.wise.product.aromatic')); ?>",
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
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/product/product_type_list.blade.php ENDPATH**/ ?>