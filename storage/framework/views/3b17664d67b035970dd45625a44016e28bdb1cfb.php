<?php
    if(!isset($product)){
        $product = null;
    }
?>

<div class="general-info-wrapper px-3">
    <h4 class="dashboard-common-title-two"> <?php echo e(__('Price Manage')); ?> </h4>
    <div class="general-info-form mt-0 mt-lg-4">
        <div class="dashboard-input mt-4">
            <label class="dashboard-label color-light mb-2"> <?php echo e(__("Base Cost")); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.mandatory-indicator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.mandatory-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></label>
            <input type="text" class="form--control radius-10" value="<?php echo e($product?->cost); ?>" name="cost" placeholder="<?php echo e(__("Base Cost...")); ?>">
            <p><?php echo e(__("Purchase price of this product.")); ?></p>
        </div>

        <div class="dashboard-input mt-4">
            <label class="dashboard-label color-light mb-2"> <?php echo e(__("Regular Price")); ?> </label>
            <input type="text" class="form--control radius-10" value="<?php echo e($product?->price); ?>" name="price" placeholder="<?php echo e(__("Enter Regular Price...")); ?>">
            <small><?php echo e(__("This price will display like this")); ?> <del>( <?php echo e(site_currency_symbol()); ?> 10)</del></small>
        </div>

        <div class="dashboard-input mt-4">
            <label class="dashboard-label color-light mb-2"> <?php echo e(__("Sale Price")); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.mandatory-indicator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.mandatory-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></label>
            <input type="text" class="form--control radius-10" value="<?php echo e($product?->sale_price); ?>" name="sale_price" placeholder="<?php echo e(__("Enter Sale Price...")); ?>">
            <small><?php echo e(__("This will be your product selling price")); ?></small>
        </div>

        <?php if($product): ?>
            <div class="dashboard-input mt-4">
                <div class="row">
                    <div class="col-6 is_taxable_wrapper">
                        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Is Taxable?")); ?></label>
                        <select name="is_taxable" class="form--control radius-10">
                            <option <?php if($product->is_taxable == 0): echo 'selected'; endif; ?> value="no"><?php echo e(__('No')); ?></option>
                            <option <?php if($product->is_taxable == 1): echo 'selected'; endif; ?> value="yes"><?php echo e(__('Yes')); ?></option>
                        </select>
                    </div>

                    <div class="col-6 tax_classes_wrapper" style="<?php echo \Illuminate\Support\Arr::toCssStyles(['display: none' => !$product->is_taxable]) ?>">
                        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Tax classes")); ?></label>
                        <select name="tax_class" class="form--control radius-10">
                            <option value=""><?php echo e(__('Select an option')); ?></option>
                            <?php $__currentLoopData = $taxClasses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($product->tax_class_id == $class->id): echo 'selected'; endif; ?> value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="dashboard-input mt-4">
                <div class="row">
                    <div class="col-6 is_taxable_wrapper">
                        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Is Taxable?")); ?></label>
                        <select name="is_taxable" class="form--control radius-10">
                            <option value="no"><?php echo e(__('No')); ?></option>
                            <option value="yes"><?php echo e(__('Yes')); ?></option>
                        </select>
                    </div>

                    <div class="col-6 tax_classes_wrapper" style="display:none">
                        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Tax classes")); ?></label>
                        <select name="tax_class" class="form--control radius-10">
                            <option value=""><?php echo e(__('Select an option')); ?></option>
                            <?php $__currentLoopData = $taxClasses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/product-price.blade.php ENDPATH**/ ?>