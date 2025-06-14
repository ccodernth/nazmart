@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Edit Page')}}
@endsection
@section('style')
    <x-media-upload.css/>
    <x-summernote.css/>

    <style>
        .selected {
            border: 5px solid #007bff;
            transition: 0.5s;
            border-radius: 5px;
        }

        .footer-variant-wrapper {
            background: #8ec2ff;
        }
    </style>
@endsection
@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">{{__('Edit Page')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <x-link-with-popover class="info" url="{{route(route_prefix().'admin.pages.create')}}"
                                             extraclass="ml-3">
                            {{__('Create New Page')}}
                        </x-link-with-popover>
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages')}}" extraclass="ml-3">
                            {{__('All Pages')}}
                        </x-link-with-popover>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.pages.update')}}">
                    @csrf
                    <x-fields.input type="hidden" name="id" value="{{$page->id}}"/>

                    <div class="row">
                        <div class="col-lg-9">
                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach(get_all_language() as $language)
                                            <button class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#language-{{ $language->slug }}"
                                                    type="button" role="tab" aria-selected="true">
                                                {{ $language->name }}</button>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="tab-content">
                                    @foreach(get_all_language() as $language)

                                        <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'active' : '' }}"
                                             id="language-{{$language->slug}}"
                                             role="tabpanel">


                                            <x-fields.input name="translate[{{$language->slug}}][title]"
                                                            label="{{__('Title')}}"
                                                            value="{{$page->getTranslations()['title'][$language->slug] ?? ''}}"
                                                            id="title"/>
                                            <div class="form-group permalink_label" style="">
                                                <label class="text-dark">{{__('Permalink * : ')}}
                                                    <span id="lang-translate-{{$language->slug}}" class="display-inline"
                                                          style="color: blue;">{{getUserBasedDomain(tenant())}}/{{$page->getTranslations()['slug'][$language->slug] ?? ''}}</span>
                                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                 class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2 lang-translate-{{$language->slug}}"
                                               value="{{$page->getTranslations()['slug'][$language->slug] ?? ''}}"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  data-lang="lang-translate-{{$language->slug}}"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                                </label>


                                            </div>

                                            <div class="my-3">
                                                @if($page->page_builder === 1)
                                                    <x-link-with-popover class="dark"
                                                                         btn-size="btn-lg"
                                                                         url="{{route(route_prefix().'admin.pages.builder', $page->id)}}"
                                                                         popover="{{__('edit with page builder')}}">
                                                        <i class="mdi mdi-settings"
                                                           style="vertical-align: text-bottom"></i> {{__('Edit with Page-Builder')}}
                                                    </x-link-with-popover>
                                                @endif
                                            </div>

                                            <x-summernote.textarea label="{{__('Page Content')}}"
                                                                   name="translate[{{$language->slug}}][page_content]"
                                                                   value="{!! isset($page->getTranslations()['page_content'][$language->slug]) ? $page->getTranslations()['page_content'][$language->slug] : '' !!}"/>

                                            <div class="meta-information-wrapper">
                                                @php
                                                    $selected_page = get_static_option($page->slug.'_page');
                                                @endphp

                                                <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

                                                @if($selected_page != $page->id)
                                                    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                                        <div class="nav flex-column nav-pills me-3" role="tablist"
                                                             aria-orientation="vertical">
                                                            <button class="nav-link active" data-bs-toggle="pill"
                                                                    data-bs-target="#v-general-meta-info-{{$language->slug}}"
                                                                    type="button" role="tab"
                                                                    aria-selected="true">
                                                                {{__('General Meta Info')}}</button>
                                                            <button class="nav-link" data-bs-toggle="pill"
                                                                    data-bs-target="#v-facebook-meta-info-{{$language->slug}}"
                                                                    type="button" role="tab"
                                                                    aria-selected="false">
                                                                {{__('Facebook Meta Info')}}</button>
                                                            <button class="nav-link" data-bs-toggle="pill"
                                                                    data-bs-target="#v-twitter-meta-info-{{$language->slug}}"
                                                                    type="button" role="tab"
                                                                    aria-selected="false">
                                                                {{__('Twitter Meta Info')}}
                                                            </button>
                                                        </div>
                                                        <div class="tab-content">

                                                            <div class="tab-pane fade show active"
                                                                 id="v-general-meta-info-{{$language->slug}}"
                                                                 role="tabpanel">
                                                                <x-fields.input
                                                                    name="translate_meta[{{$language->slug}}][title]"
                                                                    label="{{__('Meta Title')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['title'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][description]"
                                                                    label="{{__('Meta Description')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['description'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"
                                                                    id="{{$page->metainfo ? $page->metainfo->getTranslations()['image'][$language->slug] ?? $language->slug . 'image' : ''}}"/>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-facebook-meta-info-{{$language->slug}}"
                                                                 role="tabpanel">
                                                                <x-fields.input
                                                                    name="translate_meta[{{$language->slug}}][fb_title]"
                                                                    label="{{__('Meta Title')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['fb_title'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][fb_description]"
                                                                    label="{{__('Meta Description')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['fb_description'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][fb_image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"
                                                                    id="{{$page->metainfo ? $page->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' : $language->slug . 'fb_image' }}"/>
                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-twitter-meta-info-{{$language->slug}}"
                                                                 role="tabpanel">
                                                                <x-fields.input
                                                                    name="translate_meta[{{$language->slug}}][tw_title]"
                                                                    label="{{__('Meta Title')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['tw_title'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][tw_description]"
                                                                    label="{{__('Meta Description')}}"
                                                                    value="{{$page->metainfo ? $page->metainfo->getTranslations()['tw_description'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][tw_image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"
                                                                    id="{{$page->metainfo ? $page->metainfo->getTranslations()['tw_image'][$language->slug]  ?? $language->slug . 'tw_image' : $language->slug . 'tw_image'}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="alert alert-info">{{__('This page is selected for front page. To update SEO please click the button below,')}}</p>
                                                    <a class="btn btn-primary"
                                                       href="{{route(route_prefix().'admin.general.seo.settings')}}">{{__('Global SEO Settings')}}</a>
                                                @endif
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            @else
                                @php
                                    $language = default_lang();
                                @endphp
                                <x-fields.input name="translate[{{$language->slug}}][title]"
                                                label="{{__('Title')}}"
                                                value="{{$page->getTranslations()['title'][$language->slug]}}"
                                                id="title"/>
                                <div class="form-group permalink_label" style="">
                                    <label class="text-dark">{{__('Permalink * : ')}}
                                        <span id="lang-translate-{{$language->slug}}" class="display-inline"
                                              style="color: blue;">{{getUserBasedDomain(tenant())}}/{{$page->getTranslations()['slug'][$language->slug]}}</span>
                                        <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                 class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2 lang-translate-{{$language->slug}}"
                                               value="{{$page->getTranslations()['slug'][$language->slug]}}"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  data-lang="lang-translate-{{$language->slug}}"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                    </label>


                                </div>

                                <div class="my-3">
                                    @if($page->page_builder === 1)
                                        <x-link-with-popover class="dark"
                                                             btn-size="btn-lg"
                                                             url="{{route(route_prefix().'admin.pages.builder', $page->id)}}"
                                                             popover="{{__('edit with page builder')}}">
                                            <i class="mdi mdi-settings"
                                               style="vertical-align: text-bottom"></i> {{__('Edit with Page-Builder')}}
                                        </x-link-with-popover>
                                    @endif
                                </div>

                                <x-summernote.textarea label="{{__('Page Content')}}"
                                                       name="translate[{{$language->slug}}][page_content]"
                                                       value="{!! $page->getTranslations()['page_content'][$language->slug] !!}"/>

                                <div class="meta-information-wrapper">
                                    @php
                                        $selected_page = get_static_option($page->slug.'_page');
                                    @endphp

                                    <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

                                    @if($selected_page != $page->id)
                                        <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                            <div class="nav flex-column nav-pills me-3" role="tablist"
                                                 aria-orientation="vertical">
                                                <button class="nav-link active" data-bs-toggle="pill"
                                                        data-bs-target="#v-general-meta-info-{{$language->slug}}"
                                                        type="button" role="tab"
                                                        aria-selected="true">
                                                    {{__('General Meta Info')}}</button>
                                                <button class="nav-link" data-bs-toggle="pill"
                                                        data-bs-target="#v-facebook-meta-info-{{$language->slug}}"
                                                        type="button" role="tab"
                                                        aria-selected="false">
                                                    {{__('Facebook Meta Info')}}</button>
                                                <button class="nav-link" data-bs-toggle="pill"
                                                        data-bs-target="#v-twitter-meta-info-{{$language->slug}}"
                                                        type="button" role="tab"
                                                        aria-selected="false">
                                                    {{__('Twitter Meta Info')}}
                                                </button>
                                            </div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active"
                                                     id="v-general-meta-info-{{$language->slug}}"
                                                     role="tabpanel">
                                                    <x-fields.input
                                                        name="translate_meta[{{$language->slug}}][title]"
                                                        label="{{__('Meta Title')}}"
                                                        value="{{$page->metainfo->getTranslations()['title'][$language->slug] ?? ''}}"/>
                                                    <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][description]"
                                                        label="{{__('Meta Description')}}"
                                                        value="{{$page->metainfo->getTranslations()['description'][$language->slug] ?? ''}}"/>
                                                    <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"
                                                        id="{{$page->metainfo->getTranslations()['image'][$language->slug] ?? $language->slug . 'image'}}"/>
                                                </div>
                                                <div class="tab-pane fade"
                                                     id="v-facebook-meta-info-{{$language->slug}}"
                                                     role="tabpanel">
                                                    <x-fields.input
                                                        name="translate_meta[{{$language->slug}}][fb_title]"
                                                        label="{{__('Meta Title')}}"
                                                        value="{{$page->metainfo->getTranslations()['fb_title'][$language->slug] ?? ''}}"/>
                                                    <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][fb_description]"
                                                        label="{{__('Meta Description')}}"
                                                        value="{{$page->metainfo->getTranslations()['fb_description'][$language->slug] ?? ''}}"/>
                                                    <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][fb_image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"
                                                        id="{{$page->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' }}"/>
                                                </div>
                                                <div class="tab-pane fade"
                                                     id="v-twitter-meta-info-{{$language->slug}}"
                                                     role="tabpanel">
                                                    <x-fields.input
                                                        name="translate_meta[{{$language->slug}}][tw_title]"
                                                        label="{{__('Meta Title')}}"
                                                        value="{{$page->metainfo->getTranslations()['tw_title'][$language->slug] ?? ''}}"/>
                                                    <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][tw_description]"
                                                        label="{{__('Meta Description')}}"
                                                        value="{{$page->metainfo->getTranslations()['tw_description'][$language->slug] ?? ''}}"/>
                                                    <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][tw_image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"
                                                        id="{{$page->metainfo->getTranslations()['tw_image'][$language->slug]  ?? $language->slug . 'tw_image'}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="alert alert-info">{{__('This page is selected for front page. To update SEO please click the button below,')}}</p>
                                        <a class="btn btn-primary"
                                           href="{{route(route_prefix().'admin.general.seo.settings')}}">{{__('Global SEO Settings')}}</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <x-fields.select name="visibility" title="{{__('Visibility')}}"
                                             info="{{__('if you select users only, then this page can only be accessable by logged in users')}}">
                                <option @if($page->visibility === 0) selected
                                        @endif value="0">{{__('Everyone')}}</option>
                                <option @if($page->visibility === 1) selected
                                        @endif value="1">{{__('Users Only')}}</option>
                            </x-fields.select>
                            <x-fields.switcher name="breadcrumb" label="{{__('Enable/Disable Breadcrumb')}}"
                                               value="{{$page->breadcrumb}}"/>
                            <x-fields.switcher name="page_builder" label="{{__('Enable/Disable Page Builder')}}"
                                               value="{{$page->page_builder}}"/>

                            <x-fields.select name="status" title="{{__('Status')}}">
                                <option @if($page->status === 1) selected @endif value="1">{{__('Publish')}}</option>
                                <option @if($page->status === 0) selected @endif value="0">{{__('Draft')}}</option>
                            </x-fields.select>
                            <button type="submit"
                                    class="btn btn-gradient-primary me-2 mt-5">{{__('Save Changes')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection
@section('scripts')
    <x-media-upload.js/>
    <x-summernote.js/>
    <script>
        $(document).ready(function () {
            //Permalink Code

            function converToSlug(slug) {
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                finalSlug = slug.replace(/  +/g, ' ');
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                return finalSlug;
            }

            $(document).on('change', 'select[name="lang"]', function (e) {
                $(this).closest('form').trigger('submit');
                $('input[name="lang"]').val($(this).val());
            });

            function removeTags(str) {
                if ((str === null) || (str === '')) {
                    return false;
                }
                str = str.toString();
                return str.replace(/(<([^>]+)>)/ig, '');
            }

            //Slug Edit Code
            $(document).on('click', '.slug_edit_button', function (e) {
                e.preventDefault();
                $('.blog_slug').show();
                $(this).hide();
                $('.slug_update_button').show();
            });

            //Slug Update Code
            $(document).on('click', '.slug_update_button', function (e) {
                e.preventDefault();
                $(this).hide();
                $('.slug_edit_button').show();
                var dataLang = $(this).data('lang');
                var update_input = $('.' + dataLang).val();
                var slug = converToSlug(update_input);

                $('.' + dataLang).val(slug)
                var url = `{{!empty(tenant()) ? route('tenant.frontend.homepage') : route('landlord.homepage')}}/` + removeTags(slug);
                $('#' + dataLang).text(url);
                $('.blog_slug').hide();
            });

            //For Navbar
            var imgSelect1 = $('.img-select-nav');
            var id = $('#navbar_variant').val();
            imgSelect1.removeClass('selected');
            $('img[data-nav_id="' + id + '"]').parent().parent().addClass('selected');
            $(document).on('click', '.img-select-nav img', function (e) {
                e.preventDefault();
                imgSelect1.removeClass('selected');

                $(this).parent().parent().addClass('selected').siblings();
                $('#navbar_variant').val($(this).data('nav_id'));
            })

            //For Footer
            var imgSelect2 = $('.img-select-footer');
            var idi = $('#footer_variant').val();
            imgSelect2.removeClass('selected');
            $('img[data-foot_id="' + idi + '"]').parent().parent().addClass('selected');
            $(document).on('click', '.img-select-footer img', function (e) {
                e.preventDefault();
                imgSelect2.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#footer_variant').val($(this).data('foot_id'));
            })

        });
    </script>
@endsection
