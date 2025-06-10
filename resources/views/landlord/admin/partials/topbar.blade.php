<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('landlord.admin.home')}}">
            @php
                $logo_type = !empty(get_static_option('dark_mode_for_admin_panel')) ? 'site_white_logo' : 'site_logo';
            @endphp
            {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!}

        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('landlord.admin.home')}}">
            {!! render_image_markup_by_attachment_id(get_static_option('site_favicon')) !!}
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="align-self-center d-flex gap-3">
            <button class="navbar-toggler navbar-toggler " type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>

            <input class="global-search-input form-control border-0" type="text" placeholder="Search..">
            <div class="search-dropdown dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown" style="top: 80px"></div>
        </div>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <div class="nav-profile-img">
                        @php
                            if (auth('admin')->user()->image != null)
                            {
                                $image_id = auth('admin')->user()->image;
                            } else {
                                $image_id = get_static_option('placeholder_image');
                            }
                        @endphp

                        @if($image_id != null)
                            {!! render_image_markup_by_attachment_id($image_id,'','full',true) !!}
                        @else
                            <img src="{{asset('assets/landlord/uploads/media-uploader/no-image.jpg')}}" alt="">
                        @endif
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{auth('admin')->user()->name}}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('landlord.admin.tenant.activity.log')}}">
                        <i class="mdi mdi-cached me-2 text-success"></i> {{__('Activity Log')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('landlord.admin.edit.profile')}}">
                        <i class="mdi mdi-account-settings me-2 text-success"></i> {{__('Edit Profile')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('landlord.admin.change.password')}}">
                        <i class="mdi mdi-key me-2 text-success"></i> {{__('Change Password')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                           document.getElementById('tenanat_logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                        <i class="mdi mdi-logout me-2 text-primary"></i>
                        {{__('Signout')}}
                        <form id="logout-form" action="{{ route('landlord.admin.logout') }}" method="POST"
                              class="d-none">
                            @csrf
                            <button class="d-none" type="submit" id="tenanat_logout_submit_btn"></button>
                        </form>
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>

            @if(isPluginActive('Blog'))
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell"></i>
                        @php
                            $comments = $new_comments->where('status', 'unread')?->count();
                        @endphp
                        @if($comments > 0)
                            <span class="count-symbol bg-warning"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="messageDropdown">

                        <h6 class="p-3 mb-0">{{$comments. ' '.  __('Unread Comments') }}  </h6>
                        <div class="dropdown-divider"></div>

                        @foreach($new_comments as $comment)
                            <a class="dropdown-item preview-item"
                               href="{{route(route_prefix().'admin.blog.comments.view', $comment->blog_id)}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-bell text-white"></i>
                                    </div>
                                </div>

                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject mb-1 font-weight-normal">{{__('You have new comment in your blog' )}}
                                        <strong>{{Str::words($comment->blog?->title)}}</strong></h6>
                                    <p class="text-gray mb-0"> {{$comment->created_at->diffForHumans() . ' '}}  @if($comment->status == 'unread')
                                            <small class="mt-1 text-danger">{{'('.__('New' .')')}}</small>
                                        @endif</p>
                                </div>
                                <div class="dropdown-divider"></div>
                                @endforeach

                                <h6 class="p-3 mb-0 text-center"><a
                                        href="{{route(route_prefix().'admin.blog')}}">{{__('See All')}}</a>
                                </h6>
                            </a>
                    </div>

                </li>
            @endif


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                    @if($new_message)
                        <span class="count-symbol bg-warning"></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">

                    <h6 class="p-3 mb-0">{{$new_message. ' '.  __('Messages') }}  </h6>
                    <div class="dropdown-divider"></div>

                    @foreach($all_messages as $message)

                        <a class="dropdown-item preview-item"
                           href="{{route(route_prefix().'admin.contact.message.view', $message->id)}}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                            @php
                                $fields = json_decode($message->fields,true);
                            @endphp
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject mb-1 font-weight-normal">{{__('You have message from').' '}}
                                    <strong>{{optional($message->form)->title}}</strong></h6>
                                <p class="text-gray mb-0"> {{$message->created_at->diffForHumans() . ' '}}  @if($message->status === 1)
                                        <small class="mt-1 text-danger">{{'('.__('New' .')')}}</small>
                                    @endif</p>
                            </div>
                            <div class="dropdown-divider"></div>
                            @endforeach

                            <h6 class="p-3 mb-0 text-center"><a
                                    href="{{route(route_prefix().'admin.contact.message.all')}}">{{__('Seel All')}}</a>
                            </h6>
                        </a>
                </div>
            </li>

            @inject('healthHelper', 'App\Helpers\SiteHealthHelper')
            <li class="d-none d-sm-block">
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
                <div class="btn-wrapper ">


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
                                   href="{{ route('landlord.admin.setLocaleAdmin', ['param' => $lang->slug]) }}">
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
            </li>
            <li class="nav-item nav-logout d-none d-lg-block mx-2">
                <a class="btn {{$healthHelper->getWarning() ? 'btn-danger site-health-btn' : 'btn-success'}} btn-icon-text"
                   href="{{route('landlord.admin.health') ?? ''}}">
                    <i class="mdi mdi-stethoscope"></i> {{__('Health')}}
                </a>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="btn btn-outline-danger btn-icon-text" href="{{route('landlord.homepage')}}" target="_blank">
                    <i class="mdi mdi-upload btn-icon-prepend"></i> {{__('Visit Site')}}
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
