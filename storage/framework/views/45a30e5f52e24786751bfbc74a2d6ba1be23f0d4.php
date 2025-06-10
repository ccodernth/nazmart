<?php $__env->startSection('title'); ?>
    <?php echo e(__('Theme Manage')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/custom-style.css')); ?>">

    <style>
        .selected_text {
            top: 0;
            left: 0;
            background-color: #b66dff;
            padding: 15px;
            position: absolute;
            color: white;
            transition: 0.3s;
        }

        .selected_text i {
            font-size: 30px;
        }

        .active_theme {
            background-color: #b66dff;
        }

        .modal-image {
            width: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $selected_theme = tenant()->theme_slug;
        $all_theme = getAllThemeDataForAdmin();
    ?>
    <div class="dashboard-recent-order">
        <div class="row">
            <?php $__currentLoopData = $all_theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $theme_slug = $theme->slug;
                    if (!in_array($theme_slug , tenant_plan_theme_list()))
                    {
                        continue;
                    }

                    $theme_data = getIndividualThemeDetails($theme_slug);
                    $theme_image = loadScreenshot($theme_slug);

                    $theme_name = get_static_option_central($theme_data['slug'].'_theme_name');
                    $theme_description = get_static_option_central($theme_data['slug'].'_theme_description');
                    $theme_url = get_static_option_central($theme_data['slug'].'_theme_url');
                    $custom_theme_image = get_static_option_central($theme_data['slug'].'_theme_image');
                ?>
                <div class="col-xl-3 col-sm-6">
                    <div class="themePreview">
                        <a href="javascript:void(0)" id="theme-preview" data-bs-target="#theme-modal"
                           data-bs-toggle="modal"
                           data-slug="<?php echo e($theme_data['slug']); ?>"
                           data-title="<?php echo e(!empty($theme_name) ? $theme_name : $theme_data['name']); ?>"
                           data-description="<?php echo e(!empty($theme_description) ? $theme_description : $theme_data['description']); ?>"
                           data-image="<?php echo e(!empty($custom_theme_image) ? $custom_theme_image : $theme_image); ?>"
                           data-button_text="<?php echo e($theme_data['slug'] == $selected_theme ? 'Selected' : 'Select'); ?>"
                           data-url="<?php echo e(route('tenant.admin.theme.update', $theme_data['slug'])); ?>"
                           class="theme-preview active"
                        >
                            <div class="bg"
                                 style="background-image: url('<?php echo e(!empty($custom_theme_image) ? $custom_theme_image : $theme_image); ?>');"></div>
                        </a>

                        <div class="themeInfo themeInfo_<?php echo e($theme_data['slug']); ?>" data-slug="<?php echo e($theme_data['slug']); ?>">
                            <h3 class="themeName text-center"></h3>
                        </div>

                        <div class="themeLink <?php echo e($theme_data['slug'] == $selected_theme ? 'active_theme' : ''); ?>">
                            <h3 class="themeName"><?php echo e(!empty($theme_name) ? $theme_name : $theme_data['name']); ?></h3>
                        </div>

                        <?php if($theme_data['slug'] == $selected_theme): ?>
                            <h4 class="selected_text"><i class="las la-check-circle"></i></h4>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>


    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.theme-modal','data' => ['target' => 'theme-modal','title' => 'Theme','user' => 'tenant']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.theme-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('theme-modal'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Theme'),'user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('tenant')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.js'); ?>
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
        $(document).ready(function ($) {
            "use strict";

            $('.themeInfo').hide();
            $('.modal-success-msg').hide()


            $(document).on('click', '#theme-preview', function (e) {
                let el = $(this);
                let slug = el.data('slug');
                let title = el.data('title');
                let description = el.data('description');
                let button_text = el.attr('data-button_text');
                let image = el.data('image');
                let url = el.data('url');

                let modal = $('#theme-modal');
                modal.attr("data-selected", slug);
                modal.find('.modal-body img').attr('src', image);
                modal.find('.modal-body h2').text(title);
                modal.find('.modal-body p').text(description);

                modal.find('.modal-body button.theme_status_update_button').text(button_text);
                modal.find('.modal-body button.theme_status_update_button').attr('data-slug', slug);
                modal.find('.modal-body button.theme_status_update_button').attr('data-status', button_text);
                modal.find('.modal-body button.theme_status_update_button').attr('data-url', url)

                modal.find('.modal-body a.edit-btn').attr('data-slug', slug)
                modal.find('.modal-body a.edit-btn').attr('data-name', title)
                modal.find('.modal-body a.edit-btn').attr('data-description', description)
            });
        });

        $(document).on('click', '.theme_status_update_button', function (e) {
            e.preventDefault();
            let el = $(this);
            let slug = el.attr('data-slug');
            let status = el.attr('data-status');
            let url = el.attr('data-url');
            let theme_setting_type = el.parent().parent().find('.theme_setting_type').val();

            let button = $('.theme_status_update_button[data-slug=' + slug + ']');
            let theme_preview_button = $('.theme-preview[data-slug=' + slug + ']');

            $.ajax({
                'type': 'POST',
                'url': url,
                'data': {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'slug': slug,
                    'theme_setting_type': theme_setting_type,
                    'tenant_default_theme': slug
                },
                beforeSend: function () {
                    status === 'active' ? button.text(`<?php echo e(__('Inactivating..')); ?>`) : button.text(`<?php echo e(__('Activating..')); ?>`);
                },
                success: function (data) {
                    let success = $('.themeInfo_' + slug + '');
                    let modal = $('#theme-modal');
                    let modal_msg = $('.modal-success-msg');

                    if (data.status) {
                        toastr.success(data.msg);
                    } else {
                        modal_msg.css({'background': '#17a2b8'})
                        toastr.info(data.msg);
                    }

                    theme_preview_button.attr('data-button_text', 'selected');
                    button.attr('data-status', 'selected');
                    button.text(`<?php echo e(__('Select')); ?>`)
                    success.find('h3').text(data.msg);
                    success.slideDown(20);

                    modal.find('.themeName').text(data.msg);
                    modal_msg.slideDown(20)

                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                },
                error: function (data) {
                    button.text(`<?php echo e(__('Select')); ?>`);

                    const response = JSON.parse(data.responseText);

                    $.each( response.errors, function( key, value) {
                        toastr.error(value);
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/ThemeManage/Resources/views/tenant/backend/index.blade.php ENDPATH**/ ?>