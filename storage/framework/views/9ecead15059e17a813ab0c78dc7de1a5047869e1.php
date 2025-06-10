<div class="form-group">
    <label><?php echo e($label); ?></label>
    <textarea  name="<?php echo e($name); ?>" class="form-control <?php echo e($class ?? ''); ?>"  rows="4" placeholder="<?php echo e($label); ?>"><?php echo e($value ?? ''); ?></textarea>
    <?php if(isset($info)): ?>
        <small class="info-text d-block mt-2"><?php echo $info; ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/textarea.blade.php ENDPATH**/ ?>