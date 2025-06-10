<?php $__env->startSection('title'); ?>
    <?php echo e($order_details->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order For')); ?> <?php echo e(' : '.$order_details->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/toastr.css')); ?>">

    <style>
        .add_new-domain {
            margin-bottom: 10px;
        }

        .add_new-domain i {
            border: 2px solid #00000052;
            padding: 0 20px;
            font-size: 30px;
            border-radius: 5px;
            color: #00000073;
        }

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

        @media only screen and (max-width: 375px) {
            /*.payment-gateway-wrapper ul li {*/
            /*    width: calc(100% / 3);*/
            /*}*/
        }


        .payment-gateway-wrapper ul li.selected:after, .payment-gateway-wrapper ul li.selected:before {
            visibility: visible;
            opacity: 1;
        }

        .payment-gateway-wrapper ul li:before {
            border: 2px solid var(--main-color-one);
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
            background-color: var(--main-color-one);
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

        .plan_warning small {
            font-size: 15px;
        }

        .order-btn:disabled {
            background-color: transparent;
            color: var(--main-color-one);
            border: 2px solid var(--main-color-one);
        }

        .loader.loader_page_single {
            z-index: 999999;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .9);
            position: fixed;
            display: none;
        }

        .loader_bottom_title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 80px;
            width: 100%;
            text-align: center;
        }

        .alert_list_inline {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .alert_list_inline .close {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            color: red;
            font-size: 20px;
            height: 30px;
            width: 30px;
            border: 0;
            outline: none;
        }

        .input-group-text {
            background: #fff;
        }

        .package-description p {
            text-align: justify;
            line-height: 28px;
            padding-inline: 3px;
        }

        .theme-wrapper-bg {
            height: 200px;
        }

        .theme-wrapper {
            border: 1px solid transparent;
            outline: 1px solid transparent;
            padding: 10px;
        }

        .selected_theme {
            transition: 0.5s;
            border-color: var(--main-color-one);
            outline-color: var(--main-color-one);
        }

        .selected_text {
            top: 0;
            left: 11px;
            background-color: var(--main-color-one);
            padding: 10px;
            position: absolute;
            color: white;
            transition: 0.3s;
        }

        .selected_text i {
            font-size: 20px;
        }

        #coupon-form button {
            background-color: var(--main-color-four);
            border-color: var(--main-color-four);
        }

        #coupon-form button:hover {
            color: var(--main-color-four);
            background-color: transparent;
        }
        .del-amount{
            font-size: 20px;
            margin-left: 5px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="loader loader_page_single">
        <div class="loader_wrapper">
            <div class="loader-01">
                <span class="loader__icon loader__icon--one"></span>
                <span class="loader__icon loader__icon--two"></span>
                <span class="loader__icon loader__icon--three"></span>
                <span class="loader__icon loader__icon--four"></span>
            </div>
            <h3 class="loader_bottom_title"></h3>
        </div>
    </div>

    <section class="order-service-page-content-area padding-top-70 padding-bottom-100">
        <div class="container">
            <div class="row gx-5 reorder-xs justify-content-between">
                <div class="col-lg-8 mt-4">
                    <div class="order-content-area">
                        <div class="package-description mb-5">
                            <h4 class="mb-2"><?php echo e($order_details->title); ?></h4>
                            <p style="font-weight: 600"><?php echo e($order_details->description); ?></p>
                        </div>

                        <h3 class="signin-contents-title"><?php echo e(get_static_option('order_page_form_title')); ?></h3>

                        <?php if(count($payment_old_data) > 0): ?>
                            <h5 class="text-left mt-1 mb-4 mt-4 alert alert-primary plan_warning">
                                <?php if(count($payment_old_data) == 1): ?>
                                    <small><?php echo e(__('You have already subscribed a plan. If you purchase any package than your old package will be replaced with extended validity!!')); ?></small>
                                <?php else: ?>
                                    <small><?php echo e(__('You have already subscribed multiple plans. If you purchase any package than your old package will be replaced with extended validity!!')); ?></small>
                                <?php endif; ?>
                            </h5>
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

                        <?php if(!auth()->guard('web')->check()): ?>
                            <div class="login-form custom--form mt-4">
                                <form action="" method="POST" enctype="multipart/form-data"
                                      class="contact-page-form style-01" id="login_form_order_page">
                                    <div class="alert alert-warning alert-block text-center">
                                        <strong><?php echo e(__('You must login or create an account to order your package!')); ?></strong>
                                    </div>
                                    <div class="error-wrap"></div>
                                    <div class="form-group single-input">
                                        <input type="text" name="username" class="form-control form--control"
                                               placeholder="<?php echo e(__('Username')); ?>">
                                    </div>
                                    <div class="form-group single-input mt-4">
                                        <input type="password" name="password" class="form-control form--control"
                                               placeholder="<?php echo e(__('Password')); ?>">
                                    </div>
                                    <div class="form-group btn-wrapper single-input mt-4">
                                        <button class="cmn-btn cmn-btn-bg-1 w-100" id="login_btn"
                                                type="submit"><?php echo e(__('Login')); ?></button>
                                    </div>
                                    <div class="form-group single-input mt-4 rmber-area">
                                        <div class="box-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <div class="checkbox-inlines">
                                                    <input type="checkbox" name="remember"
                                                           class="custom-control-input check-input" id="remember">
                                                    <label class="custom-control-label checkbox-label"
                                                           for="remember"><?php echo e(__('Remember Me')); ?></label>
                                                </div>
                                            </div>
                                            <a href="<?php echo e(route('tenant.user.forget.password')); ?>"
                                               class="forgot-btn color-one"><?php echo e(__('Forgot Password?')); ?></a>
                                        </div>
                                    </div>
                                    <div class="form-group single-input mt-4">
                                        <a class="d-block"
                                           href="<?php echo e(route('tenant.user.register')); ?>"><?php echo e(__('Create new account?')); ?></a>
                                    </div>
                                </form>
                            </div>
                        <?php else: ?>

                            <form action="<?php echo e(route('landlord.frontend.order.payment.form')); ?>" method="post"
                                  enctype="multipart/form-data"
                                  class="contact-page-form style-01 custom--form order-form">
                                <?php echo csrf_field(); ?>
                                <?php
                                    $custom_fields = unserialize($order_details->custom_fields);
                                    $payment_gateway = !empty($custom_fields['selected_payment_gateway']) ? $custom_fields['selected_payment_gateway'] : '';
                                    $name = auth()->guard('web')->check() ? auth()->guard('web')->user()->name : '';
                                    $email = auth()->guard('web')->check() ? auth()->guard('web')->user()->email : '';

                                    $default_theme = get_static_option('default_theme');
                                ?>

                                <input type="hidden" name="theme_slug" id="theme-slug" value="<?php echo e($default_theme); ?>">
                                <input type="hidden" name="payment_gateway" value=""
                                       class="payment_gateway_passing_clicking_name">
                                <input type="hidden" name="package_id" value="<?php echo e($order_details->id); ?>">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group single-input">
                                            <label for="name" class="label-title mb-3"><?php echo e(__('Type Name')); ?></label>
                                            <input type="text" id="name" name="name"
                                                   value="<?php echo e(auth()->guard('web')->user()->name); ?>"
                                                   class="form-control form--control"
                                                   placeholder="<?php echo e(__('Name')); ?>" readonly>
                                        </div>
                                        <div class="form-group single-input mt-4">
                                            <label for="email" class="label-title mb-3"><?php echo e(__('Type Email')); ?></label>
                                            <input type="email" id="email" name="email"
                                                   value="<?php echo e(auth()->guard('web')->user()->email); ?>"
                                                   class="form-control form--control" placeholder="<?php echo e(__('Your Email')); ?>"
                                                   readonly>
                                        </div>

                                        <div class="form-group single-input mt-4">
                                            <?php if(auth()->guard('web')->check()): ?>
                                                <?php
                                                    $user = Auth::guard('web')->user();
                                                ?>
                                            <?php endif; ?>

                                            <label for="subdomain"
                                                   class="label-title mb-3"><?php echo e(__('Add new subdomain')); ?></label>
                                            <select class="form-select form--control subdomain" id="subdomain"
                                                    name="subdomain">
                                                <option
                                                    value="custom_domain__dd"
                                                    selected><?php echo e(__('Add new subdomain')); ?></option>
                                                <?php $__currentLoopData = $user->tenant_details ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        value="<?php echo e($tenant->id); ?>"><?php echo e(optional($tenant->domain)->domain); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group custom_subdomain_wrapper mt-3 mb-4">
                                            <label for="custom-subdomain"
                                                   class="label-title mb-3"><?php echo e(__('Add new subdomain')); ?></label>

                                            <div class="input-group mb-3">
                                                <?php
                                                    $base_url = str_replace(['http://','https://'], '', url('/'));
                                                ?>
                                                <input type="text" class="form-control custom_subdomain"
                                                       id="custom-subdomain" name="custom_subdomain"
                                                       placeholder="<?php echo e(__('Subdomain')); ?>" aria-label="Subdomain"
                                                       aria-describedby="basic-addon2" autocomplete="off" value="">
                                                <span class="input-group-text text-white"
                                                      style="background: var(--main-color-one);border: 2px solid var(--main-color-one)"
                                                      id="basic-addon2">.<?php echo e($base_url); ?></span>
                                            </div>

                                            <div id="subdomain-wrap"></div>
                                        </div>

                                        <div class="theme-section">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="mb-3"><?php echo e(__('Themes')); ?></h4>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div
                                                class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 theme-row mb-5">

                                                <?php
                                                    $theme_list = $order_details?->plan_themes?->pluck('theme_slug')->toArray() ?? [];
                                                ?>
                                                <?php $__currentLoopData = getPricePlanBasedAllThemeData($theme_list); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $theme_slug = $theme->slug;
                                                        $theme_data = getIndividualThemeDetails($theme_slug);
                                                        $theme_image = loadScreenshot($theme_slug);

                                                        $theme_custom_name = get_static_option_central($theme_data['slug'].'_theme_name');
                                                        $theme_custom_url = get_static_option_central($theme_data['slug'].'_theme_url');
                                                        $theme_custom_image = get_static_option_central($theme_data['slug'].'_theme_image');
                                                    ?>

                                                    <div class="col" style="position: relative">
                                                        <div
                                                            class="theme-wrapper <?php echo e($default_theme == $theme_slug ? 'selected_theme' : ''); ?>"
                                                            data-theme="<?php echo e($theme_data['slug']); ?>"
                                                            data-name="<?php echo e(!empty($theme_custom_name) ? $theme_custom_name : $theme_data['name']); ?>">
                                                            <div class="theme-wrapper-bg"
                                                                 style="background-image: url(<?php echo e(!empty($theme_custom_image) ? $theme_custom_image : $theme_image); ?>)"></div>
                                                            <h4 class="text-center mt-2"><?php echo e(!empty($theme_custom_name) ? $theme_custom_name : $theme_data['name']); ?></h4>

                                                            <?php if($default_theme == $theme_slug): ?>
                                                                <h4 class="selected_text"><i class="las la-check"></i>
                                                                </h4>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>

                                        <?php if($order_details->price != 0): ?>
                                            <div class="mt-5">
                                                <?php echo (new \App\Helpers\PaymentGatewayRenderHelper())->renderPaymentGatewayForForm(); ?>

                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group single-input d-none manual_transaction_id mt-4">
                                            <?php if(!empty($payment_gateways)): ?>
                                                <p class="alert alert-info "><?php echo e(json_decode($payment_gateways->credentials)->description ?? ''); ?></p>
                                            <?php endif; ?>

                                            <input type="text" name="trasaction_id"
                                                   class="form-control form--control mt-2"
                                                   placeholder="<?php echo e(__('Transaction ID')); ?>">

                                            <input type="file" name="trasaction_attachment"
                                                   class="form-control form--control mt-2"
                                                   placeholder="<?php echo e(__('Transaction Attachment')); ?>" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-5">
                                        <div
                                            class="coupon_amount_wrapper d-flex justify-content-between align-items-end">
                                            <div class="coupon_input_wrapper">
                                                <div class="form-group">
                                                    <label for="coupon-form"><?php echo e(__('Have a coupon?')); ?></label>
                                                    <div class="coupon-form mt-2 d-flex gap-2" id="coupon-form">
                                                        <input name="coupon" class="form-control" id="coupon"
                                                               type="text" placeholder="<?php echo e(__('Enter coupon code')); ?>" value="<?php echo e(old('coupon')); ?>">
                                                        <button type="button" class="btn btn-primary"><?php echo e(__('Apply')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="total-price"><?php echo e(__('Total:')); ?> <span><?php echo e(amount_with_currency_symbol($order_details->price)); ?></span></h3>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-5">
                                        <div class="form-group btn-wrapper text-end">
                                            <button class="boxed-btn btn-saas btn-block order-btn cmn-btn cmn-btn-bg-1"
                                                    type="submit"><?php echo e(__('Order Package')); ?></button>
                                        </div>
                                        <div class="text-end mt-2">
                                            <input name="terms_condition" id="terms_condition" class="terms_condition"
                                                   type="checkbox">
                                            <label
                                                for="terms_condition"><?php echo e(__('I have read and agree to the website terms and conditions')); ?>

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
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-4 mt-4">
                    <div class="single-price-plan-item">
                        <div class="price-header">
                            <h3 class="title mb-4"><?php echo e($order_details->title); ?></h3>
                            <div class="price-wrap"><span
                                    class="price"><?php echo e(amount_with_currency_symbol($order_details->price)); ?></span><?php echo e($order_details->period); ?>

                            </div>
                        </div>

                        <div class="price-body features-view-all mt-4">
                            <ul class="features">
                                <?php if(!empty($order_details->page_permission_feature)): ?>
                                    <?php
                                        $page_permission_feature = $order_details->page_permission_feature > 0 ? $order_details->page_permission_feature : __('Unlimited');
                                    ?>
                                    <li class="check"> <?php echo e(__(sprintf('Page %s', $page_permission_feature))); ?></li>
                                <?php endif; ?>

                                <?php if(!empty($order_details->blog_permission_feature)): ?>
                                    <?php
                                        $blog_permission_feature = $order_details->blog_permission_feature > 0 ? $order_details->blog_permission_feature : __('Unlimited');
                                    ?>
                                    <li class="check"> <?php echo e(__(sprintf('Blog %s', $blog_permission_feature))); ?></li>
                                <?php endif; ?>

                                <?php if(!empty($order_details->product_permission_feature)): ?>
                                    <?php
                                        $product_permission_feature = $order_details->product_permission_feature > 0 ? $order_details->product_permission_feature : __('Unlimited');
                                    ?>
                                    <li class="check"> <?php echo e(__(sprintf('Product %s', $product_permission_feature))); ?></li>
                                <?php endif; ?>

                                <?php if(!empty($order_details->storage_permission_feature)): ?>
                                    <?php
                                        $storage_permission_feature = $order_details->storage_permission_feature > 0 ? [$order_details->storage_permission_feature, 'MB']: [__('Unlimited'), ''];
                                    ?>
                                    <li class="check"> <?php echo e(__(sprintf('Storage %s %s', current($storage_permission_feature), last($storage_permission_feature)))); ?></li>
                                <?php endif; ?>

                                <?php $__currentLoopData = $order_details->plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->first): ?>
                                        <p class="mt-4 font-weight-bold"><?php echo e(__('Features')); ?></p>
                                    <?php endif; ?>
                                    <li class="check"> <?php echo e(__(str_replace('_', ' ',ucfirst($item->feature_name))) ?? ''); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <div class="price-footer pb-0">
                            <?php
                                $validity = match ($order_details->type)
                                {
                                    0 => __('1 Month'),
                                    1 => __('1 Year'),
                                    2 => __('Lifetime')
                                }
                            ?>
                            <h4 class="mt-4">
                                <span><?php echo e(__('Validity:')); ?></span>
                                <span><?php echo e($validity); ?></span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(global_asset('assets/js/helpers.js')); ?>"></script>
    <script src="<?php echo e(global_asset('assets/common/js/toastr.min.js')); ?>"></script>
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
        (function ($) {
            "use strict";
            $(document).ready(function ($) {
                const priceCoupon = {
                    code: '',
                    old_price: `<?php echo e($order_details->price); ?>`,
                    old_price_with_symbol: ``,
                    new_price: `<?php echo e($order_details->price); ?>`,
                    final_price: `<?php echo e($order_details->price); ?>`,
                    type: '',
                    amount: '',
                    currency: `<?php echo e(site_currency_symbol()); ?>`,
                    currency_position: `<?php echo e(get_static_option('site_currency_symbol_position')); ?>`
                };

                $(document).on('click', '#coupon-form button', function () {
                    let el = $(this);
                    let coupon_code = $('input[name=coupon]').val();
                    if (coupon_code === '')
                    {
                        toastr.error(`<?php echo e(__('Please enter a valid coupon')); ?>`);
                        return;
                    }

                    send_ajax_request('GET', {coupon: coupon_code}, `<?php echo e(route('landlord.frontend.coupon.apply')); ?>?coupon=${coupon_code}`, function () {
                        el.attr('disabled', true);
                        el.text(`<?php echo e(__('Applying')); ?>`);
                    }, function (response) {
                        if (response.type === 'success')
                        {
                            priceCoupon.type = response.data.discount_type;
                            priceCoupon.amount = response.data.discount_amount;

                            applyCouponPrice(priceCoupon)

                            let markup_amount = $('.total-price span');
                            markup_amount.text(priceCoupon.final_price);

                            markup_amount.closest('.del-amount').remove();
                            markup_amount.after(`<span class="del-amount"><del>${priceCoupon.old_price_with_symbol}</del></span>`)

                            $('input[name=coupon]').prop('readonly', true);
                            el.text(`<?php echo e(__('Applied')); ?>`);
                            toastr.success(`<?php echo e(__('Coupon applied')); ?>`);
                        } else {
                            toastr.error(response.msg);
                            el.text(`<?php echo e(__('Apply')); ?>`);
                            el.attr('disabled', false);
                        }
                    }, function (response) {
                        el.attr('disabled', false);
                        el.text(`<?php echo e(__('Apply')); ?>`);
                    });
                });

                $(document).on('click', '#order_pkg_btn', function () {
                    var name = $("#order_name").val()
                    var email = $("#order_email").val()
                    sessionStorage.pkg_user_name = name;
                    sessionStorage.pkg_user_email = email;
                })

                $(document).on('click', '#login_btn', function (e) {
                    e.preventDefault();

                    var formContainer = $('#login_form_order_page');
                    var el = $(this);
                    var username = formContainer.find('input[name="username"]').val();
                    var password = formContainer.find('input[name="password"]').val();
                    var remember = formContainer.find('input[name="remember"]').val();

                    el.text('<?php echo e(__("Please Wait")); ?>');

                    $.ajax({
                        type: 'POST',
                        url: "<?php echo e(route('landlord.user.ajax.login')); ?>",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            username: username,
                            password: password,
                            remember: remember,
                        },
                        success: function (data) {
                            if (data.status == 'invalid') {
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

                var defaulGateway = $('#site_global_payment_gateway').val();
                $('.payment-gateway-wrapper ul li[data-gateway="' + defaulGateway + '"]').addClass('selected');

                let customFormParent = $('.payment_gateway_extra_field_information_wrap');
                customFormParent.children().hide();

                $(document).on('click', '.payment-gateway-wrapper > ul > li', function (e) {
                    e.preventDefault();

                    let gateway = $(this).data('gateway');
                    let manual_transaction_div = $('.manual_transaction_id');
                    let summernot_wrap_div = $('.summernot_wrap');

                    customFormParent.children().hide();
                    if (gateway === 'manual_payment') {
                        manual_transaction_div.fadeIn();
                        summernot_wrap_div.fadeIn();
                        manual_transaction_div.removeClass('d-none');
                    } else {
                        manual_transaction_div.addClass('d-none');
                        summernot_wrap_div.fadeOut();
                        manual_transaction_div.fadeOut();

                        let wrapper = customFormParent.find('#' + gateway + '-parent-wrapper');
                        if (wrapper.length > 0) {
                            wrapper.fadeIn();
                        }
                    }

                    $(this).addClass('selected').siblings().removeClass('selected');
                    $('.payment-gateway-wrapper').find(('input')).val($(this).data('gateway'));
                    $('.payment_gateway_passing_clicking_name').val($(this).data('gateway'));
                });

                $(document).on('change', '#guest_logout', function (e) {
                    e.preventDefault();
                    var infoTab = $('#nav-profile-tab');
                    var nextBtn = $('.next-step-button');
                    if ($(this).is(':checked')) {
                        $('.login-form').hide();
                        infoTab.attr('disabled', false).removeClass('disabled');
                        nextBtn.show();
                    } else {
                        $('.login-form').show();
                        infoTab.attr('disabled', true).addClass('disabled');
                        nextBtn.hide();
                    }
                });

                $(document).on('click', '.next-step-button', function (e) {
                    var infoTab = $('#nav-profile-tab');
                    infoTab.attr('disabled', false).removeClass('disabled').addClass('active').siblings().removeClass('active');
                    $('#nav-profile').addClass('show active').siblings().removeClass('show active');
                });

                let custom_subdomain_wrapper = $('.custom_subdomain_wrapper');
                $(document).on('change', '#subdomain', function (e) {
                    $('.order-btn').attr('disabled', false)

                    let theme_section = $('.theme-section');

                    let el = $(this);
                    let subdomain_type = el.val();

                    if (subdomain_type == 'custom_domain__dd') {
                        custom_subdomain_wrapper.slideDown();
                        theme_section.slideDown();
                    } else {
                        custom_subdomain_wrapper.slideUp();
                        custom_subdomain_wrapper.find('input').val('');
                        theme_section.slideUp();
                    }
                });

                $(document).on('click', '.order-btn', function (e) {
                    let terms_condition = $(".terms_condition").is(':checked');
                    if (!terms_condition)
                    {
                        toastr.error(`<?php echo e(__('To proceed, you must check the box indicating that you agree to our terms and conditions.')); ?>`);
                        e.preventDefault();
                        return "";
                    }

                    $('.loader').show();
                    $('.loader .loader_bottom_title').text('<?php echo e(__('Your account is on its way. Why don’t you grab a coffee?')); ?>');
                    $(this).attr('disabled', true);
                    $('.order-form').trigger('submit');
                });

                $(document).on('click', '.theme-wrapper', function (e) {
                    let el = $(this);
                    let theme_slug = el.data('theme');

                    $('.theme-wrapper').removeClass('selected_theme');
                    el.addClass('selected_theme');

                    let text = '<h4 class="selected_text"><i class="las la-check"></i></h4>';
                    $('.selected_text').remove();
                    el.append(text);

                    $('input#theme-slug').val(theme_slug);
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/pages/package/order-page.blade.php ENDPATH**/ ?>