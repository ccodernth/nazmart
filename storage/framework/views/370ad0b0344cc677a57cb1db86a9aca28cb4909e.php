
<?php if(!tenant() || in_array(tenant('theme_slug'), activeTheme())): ?>
    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
        <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
             aria-orientation="vertical">

            <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="nav-link <?php echo e($loop->iteration == 1 ? 'activeTab' : ''); ?>"
                        data-bs-toggle="pill"
                        data-bs-target="#return-language-<?php echo e($language->slug); ?>"
                        type="button" role="tab" aria-selected="true">
                    <?php echo e($language->name); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <div class="tab-content">
        <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="tab-pane fade show <?php echo e($loop->iteration == 1 ? 'activeContent' : ''); ?>"
                 id="return-language-<?php echo e($language->slug); ?>"
                 role="tabpanel">

                <div class="general-info-wrapper px-3">
                    <h4 class="dashboard-common-title-two"><?php echo e(__("Product Shipping and Return Policy")); ?></h4>
                    <div class="general-info-form mt-0 mt-lg-4">
                        <div class="dashboard-input mt-4">
                            <label class="dashboard-label color-light mb-2"> <?php echo e(__("Policy Description")); ?> </label>
                            <textarea class="form--control summernote radius-10" name="translate_policy_description[<?php echo e($language->slug); ?>]" placeholder="<?php echo e(__("Type Description")); ?>"><?php echo isset($product) && $product?->return_policy ? $product?->return_policy->getTranslations()['shipping_return_description'][$language->slug] ?? '' : ''; ?></textarea>
                        </div>
                    </div>
                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <?php
        $language = default_lang();
    ?>


    <div class="general-info-wrapper px-3">
        <h4 class="dashboard-common-title-two"><?php echo e(__("Product Shipping and Return Policy")); ?></h4>
        <div class="general-info-form mt-0 mt-lg-4">
            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> <?php echo e(__("Policy Description")); ?> </label>
                <textarea class="form--control summernote radius-10" name="translate_policy_description[<?php echo e($language->slug); ?>]" placeholder="<?php echo e(__("Type Description")); ?>"><?php echo isset($product) && $product?->return_policy ? $product?->return_policy->getTranslations()['shipping_return_description'][$language->slug] ?? '' : ''; ?></textarea>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/policy.blade.php ENDPATH**/ ?>