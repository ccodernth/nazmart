<?php
    if(!isset($product)){
        $product = null;
    }
?>

<div class="general-info-wrapper">
    <h4 class="dashboard-common-title-two"> <?php echo e(__("General Information")); ?> </h4>
    <div class="general-info-form mt-0 mt-lg-4">
        <form action="#">
            <?php if(!tenant() || in_array(tenant('theme_slug'), activeTheme())): ?>

                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                         aria-orientation="vertical">

                        <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="nav-link <?php echo e($loop->iteration == 1 ? 'activeTab' : ''); ?>"
                                    data-bs-toggle="pill"
                                    data-bs-target="#language-<?php echo e($language->slug); ?>"
                                    type="button" role="tab" aria-selected="<?php echo e($loop->iteration == 1 ? 'true' : 'false'); ?>">
                                <?php echo e($language->name); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="tab-content">
                    <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="tab-pane fade show <?php echo e($loop->iteration == 1 ? 'activeContent' : ''); ?>"
                             id="language-<?php echo e($language->slug); ?>"
                             role="tablist">
                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> <?php echo e(__("Name")); ?> </label>
                                <input type="text" class="form--control radius-10" id="product-name"
                                       value="<?php echo e($product?->getTranslations()['name'][$language->slug] ?? ''); ?>"
                                       name="translate[<?php echo e($language->slug); ?>][name]"
                                       placeholder="<?php echo e(__("Write product Name...")); ?>">
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2">
                                    <?php echo e(__("Slug")); ?>

                                    <i class="mdi mdi-alert-circle-outline" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="<?php echo e(__('Only selected language text will convert into slug')); ?>"></i>
                                </label>

                                <input type="text" class="form--control radius-10" id="product-slug"
                                       value="<?php echo e($product?->getTranslations()['slug'][$language->slug] ?? ''); ?>"
                                       name="translate[<?php echo e($language->slug); ?>][slug]"
                                       placeholder="<?php echo e(__("Write product slug...")); ?>">
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> <?php echo e(__("Summery")); ?> </label>
                                <textarea style="height: 120px" class="form--control form--message  radius-10"
                                          name="translate[<?php echo e($language->slug); ?>][summary]"
                                          placeholder="<?php echo e(__("Write product Summery...")); ?>"><?php echo $product?->getTranslations()['summary'][$language->slug] ?? ''; ?> </textarea>
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> <?php echo e(__("Description")); ?> </label>
                                <textarea class="form--control summernote radius-10"
                                          name="translate[<?php echo e($language->slug); ?>][description]"
                                          placeholder="<?php echo e(__("Type Description")); ?>"><?php echo $product?->getTranslations()['description'][$language->slug] ?? ''; ?></textarea>
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> <?php echo e(__("Brand")); ?> </label>
                                <div class="nice-select-two">
                                    <select name="brand" class="form-control" id="brand_id">
                                        <option value=""><?php echo e(__("Select brand")); ?></option>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                <?php echo e($item->id == $product?->brand_id ? "selected" : ""); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            <?php else: ?>
                <?php
                    $language = default_lang();
                ?>
                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Name")); ?> </label>
                    <input type="text" class="form--control radius-10" id="product-name"
                           value="<?php echo $product?->name ?? ""; ?>" name="name"
                           placeholder="<?php echo e(__("Write product Name...")); ?>">
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2">
                        <?php echo e(__("Slug")); ?>

                        <i class="mdi mdi-alert-circle-outline" data-bs-toggle="tooltip" data-bs-placement="right"
                           data-bs-title="<?php echo e(__('Only selected language text will convert into slug')); ?>"></i>
                    </label>

                    <input type="text" class="form--control radius-10" id="product-slug"
                           value="<?php echo e($product?->slug ?? ""); ?>" name="slug"
                           placeholder="<?php echo e(__("Write product slug...")); ?>">
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Summery")); ?> </label>
                    <textarea style="height: 120px" class="form--control form--message  radius-10" name="summery"
                              placeholder="<?php echo e(__("Write product Summery...")); ?>"><?php echo $product?->summary ?? ""; ?> </textarea>
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Description")); ?> </label>
                    <textarea class="form--control summernote radius-10" name="description"
                              placeholder="<?php echo e(__("Type Description")); ?>"><?php echo $product?->description ?? ""; ?></textarea>
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> <?php echo e(__("Brand")); ?> </label>
                    <div class="nice-select-two">
                        <select name="brand" class="form-control" id="brand_id">
                            <option value=""><?php echo e(__("Select brand")); ?></option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    <?php echo e($item->id == $product?->brand_id ? "selected" : ""); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>

        </form>
    </div>
</div>


<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/general-info.blade.php ENDPATH**/ ?>