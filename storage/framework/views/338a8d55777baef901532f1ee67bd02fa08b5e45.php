<?php $__env->startSection('title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .payment-gateway-wrapper ul{
            display: flex;
        }
        .payment-gateway-wrapper ul li img{
            width: 100%;
        }
        .generate-password:hover{
            color: var(--main-color-one);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="signup-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="signin-wrappers style-02">
                <div id="msg-wrapper"></div>

                <?php if(url('/') == 'https://nazmart.net' || url('/') == 'https://nazmart.test'): ?>
                    <div class="alert bg-danger text-white fw-bold text-center">Thank you for exploring our demo version. Please note that registration functionality is intentionally disabled in this demonstration to ensure a seamless and efficient experience for users.</div>
                <?php endif; ?>

                <div class="signin-contents">
                    <span class="singnin-subtitle"> <?php echo e(__('Hello! Welcome')); ?> </span>
                    <h2 class="single-title"> <?php echo e(__('Sign Up')); ?> </h2>
                    <form class="login-form padding-top-20" action="#" method="POST">
                        <div class="single-input">
                            <label class="label-title mb-3"> <?php echo e(__('Name')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                            <input class="form--control" type="text" name="name" placeholder="<?php echo e(__('Type first name')); ?>"
                                   value="<?php echo e(old('name')); ?>">
                        </div>
                        <div class="single-input mt-4">
                            <label class="label-title mb-3"> <?php echo e(__('User Name')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                            <input class="form--control" type="text" placeholder="<?php echo e(__('Type user name')); ?>" name="username" value="<?php echo e(old('username')); ?>">
                        </div>
                        <div class="single-input mt-4">
                            <label class="label-title mb-3"> <?php echo e(__('Email Address')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                            <input class="form--control" type="email" name="email" placeholder="<?php echo e(__('Type email')); ?>" value="<?php echo e(old('email')); ?>">
                        </div>

                        <div class="single-input mt-4" style="z-index: unset">
                            <label class="label-title mb-3"> <?php echo e(__('Phone Number')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                            <input class="form--control" type="tel" name="phone" placeholder="" id="telephone" value="<?php echo e(old('phone')); ?>">
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.fields.country-select','data' => ['name' => 'country','label' => ''.e(__('Country')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fields.country-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'country','label' => ''.e(__('Country')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        <div class="input-flex-item">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> <?php echo e(__('Create Password')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                <input class="form--control" type="password" name="password" placeholder="<?php echo e(__('Type password')); ?>">
                                <div class="icon toggle-password">
                                    <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                    <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                </div>
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> <?php echo e(__('Confirm Password')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                <input class="form--control" type="password" name="password_confirmation" placeholder="<?php echo e(__('Confirm password')); ?>">
                                <div class="icon toggle-password">
                                    <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                    <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                </div>
                            </div>
                        </div>

                        <div class="input-item mt-2">
                            <a class="generate-password" href="javascript:void(0)"><i class="las la-magic"></i> <?php echo e(__('Generate random password')); ?></a>
                        </div>

                        <div class="checkbox-inlines mt-5">
                            <?php
                                $terms_condition_page = get_page_slug(get_static_option('terms_condition')) ?? '#';
                                $privacy_policy_page = get_page_slug(get_static_option('privacy_policy')) ?? '#';
                            ?>
                            <input class="check-input agree" name="terms_condition" type="checkbox" id="check15">
                            <label class="checkbox-label agreement" for="check15"><?php echo e(__('By creating an account, you agree to the')); ?>

                                <a class="color-one" href="<?php echo e($terms_condition_page); ?>" target="_blank"> <?php echo e(__('terms and conditions')); ?></a> <?php echo e(__('and')); ?>

                                        <a class="color-one" href="<?php echo e($privacy_policy_page); ?>" target="_blank"> <?php echo e(__('privacy policy')); ?> </a> </label>
                        </div>
                        <button class="submit-btn w-100 mt-4" type="submit" id="register_button"> <?php echo e(__('Sign Up Now')); ?> </button>
                        <span class="account color-light mt-3"> <?php echo e(__('Already have an account?')); ?>

                            <a class="color-one" href="<?php echo e(route('landlord.user.login')); ?>"> <?php echo e(__('Login')); ?> </a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.generate-password','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.generate-password'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.phone-number-config','data' => ['selector' => '#telephone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.phone-number-config'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selector' => '#telephone']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    
    <script>
        var registerFormButton = document.getElementById('register_button');
        registerFormButton.addEventListener('click', function (event) {
            event.preventDefault();

            document.getElementById("register_button").disabled = true;

            var msgWrap = document.getElementById('msg-wrapper');
            msgWrap.innerHTML = '';
            registerFormButton.innerText = "<?php echo e(__('Creating your account')); ?>"

            let terms = '';
            let checkbox = $('.agree');
            if (checkbox[0].checked)
            {
                terms = 'on';
            }

            $('.loader').show();

            axios({
                url: "<?php echo e(route('landlord.user.register.store')); ?>",
                method: 'post',
                responseType: 'json',
                data: {
                    name: document.querySelector('input[name="name"]').value,
                    email: document.querySelector('input[name="email"]').value,
                    username: document.querySelector('input[name="username"]').value,
                    password: document.querySelector('input[name="password"]').value,
                    country: document.querySelector('select[name="country"]').value,
                    phone: iti1.getNumber(),
                    password_confirmation: document.querySelector('input[name="password_confirmation"]').value,
                    terms_condition: terms,
                    _token: '<?php echo e(csrf_token()); ?>'
                }
            }).then(function (response) {
                let $pf_name = $('.name').val();
                let pf_email = $('.email').val();

                registerFormButton.innerText = "<?php echo e(__('Redirecting..')); ?>"

                let plan = '<?php echo e($plan_id ?? ''); ?>';

                if (plan !== '')
                {
                    <?php
                        session()->put('trial-register', __('Account Registration Successful'))
                    ?>
                    location.href = '<?php echo e(route('landlord.frontend.plan.view', [$plan_id, 'trial'])); ?>';
                } else {
                    location.href = '<?php echo e(route('landlord.user.home')); ?>';
                }

                $('.loader').hide();
            }).catch(function (error) {
                registerFormButton.innerText = "<?php echo e(__('Register')); ?>"

                let i = 1;
                if (error.response.status === 422) {
                    var responseData = error.response.data.errors;
                    var child = '<ul class="alert alert-danger">'
                    Object.entries(responseData).forEach(function (value) {
                        child += '<li>' + i++ + ". " + value[1] + '</li>';
                    });
                    child += '</ul>'
                    msgWrap.innerHTML = child;
                } else {
                    var responeMsg = error.response.data.message;
                    var child = '<ul class="alert alert-danger"><li>' + responeMsg + '</li></ul>';
                    msgWrap.innerHTML = child;
                }

                document.getElementById("register_button").disabled = false;
                $('.loader').hide();
            });
        })

        $(document).ready(function () {
            $(document).on('click', '.generate-password', function () {
                let password = generateRandomPassword();

                $('input[name=password]').val(password);
                $('input[name=password_confirmation]').val(password);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/auth/register.blade.php ENDPATH**/ ?>