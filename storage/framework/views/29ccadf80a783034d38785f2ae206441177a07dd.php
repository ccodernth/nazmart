<section class="stoere-area" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title justify-content-center">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <div class="col-lg-12 margin-top-40">
                <div class="product-list product-list-electro">
                    <ul class="product-button isootope-button style-02 color-four justify-content-center">
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
                        <?php $__currentLoopData = $data['categories'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <div class="row grid margin-top-10 padding-10 markup_wrapper">
                <?php $__currentLoopData = $data['products'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $delay = '.1s';
                        $class = 'fadeInUp';
                        if ($loop->even)
                        {
                            $delay = '.2s';
                            $class = 'fadeInDown';
                        }

                        $image_markup = \App\Facades\ImageRenderFacade::getParent($product->image_id)
                        ->getChild(to_product_details($product->slug))
                        ->getGrandChild()
                        ->renderAll();
                    ?>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-<?php echo e(productCards()); ?> margin-top-30 grid-item wow <?php echo e($class); ?>"
                         data-wow-delay="<?php echo e($delay); ?>">
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

        <?php if(!empty($data['view_all_button_text'])): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-wrapper text-center margin-top-50">
                        <a href="<?php echo e($data['view_all_button_url']); ?>"
                           class="cmn-btn btn-outline-four color-four radius-0"> <?php echo e($data['view_all_button_text']); ?> </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/product/product-type-list.blade.php ENDPATH**/ ?>