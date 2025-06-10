<div class="breadcrumb-area breadcrumb-padding-two section-bg-3
    <?php if((in_array(request()->route()->getName(),['tenant.frontend.homepage','tenant.dynamic.page']) && !empty($page_post) && $page_post->breadcrumb == 0 )): ?>
        d-none
    <?php endif; ?>
">
    <div class="container container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-contents center-text">
                    <h1 class="breadcrumb-contents-title-two fw-500"> <?php echo $__env->yieldContent('page-title'); ?> </h1>
                    <ul class="breadcrumb-contents-list mt-2">
                        <li class="breadcrumb-contents-list-item"><a
                                href="<?php echo e(route('tenant.frontend.homepage')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <?php if(Route::currentRouteName() === 'tenant.dynamic.page'): ?>
                            <li class="breadcrumb-contents-list-item"><a
                                    href="#"><?php echo $page_post->title ?? ''; ?></a></li>
                        <?php else: ?>
                            <li class="breadcrumb-contents-list-item"><?php echo $__env->yieldContent('page-title'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/furnito/headerBreadcrumbArea/breadcrumb.blade.php ENDPATH**/ ?>