<?php
    $id = isset($id) ? $id : null;
    $section_id = isset($section) ? $section : '';
?>
<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e(__($title)); ?></label>
    <?php $signature_image_upload_btn_label = __('Upload'); ?>
    <div class="media-upload-btn-wrapper" id="<?php echo e($name); ?>_section">
        <div class="img-wrap">
            <?php
                if (is_null($id)){
                    $id = get_static_option($name);
                }
                $signature_img = get_attachment_image_by_id($id);
            ?>
            <?php if(!empty($signature_img)): ?>
                <?php if(!empty($signature_img['img_url'])): ?>
                    <div class="rmv-span"><i class="mdi mdi-close"></i></div>
                    <div class="attachment-preview">
                        <div class="thumbnail">
                            <div class="centered">
                                <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                            </div>
                        </div>
                    </div>
                    <?php $signature_image_upload_btn_label = __('Change'); ?>
                <?php else: ?>
                    <div class="attachment-preview"></div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <br>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($id); ?>">
        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($id ?? ''); ?>">
            <?php echo e(__($signature_image_upload_btn_label)); ?>

        </button>
    </div>
    <?php if(isset($dimentions)): ?>
    <small><?php echo e(__('recommended image size is')); ?> <?php echo e($dimentions); ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/media-upload.blade.php ENDPATH**/ ?>