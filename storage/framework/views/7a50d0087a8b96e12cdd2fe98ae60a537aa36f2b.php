<?php
    if(!isset($inventorydetails)){
        $inventorydetails = [];
    }
?>

<div class="variant_info_container">
    <h5 class="dashboard-common-title-two mb-3"><?php echo e(__('Custom Inventory variant')); ?></h5>
    <p class="mb-4">
        <?php echo e(__('Inventory will be variant of this product.')); ?> <br>
        <?php echo e(__('All inventory stock count will be merged and replace to main stock of this product.')); ?><br>
        <?php echo e(__('Stock count filed is required.')); ?>

    </p>
    <div class="inventory_items_container">
        <?php $__empty_1 = true; $__currentLoopData = $inventorydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.repeater','data' => ['detail' => $detail,'isFirst' => false,'colors' => $colors,'sizes' => $sizes,'allAvailableAttributes' => $allAttributes,'key' => $key]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['detail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($detail),'is-first' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes),'all-available-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allAttributes),'key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($key)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.repeater','data' => ['isFirst' => true,'colors' => $colors,'sizes' => $sizes,'allAvailableAttributes' => $allAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-first' => true,'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes),'all-available-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allAttributes)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/product-attribute.blade.php ENDPATH**/ ?>