<?php $__env->startSection('title'); ?>
    <?php echo e(__('Custom Domain')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Custom Domain')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <?php
        $central_domain = env('CENTRAL_DOMAIN');
    ?>
<div class="parent">
    <div class="row">
        <div class="col-12">
            <div class="card card-new-styles">
                <div class="card-header">
                    <h3 class="text-center"><?php echo e(get_static_option_central('custom_domain_settings_title')); ?></h3>
                </div>

                <div class="card-body">
                    <p class="custom_domain_para"><?php echo e(get_static_option_central('custom_domain_settings_description')); ?></p>

                    <h5 class="custom_domain_title_two mt-4"><?php echo e(get_static_option_central('custom_domain_table_title')); ?></h5>
                    <div class="custom_domain_table mt-4">
                        <table class="table table-default table-striped table-bordered">
                        <thead class="text-white bg-dark">
                        <tr>
                            <th><?php echo e(__('Type')); ?></th>
                            <th><?php echo e(__('Host')); ?></th>
                            <th><?php echo e(__('Value')); ?></th>
                            <th><?php echo e(__('TTL')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo e(__('CNAME Record')); ?></td>
                            <td>www</td>
                            <td><?php echo e(env('CENTRAL_DOMAIN')); ?></td>
                            <td><?php echo e(__('Automatic')); ?></td>
                        </tr>

                        <tr>
                            <td><?php echo e(__('CNAME Record')); ?></td>
                            <td>@</td>
                            <td><?php echo e(env('CENTRAL_DOMAIN')); ?></td>
                            <td><?php echo e(__('Automatic')); ?></td>
                        </tr>

                        <tr>
                            <td colspan="4"><?php echo e(__('Use this if you are using cloulflare')); ?></td>
                        </tr>
                        <tr>
                            <td>A Record</td>
                            <td>@</td>
                            <td><?php echo e(get_static_option_central('server_ip') ?? $_SERVER['SERVER_ADDR']); ?></td>
                            <td>Automatic</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                            <div class="card-body">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.header-wrapper','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.header-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                     <?php $__env->slot('left', null, []); ?> 
                                        <h4 class="card-title mb-4"><?php echo e(__('Custom Domain Request')); ?></h4>
                                     <?php $__env->endSlot(); ?>
                                     <?php $__env->slot('right', null, ['class' => 'd-flex']); ?> 
                                        <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#new_custom_domain"><?php echo e(__('Request Custom Domain')); ?></button>
                                     <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                <div class="table-wrap custom_domain_table">
                                    <table class="table table-default table-striped table-bordered">
                                        <thead class="text-white" style="background-color: #b66dff">
                                        <tr>
                                            <th><?php echo e(__('Current Domain')); ?></th>
                                            <th><?php echo e(__('Requested Domain')); ?></th>
                                            <th><?php echo e(__('Requested Domain Status')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $user_domain_infos->tenant_details ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                <td><?php echo e($tenant->id . '.'. env('CENTRAL_DOMAIN')); ?></td>
                                                <td><?php echo e(optional($tenant->custom_domain)->custom_domain); ?></td>
                                                <td class="py-4">
                                                    <?php if(optional($tenant->custom_domain)->custom_domain_status == 'pending'): ?>
                                                        <span class="alert alert-warning text-capitalize"><?php echo e(__(optional($tenant->custom_domain)->custom_domain_status)); ?></span>
                                                    <?php elseif(optional($tenant->custom_domain)->custom_domain_status == 'in_progress'): ?>
                                                        <span class="alert alert-info text-capitalize"><?php echo e(__(str_replace('_',' ',optional($tenant->custom_domain)->custom_domain_status))); ?></span>
                                                    <?php elseif(optional($tenant->custom_domain)->custom_domain_status == 'connected'): ?>
                                                        <span class="alert alert-success text-capitalize"><?php echo e(__(optional($tenant->custom_domain)->custom_domain_status)); ?></span>
                                                    <?php elseif(optional($tenant->custom_domain)->custom_domain_status == 'rejected'): ?>
                                                        <span class="alert alert-info text-capitalize"><?php echo e(__(str_replace('_', ' ',ucwords(optional($tenant->custom_domain)->custom_domain_status)))); ?></span>
                                                    <?php elseif(optional($tenant->custom_domain)->custom_domain_status == null): ?>

                                                    <?php else: ?>
                                                        <span class="alert alert-danger text-capitalize"><?php echo e(__(optional($tenant->custom_domain)->custom_domain_status) ?? __('Removed')); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(!empty($tenant->custom_domain)): ?>
                                                        <?php echo e(date('d-m-Y',strtotime(optional($tenant->custom_domain)->updated_at))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
 </div>

    <div class="modal fade" id="new_custom_domain" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Request Custom Domain')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('landlord.user.dashboard.custom.domain')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="alert-alert-warning">
                            <?php echo e(__('You already have a custom domain ('.$central_domain.') connected with your portfolio website.
                                if you request another domain now & if it gets connected with our server, then your current domain ('.$central_domain.') will be removed')); ?>

                        </div>

                        <input type="hidden" name="user_id" value="<?php echo e($user_domain_infos->id); ?>">

                        <div class="form-group my-3">
                            <?php
                                $domain_list = optional($user_domain_infos)->tenant_details;
                            ?>
                            <label for="name"><?php echo e(__('Select your domain')); ?></label>
                            <select class="form-control" name="old_domain" id="">
                                <option value=""><?php echo e(__('Select a domain')); ?></option>
                                <?php $__currentLoopData = $domain_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $tenant = \App\Models\Tenant::find($domain->id);
                                    ?>

                                    <?php if(tenant_plan_sidebar_permission('custom_domain', $tenant)): ?>
                                        <option value="<?php echo e($domain->id); ?>"><?php echo e($domain->id); ?></option>
                                   <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small><?php echo e(__('Select the domain which you want to change')); ?></small>
                        </div>

                        <div class="form-group my-3">
                            <label for="name"><?php echo e(__('Enter your custom domain')); ?></label>
                            <input type="text" class="form-control" name="custom_domain" value="<?php echo e($custom_domain_info->custom_domain ?? ''); ?>">
                            <div id="subdomain-wrap"></div>
                        </div>

                        <div class="form-group">
                            <?php echo e(sprintf(__('Do not use http:// or https://
                              The valid format will be exactly like this one - domain.tld, domain.tld or subdomain.domain.tld, subdomain.domain.tld'))); ?>

                        </div>

                        <div class="alert alert-warning mt-3">
                            <p><?php echo e(__("If you are unable to locate your subdomain in the list, it is possible that the custom domain feature may not be included in your subscription plan.")); ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary" id="login_button"><?php echo e(__('Send Request')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.close-bars, .body-overlay').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').removeClass('active');
        });
        $('.sidebar-icon').on('click', function() {
            $('.dashboard-close, .dashboard-close-main, .body-overlay').addClass('active');
        });

        $(function () {
            $(document).ready(function ($) {
                "use strict";

                function removeTags(str) {
                    if ((str === null) || (str === '')) {
                        return false;
                    }
                    str = str.toString();
                    return str.replace(/(<([^>]+)>)/ig, '');
                }

                $(document).on('keyup paste change', 'input[name="custom_domain"]', function (e) {
                    var value = '';
                    if ($(this).val() != '') {
                        value = removeTags($(this).val()).toLowerCase().replace(/\s/g, "-");
                        $(this).val(value)
                    }

                    if (value.length < 1) {
                        $('#subdomain-wrap').html('');
                        return;
                    }
                    let msgWrap = $('#subdomain-wrap');
                    msgWrap.html('');
                    msgWrap.append('<span class="text-warning"><?php echo e(__('availability checking..')); ?></span>');

                    axios({
                        url: "<?php echo e(route('landlord.subdomain.custom-domain.check')); ?>",
                        method: 'post',
                        responseType: 'json',
                        data: {
                            subdomain: value
                        }
                    }).then(function (res) {
                        msgWrap.html('');
                        msgWrap.append('<span class="text-success"> ' + value + ' <?php echo e(__('is available')); ?></span>');
                        $('#login_button').attr('disabled', false)
                    }).catch(function (error) {
                        var responseData = error.response.data.errors;
                        msgWrap.html('');
                        msgWrap.append('<span class="text-danger"> ' + responseData.subdomain + '</span>');
                        $('#login_button').attr('disabled', true)
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('landlord.frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/user/dashboard/custom-domain.blade.php ENDPATH**/ ?>