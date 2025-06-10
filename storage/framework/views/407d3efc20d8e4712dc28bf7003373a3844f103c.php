<div class="category-filter category-border-top pt-5 pb-5">
    <div class="container custom-container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-list-wrapper">
                    <ul class="category-grid-list style-02 filter-list">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list" data-slug="<?php echo e($category->slug); ?>">
                                <?php echo e($category->name); ?>

                                <div class="checkbox-inlines">
                                    <input class="check-input" type="checkbox">
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/casual/frontend/digital-shop/partials/shop-topbar-content.blade.php ENDPATH**/ ?>