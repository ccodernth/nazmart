<div class="modal fade" data-selected="" id="<?php echo e($target); ?>" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e($title); ?></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-success-msg py-2 mb-4">
                        <h3 class="themeName text-center mb-0"></h3>
                    </div>

                    <div class="col-6">
                        <img class="modal-image" src="" alt="">
                    </div>

                    <div class="col-6">
                        <h2></h2>
                        <p></p>

                        <?php if(tenant()): ?>
                        <div class="msg">
                            <small
                                class="text-primary"><?php echo e(__('You can set theme by demo imported data or you can set with no imported data, If you set only (theme set) then you have to add all the addon for completing your home page from page builder section also set have to set home page from general settings/page settings, if its not previously set by you..!')); ?></small>
                        </div>

                        <form class="theme-form">
                            <input type="hidden" class="form-control" id="tenant_default_theme"
                                   value="<?php echo e(get_static_option('tenant_default_theme')); ?>" name="tenant_default_theme">

                            <div class="mt-4">
                                <?php echo csrf_field(); ?>
                                <?php
                                    $options =
                                    [
                                        'set_theme' => __('Set without data'),
                                        'set_theme_with_demo_data' => __('Set theme with demo or old data')
                                    ];
                                ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.select','data' => ['name' => 'theme_setting_type','class' => 'theme_setting_type','title' => ''.e(__('Theme setting type')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'theme_setting_type','class' => 'theme_setting_type','title' => ''.e(__('Theme setting type')).'']); ?>
                                    <option value=""><?php echo e(__('Select Type')); ?></option>
                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($index); ?>"><?php echo e($option); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                <button type="submit"
                                        class="btn btn-primary theme_status_update_button"><?php echo e(__('Set Default')); ?></button>
                            </div>
                        </form>
                        <?php endif ?>

                        <?php if($user != 'tenant'): ?>
                            <a href="javascript:void(0)" class="edit-btn text-capitalize"
                               data-bs-toggle="modal"
                               data-bs-target="#edit-modal"
                               data-id=""
                               data-name=""
                               data-description=""><?php echo e(__('Edit Details')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/modal/theme-modal.blade.php ENDPATH**/ ?>