<section class="collection-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title justify-content-center">
                    <h2 class="title"> <?php echo e($data['title']); ?> </h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <div class="col-lg-12 margin-top-40">
                <div class="global-slick-init collection-slider slider-inner-margin dot-style-one dot-color-four dot-03 slider-inner-margin" data-infinite="true" data-slidesToShow="4" data-dots="true" data-swipeToSlide="true" data-autoplay="false" data-autoplaySpeed="2500"
                     data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768, "settings": {"slidesToShow": 3}},{"breakpoint": 576, "settings": {"slidesToShow": <?php echo e(phoneScreenProducts()); ?> }}]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $class = $loop->odd ? 'fadeInUp' : 'fadeInDown';
                            $delay = $loop->odd ? '.1s' : '.2s';

                            $image_markup = \App\Facades\ImageRenderFacade::getParent($product->image_id)
                            ->getChild(to_product_details($product->slug))
                            ->getGrandchild()
                            ->renderAll();
                        ?>

                        <div class="signle-collection style-02 text-center wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                            <div class="collction-thumb">
                                <?php echo $image_markup; ?>


                                <?php echo $__env->make('themes.electro.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="collection-contents">
                                <h3 class="collection-title color-four">
                                    <a href="<?php echo e(to_product_details($product->slug)); ?>"> <?php echo product_limited_text($product->name); ?> </a>
                                </h3>
                                <div class="d-flex align-items-center justify-content-center gap-2 mt-3">
                                    <?php
                                        $price_class = 'fs-22 fw-500 flash-prices color-four';
                                    ?>
                                    <?php echo render_product_dynamic_price_markup($product, sale_price_class: $price_class, regular_price_markup_tag: 's'); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/product/featured-collection.blade.php ENDPATH**/ ?>