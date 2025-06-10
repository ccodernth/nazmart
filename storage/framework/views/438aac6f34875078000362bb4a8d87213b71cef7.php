<?php
    $size = $size ?? '1920x1280';
?>

<div class="form-group">
    <label for="og_meta_image"><?php echo e(__($label) ?? __('Image Gallery')); ?></label>
    <div class="media-upload-btn-wrapper mb-2">
        <div class="img-wrap">
            <?php echo render_gallery_image_attachment_preview($value  ?? ''); ?>

        </div>
        <input type="hidden" id="<?php echo e($id ?? ''); ?>" name="<?php echo e($name ?? ''); ?>"
               value="<?php echo e($value ?? ''); ?>">
        <button type="button" class="btn btn-info media_upload_form_btn"
                data-btntitle="<?php echo e(__('Select Image')); ?>"
                data-modaltitle="<?php echo e(__('Upload  Image')); ?>" data-toggle="modal"
                data-mulitple="true"
                data-target="#media_upload_modal">
            <?php echo e(__('Change Image')); ?>

        </button>
    </div>
    <small class="form-text text-muted mt-2"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small><br>
    <small class="form-text text-muted"><?php echo e(__('allowed image size :') . $size ?? '1920x1280'); ?></small>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/landlord-others/edit-media-upload-gallery.blade.php ENDPATH**/ ?>