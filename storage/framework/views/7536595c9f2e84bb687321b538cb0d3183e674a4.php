
<?php $__env->startSection('title', __('OTP Sign In')); ?>

<?php $__env->startSection('content'); ?>
    <div class="sign-in-area-wrapper padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="sign-in register">
                        <h4 class="title"><?php echo e(__('OTP Sign In')); ?></h4>
                        <div class="form-wrapper custom--form mt-4">
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

                            <form action="<?php echo e(route('landlord.user.login.otp')); ?>" method="post" class="account-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group single-input">
                                    <label for="telephone" class="label-title mb-2"><?php echo e(__('Phone Number')); ?></label>
                                    <input type="tel" name="phone" class="form-control" id="telephone"
                                           placeholder="<?php echo e(__('Enter your phone number')); ?>">
                                </div>

                                <div class="form-group form-check d-flex align-items-center mt-3">
                                    <input type="checkbox" name="remember" class="form-check-input me-2" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"><?php echo e(__('Remember me')); ?></label>
                                </div>

                                <div class="btn-wrapper mt-4">
                                    <button type="submit" class="cmn-btn cmn-btn-bg-1 w-100"><?php echo e(__('Send OTP')); ?></button>
                                </div>
                            </form>
                            <p class="info mt-3">
                                <?php echo e(__("Do not have an account?")); ?>

                                <a href="<?php echo e(route('landlord.user.register')); ?>"><strong><?php echo e(__('Sign up')); ?></strong></a>
                            </p>
                        </div><!-- form-wrapper -->
                    </div><!-- sign-in register -->
                </div><!-- col-md-6 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- sign-in-area-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/user/login.blade.php ENDPATH**/ ?>