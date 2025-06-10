<header class="header-style-01">
    <!-- Menu area Starts -->
    <nav class="navbar navbar-area navbar-expand-lg">
        <div class="container container-one nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <?php if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl'): ?>
                        <a href="<?php echo e(url('/')); ?>" class="logo">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/')); ?>" class="logo">
                            <?php if(!empty(get_static_option('site_white_logo'))): ?>
                                <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

                            <?php else: ?>
                                <h2 class="site-title"><?php echo e(filter_static_option_value('site_'.$user_select_lang_slug.'_title',$global_static_field_data)); ?></h2>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#multi_tenancy_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="multi_tenancy_menu">
                <ul class="navbar-nav">
                    <?php echo render_frontend_menu($primary_menu); ?>

                    <li class=" menu-item-has-children d-block d-sm-none back mt-3">
                        <?php
                        $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                        $flag = $lang == 'ar' ? 'sa' : $lang;

                        $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();
                        ?>
                        <a href="javascript:void(0)">
                            <img
                                style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($flag)); ?>.png"
                                srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($flag)); ?>.png 2x"
                                height="40"
                                alt="country flag">
                        </a>
                        <ul class="sub-menu ">
                            <style>
                                li.menu-item-has-children.d-block.d-sm-none.back.mt-3{
                                    text-align: center;
                                }
                                li.menu-item-has-children.d-block.d-sm-none.back.mt-3>a::after{
                                    display: none !important;
                                }
                                li.menu-item-has-children.d-block.d-sm-none.back.mt-3 ul a {
                                    display: flex !important;
                                    align-items: center;
                                }
                                li.menu-item-has-children.d-block.d-sm-none.back.mt-3 ul img {
                                    display: block;
                                    height: 26px;
                                    width: 26px;
                                    min-width: 26px;
                                    border-radius: 50%;
                                }
                                li.menu-item-has-children.d-block.d-sm-none.back.mt-3 ul span {
                                    display: block;
                                    margin-left: 10px;
                                    margin-right: 10px;
                                }
                            </style>
                            <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>
                                <li>
                                    <a href="<?php echo e(route('tenant.landlord.set-locale-tenant', ['param' => $lang->slug])); ?>">
                                        <img
                                            src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($slug)); ?>.png"
                                            height="40"
                                            alt="<?php echo e($lang->name); ?>">
                                        <span><?php echo e($lang->name); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="navbar-right-content show-nav-content">
                <div class="single-right-content">
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

                        .lang-dropdown .navbar-dropdown {

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
                        @media screen and (min-width: 1024px) {

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
                                top: calc(100% +(-4px));
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

                            <div class="navbar-dropdown is-boxed  <?php echo e($setLang->direction ?'': 'is-right'); ?>">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>


                                    <a class="navbar-item" href="<?php echo e(route('tenant.landlord.set-locale-tenant', ['param' => $lang->slug])); ?>">
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
                    <div class="search-suggestions-icon-wrapper">
                        <div class="search-click-icon">
                            <i class="las la-search"></i>
                        </div>
                        <div class="search-suggetions-show">
                            <div class="navbar-input searchbar-suggetions">
                                <form action="">
                                    <div class="search-open-form">
                                        <input autocomplete="off" class="form--control" id="search_form_input" type="text" placeholder="<?php echo e(__('Search here....')); ?>">
                                        <button type="submit"> <i class="las la-search"></i> </button>
                                        <span class="suggetions-icon-close"> <i class="las la-times"></i> </span>
                                    </div>
                                    <div class="search-suggestions" id="search_suggestions_wrap">
                                        <div class="search-suggestions-inner">
                                            <h6 class="search-suggestions-title"><?php echo e(__('Product Suggestions')); ?></h6>
                                            <ul class="product-suggestion-list mt-4">

                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-right-flex">
                        <div class="track-icon-list">
                            <div class="single-icon cart-shopping">
                                <a class="icon" href="<?php echo e(route('tenant.shop.compare.product.page')); ?>"> <i class="las la-sync"></i> </a>
                            </div>

                            <div class="single-icon cart-shopping">
                                <a class="icon" href="javascript:void(0)"> <i class="lar la-heart"></i> </a>
                                <a href="javascript:void(0)" class="icon-notification"> <?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content()->count()); ?>  </a>
                                <div class="addto-cart-contents">
                                    <div class="single-addto-cart-wrappers">
                                        <?php
                                            $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content();
                                            $subtotal = 0;
                                        ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="single-addto-carts">
                                                <div class="addto-cart-flex-contents">
                                                    <div class="addto-cart-thumb">
                                                        <a href="javascript:void(0)">
                                                            <?php echo render_image_markup_by_attachment_id($cart_item?->options?->image); ?>

                                                        </a>
                                                    </div>
                                                    <div class="addto-cart-img-contents">
                                                        <h6 class="addto-cart-title"> <a href="javascript:void(0)"> <?php echo e(Str::words($cart_item->name, 5)); ?> </a> </h6>
                                                        <span class="name-subtitle d-block">
                                                            <?php if($cart_item?->options?->color_name): ?>
                                                                <?php echo e(__('Color:')); ?> <?php echo e($cart_item?->options?->color_name); ?> ,
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
                                                        <div class="price-updates mt-2">
                                                            <span class="price-title fs-16 fw-500 color-heading"> <?php echo e(amount_with_currency_symbol(calculatePrice($cart_item->price, $cart_item->options))); ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="addto-cart-counts color-heading fw-500"> <?php echo e($cart_item->qty); ?> </span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="single-addto-carts">
                                                <p class="text-center"><?php echo e(__('No Item in Wishlist')); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($cart->count() != 0): ?>
                                        <?php
                                            $subtotal += calculatePrice($cart_item->price * $cart_item->qty, $cart_item->options)
                                        ?>

                                        <div class="cart-total-amount">
                                            <h6 class="amount-title"> <?php echo e(__('Total Amount:')); ?> </h6>
                                            <span class="fs-18 fw-500 color-light"> <?php echo e(amount_with_currency_symbol($subtotal)); ?> </span>
                                        </div>
                                        <div class="btn-wrapper mt-3">
                                            <a href="<?php echo e(route('tenant.shop.wishlist.page')); ?>" class="cart-btn cart-btn-outline radius-0 w-100"> <?php echo e(__('View Wishlist')); ?> </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="single-icon cart-shopping">
                                <a class="icon" href="javascript:void(0)"> <i class="las la-shopping-cart"></i> </a>
                                <a href="javascript:void(0)" class="icon-notification"> <?php echo e(\Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content()->count()); ?> </a>
                                <div class="addto-cart-contents">
                                    <div class="single-addto-cart-wrappers">
                                        <?php
                                            $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content();
                                            $subtotal = 0;
                                        ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="single-addto-carts">
                                                <div class="addto-cart-flex-contents">
                                                    <div class="addto-cart-thumb">
                                                        <a href="javascript:void(0)">
                                                            <?php echo render_image_markup_by_attachment_id($cart_item?->options?->image); ?>

                                                        </a>
                                                    </div>
                                                    <div class="addto-cart-img-contents">
                                                        <h6 class="addto-cart-title"> <a href="javascript:void(0)"> <?php echo e(Str::words($cart_item->name, 5)); ?> </a> </h6>

                                                        <span class="name-subtitle d-block">
                                                            <?php if($cart_item?->options?->color_name): ?>
                                                                <?php echo e(__('Color:')); ?> <?php echo e($cart_item?->options?->color_name); ?> ,
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

                                                        <div class="price-updates">
                                                            <span class="price-title fs-16 fw-500 color-heading"> <?php echo e(amount_with_currency_symbol(calculatePrice($cart_item->price, $cart_item->options))); ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="addto-cart-counts color-heading fw-500"> <?php echo e($cart_item->qty); ?> </span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="single-addto-carts">
                                                <p class="text-center"><?php echo e(__('No Item in Cart')); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($cart->count() != 0): ?>
                                        <?php
                                            $subtotal += calculatePrice($cart_item->price * $cart_item->qty, $cart_item->options)
                                        ?>
                                        <div class="cart-total-amount">
                                            <h6 class="amount-title"> <?php echo e(__('Total Amount:')); ?> </h6> <span class="fs-18 fw-500 color-light"> <?php echo e(amount_with_currency_symbol($subtotal)); ?> </span></div>
                                        <div class="btn-wrapper mt-3">
                                            <a href="<?php echo e(route('tenant.shop.checkout')); ?>" class="cart-btn radius-0 w-100"> <?php echo e(__('CheckOut')); ?> </a>
                                        </div>
                                        <div class="btn-wrapper mt-3">
                                            <a href="<?php echo e(route('tenant.shop.cart')); ?>" class="cart-btn cart-btn-outline radius-0 w-100"> <?php echo e(__('View Cart')); ?> </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="login-account">
                            <a class="accounts" href="javascript:void(0)"> <i class="las la-user"></i> </a>
                            <ul class="account-list-item">
                                <?php if(auth()->guard('web')->check()): ?>
                                    <li class="list"> <a href="<?php echo e(route('tenant.user.home')); ?>"> <?php echo e(__('Dashboard')); ?> </a> </li>
                                    <li class="list"> <a href="<?php echo e(route('tenant.user.logout')); ?>"> <?php echo e(__('Log Out')); ?> </a> </li>
                                <?php else: ?>
                                    <li class="list"> <a href="<?php echo e(route('tenant.user.login')); ?>"> <?php echo e(__('Sign In')); ?> </a> </li>
                                    <li class="list"> <a href="<?php echo e(route('tenant.user.register')); ?>"> <?php echo e(__('Sign Up')); ?> </a> </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu area end -->
</header>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/hexfashion/headerNavbarArea/navbar.blade.php ENDPATH**/ ?>