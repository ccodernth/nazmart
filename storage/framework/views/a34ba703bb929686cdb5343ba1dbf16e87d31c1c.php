<?php
    $route_name ='landlord';
?>


<?php $__env->startSection('title'); ?> <?php echo e(__('All Tenants')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.css'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.css'); ?>
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

    <style>
        .change-theme{
            cursor: pointer;
            color: #0a53be;
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4"><?php echo e(__('All Tenants')); ?></h4>

                <div class="d-flex justify-content-between mb-3">
                    <h5 class="text-danger"><?php echo e(__('( If you delete any user and if it\'s associated with any package than everything regarding with this user will be deleted )')); ?></h5>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('landlord.admin.tenant.trash')); ?>"><?php echo e(__('Trash')); ?> <?php echo e($deleted_users > 0 ? "({$deleted_users})" : ""); ?></a>
                </div>

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

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('th', null, []); ?> 
                        <th><?php echo e(__('ID')); ?></th>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Email')); ?></th>
                        <th><?php echo e(__('Shops')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('tr', null, []); ?> 
                       <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                               <td><?php echo e($user->id); ?></td>
                               <td><?php echo e($user->name); ?></td>
                               <td><?php echo e($user->email); ?>

                                   <?php if($user->email_verified === 0): ?>
                                    <i class="text-danger mdi mdi-close-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Email Not Verified')); ?>"></i>
                                   <?php else: ?>
                                    <i class="text-success mdi mdi-check-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Email  Verified')); ?>"></i>
                                   <?php endif; ?>
                               </td>
                               <td class="text-center"><?php echo e($user->tenant_details->count()); ?></td>
                               <td>
                                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.delete-popover','data' => ['url' => ''.e(route('landlord.admin.tenant.delete',$user->id)).'','popover' => ''.e(__('Delete')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('landlord.admin.tenant.delete',$user->id)).'','popover' => ''.e(__('Delete')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-with-popover','data' => ['url' => ''.e(route('landlord.admin.tenant.edit.profile',$user->id)).'','popover' => ''.e(__('Edit')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link-with-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('landlord.admin.tenant.edit.profile',$user->id)).'','popover' => ''.e(__('Edit')).'']); ?>
                                       <i class="mdi mdi-account-edit"></i>
                                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'tenant_password_change','extra' => 'user_change_password_btn','type' => 'info','dataid' => ''.e($user->id).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'tenant_password_change','extra' => 'user_change_password_btn','type' => 'info','dataid' => ''.e($user->id).'']); ?>
                                        <?php echo e(__('Change Password')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                   <?php
                                   $select = '<option value="" selected disabled>Select a subdomain</option>';
                                        foreach($user->tenant_details ?? [] as $tenant)
                                        {
                                             $select .= '<option value="'.$tenant->id.'">'.optional($tenant->domain)->domain.'</option>';
                                        }
                                        $select .= '<option value="custom_domain__dd">Add new subdomain</option>';
                                   ?>
                                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'user_add_subscription','extra' => 'user_add_subscription','type' => 'primary','dataid' => ''.e($user->id).'','selectMarkup' => ''.e($select).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'user_add_subscription','extra' => 'user_add_subscription','type' => 'primary','dataid' => ''.e($user->id).'','select-markup' => ''.e($select).'']); ?>
                                       <?php echo e(__('Assign Subscription')); ?>

                                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal.button','data' => ['target' => 'send_mail_to_tenant_modal','extra' => 'send_mail_to_tenant_btn','type' => 'success','dataid' => ''.e($user->email).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('modal.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'send_mail_to_tenant_modal','extra' => 'send_mail_to_tenant_btn','type' => 'success','dataid' => ''.e($user->email).'']); ?>
                                       <?php echo e(__('Send Mail')); ?>

                                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                   <?php if($user->email_verified < 1): ?>
                                       <div class="verify d-flex gap-1">
                                           <form action="<?php echo e(route(route_prefix().'admin.tenant.resend.verify.mail')); ?>" method="post" enctype="multipart/form-data">
                                               <?php echo csrf_field(); ?>
                                               <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                               <button class="btn btn-secondary mb-3 mr-1 btn-sm " type="submit"><?php echo e(__('Send Verify Mail')); ?></button>
                                           </form>

                                           <form action="<?php echo e(route(route_prefix().'admin.tenant.verify.account')); ?>" method="post" enctype="multipart/form-data">
                                               <?php echo csrf_field(); ?>
                                               <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                               <button class="btn btn-success mb-3 mr-1 btn-sm " type="submit"><?php echo e(__('Verify Account')); ?> <i class="las la-check-circle"></i></button>
                                           </form>
                                       </div>
                                   <?php endif; ?>

                                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users-direct-login')): ?>
                                       <?php
                                           $local_url = env('CENTRAL_DOMAIN');
                                           $url = tenant_url_with_protocol($local_url);
                                           $hash_token = hash_hmac('sha512',$user->username,$user->id);
                                       ?>

                                       <a class="btn btn-info btn-sm mb-3 mr-1 " href="<?php echo e($url.'/token-login/'.$hash_token.'?user_id='.$user->id.''); ?>" target="_blank" style="text-decoration: none"><?php echo e(__('Login to User Account')); ?></a>
                                   <?php endif; ?>

                                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-with-popover','data' => ['url' => ''.e(route('landlord.admin.tenant.details',$user->id)).'','class' => 'dark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('link-with-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => ''.e(route('landlord.admin.tenant.details',$user->id)).'','class' => 'dark']); ?>
                                       <?php echo e(__('View Details')); ?>

                                    <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                               </td>
                           </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="user_add_subscription" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Assign Subscription')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('landlord.admin.tenant.assign.subscription')); ?>" id="user_add_subscription_form" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="subs_user_id" id="subs_user_id">
                        <input type="hidden" name="subs_pack_id" id="subs_pack_id">

                        <div class="form-group">
                            <label for="subdomain"><?php echo e(__('Subdomain')); ?></label>
                            <select class="form-select subdomain" id="subdomain" name="subdomain">

                            </select>
                            <p class="m-0 mt-2 text-end change-theme">
                                <small><?php echo e(__('Change theme?')); ?></small>
                            </p>
                        </div>

                        <div class="form-group custom_subdomain_wrapper mt-3">
                            <label for="custom-subdomain"><?php echo e(__('Add new subdomain')); ?></label>
                            <input class="form--control custom_subdomain" id="custom-subdomain" type="text" autocomplete="off" value="<?php echo e(old('subdomain')); ?>"
                                   placeholder="<?php echo e(__('Subdomain')); ?>" style="border:0;border-bottom: 1px solid #595959;width: 100%">
                            <div id="subdomain-wrap"></div>
                        </div>

                        <div class="form-group mt-3">
                            <?php
                                $themes = getAllThemeSlug();
                            ?>
                            <label for="custom-theme"><?php echo e(__('Add Theme')); ?></label>
                            <select class="form-select text-capitalize" name="custom_theme" id="custom-theme">
                                <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $custom_theme_name = get_static_option_central("${theme}_theme_name") ?? $theme;
                                    ?>
                                    <option value="<?php echo e($theme); ?>"><?php echo e($custom_theme_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Select A Package')); ?></label>
                            <select class="form-control package_id_selector" name="package">
                                <option value=""><?php echo e(__('Select Package')); ?></option>
                                <?php $__currentLoopData = \App\Models\PricePlan::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($price->id); ?>" data-id="<?php echo e($price->id); ?>">
                                        <?php echo e($price->title); ?> <?php echo e('('.float_amount_with_currency_symbol($price->price).')'); ?> - <?php echo e(\App\Enums\PricePlanTypEnums::getText($price->type)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Payment Status')); ?></label>
                            <select class="form-control" name="payment_status">
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                            </select>
                            <small class="text-primary"><?php echo e(__('You can set payment status pending or complete from here')); ?></small>
                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__('Account Status')); ?></label>
                            <select class="form-control" name="account_status">
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                            </select>
                            <small class="text-primary"><?php echo e(__('You can set account status pending or complete from here')); ?></small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary order-btn"><?php echo e(__('Submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="modal fade" id="tenant_password_change" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Change Admin Password')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>

                <form action="<?php echo e(route('landlord.admin.tenant.change.password')); ?>" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="ch_user_id" id="ch_user_id">
                        <div class="form-group">
                            <label for="password"><?php echo e(__('Password')); ?></label>
                            <input type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter Password')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="send_mail_to_tenant_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Send Mail To Subscriber')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route(route_prefix().'admin.tenant.send.mail')); ?>" id="send_mail_to_subscriber_edit_modal_form"  method="post">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email"><?php echo e(__('Email')); ?></label>
                            <input type="text" readonly class="form-control"  id="email" name="email" placeholder="<?php echo e(__('Email')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon"><?php echo e(__('Subject')); ?></label>
                            <input type="text" class="form-control"  id="subject" name="subject" placeholder="<?php echo e(__('Subject')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="message"><?php echo e(__('Message')); ?></label>
                            <input type="hidden" name="message" >
                            <div class="summernote"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Send Mail')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.js'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.landloard-unique-subdomain-check','data' => ['name' => 'custom_subdomain']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.landloard-unique-subdomain-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('custom_subdomain')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    

    <script>
        $(document).ready(function(){
            let theme_selected_first = false; // if theme selected first then after domain selection do not change theme again

            $(document).on('click','.user_change_password_btn',function(e){
                e.preventDefault();
                var el = $(this);

                var form = $('#user_password_change_modal_form');
                form.find('#ch_user_id').val(el.data('id'));
            });


            //Assign Subscription Modal Code
            $(document).on('click','.user_add_subscription',function(){
                let user_id = $(this).data('id');
                $('#subs_user_id').val(user_id);
                $("#user_add_subscription #subdomain").html($(this).data('select-markup'));
            });

            $(document).on('change','.package_id_selector',function (){
                let el = $(this);
                let form = $('.user_add_subscription_form');
                 $('#subs_pack_id').val(el.val());
            });

            let custom_subdomain_wrapper = $('.custom_subdomain_wrapper');
            custom_subdomain_wrapper.hide();
            $(document).on('change', '#subdomain', function (e){
                let el = $(this);
                let subdomain_type = el.val();

                if(subdomain_type == 'custom_domain__dd')
                {
                    custom_subdomain_wrapper.slideDown();
                    custom_subdomain_wrapper.find('#custom-subdomain').attr('name', 'custom_subdomain');
                    $('#custom-theme').parent().show();
                    $('.change-theme').hide();
                } else {
                    custom_subdomain_wrapper.slideUp();
                    custom_subdomain_wrapper.removeAttr('#custom-subdomain').attr('name', 'custom_subdomain');
                    $('#custom-theme').parent().hide();
                    $('.change-theme').show();
                }
            });

            $(document).on('click', '.change-theme', function () {
                $('#custom-theme').parent().show();
            });

            $(document).on('change', '#subdomain', function (){
                let el = $(this).parent().parent().find(".form-group #custom-theme");
                let subdomain = $(this).val();

                if(!theme_selected_first)
                {
                    $.ajax({
                        url: '<?php echo e(route('landlord.admin.tenant.check.subdomain.theme')); ?>',
                        type: 'POST',
                        data: {
                            _token : '<?php echo e(csrf_token()); ?>',
                            subdomain : subdomain
                        },
                        beforeSend: function () {
                            el.find('option').attr('selected', false);
                        },
                        success: function (res) {
                            el.find("option[value="+res.theme_slug+"]").attr('selected', true);
                        }
                    });
                }
            });

            $(document).on('change', '#custom-theme', function () {
                theme_selected_first = true;
            });

            $(document).on('submit', '#user_add_subscription_form', function () {
                $(this).find('button[type=submit]').attr('disabled', true);
            });
        });
    </script>

    <script>
        (function ($){
            "use strict";
            $(document).ready(function () {

                    $(document).on('click','.send_mail_to_tenant_btn',function(){
                        var el = $(this);
                        var email = el.data('id');

                        var form = $('#send_mail_to_subscriber_edit_modal_form');
                        form.find('#email').val(email);
                    });
                $('.summernote').summernote({
                    height: 300,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
            });

        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($route_name.'.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/tenant/index.blade.php ENDPATH**/ ?>