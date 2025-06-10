<?php $__env->startSection('title'); ?>
    <?php echo e(__('Page Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4"><?php echo e(__("Page Settings")); ?></h4>
                        <form action="<?php echo e(route(route_prefix().'admin.general.page.settings')); ?>" method="POST" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                               <div class="form-group  mt-3">
                                   <label for="site_logo"><?php echo e(__('Home Page Display')); ?></label>
                                   <select name="home_page" class="form-control">
                                       <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('home_page')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                               </div>

                            <div class="form-group  mt-3">
                                <label for="site_logo"><?php echo e(__('Blog Page Display')); ?></label>
                                <select name="blog_page" class="form-control">
                                    <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('blog_page')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <?php if(!tenant()): ?>
                                <div class="form-group  mt-3">
                                    <label for="site_logo"><?php echo e(__('Price Plan Page Display')); ?></label>
                                    <select name="pricing_plan" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('pricing_plan')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group  mt-3">
                                    <label for="site_logo"><?php echo e(__('Terms and Condition Page Display')); ?></label>
                                    <select name="terms_condition" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('terms_condition')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group  mt-3">
                                    <label for="site_logo"><?php echo e(__('Privacy Policy Page Display')); ?></label>
                                    <select name="privacy_policy" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('privacy_policy')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if(tenant()): ?>
                                <div class="form-group  mt-3">
                                    <label for="site_logo"><?php echo e(__('Shop Page Display')); ?></label>
                                    <select name="shop_page" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('shop_page')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if(tenant() && tenant_has_digital_product()): ?>
                                <div class="form-group mt-3">
                                    <label for="site_logo"><?php echo e(__('Digital Shop Page Display')); ?></label>
                                    <select name="digital_shop_page" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('digital_shop_page')): ?> selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <?php if(tenant()): ?>
                                <div class="form-group  mt-3">
                                    <label for="site_logo"><?php echo e(__('Order Track Page Display')); ?></label>
                                    <select name="track_order" class="form-control">
                                        <?php $__currentLoopData = $all_home_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($page->id); ?>" <?php if($page->id == get_static_option('track_order')): ?>  selected <?php endif; ?> ><?php echo e($page->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endif; ?>

                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(route_prefix().'admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/general-settings/page-settings.blade.php ENDPATH**/ ?>