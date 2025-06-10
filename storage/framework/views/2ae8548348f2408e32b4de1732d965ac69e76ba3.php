<?php
    $type = $type ?? 'text';
?>

<div class="form-group">
    <?php if(isset($type) && $type !== 'hidden'): ?>
        <label>
            <?php echo e($label); ?>

            <?php if(isset($tooltip)): ?>
                <i class="mdi mdi-information-outline text-primary price_plan_info"
                   data-bs-toggle="<?php echo e(isset($direction) ? $direction : 'top'); ?>"
                   data-bs-placement="top"
                   data-bs-original-title="<?php echo e($tooltip); ?>"
                   aria-label="<?php echo e($tooltip); ?>"></i>
            <?php endif; ?>
        </label>
    <?php endif; ?>
    <input type="<?php echo e($type ?? 'text'); ?>"
           name="<?php echo e($name); ?>"
           class="form-control <?php echo e($class ?? ''); ?>"
           <?php if( isset($type) && $type !== 'hidden'): ?>
           placeholder="<?php echo e($placeholder ?? $label); ?>"
           <?php endif; ?>
           value="<?php echo e($value ?? ''); ?>" min="<?php echo e($min ?? ''); ?>">
    <?php if(isset($info)): ?>
        <small class="info-text d-block mt-2"><?php echo $info; ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/input.blade.php ENDPATH**/ ?>