<?php
    if(!isset($metaData)){
        $metaData = null;
    }
?>

<?php if(!tenant() || in_array(tenant('theme_slug'), activeTheme())): ?>
    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
        <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
             aria-orientation="vertical">

            <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="nav-link <?php echo e($loop->iteration == 1 ? 'activeTab' : ''); ?>"
                        data-bs-toggle="pill"
                        data-bs-target="#seo-language-<?php echo e($language->slug); ?>"
                        type="button" role="tab" aria-selected="true">
                    <?php echo e($language->name); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <div class="tab-content">
        <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="tab-pane fade show <?php echo e($loop->iteration == 1 ? 'activeContent' : ''); ?>"
                 id="seo-language-<?php echo e($language->slug); ?>"
                 role="tabpanel">


                <div class="meta-body-wrapper mt-3">
                    <h4 class="dashboard-common-title-two mb-4"> <?php echo e(__("Meta SEO")); ?> </h4>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link general-meta active" id="general-meta-info-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#general-meta-info-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <?php echo e(__("General meta info")); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="facebook-meta-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#facebook-meta-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="facebook-meta" aria-selected="false">
                                <?php echo e(__("Facebook meta")); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="twitter-meta-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#twitter-meta-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="twitter-meta" aria-selected="false">
                                <?php echo e(__("Twitter meta")); ?></button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane py-4 fade show active general-meta-pane" id="general-meta-info-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="general-meta-info-tab">
                            <h4><?php echo e(__('General Info')); ?></h4>
                            <div class="form-group dashboard-input">
                                <label for="general-title"><?php echo e(__("Title")); ?></label>
                                <input type="text" id="general-title" value="<?php echo e($metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''); ?>" class="form--control radius-10 " name="translate_meta[<?php echo e($language->slug); ?>][title]" placeholder="<?php echo e(__("General info title")); ?>">
                            </div>
                            <div class="form-group">
                                <label for="general-description"><?php echo e(__("Description")); ?></label>
                                <textarea type="text" id="general-description" name="translate_meta[<?php echo e($language->slug); ?>][description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['description'][$language->slug] ?? '' : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="tab-pane py-4 fade" id="facebook-meta-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="facebook-meta-tab">
                            <h4><?php echo e(__("Facebook Info")); ?></h4>
                            <div class="form-group dashboard-input">
                                <label for="facebook-title"><?php echo e(__("Title")); ?></label>
                                <input type="text" id="facebook-title" name="translate_meta[<?php echo e($language->slug); ?>][fb_title]" value="<?php echo e($metaData ? $metaData->getTranslations()['fb_title'][$language->slug] ?? '' : ''); ?>"  class="form--control radius-10 " placeholder="<?php echo e(__("General info title")); ?>">
                            </div>
                            <div class="form-group">
                                <label for="facebook-description"><?php echo e(__("Description")); ?></label>
                                <textarea type="text" id="facebook-description" name="translate_meta[<?php echo e($language->slug); ?>][fb_description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['fb_description'][$language->slug] ?? '' : ''); ?></textarea>
                            </div>
                            <?php if($metaData && isset($metaData->getTranslations()['fb_image'][$language->slug])): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['fb_image'][$language->slug]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['fb_image'][$language->slug]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane py-4 fade" id="twitter-meta-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="twitter-meta-tab">
                            <h4><?php echo e(__("Twitter Info")); ?></h4>
                            <div class="form-group dashboard-input">
                                <label for="general-title"><?php echo e(__("Title")); ?></label>
                                <input type="text" id="twitter-title" value="<?php echo e($metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''); ?>" name="translate_meta[<?php echo e($language->slug); ?>][tw_title]"  class="form--control radius-10 " placeholder="<?php echo e(__("General info title")); ?>">
                            </div>
                            <div class="form-group">
                                <label for="general-description"><?php echo e(__("Description")); ?></label>
                                <textarea type="text" id="twitter-description" name="translate_meta[<?php echo e($language->slug); ?>][tw_description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['tw_description'][$language->slug] ?? '' : ''); ?></textarea>
                            </div>

                            <?php if($metaData && isset($metaData->getTranslations()['tw_image'][$language->slug])): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['tw_image'][$language->slug]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['tw_image'][$language->slug]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
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


    <div class="meta-body-wrapper mt-3">
        <h4 class="dashboard-common-title-two mb-4"> <?php echo e(__("Meta SEO")); ?> </h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link general-meta active" id="general-meta-info-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#general-meta-info-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="home" aria-selected="true">
                    <?php echo e(__("General meta info")); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="facebook-meta-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#facebook-meta-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="facebook-meta" aria-selected="false">
                    <?php echo e(__("Facebook meta")); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="twitter-meta-tab-<?php echo e($language->slug); ?>" data-bs-toggle="tab" data-bs-target="#twitter-meta-<?php echo e($language->slug); ?>" type="button" role="tab" aria-controls="twitter-meta" aria-selected="false">
                    <?php echo e(__("Twitter meta")); ?></button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane py-4 fade show active general-meta-pane" id="general-meta-info-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="general-meta-info-tab">
                <h4><?php echo e(__('General Info')); ?></h4>
                <div class="form-group dashboard-input">
                    <label for="general-title"><?php echo e(__("Title")); ?></label>
                    <input type="text" id="general-title" value="<?php echo e($metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''); ?>"  class="form--control radius-10 " name="translate_meta[<?php echo e($language->slug); ?>][title]" placeholder="<?php echo e(__("General info title")); ?>">
                </div>
                <div class="form-group">
                    <label for="general-description"><?php echo e(__("Description")); ?></label>
                    <textarea type="text" id="general-description" name="translate_meta[<?php echo e($language->slug); ?>][description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['description'][$language->slug] ?? '' : ''); ?></textarea>
                </div>
            </div>
            <div class="tab-pane py-4 fade" id="facebook-meta-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="facebook-meta-tab">
                <h4><?php echo e(__("Facebook Info")); ?></h4>
                <div class="form-group dashboard-input">
                    <label for="facebook-title"><?php echo e(__("Title")); ?></label>
                    <input type="text" id="facebook-title" name="translate_meta[<?php echo e($language->slug); ?>][fb_title]" value="<?php echo e($metaData ? $metaData->getTranslations()['fb_title'][$language->slug] ?? '' : ''); ?>"  class="form--control radius-10 " placeholder="<?php echo e(__("General info title")); ?>">
                </div>
                <div class="form-group">
                    <label for="facebook-description"><?php echo e(__("Description")); ?></label>
                    <textarea type="text" id="facebook-description" name="translate_meta[<?php echo e($language->slug); ?>][fb_description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['fb_description'][$language->slug] ?? '' : ''); ?></textarea>
                </div>
                <?php if($metaData && isset($metaData->getTranslations()['fb_image'][$language->slug])): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['fb_image'][$language->slug]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['fb_image'][$language->slug]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][fb_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="tab-pane py-4 fade" id="twitter-meta-<?php echo e($language->slug); ?>" role="tabpanel" aria-labelledby="twitter-meta-tab">
                <h4><?php echo e(__("Twitter Info")); ?></h4>
                <div class="form-group dashboard-input">
                    <label for="general-title"><?php echo e(__("Title")); ?></label>
                    <input type="text" id="twitter-title" value="<?php echo e($metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''); ?>" name="translate_meta[<?php echo e($language->slug); ?>][tw_title]"  class="form--control radius-10 " placeholder="<?php echo e(__("General info title")); ?>">
                </div>
                <div class="form-group">
                    <label for="general-description"><?php echo e(__("Description")); ?></label>
                    <textarea type="text" id="twitter-description" name="translate_meta[<?php echo e($language->slug); ?>][tw_description]" class="form--control radius-10 py-2" rows="6" placeholder="<?php echo e(__("General info description")); ?>"><?php echo e($metaData ? $metaData->getTranslations()['tw_description'][$language->slug] ?? '' : ''); ?></textarea>
                </div>

                <?php if($metaData && isset($metaData->getTranslations()['tw_image'][$language->slug])): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['tw_image'][$language->slug]).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => '1200x1200','id' => ''.e($metaData->getTranslations()['tw_image'][$language->slug]).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.media-upload','data' => ['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'translate_meta['.e($language->slug).'][tw_image]','title' => ''.e(__('General Info Meta Image')).'','dimentions' => ''.e(__('1200x1200')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/meta-seo.blade.php ENDPATH**/ ?>