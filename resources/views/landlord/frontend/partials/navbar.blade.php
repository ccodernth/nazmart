<header class="header-style-01">
    <!-- Menu area Starts -->
    <nav class="navbar navbar-area nav-absolute navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="{{url('/')}}" class="logo">
                        @if(!empty(get_static_option('site_logo')))
                            {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                        @else
                            <h2 class="site-title">{{get_static_option('site_'.get_user_lang().'_title')}}</h2>
                        @endif
                    </a>
                </div>
                <a href="javascript:void(0)" class="click-nav-right-icon">
                    <i class="las la-user-circle"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#multi_tenancy_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-inner-all">
                <div class="collapse navbar-collapse" id="multi_tenancy_menu">
                    <ul class="navbar-nav">
                        {!! render_frontend_menu($primary_menu) !!}
                        <li class=" menu-item-has-children d-block d-sm-none back mt-3">
                            <?php
                            $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                            $flag = $lang == 'ar' ? 'sa' : $lang;

                            $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();
                            ?>
                            <a href="javascript:void(0)">
                                <img
                                    style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                    src="https://flagcdn.com/w40/{{ get_lang_flag_name($flag) }}.png"
                                    srcset="https://flagcdn.com/w80/{{ get_lang_flag_name($flag) }}.png 2x"
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
                                @foreach(get_all_language() as $lang)
                                        <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>
                                    <li>
                                        <a href="{{ route('landlord.setLocale', ['param' => $lang->slug]) }}">
                                            <img
                                                src="https://flagcdn.com/w40/{{ get_lang_flag_name($slug) }}.png"
                                                height="40"
                                                alt="{{ $lang->name }}">
                                            <span>{{ $lang->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right-content show-nav-content">
                    <div class="single-right-content">
                        @if( Auth::guard('web')->check())
                            <div class="btn-wrapper">
                                @php
                                    $route = auth()->guest() == 'admin' ? route('landlord.admin.dashboard') : route('landlord.user.home');
                                @endphp
                                <a class="cmn-btn cmn-btn-bg-1"
                                   href="{{$route}}">{{ get_static_option('default_dashboard_text') ?? __('Dashboard') }}  </a>
                                <a class="cmn-btn cmn-btn-bg-1"
                                   href="{{route('landlord.user.logout') }}">{{ get_static_option('default_logout_text') ?? __('Logout') }}</a>
                            </div>
                        @else
                            <div class="btn-wrapper">
                                @if(get_static_option('default_menu_item') == get_static_option('default_login_text'))
                                    <a href="{{route('landlord.user.login')}}"
                                       class="cmn-btn cmn-btn-bg-1">{{get_static_option('default_login_text') ?? __("Login")}}</a>
                                @elseif(get_static_option('default_menu_item') == get_static_option('default_register_text'))
                                    <a href="{{route('landlord.user.register')}}"
                                       class="cmn-btn cmn-btn-bg-1">{{__("Get Started")}}</a>
                                @else
                                    <a href="{{route('landlord.user.register')}}"
                                       class="cmn-btn cmn-btn-bg-1">{{__("Get Started")}}</a>
                                @endif
                            </div>
                        @endif
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
                            }
                        </style>
                        <div class="btn-wrapper d-none d-sm-block">


                            <div class="navbar-item has-dropdown is-hoverable lang-dropdown">
                                <a class="navbar-link is-arrowless">

                                    <?php
                                    $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                                    $flag = $lang == 'ar' ? 'sa' : $lang;

                                    $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();
                                    ?>
                                    <img
                                        style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                        src="https://flagcdn.com/w40/{{ get_lang_flag_name($flag) }}.png"
                                        srcset="https://flagcdn.com/w80/{{ get_lang_flag_name($flag) }}.png 2x"
                                        height="40"
                                        alt="country flag">
                                </a>


                                <div class="navbar-dropdown is-boxed  {{ $setLang->direction ? '' : 'is-right' }}">
                                    @foreach(get_all_language() as $lang)

                                            <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>


                                        <a class="navbar-item"
                                           href="{{ route('landlord.setLocale', ['param' => $lang->slug]) }}">
                                            <img
                                                src="https://flagcdn.com/w40/{{ get_lang_flag_name($slug) }}.png"
                                                srcset="https://flagcdn.com/w80/{{ get_lang_flag_name($slug) }}.png 2x"
                                                height="40"
                                                alt="{{ $lang->name }}">
                                            <span>{{ $lang->name }}</span>

                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu area end -->
</header>
