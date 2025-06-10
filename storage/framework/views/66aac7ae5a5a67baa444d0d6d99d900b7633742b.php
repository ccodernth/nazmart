<?php
    if(!isset($tag)){
        $tag = null;
        $tag_name = "";
    }else{
        $tag_name_arr = $tag->pluck("tag_name")?->toArray();
        $tag_name = implode(",",$tag_name_arr ?? []);
    }

    if(!isset($singlebadge)){
        $singlebadge = null;
    }
?>

<div class="general-info-wrapper px-3">
    <h5 class="dashboard-common-title-two"><?php echo e(__("Product Tags and Badge")); ?></h5>
    <div class="dashboard-input mt-4">
        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Tags")); ?> </label>
        <input type="text" name="tags" class="form--control tags_input radius-10" data-role="tagsinput" value="<?php echo e($tag_name); ?>">
    </div>

    <div class="general-info-form mt-0 mt-lg-4">
        <label class="dashboard-label color-light mb-2"> <?php echo e(__("Labels")); ?> </label>
        <div class="badge-wrap gap-2">
            <input type="hidden" name="badge_id" value="<?php echo e($singlebadge); ?>" id="badge_id_input"/>
            <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="badge-item d-flex <?php echo e($badge->id === $singlebadge ? "active" : ""); ?>" data-badge-id="<?php echo e($badge->id); ?>">
                    <div class="icon">
                        <?php echo e(render_image_markup_by_attachment_id($badge->badgeImage, null,'thumb')); ?>

                    </div>
                    <div class="content">
                        <h6 class="title"><?php echo e($badge->name); ?></h6>
                        <span class="badge badge-<?php echo e($badge->type ? 'success bg-success' : 'warning bg-warning'); ?>"><?php echo e($badge->type ? __("Permanent") : __("Temporary")); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/tags-and-badge.blade.php ENDPATH**/ ?>