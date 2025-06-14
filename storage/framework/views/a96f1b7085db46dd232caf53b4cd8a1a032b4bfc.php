<?php $__env->startSection('title'); ?>
    <?php echo e(__('Checkout')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Checkout')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .payment-gateway-wrapper ul {
            flex-wrap: wrap;
            display: flex;
        }
        .payment-gateway-wrapper ul li {
            max-width: 100px;
            cursor: pointer;
            box-sizing: border-box;
            height: 50px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .payment-gateway-wrapper ul li {
            margin: 3px;
            border: 1px solid #ddd;
        }


        .payment-gateway-wrapper ul li.selected:after, .payment-gateway-wrapper ul li.selected:before {
            visibility: visible;
            opacity: 1;
        }

        .payment-gateway-wrapper ul li:before {
            border: 2px solid #930ed8;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            height: 100%;
            content: '';
            visibility: hidden;
            opacity: 0;
            transition: all .3s;
        }

        .payment-gateway-wrapper ul li.selected:after, .payment-gateway-wrapper ul li.selected:before {
            visibility: visible;
            opacity: 1;
        }

        .payment-gateway-wrapper ul li:after {
            position: absolute;
            right: 0;
            top: 0;
            width: 15px;
            height: 15px;
            background-color: #930ed8;
            content: "\f00c";
            font-weight: 900;
            color: #fff;
            font-family: 'Line Awesome Free';
            font-weight: 900;
            font-size: 10px;
            line-height: 10px;
            text-align: center;
            padding-top: 2px;
            padding-left: 2px;
            visibility: hidden;
            opacity: 0;
            transition: all .3s;
        }
        .plan_warning small{
            font-size: 15px;
        }
        .coupon-radio-item {
            display: flex;
            align-items: baseline;
            gap: 5px;
        }
        .coupon-radio-item input {
            appearance: none;
            background-color: #fff;
            margin: 0;
            font: inherit;
            color: currentColor;
            width: 16px;
            height: 16px;
            border: 1px solid currentColor;
            border-radius: 50%;
            position: relative;
            transition: all .2s;
        }
        .coupon-radio-item input:before {
            content: "";
            position: absolute;
            height: calc(100% - 6px);
            width: calc(100% - 6px);
            top: 3px;
            left: 3px;
            background-color: var(--main-color-one);
            transform: scale(0);
            border-radius: 50%;
            transition: all .2s;
        }
        .coupon-radio-item input:checked::before {
            transform: scale(1);
        }
        .coupon-radio-item input:checked {
            border-color: var(--main-color-one);
        }
        .coupon-contents-details-list-item {
            font-size: 16px;
            padding: 7px 0;
        }

        .coupon-contents-details-list {
            padding: 10px 0;
        }
        .coupon-contents-details-list > h6 {
            padding-bottom: 15px;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Cart::count() > 0): ?>
        <?php
            $carts = Cart::instance("default")->content();
            $itemsTotal = null;
            $enableTaxAmount = !\Modules\TaxModule\Services\CalculateTaxServices::isPriceEnteredWithTax();

            $tax = Modules\TaxModule\Services\CalculateTaxBasedOnCustomerAddress::init();
            $uniqueProductIds = $carts->pluck("id")->unique()->toArray();

            $country_id = old("country_id") ?? 0;
            $state_id = old("state_id") ?? 0;
            $city_id = old("city") ?? 0;

            if (auth('web')->check())
            {
                $auth_user = auth('web')->user();

                if (get_static_option('calculate_tax_based_on') == 'customer_billing_address')
                {
                    if ($auth_user->delivery_address)
                    {
                        $country_id = $auth_user?->delivery_address?->country_id;
                        $state_id = $auth_user?->delivery_address?->state_id;
                        $city_id = $auth_user?->delivery_address?->city;
                    }
                } else {
                    $country_id = $auth_user->country;
                    $state_id = $auth_user->state;
                    $city_id = $auth_user->city;
                }
            }

            $shippingTaxClass = \Modules\TaxModule\Entities\TaxClassOption::where("class_id", get_static_option("shipping_tax_class"));
            if(!empty($country_id)){
                $shippingTaxClass->where("country_id", $country_id);
            }
            if(!empty($state_id)){
                $shippingTaxClass->where("state_id", $state_id);
            }
            if(!empty($city_id)){
                $shippingTaxClass->where("city_id", $city_id);
            }

            $shippingTaxClass = $shippingTaxClass->sum("rate");

            if(empty($uniqueProductIds))
            {
                $taxProducts = collect([]);
            }
            else
            {
                if(\Modules\TaxModule\Services\CalculateTaxBasedOnCustomerAddress::is_eligible()){
                    $taxProducts = $tax
                        ->productIds($uniqueProductIds)
                        ->customerAddress($country_id, $state_id, $city_id)
                        ->generate();
                }
                else
                {
                    $taxProducts = collect([]);
                }
            }
        ?>

        <div class="checkout-area padding-top-75 padding-bottom-50">
            <div class="container container-one">
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
                <div class="row">
                    <?php if(!empty(get_static_option('guest_order_system_status'))): ?>
                        <?php if(!empty(Auth::guard('web')->user())): ?>
                            <?php echo $__env->make(include_theme_path('shop.checkout.partials.checkout_left_side'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <div class="col-xl-8 col-lg-7 mt-4">
                                <div class="sign-in register">
                                    <h4 class="title"><?php echo e(__('Sign In to Continue')); ?></h4>
                                    <div class="form-wrapper">
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
                                        <form action="" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
                                            <div class="error-wrap"></div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo e(__('Username')); ?><span class="required">*</span></label>
                                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Type your username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo e(__('Password')); ?><span class="required">*</span></label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>

                                            <div class="form-group form-check">
                                                <div class="box-wrap">
                                                    <div class="left">
                                                        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Remember me')); ?></label>
                                                    </div>
                                                    <div class="right">
                                                        <a href="<?php echo e(route('tenant.user.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-wrapper">
                                                <button type="submit" id="login_btn" class="btn-default rounded-btn"><?php echo e(__('Sign In')); ?></button>
                                            </div>

                                        </form>
                                        <p class="info"><?php echo e(__("Don'/t have an account")); ?> <a href="<?php echo e(route('tenant.user.register')); ?>" class="active"><?php echo e(__('Sign up')); ?></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo $__env->make(include_theme_path('shop.checkout.partials.checkout_left_side'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <?php echo $__env->make(include_theme_path('shop.checkout.partials.checkout_right_side'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php echo $__env->make(include_theme_path('shop.cart.cart_empty'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.ajax-login','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.ajax-login'); ?>
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
    <script>
        $(function (){
            $(document).on('click', '#login_btn', function (e) {
                e.preventDefault();
                var formContainer = $('#login_form_order_page');
                var el = $(this);
                var username = formContainer.find('input[name="username"]').val();
                var password = formContainer.find('input[name="password"]').val();
                var remember = formContainer.find('input[name="remember"]').val();

                el.text('<?php echo e(__("Please Wait")); ?>');

                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('tenant.user.ajax.login')); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        username: username,
                        password: password,
                        remember: remember,
                    },
                    success: function (data) {
                        if (data.status === 'invalid') {
                            el.text('<?php echo e(__("Login")); ?>')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">' + data.msg + '</div>');
                        } else {
                            formContainer.find('.error-wrap').html('');
                            el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                            location.reload();
                        }
                    },
                    error: function (data) {
                        var response = data.responseJSON.errors
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response, function (value, index) {
                            formContainer.find('.error-wrap ul').append('<li>' + index + '</li>');
                        });
                        el.text('<?php echo e(__("Login")); ?>');
                    }
                });
            });

            $(document).on('click', '.shift-another-address', function (){
                let el = $(this);

                let $items;
                if (el.hasClass('active')) {
                    $items = $('.shift-address-form input');
                    $.each($items, function (key, value){
                        $(value).val('');
                    });

                    $('.shift_another_address').val('on');
                }

                if (el.hasClass('active') === false) {
                    $('.shift_another_address').val('');
                }
            });

            
            
            

            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            

            
            
            

            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            

            $(document).on('change', '.shift-another-country, .shift-another-state, .shift-another-city', function (e){
                let country = $('.shift-another-country :selected').val();
                let state = $('.shift-another-state :selected').val();
                let city = $('.shift-another-city :selected').val();

                $('.coupon-country').val(country);
                $('.coupon-state').val(state);
                $('.coupon-city').val(city);

                getCountryStateBasedTotal(country, state, city);
            });

            $(document).on('change', '.billing_address_country, .billing_address_state, .billing_address_city', function (e){
                let country = $('.billing_address_country :selected').val();
                let state = $('.billing_address_state :selected').val();
                let city = $('.billing_address_city :selected').val();

                $('.coupon-country').val(country);
                $('.coupon-state').val(state);
                $('.coupon-city').val(city);

                getCountryStateBasedTotal(country, state, city);
            });

            $(document).on('click', 'input[name=shipping_method]', function (){
                let el = $(this);
                let shipping_method = el.val();
                let total = $('.price-total').attr('data-total');

                $('.shipping-method').val(shipping_method);

                if (total !== undefined)
                {
                    getShippingMethodBasedTotal(shipping_method, $('.coupon-country').val(), $('.coupon-state').val(), total);
                }
            });

            function getShippingMethodBasedTotal(shipping_method ,country, state, total) {
                let checkout_btn = $('.checkout_disable');
                checkout_btn.addClass('proceed_checkout_btn');
                checkout_btn.css({'background': 'var(--main-color-one)', 'border': '2px solid var(--main-color-one)', 'color': '#fff', 'cursor': 'pointer'});

                $.ajax({
                    url: '<?php echo e(route('tenant.shop.checkout.sync-product-shipping.ajax')); ?>',
                    type: 'GET',
                    data: {
                        shipping_method: shipping_method,
                        country: country,
                        state: state,
                        total: total
                    },beforeSend: () => {
                        $('.loader').show();
                    },
                    success: (data) => {
                        if (data.type === 'success')
                        {
                            let currency = '<?php echo e(site_currency_symbol()); ?>';
                            $('.price-shipping span').last().html(currency + data.selected_shipping_method.options.final_cost);
                            $('.price-total span').last().html(currency + data.total);
                            $('.loader').hide();

                            $('.coupon-shipping-method').val(shipping_method);
                        } else {
                            toastr.error(data.msg);
                            checkout_btn.css({'background': '#9d9d9d', 'border': '2px solid #9d9d9d', 'color': '#fff', 'cursor': 'not-allowed'});
                            checkout_btn.removeClass('proceed_checkout_btn');
                            $('.loader').hide();
                        }
                    },
                    error: () => {}
                });
            }

            function getCountryStateBasedTotal(country, state, city) {
                $.ajax({
                    url: '<?php echo e(route('tenant.shop.checkout.sync-product-total.ajax')); ?>',
                    type: 'GET',
                    data: {
                        country: country,
                        state: state,
                        city: city
                    },

                    beforeSend: () => {
                        $('.loader').show();
                    },
                    success: (data) => {
                        $('.shipping_method_wrapper').html(data.sync_price_total_markup);
                        $('.loader').hide();

                        $('.coupon-country').val(country);
                        $('.coupon-state').val(state);
                        $('.coupon-city').val(city);
                    },
                    error: () => {}
                });
            }

            $(document).on('click', '.coupon-btn', function (e){
                e.preventDefault();

                let coupon = $('.coupon-code').val();
                let country = $('.coupon-country').val();
                let state = $('.coupon-state').val();
                let shipping = $('.coupon-shipping-method').val();

                let user_coupon = $('.used_coupon');

                $.ajax({
                    url: '<?php echo e(route('tenant.shop.checkout.sync-product-coupon.ajax')); ?>',
                    type: 'GET',
                    data: {
                        coupon: coupon,
                        country: country,
                        state: state,
                        shipping_method: shipping
                    },

                    beforeSend: () => {
                        user_coupon.val('');
                        $('.loader').show();
                    },
                    success: (data) => {
                        if (data.type === 'error')
                        {
                            toastr.error(data.msg);
                        }

                        $('.loader').hide();

                        if (data.type === 'success')
                        {
                            let currency_symbol = '<?php echo e(site_currency_symbol()); ?>';
                            $('.price-total').attr('data-total', data.coupon_amount);
                            $('.price-total span').text(currency_symbol+data.coupon_amount);
                            $('.coupon-price span:last').text(currency_symbol+data.coupon_price);
                            user_coupon.val(coupon);

                            toastr.success(data.msg);
                        }
                    },
                    error: (error) => {
                        let responseData = error.responseJSON.errors;
                        $.each(responseData, function (index, value){
                            toastr.error(value);
                        });

                        $('.loader').hide();
                    }
                });
            });

            var defaulGateway = $('#site_global_payment_gateway').val();
            $('.payment-gateway-wrapper ul li[data-gateway="' + defaulGateway + '"]').addClass('selected');

            let customFormParent = $('.payment_gateway_extra_field_information_wrap');
            customFormParent.children().hide();

            $(document).on('click', '.payment-gateway-wrapper > ul > li', function (e) {
                e.preventDefault();

                let gateway = $(this).data('gateway');
                let manual_transaction_div = $('.manual_transaction_id');
                let manual_description = $('.manual_description');
                let summernot_wrap_div = $('.summernot_wrap');

                customFormParent.children().hide();
                if (gateway === 'manual_payment') {
                    manual_transaction_div.fadeIn();
                    summernot_wrap_div.fadeIn();
                    manual_transaction_div.removeClass('d-none');

                    manual_description.text($(this).data('description'));
                } else {
                    manual_transaction_div.addClass('d-none');
                    summernot_wrap_div.fadeOut();
                    manual_transaction_div.fadeOut();

                    let wrapper = customFormParent.find('#'+gateway+'-parent-wrapper');
                    if (wrapper.length > 0)
                    {
                        wrapper.fadeIn();
                    }
                }

                $(this).addClass('selected').siblings().removeClass('selected');
                $('.payment-gateway-wrapper').find(('input')).val($(this).data('gateway'));
                $('.payment_gateway_passing_clicking_name').val($(this).data('gateway'));
            });

            $(document).on('keyup', '.manual_transaction_id input[name=trasaction_id]', function (e){
                $('input[name=manual_trasaction_id]').val($(this).val());
            });

            $(document).on('click', '.cash-on-delivery #cash', function (){
                $('.payment-inlines').toggleClass('d-none');
                $('input[name=manual_trasaction_id]').val('');
                $('.payment_gateway_passing_clicking_name').val('');
                $('.payment-gateway-wrapper ul li').removeClass('selected');

                let cod = $('.cash_on_delivery').val();
                if (cod === '')
                {
                    $('.cash_on_delivery').val('on');
                } else {
                    $('.cash_on_delivery').val('');
                }
            });

            $(document).on('click', '.create-accounts', function (e){
                let need_account = $('.create_accounts_input');

                if(need_account.val() === '')
                {
                    need_account.val('on');
                } else {
                    need_account.val('');
                }

                $('.create-account-wrapper .checkout-form-open').toggleClass('active')
            });

            $(document).on('click', '.proceed_checkout_btn', function (e){
                e.preventDefault();

                let agreed = $('#agree:checked');
                if (agreed.length === 0)
                {
                    toastr.error('<?php echo e(__('You need to agree to our Terms & Conditions to complete the order')); ?>');
                    return ;
                }

                let shipping_selected = $('input[type=radio][name=shipping_method]');
                if (shipping_selected.length > 0)
                {
                    let checked = $(shipping_selected).is(':checked');
                    if (!checked)
                    {
                        toastr.error('<?php echo e(__('You have to select a shipping method to complete the order')); ?>');
                        return ;
                    }
                }

                $('form.checkout-form').trigger('submit');
            });

            $(document).on('change', 'select[name=shift_country], select[name=country]', function (e) {
                e.preventDefault();

                let country_id = $(this).val();

                $.post(`<?php echo e(route('tenant.admin.au.state.all')); ?>`,
                    {
                        _token: `<?php echo e(csrf_token()); ?>`,
                        country: country_id
                    },
                    function (data) {
                        let stateField = $('.stateField');
                        stateField.empty();
                        stateField.append(`<option value=""><?php echo e(__('Select a state')); ?></option>`);

                        let cityField = $('.cityField');
                        cityField.empty();
                        cityField.append(`<option value=""><?php echo e(__('Select a city')); ?></option>`);

                        $.each(data.states , function (index, value) {
                            stateField.append(
                                `<option value="${value.id}">${value.name}</option>`
                            );
                        });
                    }
                )
            });

            $(document).on('change', 'select[name=shift_state], select[name=state]', function (e) {
                e.preventDefault();

                let state_id = $(this).val();

                $.post(`<?php echo e(route('tenant.admin.au.city.all')); ?>`,
                    {
                        _token: `<?php echo e(csrf_token()); ?>`,
                        state: state_id
                    },
                    function (data) {
                        let cityField = $('.cityField');
                        cityField.empty();
                        cityField.append(`<option value=""><?php echo e(__('Select a city')); ?></option>`);

                        $.each(data.cities , function (index, value) {
                            cityField.append(
                                `<option value="${value.id}">${value.name}</option>`
                            );
                        });
                    }
                )
            });

            $(document).on('keyup', 'input[name=postal_code]', function () {
                let el = $(this);
                if(isNaN(el.val()))
                    el.val('');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(route_prefix().'frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/themes/aromatic/frontend/shop/checkout/checkout_page.blade.php ENDPATH**/ ?>