<?php echo $__env->make('tenant.admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> <?php echo $__env->yieldContent('title'); ?> </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $__env->yieldContent('title'); ?></li>
                </ol>
            </nav>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

 <?php echo $__env->make('tenant.admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/admin/admin-master.blade.php ENDPATH**/ ?>