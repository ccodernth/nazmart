<?php
    if(!isset($product)){
        $product = null;
    }
?>

<div class="general-info-wrapper px-3">
    <h4 class="dashboard-common-title-two"><?php echo e(__("Product Settings")); ?></h4>
    <div class="general-info-form mt-0 mt-lg-4">
        <div class="form-group">
            <label for="min_purchase"><?php echo e(__("Minimum quantity of Purchase")); ?></label>
            <input id="min_purchase" name="min_purchase" class="form--control" value="<?php echo e($product?->min_purchase); ?>" placeholder="<?php echo e(__("Minimum quantity of purchase")); ?>">
        </div>

        <div class="form-group">
            <label for="max_purchase"><?php echo e(__("Maximum quantity of Purchase")); ?></label>
            <input id="max_purchase" name="max_purchase" class="form--control" value="<?php echo e($product?->max_purchase); ?>" placeholder="<?php echo e(__("Maximum quantity of Purchase")); ?>">
        </div>

        <div class="vendor-coupon-switch d-flex align-items-center">
            <label for="coupon-switch5"><?php echo e(__("Inventory Warning")); ?></label>
            <input name="is_inventory_warning" class="custom-switch" type="checkbox" id="coupon-switch5" <?php echo e($product?->is_inventory_warn_able ? "checked" : ""); ?> />
            <label class="switch-label" for="coupon-switch5"></label>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/settings.blade.php ENDPATH**/ ?>