<?php $__env->startSection('title'); ?>
    <?php echo e($order_details->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('View Plan')); ?> <?php echo e(' : '.$order_details->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/toastr.css')); ?>">

    <style>
        .theme-wrapper {
            border: 1px solid transparent;
            outline: 1px solid transparent;
        }

        .selected_theme {
            transition: 0.3s;
            border-color: var(--main-color-one);
            outline-color: var(--main-color-one);
            padding: 10px;
        }

        .selected_text {
            top: 0;
            left: 11px;
            background-color: var(--main-color-one);
            padding: 15px;
            position: absolute;
            color: white;
            transition: 0.3s;
        }

        .selected_text i {
            font-size: 30px;
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
        .site-logo{
            width: 50%;
            margin-bottom: 30px;
        }
        .package-description p{
            text-align: justify;
            line-height: 28px;
            padding-inline: 3px;
        }
        #create-trial-account-button[disabled] {
            border-color: #2c2c2c;
            background: #2c2c2c;
            cursor: no-drop;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $user_lang = get_user_lang();
        $user = Auth::guard('web')->user();
    ?>

    
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

    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title margin-bottom-60">
                        <h2 class="title"><?php echo e($order_details->title); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                    <div class="price-plan-left-wrap">
                        <div class="price-header">
                            <h3 class="title"></h3>
                            <div class="price-wrap">
                                <span class="price"><?php echo e(amount_with_currency_symbol($order_details->price)); ?></span><br>
                                <span
                                    class="price-month mt-3"><?php echo e(\App\Enums\PricePlanTypEnums::getText($order_details->type)); ?></span>
                            </div>
                        </div>
                        <div class="price-footer btn-wrapper">
                            <?php if($trial): ?>
                                <?php
                                    if(Auth::guard('web')->check() != true)
                                        {
                                            $button_attr = 'data-bs-target="#loginModal"';
                                        } else {
                                            $button_attr = 'data-bs-target="#trialModal"';
                                        }
                                ?>
                                <a href="javascript:void(0)" class="cmn-btn cmn-btn-outline-one color-one mt-4"
                                   data-bs-toggle="modal" <?php echo $button_attr; ?>><?php echo e(__('Start Trial')); ?></a>

                            <?php else: ?>
                                <a href="<?php echo e(route('landlord.frontend.plan.order',$order_details->id)); ?>"
                                   class="cmn-btn cmn-btn-outline-one color-one mt-4"><?php echo e(__('Buy Now')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="price-plan-left-wrap mt-4">
                        <div class="price-body">
                            <ul class="features ps-2 pb-2">
                                <p class="font-weight-bold"><?php echo e(__('Limitations')); ?></p>

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
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-8">
                    <div class="single-price-plan-item price-plan-two">
                        <div class="price-body features-view-all">
                            <div class="row">
                                <div class="col-lg-2">
                                    <ul class="features">
                                        <?php $__currentLoopData = $order_details->plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->first): ?>
                                                <p class="font-weight-bold"><?php echo e(__('Features')); ?></p>
                                            <?php endif; ?>
                                            <li class="check"> <?php echo e(__(str_replace('_', ' ',ucwords($item->feature_name))) ?? ''); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>

                                <div class="col-lg-10">
                                    <div class="package-description mt-4 px-3">
                                        <p><?php echo e($order_details->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $faq_items = !empty($order_details->faq) ? unserialize($order_details->faq,['class' => false]) : ['title' => []];
                         $rand_number = rand(9999,99999999);
                    ?>
                    <?php if(!empty(current($faq_items['title'])) ): ?>
                        <div class="accordion-wrapper mt-5">
                            <h3 class="title my-3"><?php echo e(__('General Question')); ?></h3>
                            <div id="accordion_<?php echo e($rand_number); ?>" class="mt-4">
                                <?php $__currentLoopData = $faq_items['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $aria_expanded = 'false';
                                    ?>
                                    <div class="card my-2" itemscope itemprop="mainEntity"
                                         itemtype="https://schema.org/Question">
                                        <div class="card-header" id="headingOne_<?php echo e($loop->index); ?>"
                                             itemprop="name">
                                            <h5 class="mb-0">
                                                <a data-bs-toggle="collapse"
                                                   data-bs-target="#collapseOne_<?php echo e($loop->index); ?>" role="button"
                                                   aria-expanded="<?php echo e($aria_expanded); ?>"
                                                   aria-controls="collapseOne_<?php echo e($loop->index); ?>">
                                                    <?php echo e(purify_html($faq)); ?>

                                                </a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne_<?php echo e($loop->index); ?>"
                                             class="collapse <?php echo e($loop->index == 0 ? 'show' : ''); ?> "
                                             aria-labelledby="headingOne_<?php echo e($loop->index); ?>"
                                             data-parent="#accordion_<?php echo e($rand_number); ?>" itemscope
                                             itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                            <div class="card-body" itemprop="text">
                                                <?php echo e(purify_html($faq_items['description'][$loop->index] ?? '')); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="row my-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3><?php echo e(__('Select Theme')); ?></h3>

                    <div class="row theme-row mt-5">
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

                                if ($loop->first)
                                {
                                    $default_selected_theme = $theme_slug;
                                }
                            ?>

                            <div class="col-3" style="position: relative">
                                <div class="theme-wrapper <?php echo e($loop->first ? 'selected_theme' : ''); ?>"
                                     data-theme="<?php echo e($theme_data['slug']); ?>" data-name="<?php echo e(!empty($theme_custom_name) ? $theme_custom_name : $theme_data['name']); ?>">
                                    <div class="theme-wrapper-bg" style="background-image: url(<?php echo e(!empty($theme_custom_image) ? $theme_custom_image : $theme_image); ?>)"></div>
                                    <h4 class="text-center mt-2"><?php echo e(!empty($theme_custom_name) ? $theme_custom_name : $theme_data['name']); ?></h4>

                                    <?php if($loop->first): ?>
                                        <h4 class="selected_text"><i class="las la-check-circle"></i></h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo site-logo">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                        </div>
                        <h4><?php echo e(__('Hello! let us get started')); ?></h4>
                        <h6 class="font-weight-light"><?php echo e(__('Sign in to continue.')); ?></h6>
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
                        <div id="msg-wrapper"></div>
                        <div class="error-box mt-3 d-none">
                            <ul class="alert alert-danger"></ul>
                        </div>
                        <form class="pt-3" action="" method="post" id="login_form_order_page">
                            <div class="form-group single-input">
                                <input type="email" name="username" class="form-control form--control form-control-lg"
                                       placeholder="<?php echo e(__('Username')); ?>">
                            </div>
                            <div class="form-group single-input mt-4">
                                <input type="password" name="password"
                                       class="form-control form--control form-control-lg"
                                       placeholder="<?php echo e(__('Password')); ?>">
                            </div>
                            <div class="btn-wrapper mt-4">
                                <button type="submit"
                                        class="cmn-btn cmn-btn-bg-1 cmn-btn-small"
                                        id="login_btn"><?php echo e(__('SIGN IN')); ?></button>
                            </div>
                            <div class="mt-4 d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inlines">
                                    <input class="check-input" type="checkbox" id="check15">
                                    <label class="form-check-label text-muted" id="check15">
                                        <?php echo e(__('Keep me signed in')); ?>

                                    </label>
                                </div>
                                <a href="<?php echo e(route('tenant.user.forget.password')); ?>" class="auth-link text-black"><?php echo e(__('Forgot password?')); ?></a>
                            </div>
                            <div class="text-left mt-4 font-weight-light"> <?php echo e(__('Do not have an account?')); ?> <a
                                    href="<?php echo e(route('landlord.user.register')); ?>?p=<?php echo e($order_details->id); ?>" class="color-one"><?php echo e(__('Create')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(Auth::guard('web')->check()): ?>
        <div class="modal fade" id="trialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Start Trial')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-wrap"></div>
                            </div>
                        </div>

                        <div class="row">
                            <?php
                                $site_name = env('APP_URL');
                            ?>
                            <div class="col-6">
                                <h5><?php echo e(__('Personal Information')); ?></h5>
                                <hr>
                                <p><strong><?php echo e(__('Name:')); ?></strong> <span><?php echo e($user->name); ?></span></p>
                                <p><strong><?php echo e(__('Email:')); ?></strong> <span><?php echo e($user->email); ?></span></p>
                                <p class="mt-4"><?php echo e(__('Subdomain:')); ?> <input class="form--control" type="text"
                                                                            name="subdomain" autocomplete="off" value=""
                                                                            placeholder="<?php echo e(__("example.{$site_name}")); ?>"
                                                                            style="border:0;border-bottom: 1px solid #595959; width: 60%">
                                </p>
                                <div id="subdomain-wrap"></div>
                            </div>

                            <div class="col-6">
                                <h5><?php echo e(__('Package Information')); ?></h5>
                                <hr>
                                <p><strong><?php echo e(__('Plan:')); ?></strong> <span><?php echo e($order_details->title); ?></span></p>
                                <p><strong><?php echo e(__('Price:')); ?></strong>
                                    <span><?php echo e(float_amount_with_currency_symbol($order_details->price)); ?></span></p>
                                <p><strong><?php echo e(__('Trial:')); ?></strong> <span class="text-capitalize"><?php echo e($order_details->trial_days); ?> <?php echo e(__('days')); ?></span>
                                </p>
                                <p class="modal_theme"><strong><?php echo e(__('Theme:')); ?></strong> <span></span></p>
                            </div>

                            <form action="" class="mt-5" method="POST">
                                <input type="hidden" name="user_id" id="user-id" value="<?php echo e($user->id); ?>">
                                <input type="hidden" name="order_id" id="order-id" value="<?php echo e($order_details->id); ?>">
                                <input type="hidden" name="theme_slug" id="theme-slug" value="<?php echo e($default_selected_theme ?? get_static_option('default_theme')); ?>">

                                <div class="parent d-flex justify-content-end btn-wrapper">
                                    <button type="button" class="cmn-btn cmn-btn-bg-1 cmn-btn-small"
                                            id="create-trial-account-button">
                                        <?php echo e(__('Create Website')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(global_asset('assets/common/js/toastr.min.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.landloard-unique-subdomain-check','data' => ['name' => 'subdomain']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.landloard-unique-subdomain-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('subdomain')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    //subdomain check

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function ($) {
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
                        type: 'post',
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
                            formContainer = $('.error-box');
                            formContainer.find('li').remove();
                            formContainer.removeClass('d-none');

                            $.each(response, function (value, index) {
                                formContainer.find('ul').append('<li>' + index + '</li>');
                            });
                            el.text('<?php echo e(__("Login")); ?>');
                        }
                    });
                });

                var defaulGateway = $('#site_global_payment_gateway').val();
                $('.payment-gateway-wrapper ul li[data-gateway="' + defaulGateway + '"]').addClass('selected');

                $(document).on('click', '.payment-gateway-wrapper > ul > li', function (e) {
                    e.preventDefault();

                    let gateway = $(this).data('gateway');
                    if (gateway === 'manual_payment') {
                        $('.manual_transaction_id').removeClass('d-none');
                    } else {
                        $('.manual_transaction_id').addClass('d-none');
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

                $(document).on('click', '#create-trial-account-button', function (e) {
                    e.preventDefault();
                    var timer = "";
                    var submit_button = $('#create-trial-account-button');
                    var text = ['<?php echo e(__('Creating Account...')); ?>', '<?php echo e(__('Creating Database...')); ?>', '<?php echo e(__('Creating Designs...')); ?>', '<?php echo e(__('Getting Ready...')); ?>', '<?php echo e(__('Your Account is Ready...')); ?>'];

                    let i = 1;

                    function buttonLoop(isRunning) {
                        if (isRunning) {
                            timer = setTimeout(function () {
                                submit_button.text(text[i]);
                                if (i < 5) {
                                    buttonLoop(true);
                                }
                                i++;
                            }, 1500)
                        } else {
                            clearTimeout(timer);
                        }
                    }

                    let user_id = $('#user-id').val();
                    let order_id = $('#order-id').val();
                    let subdomain = $('input[name=subdomain]').val();
                    let theme = $('input[name=theme_slug]').val();

                    let formContainer = $('.modal-body');

                    let loader = $('.loader');
                    $.ajax({
                        type: 'post',
                        url: "<?php echo e(route('landlord.frontend.trial.account')); ?>",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            user_id: user_id,
                            order_id: order_id,
                            subdomain: subdomain,
                            theme: theme
                        },
                        beforeSend: function () {
                            loader.show();
                            loader.find('.loader_bottom_title').text('<?php echo e(__('Your trial account is on its way. Why don’t you grab a coffee?')); ?>');
                            submit_button.prop('disabled', true);
                            submit_button.text(text[0]);

                            buttonLoop(true);
                        },
                        success: function (data) {
                            buttonLoop(false);
                            console.log('geldi')
                            console.log(data);
                            if (data.type === 'success') {
                                loader.find('.loader_bottom_title').fadeOut();
                                loader.find('.loader_bottom_title').fadeIn();
                                loader.find('.loader_bottom_title').text('<?php echo e(__('Yeaah! Your account is ready. Lets check it out')); ?>');
                                submit_button.parent().after(text);
                                setTimeout(function () {
                                    // location.href = data.url;
                                    location.href = data.success_url;
                                }, 3000);
                            } else if (data.type === 'danger') {
                                loader.hide();
                                formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                                formContainer.find('.error-wrap ul').append('<li>' + data.msg + '</li>')
                                $('input[name=subdomain]').val('');

                                submit_button.text('Create Website');
                                submit_button.prop('disabled', false);
                            }
                        },
                        error: function (data) {
                            console.log('geldiiii:', data)
                            console.log(data)

                            if (data.status === 200) {
                                $('.loader').hide();
                                loader.find('.loader_bottom_title').fadeOut();
                                loader.find('.loader_bottom_title').fadeIn();
                                loader.find('.loader_bottom_title').text('<?php echo e(__('Yeaah! Your account is ready. Lets check it out')); ?>');
                                submit_button.parent().after(text);
                                setTimeout(function () {
                                    // location.href = data.url;
                                    location.href = '<?php echo e(route('landlord.user.home')); ?>';
                                }, 1000);
                            }

                            let i = 0;
                            buttonLoop(false);

                            submit_button.text('Create Account');
                            submit_button.prop('disabled', false);

                            var response = data.responseJSON.errors
                            formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                            $.each(response, function (value, index) {
                                formContainer.find('.error-wrap ul').append('<li> <span>' + ++i + '.</span> ' + index + '</li>');
                            });
                        }
                    });
                });

                let row = $('.theme-row');
                let col = row.children('.col-3').first();
                let name = col.find('.theme-wrapper').data('name');
                $('p.modal_theme').find('span').text(name);


                $(document).on('click', '.theme-wrapper', function (e) {
                    let el = $(this);
                    let theme_slug = el.data('theme');
                    let theme_name = el.data('name');

                    $('.theme-wrapper').removeClass('selected_theme');
                    el.addClass('selected_theme');

                    let text = '<h4 class="selected_text"><i class="las la-check-circle"></i></h4>';
                    $('.selected_text').remove();
                    el.append(text);

                    $('input#theme-slug').val(theme_slug);
                    $('p.modal_theme').find('span').text(theme_name);
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/pages/package/view-plan.blade.php ENDPATH**/ ?>