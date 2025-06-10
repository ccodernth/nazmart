<div class="shop-sidebar-content">
    <div class="shop-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="single-shop-left">
            <div class="single-shop-left-search">
                <div class="single-shop-left-search-input">
                    <form action="<?php echo e(route('tenant.shop.search')); ?>" method="GET">
                        <input type="text" class="form--control" name="search" placeholder="<?php echo e(__('Search Products')); ?>">
                        <button type="submit"> <i class="las la-search"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Category')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="category-lists active-list">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-slug="<?php echo e($category->slug); ?>" data-value="<?php echo e($category->name); ?>">
                                <a href="javascript:void(0)" class="item">
                                    <span data-value="<?php echo e($category->name); ?>" data-slug="<?php echo e($category->slug); ?>" class="ad-values"> <?php echo e($category->name); ?> </span>
                                    <span> <?php echo e($category->product_count); ?> </span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Prices')); ?> </h5>
                <div class="shop-left-list mt-4">
                    <form class="price-range-slider" method="post" data-start-min="0" data-start-max="10000" data-min="0" data-max="10000" data-step="5">
                        <div class="ui-range-slider"></div>
                        <div class="ui-range-slider-footer">
                            <div class="ui-range-values">
                                <span class="ui-price-title"> <?php echo e(__('Price:')); ?> </span>
                                <div class="price-wrap-outputbox ui-range-value-min"><?php echo e(site_currency_symbol()); ?><span class="min_price">0</span>
                                    <input type="hidden" value="0">
                                </div> -
                                <div class="price-wrap-outputbox ui-range-value-max"><?php echo e(site_currency_symbol()); ?><span class="max_price">10000</span>
                                    <input type="hidden" value="10000">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Size')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="size-lists active-list">
                        <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-slug="<?php echo e($size->id); ?>" data-value="<?php echo e($size->size_code); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(ucfirst($size->name)); ?>">
                                <a class="radius-5" href="javascript:void(0)"> <?php echo e($size->size_code); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Color')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="color-lists active-list">
                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-value="<?php echo e($color->name); ?>" data-slug="<?php echo e($color->id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(ucfirst($color->name)); ?>">
                                <?php
                                    if (strtolower($color->color_code) == '#fff' || strtolower($color->color_code) == '#ffffff')
                                        {
                                            $border_class = 'border: 1px solid #d8d8d8';
                                        }
                                ?>
                                <a class="radius-5" style="background-color: <?php echo e($color->color_code); ?>;<?php echo e($border_class ?? ''); ?>" href="javascript:void(0)"> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Rating')); ?> </h5>
                <div class="shop-left-list">
                    <ul class="filter-lists active-list mt-3">
                        <li data-slug="5" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                        </li>
                        <li data-slug="4" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="3" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="2" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="1" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Tags')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="tag-lists active-list">
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-slug="<?php echo e($tag->tag_name); ?>">
                                <a class="radius-0 text-capitalize" href="javascript:void(0)"> <?php echo e($tag->tag_name); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/frontend/shop/partials/shop-sidebar-content.blade.php ENDPATH**/ ?>