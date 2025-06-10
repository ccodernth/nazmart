

<div class="ticaret-kutulari-main-div" style="background-color: #ffffff; border-top: 1px solid #ffffff; border-bottom: 1px solid #ffffff;">
    <div class="ticaret-kutulari-inside" style="justify-content: center">
        <?php $__currentLoopData = $data['repeater_data']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ticaret-kutu-box">
                <div class="ticaret-kutu-box-i" style="color: #333333;">
                    <i class="<?php echo e($data['repeater_data']['repeater_icon_'][$key] ?? ''); ?>"></i>
                </div>
                <div class="ticaret-kutu-box-text">
                    <div class="ticaret-kutu-box-text-h" style="color: #666666;"><?php echo e(\App\Helpers\SanitizeInput::esc_html($title)); ?></div>
                    <div class="ticaret-kutu-box-text-s" style="color: #000000;"><?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_subtitle_'][$key]) ?? ''); ?></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/fruit/common/services.blade.php ENDPATH**/ ?>