









<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/site_style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/responsive.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/jquery-ui.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/swiper.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/flag-icon.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/aos.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/modules_style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(global_asset('assets/landlord/frontend/css/fruit/category_style.css')); ?>">


<style>
    body {
        overflow-y: hidden;
    }

    .accounts, .cart-shopping > a.icon, .login-account .accounts i {
        color: #56C096 !important;
    }

    .cart-shopping > a.icon-notification {
        background: #56C096 !important;
    }
</style>


<div class="header-main-div" style="background-color: #ffffff; font-family : 'Open Sans',Sans-serif ;">

    <div class="header-mobile-view">  <!-- HTML Modül !--> <!--  <========SON=========>>> HTML Modül SON !-->
        <div class="mobile-header-main-area ">
            <div class="mobile-header-main-ust">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="mobile-header-logo">
                        <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php if(!empty(get_static_option('site_white_logo'))): ?>
                                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                                <?php else: ?>
                                    <h2 class="site-title"><?php echo e(filter_static_option_value('site_title', $global_static_field_data)); ?></h2>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="mobile-header-logo-tablet-pro">
                        <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php if(!empty(get_static_option('site_white_logo'))): ?>
                                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                                <?php else: ?>
                                    <h2 class="site-title"><?php echo e(filter_static_option_value('site_title', $global_static_field_data)); ?></h2>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mobile-header-ust-right">

                    <div class="login-account" style="z-index: 9">
                        <a href="javascript:void(0)" class="accounts">
                            <i class="las la-user mobile-header-icons"></i>
                        </a>
                        <ul class="account-list-item">
                            <?php if(auth()->guard('web')->check()): ?>
                                <li class="list">
                                    <a href="<?php echo e(route('tenant.user.home')); ?>"> <?php echo e(__('Dashboard')); ?> </a>
                                </li>
                                <li class="list">
                                    <a href="<?php echo e(route('tenant.user.logout')); ?>"> <?php echo e(__('Log Out')); ?> </a>
                                </li>
                            <?php else: ?>
                                <li class="list">
                                    <a href="<?php echo e(route('tenant.user.login')); ?>"> <?php echo e(__('Sign In')); ?> </a>
                                </li>
                                <li class="list">
                                    <a href="<?php echo e(route('tenant.user.register')); ?>"> <?php echo e(__('Sign Up')); ?> </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <a href="<?php echo e(route('tenant.shop.cart')); ?>" class="mobile-header-icons"><i
                            class="las la-shopping-cart"></i></a>

                    <style>
                        @media only screen and (max-width: 991px) {
                            .mobile-header-bars .navbar-toggler-icon {
                                background: rgba(0, 0, 0, 0.5);
                                display: inline-block;
                                width: 25px;
                                height: 2px;
                                margin: 10px -4px 10px;
                                position: relative;
                            }

                            .mobile-header-bars .navbar-toggler-icon:before,
                            .mobile-header-bars .navbar-toggler-icon:after {

                                position: absolute;
                                content: "";
                                height: 2px;
                                width: 25px;
                                background: rgba(0, 0, 0, 0.5);
                                top: -7px;
                                left: 0;
                                -webkit-transition: all 0.4s;
                                transition: all 0.4s;
                            }

                            .mobile-header-bars .navbar-toggler-icon:after {

                                top: auto;
                                bottom: -7px;
                            }

                            #categories-parent-main ul li ul li a {
                                margin-left: 10px;
                            }
                        }

                    </style>
                    <div class="mobile-header-bars"><label for="mobile_side">
                            <span class="navbar-toggler-icon"></span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="slide-menu"><input id="mobile_side" class="mobile_side_toggle" type="checkbox">
            <div class="mobile_side_wrap">
                <div class="mobile_side_wrap_in">
                    <div class="mobile_side_wrap_in_close"><label for="mobile_side"><i class="las la-times"></i></label>
                    </div>
                    <div class="mobile_side_content">

                        <form method="get">
                            <div class="mobile_side_wrap_in_search"><input type="hidden" name="s" value="1">
                                <input
                                    type="text" name="q" required="" placeholder="<?php echo e(__('Search Here....')); ?>"
                                    id="search_form_input" autocomplete="off">
                                <button><i class="las la-search"></i></button>
                            </div>
                        </form>
                        <div class="mobile_side_wrap_in_categories_main">
                            <div class="mobile-menu-categories-main">
                                <div id="categories-parent-main" style="overflow: hidden;">
                                    <ul>
                                        <?php echo render_frontend_menu($primary_menu); ?>

                                    </ul>

                                </div>
                            </div>

                        </div>
                        <div class="navbar-item has-dropdown is-hoverable lang-dropdown text-center">
                            <a class="navbar-link is-arrowless">

                                    <?php
                                    $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                                    $flag = $lang == 'ar' ? 'sa' : $lang;
                                    $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();

                                    ?>
                                <img
                                    style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                    src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($flag)); ?>.png"
                                    srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($flag)); ?>.png 2x"
                                    height="40"
                                    alt="country flag">
                            </a>

                            <div
                                class="navbar-dropdown is-boxed  <?php echo e($setLang->direction ?'': 'is-right'); ?>">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>


                                    <a class="navbar-item"
                                       href="<?php echo e(route('tenant.landlord.set-locale-tenant', ['param' => $lang->slug])); ?>">
                                        <img
                                            src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($slug)); ?>.png"
                                            srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($slug)); ?>.png 2x"
                                            height="40"
                                            alt="<?php echo e($lang->name); ?>">
                                        <span><?php echo e($lang->name); ?></span>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                    <div class="mobile_side_wrap_in_footer">
                        <div class="header-desktop-call" style="margin-left: 0;">
                            <div class="header-desktop-call-i"><i class="las la-headset" style="color:#000000;"></i>
                            </div>
                            <div class="header-desktop-call-t">
                                <div class="header-desktop-call-t-1"
                                     style="color:#000000;"><?php echo e(__('Customer Service')); ?></div>
                                <div class="header-desktop-call-t-2"><a style="color:#000000;"
                                                                        href="tel:<?php echo e(get_static_option('topbar_phone')); ?>">
                                        <?php echo e(get_static_option('topbar_phone')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="desktop-header-area"> <!-- Desktop/Masaüstü Header !-->

        <div class="header-desktop-main-div">
            <div class="header-desktop-main-div-in">
                <!-- Arama Button Tip 1 !-->
                <div class="header-desktop-search1">
                    <form class="menu-search-form" method="get">
                        <input class="item-search" type="text" placeholder="<?php echo e(__('Search Here....')); ?>"
                               id="search_form_input">

                        <button><i class="las la-search"></i></button>
                    </form>

                </div><!--  <========SON=========>>> Arama Button Tip 1 SON !-->
                <div class="header-desktop-right-area">
                    <!-- Logo !-->
                    <div class="header-desktop-logo-div">

                        <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>" class="logo">
                                <?php if(!empty(get_static_option('site_white_logo'))): ?>
                                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                                <?php else: ?>
                                    <h2 class="site-title"><?php echo e(filter_static_option_value('site_title', $global_static_field_data)); ?></h2>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>

                    </div>
                    <!-- Logo SON !-->
                    <!-- Çağrı Merkezi !-->
                    <div class="header-desktop-call"
                         style="margin-right: 30px; /* if ile kontrol sağla. Sağ taraftaki hiç bir buton yoksa kaldır */">
                        <div class="header-desktop-call-i"><i class="las la-headset"></i></div>
                        <div class="header-desktop-call-t">
                            <div class="header-desktop-call-t-1"><?php echo e(__('Customer Service')); ?></div>
                            <div class="header-desktop-call-t-2"><a
                                    href="tel:<?php echo e(get_static_option('topbar_phone')); ?>"><?php echo e(get_static_option('topbar_phone')); ?></a>
                            </div>
                        </div>
                    </div><!--  <========SON=========>>> Çağrı Merkezi SON !--><!-- Search type 2 !-->
                    <!--  <========SON=========>>> Search type 2 SON !--><!-- Bell - Bildirimler !-->

                    <div class="info-bar-item">
                        <div class="track-icon-list style-02">

                            <style>
                                .d-flex.align-items-start.mb-8.metainfo-inner-wrap {
                                    margin-top: 30px;
                                }

                                .navbar-link, a.navbar-item {
                                    cursor: pointer;
                                }

                                .navbar-item, .navbar-link {
                                    color: #4a4a4a;
                                    display: block;
                                    line-height: 1.5;
                                    padding: .5rem .75rem;
                                    position: relative;
                                }

                                .navbar-item {
                                    flex-grow: 0;
                                    flex-shrink: 0;
                                }

                                a {
                                    color: inherit;
                                    cursor: pointer;
                                    text-decoration: none;
                                }


                                .lang-dropdown .navbar-dropdown .navbar-item {
                                    display: flex;
                                    align-items: center;
                                }

                                .lang-dropdown .navbar-dropdown .navbar-item img {
                                    display: block;
                                    height: 26px;
                                    width: 26px;
                                    min-width: 26px;
                                    border-radius: 50%;
                                }

                                .lang-dropdown .navbar-dropdown .navbar-item span {
                                    display: block;
                                    margin-left: 10px;
                                    margin-right: 10px;
                                }

                                .list {
                                    background-color: inherit;
                                    border-radius: inherit;
                                    box-shadow: inherit;
                                }

                                .loader {
                                    display: none;
                                    z-index: 999999;
                                    background: rgb(166 166 166 / 80%);
                                    width: 100%;
                                    height: 100%;
                                    position: fixed;


                                }

                                .nice-select {
                                    width: 100%!important;
                                    font-size: 13px !important;
                                    line-height: 28px !important;
                                    height: 42px !important;
                                    border: 1px solid #e8e8e8 !important;
                                    border-radius: 0 !important;

                                }

                                .block:not(:last-child), .box:not(:last-child), .breadcrumb:not(:last-child), .content:not(:last-child), .highlight:not(:last-child), .level:not(:last-child), .list:not(:last-child), .message:not(:last-child), .notification:not(:last-child), .pagination:not(:last-child), .progress:not(:last-child), .subtitle:not(:last-child), .table-container:not(:last-child), .table:not(:last-child), .tabs:not(:last-child), .title:not(:last-child) {
                                    margin-bottom: inherit;
                                }

                                .button.is-loading::after, .control.is-loading::after, .loader, .select.is-loading::after {
                                    animation: inherit;
                                }

                                .navbar-item.has-dropdown {
                                    padding: 0;
                                }

                                .navbar-dropdown {
                                    font-size: .875rem;
                                    padding-bottom: .5rem;
                                    padding-top: .5rem;
                                }

                                .navbar-link, a.navbar-item {
                                    cursor: pointer;
                                }


                                .navbar-item, .navbar-link {
                                    align-items: center;
                                    display: flex;
                                }

                                .navbar-item {
                                    display: flex;
                                }

                                .navbar-item.has-dropdown {
                                    align-items: stretch;
                                }

                                .navbar-dropdown.is-right {
                                    left: auto;
                                    right: 0;
                                }

                                .navbar-dropdown.is-boxed, .navbar.is-spaced .navbar-dropdown {
                                    border-radius: 6px;
                                    border-top: none;
                                    box-shadow: 0 8px 8px rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .1);
                                    display: block;
                                    opacity: 0;
                                    pointer-events: none;
                                    top: calc(100% + (-4px));
                                    transform: translateY(-5px);
                                    transition-duration: 86ms;
                                    transition-property: opacity, transform;
                                }

                                .navbar-dropdown {
                                    background-color: #fff;
                                    border-bottom-left-radius: 6px;
                                    border-bottom-right-radius: 6px;
                                    border-top: 2px solid #dbdbdb;
                                    box-shadow: 0 8px 8px rgba(10, 10, 10, .1);
                                    display: none;
                                    font-size: .875rem;
                                    left: 0;
                                    min-width: 100%;
                                    position: absolute;
                                    top: 100%;
                                    z-index: 20;
                                }

                                .navbar-dropdown a.navbar-item {
                                    padding-right: 3rem;
                                }

                                .navbar-dropdown .navbar-item {
                                    padding: .375rem 1rem;
                                    white-space: nowrap;
                                }

                                .navbar-item.has-dropdown.is-active .navbar-link, .navbar-item.has-dropdown:focus .navbar-link, .navbar-item.has-dropdown:hover .navbar-link {
                                    background-color: #fafafa;
                                }

                                .navbar-item.is-active .navbar-dropdown, .navbar-item.is-hoverable:focus .navbar-dropdown, .navbar-item.is-hoverable:focus-within .navbar-dropdown, .navbar-item.is-hoverable:hover .navbar-dropdown {
                                    display: block;
                                }

                                .navbar-item.is-active .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:focus .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:focus-within .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:hover .navbar-dropdown.is-boxed, .navbar.is-spaced .navbar-item.is-active .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:focus .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:focus-within .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:hover .navbar-dropdown {
                                    opacity: 1;
                                    pointer-events: auto;
                                    transform: translateY(0);
                                }
                            </style>


                            <div class="btn-wrapper">


                                <div class="navbar-item has-dropdown is-hoverable lang-dropdown">
                                    <a class="navbar-link is-arrowless">

                                            <?php
                                            $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                                            $flag = $lang == 'ar' ? 'sa' : $lang;
                                            $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();

                                            ?>
                                        <img
                                            style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                            src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($flag)); ?>.png"
                                            srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($flag)); ?>.png 2x"
                                            height="40"
                                            alt="country flag">
                                    </a>

                                    <div
                                        class="navbar-dropdown is-boxed  <?php echo e($setLang->direction ?'': 'is-right'); ?>">
                                        <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>


                                            <a class="navbar-item"
                                               href="<?php echo e(route('tenant.landlord.set-locale-tenant', ['param' => $lang->slug])); ?>">
                                                <img
                                                    src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($slug)); ?>.png"
                                                    srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($slug)); ?>.png 2x"
                                                    height="40"
                                                    alt="<?php echo e($lang->name); ?>">
                                                <span><?php echo e($lang->name); ?></span>

                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="single-icon cart-shopping">
                                <a class="icon" href="/shop/compare"> <i
                                        class="las la-sync"></i> </a>
                            </div>

                            <div class="single-icon cart-shopping">
                                <?php
                                    $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content();
                                    $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->subtotal();
                                ?>
                                <a href="javascript:void(0)" class="icon"> <i class="lar la-heart"></i>
                                </a>
                                <a href="javascript:void(0)"
                                   class="icon-notification"> <?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content()->count()); ?> </a>
                                <div class="addto-cart-contents">
                                    <div class="single-addto-cart-wrappers">
                                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="single-addto-carts">
                                                <div class="addto-cart-flex-contents">
                                                    <div class="addto-cart-thumb">
                                                        <?php echo render_image_markup_by_attachment_id($cart_item?->options?->image); ?>

                                                    </div>
                                                    <div class="addto-cart-img-contents">
                                                        <h6 class="addto-cart-title fs-18"> <?php echo e(Str::words($cart_item->name, 5)); ?> </h6>
                                                        <span class="name-subtitle d-block">
                                                                        <?php if($cart_item?->options?->color_name): ?>
                                                                <?php echo e(__('Color:')); ?> <?php echo e($cart_item?->options?->color_name); ?>

                                                                ,
                                                            <?php endif; ?>

                                                            <?php if($cart_item?->options?->size_name): ?>
                                                                <?php echo e(__('Size:')); ?> <?php echo e($cart_item?->options?->size_name); ?>

                                                            <?php endif; ?>

                                                            <?php if($cart_item?->options?->attributes): ?>
                                                                <br>
                                                                <?php $__currentLoopData = $cart_item?->options?->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($key.':'); ?> <?php echo e($attribute); ?><?php echo e(!$loop->last ? ',' : ''); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                                </span>

                                                        <div class="price-updates margin-top-10">
                                                                    <span
                                                                        class="price-title fs-16 fw-500 color-heading"> <?php echo e(amount_with_currency_symbol($cart_item->price)); ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span
                                                    class="addto-cart-counts color-heading fw-500"> <?php echo e($cart_item->qty); ?> </span>
                                                <a href="javascript:void(0)" class="close-cart">
                                                            <span class="icon-close color-heading"> <i
                                                                    class="las la-times"></i> </span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="single-addto-carts justify-content-center">
                                                <p class="text-center m-0"><?php echo e(__('No Item in Wishlist')); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="single-icon cart-shopping">
                                <?php
                                    $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content();
                                    $subtotal = 0;
                                ?>
                                <a href="javascript:void(0)" class="icon"> <i
                                        class="las la-shopping-cart"></i>
                                </a>
                                <a href="javascript:void(0)"
                                   class="icon-notification"> <?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content()->count()); ?> </a>
                                <div class="addto-cart-contents">
                                    <div class="single-addto-cart-wrappers">
                                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="single-addto-carts">
                                                <div class="addto-cart-flex-contents">
                                                    <div class="addto-cart-thumb">
                                                        <?php echo render_image_markup_by_attachment_id($cart_item?->options?->image); ?>

                                                    </div>
                                                    <div class="addto-cart-img-contents">
                                                        <h6 class="addto-cart-title fs-18"> <?php echo e(Str::words($cart_item->name, 5)); ?> </h6>
                                                        <span class="name-subtitle d-block">
                                                                        <?php if($cart_item?->options?->color_name): ?>
                                                                <?php echo e(__('Color:')); ?> <?php echo e($cart_item?->options?->color_name); ?>

                                                                ,
                                                            <?php endif; ?>

                                                            <?php if($cart_item?->options?->size_name): ?>
                                                                <?php echo e(__('Size:')); ?> <?php echo e($cart_item?->options?->size_name); ?>

                                                            <?php endif; ?>

                                                            <?php if($cart_item?->options?->attributes): ?>
                                                                <br>
                                                                <?php $__currentLoopData = $cart_item?->options?->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($key.':'); ?> <?php echo e($attribute); ?><?php echo e(!$loop->last ? ',' : ''); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                                </span>

                                                        <?php
                                                            $subtotal += calculatePrice($cart_item->price * $cart_item->qty, $cart_item->options)
                                                        ?>

                                                        <div class="price-updates margin-top-10">
                                                                    <span
                                                                        class="price-title fs-16 fw-500 color-heading"> <?php echo e(amount_with_currency_symbol(calculatePrice($cart_item->price, $cart_item->options))); ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span
                                                    class="addto-cart-counts color-heading fw-500"> <?php echo e($cart_item->qty); ?> </span>
                                                <a href="javascript:void(0)" class="close-cart">
                                                            <span class="icon-close color-heading"> <i
                                                                    class="las la-times"></i> </span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="single-addto-carts justify-content-center">
                                                <p class="text-center m-0"><?php echo e(__('No Item in Wishlist')); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($cart->count() != 0): ?>
                                        <div class="cart-total-amount">
                                            <h6 class="amount-title"> <?php echo e(__('Total Amount:')); ?> </h6>
                                            <span
                                                class="fs-18 fw-500 color-light"> <?php echo e(float_amount_with_currency_symbol($subtotal)); ?> </span>
                                        </div>
                                        <div class="btn-wrapper margin-top-20">
                                            <a href="<?php echo e(route('tenant.shop.checkout')); ?>"
                                               class="cmn-btn btn-bg-1 radius-0 w-100">
                                                <?php echo e(__('CheckOut')); ?> </a>
                                        </div>
                                        <div class="btn-wrapper margin-top-20">
                                            <a href="<?php echo e(route('tenant.shop.cart')); ?>"
                                               class="cmn-btn btn-outline-one radius-0 w-100">
                                                <?php echo e(__('View Cart')); ?> </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="login-account">
                                <a href="javascript:void(0)" class="accounts text-decoration-none">
                                    <i class="las la-user"></i>
                                </a>
                                <ul class="account-list-item">
                                    <?php if(auth()->guard('web')->check()): ?>
                                        <li class="list">
                                            <a href="<?php echo e(route('tenant.user.home')); ?>"> <?php echo e(__('Dashboard')); ?> </a>
                                        </li>
                                        <li class="list">
                                            <a href="<?php echo e(route('tenant.user.logout')); ?>"> <?php echo e(__('Log Out')); ?> </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="list">
                                            <a href="<?php echo e(route('tenant.user.login')); ?>"> <?php echo e(__('Sign In')); ?> </a>
                                        </li>
                                        <li class="list">
                                            <a href="<?php echo e(route('tenant.user.register')); ?>"> <?php echo e(__('Sign Up')); ?> </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="top-level-menu-main-div">
            <div class="top-level-menu-main-div-in">
                <div class="head-new-area-left">
                    <ul class="top-level-menu">
                        <?php echo render_frontend_menu($primary_menu); ?>

                    </ul>
                    <div class="dropdown-overlay-show"></div>

                </div><!-- Ek Button !--> <!-- Ek Button SON !--></div>
        </div><!-- Desktop/Masaüstü Header SON !-->
    </div>
</div>
<style>
    .badge-area {
        z-index: 1;
    }
</style>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/fruit/headerNavbarArea/navbar.blade.php ENDPATH**/ ?>