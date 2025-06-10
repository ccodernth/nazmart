<?php echo $__env->make('landlord.admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> <?php echo $__env->yieldContent('title'); ?> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('landlord.admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $__env->yieldContent('title'); ?></li>
                </ol>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

 <?php echo $__env->make('landlord.admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/admin-master.blade.php ENDPATH**/ ?>