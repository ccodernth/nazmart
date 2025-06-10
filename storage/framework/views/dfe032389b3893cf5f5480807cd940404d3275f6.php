

<?php $__env->startSection('title'); ?>
    <?php echo e(__('User Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .toggle-password {
            position: absolute;
            bottom: 13px;
            right: 20px;
            cursor: pointer;
        }
        .generate-password:hover{
            color: var(--main-color-one);
        }
        .single-input{
            position: relative;
            z-index: 1;
            display: inline-block;
        }
        .toggle-password.show-pass .show-icon {
            display: none;
        }
        .toggle-password.show-pass .hide-icon {
            display: block;
        }
        .hide-icon {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('User Register')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="sign-in-area-wrapper" data-padding-top="50" data-padding-bottom="50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="sign-up register">
                        <h4 class="title"><?php echo e(__('Sign Up')); ?></h4>
                        <div class="form-wrapper mt-5">
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
                            <form action="<?php echo e(route('tenant.user.register.store')); ?>" method="post"
                                  enctype="multipart/form-data" class="contact-page-form style-01">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Name')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                                   placeholder="<?php echo e(__('Type your full name')); ?>" value="<?php echo e(old('name')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo e(__('Username')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                            <input type="text" class="form-control" name="username"
                                                   id="exampleInputEmail1"
                                                   placeholder="<?php echo e(__('Type your username')); ?>"
                                                   value="<?php echo e(old('username')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1"><?php echo e(__('Email Address')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="<?php echo e(__('Type your email')); ?>" value="<?php echo e(old('email')); ?>">
                                </div>

                                <div class="form-group single-input mt-2">
                                    <label for="phone_number"><?php echo e(__('Phone Number')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                    <input type="tel" name="phone" class="form-control" id="phone_number"
                                           placeholder="50 123 45 67" value="<?php echo e(old('phone')); ?>">
                                </div>

                                
                                <div class="form-group">
                                    <label for="countryField"><?php echo e(__('Country')); ?>

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
                                    <select class="form-control" name="country" id="countryField">
                                        <option value=""><?php echo e(__('Select a country')); ?></option>
                                        
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label for="stateField"><?php echo e(__('State')); ?></label>
                                    <select class="form-control" name="state" id="stateField">
                                        <option value=""><?php echo e(__('Select a state')); ?></option>
                                        
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label for="cityField"><?php echo e(__('City')); ?></label>
                                    <select class="form-control" name="city" id="cityField">
                                        <option value=""><?php echo e(__('Select a city')); ?></option>
                                        
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo e(__('Post Code')); ?></label>
                                    <input type="text" class="form-control" name="postal_code" id="exampleInputEmail1"
                                           placeholder="<?php echo e(__('Type your postal code')); ?>" value="<?php echo e(old('postal_code')); ?>">
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group single-input">
                                            <label for="exampleInputPassword1"><?php echo e(__('Password')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                            <input type="password" name="password" class="form-control"
                                                   id="exampleInputPassword1"
                                                   placeholder="<?php echo e(__('Password')); ?>">
                                            <div class="icon toggle-password">
                                                <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                                <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group single-input">
                                            <label for="exampleInputPassword1"><?php echo e(__('Confirmed Password')); ?> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="exampleInputPassword1"
                                                   placeholder="<?php echo e(__('Confirmed Password')); ?>">
                                            <div class="icon toggle-password">
                                                <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                                <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-item mt-2">
                                    <a class="generate-password" href="javascript:void(0)"><i class="las la-magic"></i> <?php echo e(__('Generate random password')); ?></a>
                                </div>

                                <div class="btn-wrapper mt-4">
                                    <button type="submit" id="register" class="btn-default rounded-btn"><?php echo e(__('sign up')); ?></button>
                                </div>
                            </form>
                            <p class="info"><?php echo e(__('Already have an Account?')); ?> <a href="<?php echo e(route('tenant.user.login')); ?>"
                                                                                   class="active"><?php echo e(__('Sign in')); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.phone-number-config','data' => ['selector' => '#phone_number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.phone-number-config'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selector' => '#phone_number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.custom','data' => ['id' => 'register','title' => __('Please Wait..')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('register'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Please Wait..'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                const GEONAMES_USERNAME = 'codernth'; // Sizin verdiğiniz kullanıcı adı

                const countryField = $('#countryField');
                const stateField = $('#stateField');
                const cityField = $('#cityField');

                // 1. Ülkeleri Yükle
                function loadCountries() {
                    countryField.empty().append(`<option value=""><?php echo e(__('Yükleniyor...')); ?></option>`).prop('disabled', true);
                    stateField.empty().append(`<option value=""><?php echo e(__('Önce ülke seçin')); ?></option>`).prop('disabled', true);
                    cityField.empty().append(`<option value=""><?php echo e(__('Önce il seçin')); ?></option>`).prop('disabled', true);

                    $.ajax({
                        url: `https://secure.geonames.org/countryInfoJSON`,
                        type: 'GET',
                        data: { username: GEONAMES_USERNAME },
                        dataType: 'json',
                        success: function (data) {
                            countryField.empty().append(`<option value=""><?php echo e(__('Bir ülke seçin')); ?></option>`).prop('disabled', false);
                            if (data.geonames) {
                                data.geonames.sort(function(a,b) {
                                    return a.countryName.localeCompare(b.countryName);
                                });
                                $.each(data.geonames, function (index, country) {
                                    countryField.append(
                                        `<option value="${country.countryCode}">${country.countryName}</option>`
                                    );
                                });

                                // YENİ: Azerbaycan'ı varsayılan olarak seç ve illerini yükle
                                countryField.val('AZ'); // Azerbaycan'ın ülke kodu 'AZ'
                                if (countryField.val() === 'AZ') { // Eğer 'AZ' geçerli bir değerse
                                    countryField.trigger('change'); // 'change' olayını tetikle ki iller yüklensin
                                }
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Ülkeler çekilirken hata: " + error);
                            countryField.empty().append(`<option value=""><?php echo e(__('Ülkeler yüklenirken hata oluştu')); ?></option>`).prop('disabled', false);
                        }
                    });
                }

                // Sayfa yüklendiğinde ülkeleri yükle (ve Azerbaycan'ı seçili getir)
                loadCountries();

                // 2. Ülke Değiştiğinde İlleri/Bölgeleri Yükle
                countryField.on('change', function(e) {
                    e.preventDefault();
                    let selectedCountryCode = $(this).val();

                    stateField.empty().append(`<option value=""><?php echo e(__('Yükleniyor...')); ?></option>`).prop('disabled', true);
                    cityField.empty().append(`<option value=""><?php echo e(__('Önce il seçin')); ?></option>`).prop('disabled', true);

                    if (!selectedCountryCode) {
                        stateField.empty().append(`<option value=""><?php echo e(__('Önce ülke seçin')); ?></option>`).prop('disabled', true);
                        return;
                    }

                    $.ajax({
                        url: `https://secure.geonames.org/searchJSON`,
                        type: 'GET',
                        data: {
                            country: selectedCountryCode,
                            featureCode: 'ADM1',
                            maxRows: 1000,
                            style: 'MEDIUM',
                            username: GEONAMES_USERNAME
                        },
                        dataType: 'json',
                        success: function (data) {
                            stateField.empty().append(`<option value=""><?php echo e(__('Bir il seçin')); ?></option>`).prop('disabled', false);
                            if (data.geonames && data.geonames.length > 0) {
                                data.geonames.sort(function(a,b) {
                                    return a.name.localeCompare(b.name);
                                });
                                $.each(data.geonames, function (index, state) {
                                    stateField.append(
                                        `<option value="${state.adminCode1 || state.name}" data-countrycode="${selectedCountryCode}">${state.name}</option>`
                                    );
                                });
                            } else {
                                stateField.append(`<option value=""><?php echo e(__('Bu ülke için il bulunamadı')); ?></option>`);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("İller/Bölgeler çekilirken hata: " + error);
                            stateField.empty().append(`<option value=""><?php echo e(__('İller/Bölgeler yüklenirken hata oluştu')); ?></option>`).prop('disabled', false);
                        }
                    });
                });

                // 3. İl/Bölge Değiştiğinde İlçeleri/Şehirleri Yükle
                $(document).on('change', 'select[name=state]', function (e) {
                    e.preventDefault();
                    let selectedStateAdminCode = $(this).val();
                    let selectedCountryCode = $(this).find(':selected').data('countrycode');

                    if (!selectedCountryCode) {
                        selectedCountryCode = countryField.val();
                    }

                    cityField.empty().append(`<option value=""><?php echo e(__('Yükleniyor...')); ?></option>`).prop('disabled', true);

                    if (!selectedStateAdminCode || !selectedCountryCode) {
                        cityField.empty().append(`<option value=""><?php echo e(__('Önce il seçin')); ?></option>`).prop('disabled', true);
                        return;
                    }

                    $.ajax({
                        url: `https://secure.geonames.org/searchJSON`,
                        type: 'GET',
                        data: {
                            country: selectedCountryCode,
                            adminCode1: selectedStateAdminCode,
                            featureClass: 'P',
                            maxRows: 1000,
                            style: 'MEDIUM',
                            username: GEONAMES_USERNAME
                        },
                        dataType: 'json',
                        success: function (data) {
                            cityField.empty().append(`<option value=""><?php echo e(__('Bir ilçe/şehir seçin')); ?></option>`).prop('disabled', false);
                            if (data.geonames && data.geonames.length > 0) {
                                data.geonames.sort(function(a,b) {
                                     return a.name.localeCompare(b.name);
                                });
                                $.each(data.geonames, function (index, city) {
                                    cityField.append(
                                        `<option value="${city.name}">${city.name}</option>`
                                    );
                                });
                            } else {
                                cityField.append(`<option value=""><?php echo e(__('Bu il için ilçe/şehir bulunamadı')); ?></option>`);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("İlçeler/Şehirler çekilirken hata: " + error);
                            cityField.empty().append(`<option value=""><?php echo e(__('İlçeler/Şehirler yüklenirken hata oluştu')); ?></option>`).prop('disabled', false);
                        }
                    });
                });

                $(document).on('click', '.generate-password', function () {
                    if (typeof generateRandomPassword === "function") {
                        let password = generateRandomPassword();
                        $('input[name=password]').val(password);
                        $('input[name=password_confirmation]').val(password);
                    } else {
                        console.error("generateRandomPassword fonksiyonu bulunamadı.");
                    }
                });

                $(document).on('click', '.toggle-password', function () {
                    $(this).toggleClass("show-pass");
                    var input = $(this).closest('.single-input').find('input[type="password"], input[type="text"]');
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tenant.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/user/register.blade.php ENDPATH**/ ?>