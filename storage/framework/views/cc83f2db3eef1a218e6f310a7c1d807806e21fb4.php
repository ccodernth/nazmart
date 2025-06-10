
<div class="slider-main-div" style="width: 100%; background-color: #ffffff; overflow: hidden;">
    <div class="swiper-container">

        <div class="swiper-wrapper">
            <?php $__currentLoopData = $data['repeater_data']['figure_image_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $figure_image = $data['repeater_data']['figure_image_'][$key] ?? '';
                    $image = get_attachment_image_by_id($figure_image);
                    $image_shape = $image != null ? $image['img_url'] : '';
                ?>
                <div class="swiper-slide rounded"
                     style="background-image: url('<?php echo e($image_shape); ?>'); background-size: contain !important; background-position: top center;">
                    <a href="#" style="position: absolute; width: 100%; height: 100%; z-index: 9;"></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Swiper navigation and pagination controls -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>













<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/fruit/header/header-one.blade.php ENDPATH**/ ?>