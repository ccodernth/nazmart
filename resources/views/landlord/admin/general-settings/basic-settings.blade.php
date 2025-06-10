@extends(route_prefix().'admin.admin-master')
@section('title') {{__('Basic Settings')}} @endsection
@section('style')
    <x-media-upload.css/>
@endsection
@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{__('Basic Settings')}}</h4>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.general.basic.settings')}}">
                    @csrf

                    @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                        <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                            <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                 aria-orientation="vertical">

                                @foreach(get_all_language() as $language)
                                    <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab active' : '' }}"
                                            data-bs-toggle="pill"
                                            data-bs-target="#language-{{ $language->slug }}"
                                            type="button" role="tab"
                                            aria-selected="{{ $loop->iteration == 1 ? 'true' : 'false' }}">
                                        {{ $language->name }}</button>
                                @endforeach

                            </div>
                        </div>

                        <div class="tab-content">
                            @foreach(get_all_language() as $language)

                                <div
                                    class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent active' : '' }}"
                                    id="language-{{$language->slug}}"
                                    role="tablist">


                                    <x-fields.input type="text" value="{{get_static_option_convert('site_title')[$language->slug]}}" name="translate[{{$language->slug}}][site_title]" label="{{__('Site Title')}}"/>
                                    <x-fields.input type="text" value="{{get_static_option_convert('site_tag_line')[$language->slug]}}" name="translate[{{$language->slug}}][site_tag_line]" label="{{__('Site Tag Line')}}"/>
                                    <x-fields.textarea type="text" value="{{get_static_option_convert('site_footer_copyright_text')[$language->slug]}}" name="translate[{{$language->slug}}][site_footer_copyright_text]" label="{{__('Footer Copyright Text')}}" info="{{__('{copy} Will replace by & and {year} will be replaced by current year.')}}"/>


                                </div>

                            @endforeach
                        </div>

                    @else
                        @php
                            $language = default_lang();
                        @endphp
                        <x-fields.input class="translate-{{$language->slug}}-site_title" type="text" value="{{get_static_option_convert('site_title' )[$language->slug]}}" name="translate[{{$language->slug}}][site_title]" label="{{__('Site Title')}}"/>
                        <x-fields.input class="translate-{{$language->slug}}-site_tag_line" type="text" value="{{get_static_option_convert('site_tag_line')[$language->slug]}}" name="translate[{{$language->slug}}][site_tag_line]" label="{{__('Site Tag Line')}}"/>
                        <x-fields.textarea class="translate-{{$language->slug}}-site_footer_copyright_text" type="text" value="{{get_static_option_convert('site_footer_copyright_text')[$language->slug]}}" name="translate[{{$language->slug}}][site_footer_copyright_text]" label="{{__('Footer Copyright Text')}}" info="{{__('{copy} Will replace by & and {year} will be replaced by current year.')}}"/>



                    @endif


                    <div class="form-group">
                        @php
                            $list = DateTimeZone::listIdentifiers();
                        @endphp
                        <label for="timezone">{{__('Select Timezone')}}</label>
                        <select class="form-control" name="timezone" id="timezone">
                            @foreach($list as $zone)
                                <option value="{{$zone}}" {{$zone == get_static_option('timezone') ? 'selected' : ''}}>{{$zone}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted"></small>
                    </div>

{{--                    <x-fields.switcher value="{{get_static_option('dark_mode_for_admin_panel')}}" name="dark_mode_for_admin_panel" label="{{__('Enable/Disable Dark Mode For Admin Panel')}}"/>--}}
                    @if(!tenant())
                        <x-fields.switcher value="{{env('APP_DEBUG') ? 'on' : ''}}" name="debug_mode" label="{{__('Enable/Disable Debug Mode')}}"/>
                    @endif

                    <x-fields.switcher value="{{get_static_option('maintenance_mode')}}" name="maintenance_mode" label="{{__('Enable/Disable Maintenance Mode')}}"/>
{{--                    <x-fields.switcher value="{{get_static_option('language_selector_status')}}" name="language_selector_status" label="{{__('Show/Hide Language Selector In Frontend')}}"/>--}}

                    @if(tenant())
                        <x-fields.switcher value="{{get_static_option('guest_order_system_status')}}" name="guest_order_system_status" label="{{__('Show/Hide Guest Order System')}}" info="{{__('if you keep it no, it will allow user to order without customer account.')}}"/>
                    @endif
                    <x-fields.switcher value="{{get_static_option('user_email_verify_status')}}" name="user_email_verify_status" label="{{__('Disable/Enable User Email Verify')}}" info="{{__('if you keep it no, it will allow user to register without being ask for email verify.')}}"/>

                    <x-fields.media-upload name="placeholder_image" title="{{__('Placeholder Image')}}"/>

                    <button type="submit" class="btn btn-gradient-primary mt-5 me-2">{{__('Save Changes')}}</button>
                </form>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection
@section('scripts')
    <x-media-upload.js/>
@endsection
