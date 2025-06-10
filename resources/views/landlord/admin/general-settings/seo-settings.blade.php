@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Seo Settings')}}
@endsection
@section('style')
    <x-media-upload.css/>
@endsection
@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{__('Seo Identity')}}</h4>
                <x-error-msg/>
                <x-flash-msg/>

                <form class="forms-sample" method="post"
                      action="{{route(route_prefix().'admin.general.seo.settings')}}">
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


                                    <x-fields.input type="text" value="{{isset(get_static_option_convert('site_meta_author')[$language->slug]) ? get_static_option_convert('site_meta_author')[$language->slug] : null}}" name="translate[{{$language->slug}}][site_meta_author]"
                                                    label="{{__('Site Meta Author')}}"/>
                                    <x-fields.textarea value="{{isset(get_static_option_convert('site_meta_keywords')[$language->slug]) ? get_static_option_convert('site_meta_keywords')[$language->slug] : null }}" name="translate[{{$language->slug}}][site_meta_keywords]"
                                                       label="{{__('Site Meta Keywords')}}"
                                                       info="{{__('separate tags by comma (,)')}}"/>
                                    <x-fields.textarea value="{{isset(get_static_option_convert('site_meta_description')[$language->slug]) ? get_static_option_convert('site_meta_description')[$language->slug] : null}}"
                                                       name="translate[{{$language->slug}}][site_meta_description]" label="{{__('Site Meta Description')}}"/>

                                    <h4 class="mt-5 my-3">{{__('OG Meta Info')}}</h4>
                                    <x-fields.input type="text" value="{{isset(get_static_option_convert('site_og_meta_title')[$language->slug]) ? get_static_option_convert('site_og_meta_title')[$language->slug]: null}}"
                                                    name="translate[{{$language->slug}}][site_og_meta_title]" label="{{__('Og Meta Title')}}"/>
                                    <x-fields.textarea value="{{isset(get_static_option_convert('site_og_meta_description')[$language->slug]) ? get_static_option_convert('site_og_meta_description')[$language->slug] : null}}"
                                                       name="translate[{{$language->slug}}][site_og_meta_description]" label="{{__('Og Meta Description')}}"/>
                                    <x-fields.media-upload name="translate[{{$language->slug}}][site_og_meta_image]" title="{{__('Site Og Image')}}"
                                                           id="{{isset(get_static_option_convert('site_og_meta_image')[$language->slug]) ? get_static_option_convert('site_og_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"/>

                                    <h4 class="mt-5 my-3">{{__('Facebook Meta Info')}}</h4>
                                    <x-fields.input type="text" value="{{isset(get_static_option_convert('site_fb_meta_title')[$language->slug]) ? get_static_option_convert('site_fb_meta_title')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_fb_meta_title]" label="{{__('Meta Title')}}"/>
                                    <x-fields.textarea value="{{isset(get_static_option_convert('site_fb_meta_description')[$language->slug]) ? get_static_option_convert('site_fb_meta_description')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_fb_meta_description]" label="{{__('Meta Description')}}"/>
                                    <x-fields.media-upload
                                        name="translate[{{$language->slug}}][site_fb_meta_image]"
                                        id="{{isset(get_static_option_convert('site_fb_meta_image')[$language->slug]) ? get_static_option_convert('site_fb_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"
                                        title="{{__('Meta Image')}}" dimentions="1200x1200"/>

                                    <h4 class="mt-5 my-3">{{__('Twitter Meta Info')}}</h4>
                                    <x-fields.input type="text" value="{{isset(get_static_option_convert('site_tw_meta_title')[$language->slug]) ? get_static_option_convert('site_tw_meta_title')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_tw_meta_title]" label="{{__('Meta Title')}}"/>
                                    <x-fields.textarea value="{{isset(get_static_option_convert('site_tw_meta_description')[$language->slug])?get_static_option_convert('site_tw_meta_description')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_tw_meta_description]" label="{{__('Meta Description')}}"/>
                                    <x-fields.media-upload
                                        id="{{isset(get_static_option_convert('site_tw_meta_image')[$language->slug]) ? get_static_option_convert('site_tw_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"
                                        name="translate[{{$language->slug}}][site_tw_meta_image]" title="{{__('Meta Image')}}" dimentions="1200x1200"/>


                                </div>

                            @endforeach
                        </div>

                    @else
                        @php
                            $language = default_lang();
                        @endphp
                        <x-fields.input type="text" value="{{isset(get_static_option_convert('site_meta_author')[$language->slug]) ? get_static_option_convert('site_meta_author')[$language->slug] : null}}" name="translate[{{$language->slug}}][site_meta_author]"
                                        label="{{__('Site Meta Author')}}"/>
                        <x-fields.textarea value="{{isset(get_static_option_convert('site_meta_keywords')[$language->slug]) ? get_static_option_convert('site_meta_keywords')[$language->slug] : null }}" name="translate[{{$language->slug}}][site_meta_keywords]"
                                           label="{{__('Site Meta Keywords')}}"
                                           info="{{__('separate tags by comma (,)')}}"/>
                        <x-fields.textarea value="{{isset(get_static_option_convert('site_meta_description')[$language->slug]) ? get_static_option_convert('site_meta_description')[$language->slug] : null}}"
                                           name="translate[{{$language->slug}}][site_meta_description]" label="{{__('Site Meta Description')}}"/>

                        <h4 class="mt-5 my-3">{{__('OG Meta Info')}}</h4>
                        <x-fields.input type="text" value="{{isset(get_static_option_convert('site_og_meta_title')[$language->slug]) ? get_static_option_convert('site_og_meta_title')[$language->slug]: null}}"
                                        name="translate[{{$language->slug}}][site_og_meta_title]" label="{{__('Og Meta Title')}}"/>
                        <x-fields.textarea value="{{isset(get_static_option_convert('site_og_meta_description')[$language->slug]) ? get_static_option_convert('site_og_meta_description')[$language->slug] : null}}"
                                           name="translate[{{$language->slug}}][site_og_meta_description]" label="{{__('Og Meta Description')}}"/>
                        <x-fields.media-upload name="translate[{{$language->slug}}][site_og_meta_image]" title="{{__('Site Og Image')}}"
                                               id="{{isset(get_static_option_convert('site_og_meta_image')[$language->slug]) ? get_static_option_convert('site_og_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"/>

                        <h4 class="mt-5 my-3">{{__('Facebook Meta Info')}}</h4>
                        <x-fields.input type="text" value="{{isset(get_static_option_convert('site_fb_meta_title')[$language->slug]) ? get_static_option_convert('site_fb_meta_title')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_fb_meta_title]" label="{{__('Meta Title')}}"/>
                        <x-fields.textarea value="{{isset(get_static_option_convert('site_fb_meta_description')[$language->slug]) ? get_static_option_convert('site_fb_meta_description')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_fb_meta_description]" label="{{__('Meta Description')}}"/>
                        <x-fields.media-upload
                            name="translate[{{$language->slug}}][site_fb_meta_image]"
                            id="{{isset(get_static_option_convert('site_fb_meta_image')[$language->slug]) ? get_static_option_convert('site_fb_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"
                            title="{{__('Meta Image')}}" dimentions="1200x1200"/>

                        <h4 class="mt-5 my-3">{{__('Twitter Meta Info')}}</h4>
                        <x-fields.input type="text" value="{{isset(get_static_option_convert('site_tw_meta_title')[$language->slug]) ? get_static_option_convert('site_tw_meta_title')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_tw_meta_title]" label="{{__('Meta Title')}}"/>
                        <x-fields.textarea value="{{isset(get_static_option_convert('site_tw_meta_description')[$language->slug])?get_static_option_convert('site_tw_meta_description')[$language->slug]:null}}" name="translate[{{$language->slug}}][site_tw_meta_description]" label="{{__('Meta Description')}}"/>
                        <x-fields.media-upload
                            id="{{isset(get_static_option_convert('site_tw_meta_image')[$language->slug]) ? get_static_option_convert('site_tw_meta_image')[$language->slug] ?? $language->slug . 'image' : ''}}"
                            name="translate[{{$language->slug}}][site_tw_meta_image]" title="{{__('Meta Image')}}" dimentions="1200x1200"/>



                    @endif


                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('Save Changes')}}</button>
                </form>

            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection
@section('scripts')
    <x-media-upload.js/>
@endsection
