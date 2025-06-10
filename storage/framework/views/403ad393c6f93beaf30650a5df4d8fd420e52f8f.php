<?php
    if(!isset($inventory)){
        $inventory = null;
    }

    if(!isset($uom)){
        $uom = null;
    }
?>

<h4 class="dashboard-common-title-two"> <?php echo e(__("Product Inventory")); ?> </h4>


<div class="dashboard-input mt-4">
    <?php if(!$inventory): ?>
        <p><?php echo e(__('A barcode will be generated after creating a SKU')); ?></p>
    <?php endif; ?>

</div>

<div class="dashboard-input mt-4">
    <label class="dashboard-label color-light mb-2"> <?php echo e(__("SKU")); ?> </label>
    <input type="text" class="form--control radius-10" name="sku" value="<?php echo e($inventory?->sku); ?>">
    <p><?php echo e(__("Custom Unique Code for this product.")); ?></p>
</div>

<div class="dashboard-input mt-4">
    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Quantity")); ?> </label>
    <input type="tel" class="form--control radius-10" name="quantity" value="<?php echo e($inventory?->stock_count); ?>">
    <p><?php echo e(__("This will be replaced with the sum of inventory items. if any inventory  item is registered.")); ?></p>
</div>

<div class="dashboard-input mt-4">
    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Unit")); ?> </label>

    <div class="nice-select-two">
        <select name="unit_id" class="form--control">
            <option value=""><?php echo e(__("Select Unit")); ?></option>
            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option
                    <?php echo e($unit->id === $uom?->unit_id ? "selected" : ""); ?> value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <small><?php echo e(__("Select Unit")); ?></small>
    </div>
</div>

<div class="dashboard-input mt-4">
    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Unit Of Measurement")); ?> </label>
    <input type="number" name="uom" class="form--control radius-10" value="<?php echo e($uom?->quantity); ?>"
           placeholder="<?php echo e(__("Enter Unit Of Measurement")); ?>">
    <small><?php echo e(__("Enter the number here")); ?></small>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/product-inventory.blade.php ENDPATH**/ ?>