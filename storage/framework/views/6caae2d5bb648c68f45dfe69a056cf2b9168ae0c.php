<section class="store-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title'])); ?> </h2>
            <div class="section-title theme-one-btn">
                <a href="<?php echo e($data['view_all_url']); ?>" class="view-all"> <?php echo e(__('View All')); ?> </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 mt-4">
                <div class="store-tab-contents">
                    <ul class="tabs store-tabs">
                        <li data-tab="all" class="active" data-sort_by="<?php echo e($data['sort_by']); ?>" data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e(__('All Category')); ?> </li>
                        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-tab="<?php echo e($category->slug); ?>" data-limit="<?php echo e($data['product_limit']); ?>" data-sort_by="<?php echo e($data['sort_by']); ?>" data-sort_to="<?php echo e($data['sort_to']); ?>"> <?php echo e($category->name); ?> </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="tab-content-item active" id="all">
                    <div class="row">
                        <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $img_data = get_attachment_image_by_id($product->image_id, 'grid');
                                $img = !empty($img_data) ? $img_data['img_url'] : '';
                                $alt = !empty($img_data) ? $img_data['img_alt'] : '';

                                $data_info = get_product_dynamic_price($product);
                                $campaign_name = $data_info['campaign_name'];
                                $regular_price = $data_info['regular_price'];
                                $sale_price = $data_info['sale_price'];
                                $discount = $data_info['discount'];
                            ?>

                            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-<?php echo e(productCards()); ?> mt-4">
                                <div class="global-card no-shadow radius-0 pb-0">
                                    <div class="global-card-thumb">
                                        <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                            <img class="lazyloads" data-src="<?php echo e($img); ?>" alt="<?php echo e($alt); ?>">
                                        </a>
                                        <div class="global-card-thumb-badge right-side">
                                            <?php if($discount != null): ?>
                                                <span class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount.'% '. __('Off')); ?> </span>
                                            <?php endif; ?>
                                        </div>

                                        <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <div class="global-card-contents">
                                        <div class="global-card-contents-flex">
                                            <h5 class="global-card-contents-title"> <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a> </h5>
                                            <?php echo render_product_star_rating_markup_with_count($product); ?>

                                        </div>

                                        <div class="price-update-through mt-3">
                                            <div class="price-update-through mt-3">
                                                <span class="flash-prices color-two"> <?php echo e(amount_with_currency_symbol(calculatePrice($sale_price, $product))); ?> </span>
                                                <span
                                                    class="flash-old-prices"> <?php echo e($regular_price != null ? amount_with_currency_symbol($regular_price) : ''); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-content-item" id="<?php echo e($category->slug); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function (){
            $(document).on('click', '.store-tabs li', function (e){
                e.preventDefault();

                let el = $(this);
                let tab = el.data('tab');
                let limit = el.data('limit');
                let sort_by = el.data('sort_by');
                let sort_to = el.data('sort_to');

                if(tab !== 'all')
                {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(route('tenant.category.wise.product.one')); ?>",
                        data: {
                            category : tab,
                            limit : limit,
                            sort_by: sort_by,
                            sort_to: sort_to
                        },
                        beforeSend: function (){
                            $('.loader').fadeIn(200);
                        },
                        success: function (data){
                            let id = data.category;
                            $('#'+id).html(data.markup);

                            $('.loader').fadeOut(200);
                        },
                        error: function (data){

                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/product/product_type_list.blade.php ENDPATH**/ ?>