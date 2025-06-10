<?php $__env->startSection('title'); ?>
    <?php echo e(__('GDPR Complain Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5"><?php echo e(__('GDPR Complain Settings')); ?></h4>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.error-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <form class="forms-sample" method="post"
                      action="<?php echo e(route(route_prefix().'admin.general.gdpr.settings')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="tab-content margin-top-30" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <div class="form-group">
                                <label for="site_gdpr_cookie_title"><?php echo e(__('GDPR Title')); ?></label>
                                <input type="text" name="site_gdpr_cookie_title" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_title')); ?>"
                                       id="site_gdpr_cookie_title">
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_message"><?php echo e(__('GDPR Message')); ?></label>
                                <textarea name="site_gdpr_cookie_message" class="form-control" rows="5"
                                          id="site_gdpr_cookie_message"><?php echo e(get_static_option('site_gdpr_cookie_message')); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label
                                    for="site_gdpr_cookie_more_info_label"><?php echo e(__('GDPR More Info Link Label')); ?></label>
                                <input type="text" name="site_gdpr_cookie_more_info_label" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_more_info_label')); ?>"
                                       id="site_gdpr_cookie_more_info_label">
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_more_info_link"><?php echo e(__('GDPR More Info Link')); ?></label>
                                <input type="text" name="site_gdpr_cookie_more_info_link" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_more_info_link')); ?>"
                                       id="site_gdpr_cookie_more_info_link">
                                <small
                                    class="form-text text-muted"><?php echo e(__('enter more info link user {url} to point the site address, example: {url}/about , it will be converted to www.yoursite.com/about')); ?></small>
                            </div>
                            <div class="form-group">
                                <label
                                    for="site_gdpr_cookie_accept_button_label"><?php echo e(__('GDPR Cookie Accept Button Label')); ?></label>
                                <input type="text" name="site_gdpr_cookie_accept_button_label" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_accept_button_label')); ?>"
                                       id="site_gdpr_cookie_accept_button_label">
                            </div>
                            <div class="form-group">
                                <label
                                    for="site_gdpr_cookie_decline_button_label"><?php echo e(__('GDPR Cookie Decline Button Label')); ?></label>
                                <input type="text" name="site_gdpr_cookie_decline_button_label" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_decline_button_label')); ?>"
                                       id="site_gdpr_cookie_decline_button_label">
                            </div>
                            <div class="form-group">
                                <label
                                    for="site_gdpr_cookie_manage_button_label"><?php echo e(__('GDPR Cookie Manage Button Label')); ?></label>
                                <input type="text" name="site_gdpr_cookie_manage_button_label" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_manage_button_label')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="site_gdpr_cookie_manage_title"><?php echo e(__('GDPR Cookie Manage Title')); ?></label>
                                <input type="text" name="site_gdpr_cookie_manage_title" class="form-control"
                                       value="<?php echo e(get_static_option('site_gdpr_cookie_manage_title')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="site_gdpr_cookie_enabled"><strong><?php echo e(__('GDPR Cookie Enable/Disable')); ?></strong></label>
                        <label class="switch yes">
                            <input type="checkbox" name="site_gdpr_cookie_enabled"
                                   <?php if(!empty(get_static_option('site_gdpr_cookie_enabled'))): ?> checked
                                   <?php endif; ?> id="site_gdpr_cookie_enabled">
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="site_gdpr_cookie_expire"><?php echo e(__('Cookie Expire')); ?></label>
                        <input type="text" name="site_gdpr_cookie_expire" class="form-control"
                               value="<?php echo e(get_static_option('site_gdpr_cookie_expire')); ?>" id="site_gdpr_cookie_expire">
                        <small
                            class="form-text text-muted"><?php echo e(__('set cookie expire time, eg: 30, means 30days')); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="site_gdpr_cookie_delay"><?php echo e(__('Show Delay')); ?></label>
                        <input type="text" name="site_gdpr_cookie_delay" class="form-control"
                               value="<?php echo e(get_static_option('site_gdpr_cookie_delay')); ?>" id="site_gdpr_cookie_delay">
                        <small
                            class="form-text text-muted"><?php echo e(__('set GDPR cookie delay time, it mean the notification will show after this time. number count as mili seconds. eg: 5000, means 5seconds')); ?></small>
                    </div>
                    <?php
                        $all_title_fields = get_static_option('site_gdpr_cookie_manage_item_title');
                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields,['class' => false]) : [''];
                    ?>
                    <?php $__currentLoopData = $all_title_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="iconbox-repeater-wrapper">
                            <div class="all-field-wrap">
                                <div class="tab-content margin-top-30" id="myTabContent">
                                    <?php
                                        $all_title_fields = get_static_option('site_gdpr_cookie_manage_item_title');
                                        $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields,['class' => false]) : [''];
                                        $all_description_fields = get_static_option('site_gdpr_cookie_manage_item_description');
                                        $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields,['class' => false]) : [''];
                                    ?>

                                    <div class="tab-pane fade show active" id="tab" role="tabpanel">
                                        <div class="form-group">
                                            <label for="site_gdpr_cookie_manage_item_title"><?php echo e(__('Title')); ?></label>
                                            <input type="text" name="site_gdpr_cookie_manage_item_title[]"
                                                   class="form-control" value="<?php echo e($all_title_fields[$index] ?? ''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="site_gdpr_cookie_manage_item_description"><?php echo e(__('Description')); ?></label>
                                            <textarea name="site_gdpr_cookie_manage_item_description[]"
                                                      class="form-control max-height-120" cols="30"
                                                      rows="5"><?php echo e($all_description_fields[$index] ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-wrap">
                                    <span class="add"><i class="las la-plus"></i></span>
                                    <span class="remove"><i class="las la-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <button type="submit" class="btn btn-gradient-primary me-2"><?php echo e(__('Save Changes')); ?></button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script>
        $(document).on('click','.all-field-wrap .action-wrap .add',function (e){
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $('.all-field-wrap');
            var clonedData = parent.clone();
            var containerLength = container.length;
            clonedData.find('#myTab').attr('id','mytab_'+containerLength);
            clonedData.find('#myTabContent').attr('id','myTabContent_'+containerLength);
            var allTab =  clonedData.find('.tab-pane');
            allTab.each(function (index,value){
                var el = $(this);
                var oldId = el.attr('id');
                el.attr('id',oldId+containerLength);
            });
            var allTabNav =  clonedData.find('.nav-link');
            allTabNav.each(function (index,value){
                var el = $(this);
                var oldId = el.attr('href');
                el.attr('href',oldId+containerLength);
            });

            parent.parent().append(clonedData);

            if (containerLength > 0){
                parent.parent().find('.remove').show(300);
            }
            parent.parent().find('.iconpicker-popover').remove();
            parent.parent().find('.icp-dd').iconpicker();

        });

        $(document).on('click','.all-field-wrap .action-wrap .remove',function (e){
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $('.all-field-wrap');

            if (container.length > 1){
                el.show(300);
                parent.hide(300);
                parent.remove();
            }else{
                el.hide(300);
            }
        });
        $('.icp-dd').iconpicker();
        $('body').on('iconpickerSelected','.icp-dd', function (e) {
            var selectedIcon = e.iconpickerValue;
            $(this).parent().parent().children('input').val(selectedIcon);
            $('body .dropdown-menu.iconpicker-container').removeClass('show');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(route_prefix().'admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/general-settings/gdpr-settings.blade.php ENDPATH**/ ?>