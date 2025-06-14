<section class="arrivals-area" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title justify-content-center">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-10 padding-top-10">
            <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $class = $loop->odd ? 'fadeInUp' : 'fadeInDown';
                    $delay = $loop->odd ? '.1s' : '.2s';

                    $image_markup = \App\Facades\ImageRenderFacade::getParent($product->image_id)
                            ->getChild(to_product_details($product->slug))
                            ->getGrandchild()
                            ->renderAll();

                    $category_name = $product?->category?->name;
                    $category_slug = $product?->category?->slug;
                ?>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="signle-arrivals">
                        <div class="arrivals-thumb">
                            <?php echo $image_markup; ?>

                        </div>

                        <div class="arrivals-contents">
                            <div class="flex-space-contents">
                                <h3 class="arrivals-title hover-color-four">
                                    <a href="<?php echo e(to_product_details($product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a>
                                </h3>

                                <div class="electro-new-arrival-prices d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <?php
                                        $price_class = 'common-price-title ff-roboto color-four';
                                    ?>
                                    <?php echo render_product_dynamic_price_markup($product, sale_price_class: $price_class, regular_price_markup_tag: 's'); ?>

                                </div>
                            </div>

                            <div class="arrival-flex d-flex flex-wrap align-items-center">
                                <span class="categories fs-18 fw-500 margin-top-10">
                                    <a href="<?php echo e(to_product_category($category_slug)); ?>"> <?php echo e($category_name); ?> </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/product/new-products.blade.php ENDPATH**/ ?>