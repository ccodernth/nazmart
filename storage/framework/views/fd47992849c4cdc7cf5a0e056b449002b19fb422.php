<?php $__env->startSection('title'); ?> <?php echo e(__('Main Page')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-12 stretch-card">
        <div class="card">
      <?php if(!empty($current_package)): ?>
            <div class="main">
                <div class="alert border-left border-primary text-white text-center bg-gradient-info">
                    <strong><?php echo e(__('Current Package :')); ?> </strong> <?php echo e($current_package->package_name); ?>

                    <span class="badge badge-warning text-dark">
                        <?php if(!is_null(optional($current_package->package)->type)): ?>
                            <?php echo e(\App\Enums\PricePlanTypEnums::getText(optional($current_package->package)->type)); ?>

                        <?php endif; ?>
                    </span>

                    <?php if(optional(tenant()->payment_log)->status == 'trial'): ?>
                        <strong class="text-capitalize"> ( <?php echo e(optional(tenant()->payment_log)->status); ?> : <?php echo e(tenant()->expire_date?->diffForHumans() ?? ''); ?>)</strong>
                        <a class="btn btn-dark btn-sm pull-right" href="<?php echo e(route('landlord.homepage') .'#price_plan_section'); ?>" target="_blank"><?php echo e(__('Renew Plan')); ?></a
                    <?php else: ?>
                        <?php if(tenant()->expire_date != null): ?>
                            <strong> ( <?php echo e(__('Expire Date :')); ?> <?php echo e(tenant()->expire_date .' - '. tenant()->expire_date?->diffForHumans() ?? ''); ?> )</strong>

                            <a class="btn btn-dark btn-sm pull-right" href="<?php echo e(route('landlord.homepage') .'#price_plan_section'); ?>" target="_blank"><?php echo e(__('Renew Plan')); ?></a>
                        <?php else: ?>
                            <strong> ( <?php echo e(__('Expire Date :')); ?> <?php echo e(__('Lifetime')); ?> )</strong>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
      <?php endif; ?>
          <div class="card-body">
              <h4 class="card-title mb-4"><?php echo e(__('Dashboard content')); ?></h4>
                <div class="row g-4">
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Admins')); ?><i class="las la-user-shield mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e($total_admin); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Users')); ?><i class="las la-user-shield mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e($total_user); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Blogs')); ?><i class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e($all_blogs); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Products')); ?> <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e($total_products); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-primary card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Orders')); ?><i class="mdi mdi-diamond mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e($total_orders); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 stretch-card">
                        <div class="card bg-gradient-warning card-img-holder text-white">
                            <div class="card-body">
                                <img src="<?php echo e(global_asset('assets/landlord/admin/images/circle.png')); ?>" class="card-img-absolute" alt="circle-image">
                                <h4 class="font-weight-normal mb-3"><?php echo e(__('Total Sale')); ?> <i class="mdi mdi-cash mdi-24px float-right"></i>
                                </h4>
                                <h2 class="mb-5"><?php echo e(amount_with_currency_symbol($total_sale)); ?></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="recent_order_wrap mt-4">
                            <h3 class=" text-center mb-4"><?php echo e(__('Recent Order Logs')); ?></h3>
                            <div class="recent_order_logs">
                                <table class="table table-responsive table-bordered">
                                    <thead class="text-white" style="background-color: #b66dff">
                                    <tr>
                                        <th> <?php echo e(__('Order ID')); ?> </th>
                                        <th> <?php echo e(__('Customer Name')); ?> </th>
                                        <th> <?php echo e(__('Customer Email')); ?> </th>
                                        <th> <?php echo e(__('Total Amount')); ?> </th>
                                        <th> <?php echo e(__('Status')); ?> </th>
                                        <th> <?php echo e(__('Payment Status')); ?> </th>
                                        <th> <?php echo e(__('Payment gateway')); ?> </th>
                                        <th> <?php echo e(__('Order Created')); ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $recent_order_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->id); ?></td>
                                            <td><?php echo e($data->name ?? ''); ?></td>
                                            <td> <?php echo e($data->email); ?> </td>
                                            <td> <?php echo e(amount_with_currency_symbol($data->total_amount)); ?> </td>
                                            <td><?php echo e($data->status); ?></td>
                                            <?php
                                                $payment_status_color = match ($data->payment_status){
                                                    'success' => 'text-success',
                                                    'pending' => 'text-warning',
                                                    'failed' => 'text-danger'
                                                }
                                            ?>
                                            <td class="<?php echo e($payment_status_color); ?>"><?php echo e($data->payment_status); ?></td>
                                            <td><?php echo e(str_replace('_',' ',$data->payment_gateway)); ?></td>
                                            <td><?php echo e($data->created_at->diffForHumans()); ?></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/tenant/admin/admin-home.blade.php ENDPATH**/ ?>