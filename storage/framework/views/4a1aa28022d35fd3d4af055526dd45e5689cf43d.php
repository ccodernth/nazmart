

<?php $__env->startSection('title'); ?>
    <?php echo e(__('User Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('OTP Sign In')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('style'); ?>
    <style>
        .sign-in-area-wrapper {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            border-radius: 10px;
            padding-top: 60px;   
            padding-bottom: 60px;
        }
        .sign-in.register {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 40px; /* İç boşluk ayarı */
        }
        .sign-in.register .title {
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 600;
            text-align: center;
        }
        .form-wrapper.custom--form {
            margin-top: 30px;
        }
        .form-group.single-input label {
            font-weight: 500;
            margin-bottom: 10px;
            display: inline-block;
        }
        .form-group.single-input input {
            border-radius: 5px;
            height: 50px;
        }
        .form-check {
            margin-top: 20px;
        }
        .btn-wrapper {
            margin-top: 30px;
        }
        .btn-default {
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 5px;
            height: 48px;
            transition: all .3s;
        }
        .btn-default:hover {
            opacity: 0.9;
        }
        .info {
            text-align: center;
            margin-top: 20px;
        }
        .info a {
            color: #3b82f6;
            font-weight: 500;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- sign-in area start -->
    <div class="sign-in-area-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-6 col-lg-5">
                    <div class="sign-in register">
                        <h4 class="title"><?php echo e(__('OTP Sign In')); ?></h4>
                        <div class="form-wrapper custom--form">
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
                            
                            <!-- OTP Giriş Formu -->
                            <form action="<?php echo e(route(route_prefix() . 'user.login.otp')); ?>"
                                  method="post"
                                  enctype="multipart/form-data"
                                  class="account-form"
                                  id="login_form_order_page">
                                <?php echo csrf_field(); ?>

                                <div class="error-wrap"></div>
                                
                                
                                <div class="form-group single-input">
                                    <label for="telephone" class="label-title mb-2">
                                        <?php echo e(__('Phone Number')); ?>

                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>
                                    </label>
                                    <input type="tel"
                                           name="phone"
                                           class="form-control"
                                           id="telephone"
                                           placeholder="<?php echo e(__('Your Phone Number')); ?>"
                                           value="<?php echo e(old('phone')); ?>">
                                </div>

                                
                                <div class="form-group form-check d-flex align-items-center">
                                    <input type="checkbox"
                                           name="remember"
                                           class="form-check-input me-2"
                                           id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">
                                        <?php echo e(__('Remember me')); ?>

                                    </label>
                                </div>

                                
                                <div class="btn-wrapper">
                                    <button type="submit"
                                            id="login_btn"
                                            class="btn-default w-100">
                                        <?php echo e(__('Send OTP')); ?>

                                    </button>
                                </div>
                            </form>

                            
                            <p class="info mt-3">
                                <?php echo e(__("Do not have an account?")); ?>

                                <a href="<?php echo e(route('tenant.user.register')); ?>" class="active">
                                    <strong><?php echo e(__('Sign up')); ?></strong>
                                </a>
                            </p>
                        </div><!-- //.form-wrapper -->
                    </div><!-- //.sign-in register -->
                </div><!-- //.col-md-6 col-lg-5 -->
            </div><!-- //.row -->
        </div><!-- //.container -->
    </div>
    <!-- sign-in area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.phone-number-config','data' => ['selector' => '#telephone','submitButtonId' => 'login_btn']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.phone-number-config'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selector' => '#telephone','submit-button-id' => 'login_btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/user/login.blade.php ENDPATH**/ ?>