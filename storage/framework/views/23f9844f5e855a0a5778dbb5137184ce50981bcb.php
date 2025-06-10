<option value=""><?php echo e(__('Select Sub Category')); ?></option>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/category/option.blade.php ENDPATH**/ ?>