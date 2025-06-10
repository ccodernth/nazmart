<?php
    if (isset($permissions) && !auth('admin')->user()->can($permissions)){
        return;
    }
?>

<a href="<?php echo e($url); ?>" class="<?php echo e($btnSize ?? 'btn-sm'); ?> mb-3 mr-1 btn btn-<?php echo e($class ?? 'primary'); ?> <?php echo e($extraclass ?? ''); ?>" <?php if(isset($target)): ?> target="<?php echo e($target); ?>" <?php endif; ?>
   <?php if(isset($popover)): ?> data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($popover); ?>" <?php endif; ?>
><?php echo e($slot); ?></a>
<?php /**PATH /home/crux/public_html/core/resources/views/components/link-with-popover.blade.php ENDPATH**/ ?>