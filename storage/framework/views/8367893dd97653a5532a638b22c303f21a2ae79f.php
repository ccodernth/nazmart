<?php
    $image_one = get_static_option('background_image_one');
    $image_two = get_static_option('background_image_two');
    $image_three = get_static_option('background_image_three');
    $image_four = get_static_option('background_image_four');
    $image_five = get_static_option('background_image_five');
?>
<div class="badge-area badge-padding bg-item-four
<?php if((in_array(request()->route()->getName(),['tenant.frontend.homepage','tenant.dynamic.page']) && !empty($page_post) && $page_post->breadcrumb == 0 )): ?>
        d-none
<?php endif; ?>">
    <div class="badge-shapes">
        <?php echo render_image_markup_by_attachment_id($image_one); ?>

        <?php echo render_image_markup_by_attachment_id($image_two); ?>

        <?php echo render_image_markup_by_attachment_id($image_three); ?>

        <?php echo render_image_markup_by_attachment_id($image_four); ?>

        <?php echo render_image_markup_by_attachment_id($image_five); ?>

    </div>
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="badge-contents">
                    <h1 class="badge-title"> <?php echo $__env->yieldContent('page-title'); ?> </h1>

                    <ul class="bage-list margin-top-10">
                        <li class="list"> <a href="<?php echo e(route('tenant.frontend.homepage')); ?>"> <?php echo e(__('Home')); ?> </a> </li>

                        <?php if(Route::currentRouteName() === 'tenant.dynamic.page'): ?>
                            <li class="list"> <a href="#"> <?php echo $page_post->title ?? ''; ?> </a> </li>
                        <?php else: ?>
                            <li class="list"> <?php echo $__env->yieldContent('page-title'); ?> </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/electro/headerBreadcrumbArea/breadcrumb.blade.php ENDPATH**/ ?>