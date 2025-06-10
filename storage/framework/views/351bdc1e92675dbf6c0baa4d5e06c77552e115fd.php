<section class="sale-area" data-padding-top="<?php echo e($data['padding_top']); ?>"
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
                ?>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="signle-collection style-02 text-center">
                        <div class="collction-thumb">
                            <?php echo $image_markup; ?>


                            <?php echo $__env->make('themes.electro.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="collection-contents">
                            <h2 class="collection-title color-four fs-26">
                                <a href="<?php echo e(to_product_details($product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a>
                            </h2>

                            <div class="d-flex align-items-center justify-content-center gap-2 mt-3">
                                <?php
                                    $price_class = 'fs-22 fw-500 flash-prices color-four';
                                ?>
                                <?php echo render_product_dynamic_price_markup($product, sale_price_class: $price_class, regular_price_markup_tag: 's'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/product/popular-products.blade.php ENDPATH**/ ?>