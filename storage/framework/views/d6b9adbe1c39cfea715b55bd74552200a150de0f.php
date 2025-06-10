<div class="form-group">
    <label for="status"><?php echo e($title); ?></label>
    <select name="<?php echo e($name); ?>" class="form-control <?php echo e($class ?? ''); ?>" id="<?php echo e($id ?? ''); ?>">
       <?php echo e($slot); ?>

    </select>
    <?php if(isset($info)): ?>
        <small class="info-text d-block mt-2"><?php echo $info; ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/select.blade.php ENDPATH**/ ?>