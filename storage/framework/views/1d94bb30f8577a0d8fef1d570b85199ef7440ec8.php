<?php $__env->startSection('title'); ?>
    <?php echo e(__('User OTP Verification')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Verify OTP')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .active:hover{
            color: var(--main-color-one);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- sign-in area start -->
    <div class="sign-in-area-wrapper padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="sign-in register signIn-signUp-wrapper">
                        <h4 class="title signin-contents-title text-center mb-4"><?php echo e(__('Verify OTP')); ?></h4>

                        <h5 class="countdown text-center my-2"></h5>
                        <p class="my-2 text-center"><?php echo e(__('An OTP has been sent on your phone number.')); ?></p>
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

                            <form action="<?php echo e(route('landlord.user.login.otp.verification')); ?>" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
                               <?php echo csrf_field(); ?>
                                <div class="error-wrap"></div>

                                <div class="form-group single-input" style="z-index: unset">
                                    <label for="exampleInputEmail1" class="label-title mb-3"><?php echo e(__('OTP Code')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.mandatory-indicator','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.mandatory-indicator'); ?>
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
<?php endif; ?></label>
                                    <input class="form--control" type="number" name="otp" value="<?php echo e(old('otp')); ?>">
                                </div>

                                <div class="form-group single-input form-check mt-4">
                                    <div class="box-wrap">
                                        <div class="left">
                                            <div class="checkbox-inlines">
                                                <input type="checkbox" name="remember" class="form-check-input check-input" id="exampleCheck1">
                                                <label class="form-check-label checkbox-label" for="exampleCheck1"><?php echo e(__('Remember me')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper mt-4">
                                    <button type="submit" id="login_btn" class="cmn-btn cmn-btn-bg-1 w-100"><?php echo e(__('Send OTP')); ?></button>
                                </div>
                            </form>
                            <p class="info mt-3 d-flex justify-content-between">
                                <a href="<?php echo e(route('landlord.user.login.otp')); ?>" class="active"> <?php echo e(__('Update number?')); ?> </a>
                                <a href="<?php echo e(route('landlord.user.login.otp.resend')); ?>" class="active"> <?php echo e(__('Resend OTP code again?')); ?> </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sign-in area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php
        $expire_time = 0;
        if (!now()->isAfter($userOtp->expire_date))
        {
            $expire_time = $userOtp ? now()->diffInRealSeconds($userOtp->expire_date) : 0;
        }
    ?>
    <script>
        let expire_time = `<?php echo e($expire_time); ?>`;

        let interval = setInterval(function() {
            if (expire_time > 0)
            {
                expire_time--;
            }

            let countdown = $('.countdown');
            if (parseInt(expire_time) === 0)
            {
                countdown.removeClass('text-dark').addClass('text-danger').text(`<?php echo e(__('The OTP is expired')); ?>`)
                return clearInterval(interval);
            }

            countdown.addClass('text-dark').text(expire_time + ` <?php echo e(__('Seconds')); ?>`)
        }, 1000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/user/otp-verify.blade.php ENDPATH**/ ?>