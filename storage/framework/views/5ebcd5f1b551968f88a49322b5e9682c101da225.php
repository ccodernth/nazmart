<?php $__env->startSection('title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
    $username = "";
    $password = "";
    if(preg_match('/(nazmart|hexfashion)/',url('/'))){
        $username = "super_admin";
        $password = "12345678";
    }
    ?>
    <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                </div>
                <h4><?php echo e(__('Hello! let us get started')); ?></h4>
                <h6 class="font-weight-light"><?php echo e(__('Sign in to continue')); ?></h6>
                <div id="msg-wrapper"></div>
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
                <form class="pt-3" action="#" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg" value="<?php echo e($username); ?>"
                               placeholder="<?php echo e(__('Email or Username')); ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg" value="<?php echo e($password); ?>"
                               placeholder="<?php echo e(__('Password')); ?>">
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                                class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                id="login_submit_btn"><?php echo e(__('SIGN IN')); ?></button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" name="remember"
                                       class="form-check-input"> <?php echo e(__('Keep me signed in')); ?>

                                <i class="input-helper"></i>
                            </label>
                        </div>
                        <?php
                            if (!is_null(tenant()))
                                {
                                    $route = route('tenant.admin.forget.password');
                                } else {
                                    $route = route('landlord.admin.forget.password');
                                }
                        ?>
                        <a href="<?php echo e($route); ?>" class="auth-link text-black"><?php echo e(__('Forgot password?')); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        var loginFormButton = document.getElementById('login_submit_btn');
        loginFormButton.addEventListener('click', function (event) {
            event.preventDefault();

            var msgWrap = document.getElementById('msg-wrapper');
            msgWrap.innerHTML = '';

            axios({
                url: "<?php echo e(route(route_prefix().'admin.login')); ?>",
                method: 'post',
                responseType: 'json',
                data: {
                    email: document.querySelector('input[name="email"]').value,
                    password: document.querySelector('input[name="password"]').value,
                    remember: document.querySelector('input[name="remember"]').value,
                }
            }).then(function (res) {
                loginFormButton.innerText = "<?php echo e(__('Login Success')); ?>"
                loginFormButton.innerText = "<?php echo e(__('Redirecting..')); ?>"
                window.location.reload();
            }).catch(function (error) {
                var responseData = error.response.data.errors;
                if (responseData === undefined) {
                    msgWrap.innerHTML = '<div class="alert alert-danger">' + error.response?.data?.message + '</div>';
                }
                var child = '<ul class="alert alert-danger">';
                Object.entries(responseData).forEach(function (value) {
                    child += '<li>' + value[1] ?? value + '</li>';
                });
                child += '</ul>';

                msgWrap.innerHTML = child;
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/admin/auth/login.blade.php ENDPATH**/ ?>