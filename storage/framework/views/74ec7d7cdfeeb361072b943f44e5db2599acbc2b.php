<?php
    $product_bg_image = get_attachment_image_by_id($data['product_background_image']);
    $product_bg_image = !empty($product_bg_image) ? $product_bg_image['img_url'] : theme_assets('img/cate-shapes.png');
?>

<!-- Category area Starts -->
<section class="category-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left section-title-two">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>

                    <?php if(!empty($data['button_url']) && !empty($data['button_text'])): ?>
                        <a href="<?php echo e($data['button_url']); ?>">
                            <span class="see-all fs-18"> <?php echo e($data['button_text'] ?? ''); ?> </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <?php $__currentLoopData = $data['categories_info'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $delay = '.1s';
                    $class = 'fadeInUp';

                    if ($loop->even)
                    {
                        $delay = '.2s';
                        $class = 'fadeInDown';
                    }
                ?>

                <div class="col-xl-3 col-md-3 col-sm-6 col-6 margin-top-30 wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="single-category radius-20 bg-item-four text-center">
                        <div class="image-contents">
                            <div class="category-thumb">
                                <?php echo render_image_markup_by_attachment_id($category->image_id, 'lazyloads'); ?>

                            </div>

                            <div class="shape-circle">
                                <img src="<?php echo e($product_bg_image); ?>" alt="">
                            </div>
                        </div>
                        <div class="category-contents">
                            <div class="notification-title">
                                <h2 class="titles ff-jost">
                                    <a href="javascript:void(0)"> <?php echo e($category->name); ?> </a>
                                </h2>

                                <?php if($data['product_count']): ?>
                                    <?php
                                        $product_count = count($category->product_categories);
                                    ?>

                                    <?php if($product_count > 0): ?>
                                        <span class="notification bg-color-one"> <?php echo e($product_count); ?> </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <a href="<?php echo e(route('tenant.shop.category.products', [$category->slug, 'category'])); ?>" class="collection-btn color-one"> <?php echo e($data['read_more_button_text'] ?? __('See Collection')); ?> </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Category area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/casual/common/categories.blade.php ENDPATH**/ ?>