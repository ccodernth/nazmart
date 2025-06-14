<?php
    if (isset($permissions) && !auth('admin')->user()->can($permissions)){
        return;
    }
?>

<a tabindex="0" class="btn btn-danger btn-xs mb-3 mr-1 swal_delete_button"
   data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Delete')); ?>"
>
    <i class="mdi mdi-delete"></i>
</a>
<form method='post' action='<?php echo e($url); ?>' class="d-none">
    <?php if(isset($method)): ?>
        <?php echo method_field($method); ?>
    <?php endif; ?>
    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
    <br>
    <button type="submit" class="swal_form_submit_btn d-none"></button>
</form>
<?php /**PATH /home/crux/public_html/core/resources/views/components/delete-popover.blade.php ENDPATH**/ ?>