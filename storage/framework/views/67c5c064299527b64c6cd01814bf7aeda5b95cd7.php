<?php
    if (isset($permissions) && !auth('admin')->user()->can($permissions)){
        return;
    }
?>


<div class="bulk-delete-wrapper" >
    <div class="select-box-wrap">
        <select name="bulk_option" id="bulk_option" >
            <option value=""><?php echo e(__('Bulk Action')); ?></option>
            <option value="delete"><?php echo e(__('Delete')); ?></option>
        </select>
        <button class="btn btn-primary btn-sm" id="bulk_delete_btn"><?php echo e(__('Apply')); ?></button>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/bulk-action.blade.php ENDPATH**/ ?>