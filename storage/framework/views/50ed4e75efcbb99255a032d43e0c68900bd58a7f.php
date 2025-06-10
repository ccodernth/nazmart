<?php
    if(!isset($selectedDeliveryOption)){
        $selectedDeliveryOption = [];
    }
?>

<div class="general-info-wrapper px-4">
    <h4 class="dashboard-common-title-two mb-4"><?php echo e(__("Delivery Options")); ?></h4>
    <div class="general-info-form mt-0 mt-lg-4">
        <div class="d-flex flex-wrap gap-2">
            <input type="hidden" value="<?php echo e(implode(" , ", $selectedDeliveryOption)); ?>" name="delivery_option" class="delivery-option-input" />

            <?php $__currentLoopData = $deliveryOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="delivery-item flex-wrap d-flex <?php echo e(in_array($deliveryOption->id, $selectedDeliveryOption) ? "active" : ""); ?>" data-delivery-option-id="<?php echo e($deliveryOption->id); ?>">
                    <div class="icon">
                        <i class="<?php echo e($deliveryOption->icon); ?>"></i>
                    </div>
                    <div class="content">
                        <h6 class="title"><?php echo e($deliveryOption->title); ?></h6>
                        <p><?php echo e($deliveryOption->sub_title); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/delivery-option.blade.php ENDPATH**/ ?>