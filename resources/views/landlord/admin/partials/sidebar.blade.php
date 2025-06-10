<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
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
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{auth('admin')->user()->name}}</span>
                    <span class="text-secondary text-small">{{auth('admin')->user()->username}}</span>
                </div>
                @if(auth('admin')->user()->email_verified === 1)
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                @endif
            </a>
        </li>
        {!! \App\Facades\LandlordAdminMenu::render_sidebar_menus() !!}
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
                    @media only screen and (max-width: 991px) {
                        .menu-item-has-children:hover > .sub-menu >li{
                            text-align: left;
                            padding: 10px 0;
                            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                            display: block;
                            margin-left: 0;
                            line-height: 24px;
                            font-size: 14px;
                            margin-bottom: -1px;
                            list-style: none;
                        }


                            .menu-item-has-children:hover > .sub-menu {
                            visibility: visible;
                            height: auto;
                            opacity: 1;
                            background-color: transparent;
                            border-bottom: none;
                            padding-top: 10px;
                        }
                        .menu-item-has-children .sub-menu {
                            position: initial;
                            display: block;
                            width: 100%;
                            border-top: none;
                            -webkit-box-shadow: none;
                            box-shadow: none;
                            margin-left: 0;
                            padding-bottom: 0;
                            visibility: hidden;
                            opacity: 0;
                            height: 0;
                            overflow: hidden;
                            max-height: 250px;
                            overflow-y: scroll;
                            -webkit-transition: all 500ms linear;
                            transition: all 500ms linear;
                        }
                    }
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
                        <a href="{{ route('tenant.landlord.set-locale-tenant', ['param' => $lang->slug]) }}">
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
</nav>
