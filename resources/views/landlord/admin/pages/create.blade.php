@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Create New Page')}}
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
                        <h4 class="card-title mb-4">{{__('Create New Page')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages')}}" extraclass="ml-3">
                            {{__('All Pages')}}
                        </x-link-with-popover>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.pages.create')}}">
                    @csrf

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
                                                            id="title"/>
                                            <div class="form-group permalink_label" style="">
                                                <label class="text-dark">{{__('Permalink')}} * :
                                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                                </label>
                                            </div>

                                            <x-summernote.textarea label="{{__('Page Content')}}"
                                                                   name="translate[{{$language->slug}}][page_content]"/>

                                            <div class="meta-information-wrapper">

                                                <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

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
                                                                    label="{{__('Meta Title')}}"/>
                                                            <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][description]"
                                                                    label="{{__('Meta Description')}}"/>
                                                            <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"/>
                                                        </div>
                                                        <div class="tab-pane fade"
                                                             id="v-facebook-meta-info-{{$language->slug}}"
                                                             role="tabpanel">
                                                            <x-fields.input
                                                                    name="translate_meta[{{$language->slug}}][fb_title]"
                                                                    label="{{__('Meta Title')}}"/>
                                                            <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][fb_description]"
                                                                    label="{{__('Meta Description')}}"/>
                                                            <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][fb_image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"/>
                                                        </div>
                                                        <div class="tab-pane fade"
                                                             id="v-twitter-meta-info-{{$language->slug}}"
                                                             role="tabpanel">
                                                            <x-fields.input
                                                                    name="translate_meta[{{$language->slug}}][tw_title]"
                                                                    label="{{__('Meta Title')}}"/>
                                                            <x-fields.textarea
                                                                    name="translate_meta[{{$language->slug}}][tw_description]"
                                                                    label="{{__('Meta Description')}}"/>
                                                            <x-fields.media-upload
                                                                    name="translate_meta[{{$language->slug}}][tw_image]"
                                                                    title="{{__('Meta Image')}}"
                                                                    dimentions="1200x1200"/>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                id="title"/>
                                <div class="form-group permalink_label" style="">
                                    <label class="text-dark">{{__('Permalink')}} * :
                                        <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                    </label>
                                </div>

                                <x-summernote.textarea label="{{__('Page Content')}}"
                                                       name="translate[{{$language->slug}}][page_content]"/>

                                <div class="meta-information-wrapper">

                                    <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

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
                                                        label="{{__('Meta Title')}}"/>
                                                <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][description]"
                                                        label="{{__('Meta Description')}}"/>
                                                <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"/>
                                            </div>
                                            <div class="tab-pane fade"
                                                 id="v-facebook-meta-info-{{$language->slug}}"
                                                 role="tabpanel">
                                                <x-fields.input
                                                        name="translate_meta[{{$language->slug}}][fb_title]"
                                                        label="{{__('Meta Title')}}"/>
                                                <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][fb_description]"
                                                        label="{{__('Meta Description')}}"/>
                                                <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][fb_image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"/>
                                            </div>
                                            <div class="tab-pane fade"
                                                 id="v-twitter-meta-info-{{$language->slug}}"
                                                 role="tabpanel">
                                                <x-fields.input
                                                        name="translate_meta[{{$language->slug}}][tw_title]"
                                                        label="{{__('Meta Title')}}"/>
                                                <x-fields.textarea
                                                        name="translate_meta[{{$language->slug}}][tw_description]"
                                                        label="{{__('Meta Description')}}"/>
                                                <x-fields.media-upload
                                                        name="translate_meta[{{$language->slug}}][tw_image]"
                                                        title="{{__('Meta Image')}}"
                                                        dimentions="1200x1200"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="col-lg-3">
                            <x-fields.select name="visibility" title="{{__('Visibility')}}"
                                             info="{{__('if you select users only, then this page can only be accessable by logged in users')}}">
                                <option value="0">{{__('Everyone')}}</option>
                                <option value="1">{{__('Users Only')}}</option>
                            </x-fields.select>
                            <x-fields.switcher name="breadcrumb" label="{{__('Enable/Disable Breadcrumb')}}"/>
                            <x-fields.switcher name="page_builder" label="{{__('Enable/Disable Page Builder')}}"/>
                            <x-fields.select name="status" title="{{__('Status')}}">
                                <option value="1">{{__('Publish')}}</option>
                                <option value="0">{{__('Draft')}}</option>
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
            $('.permalink_label').hide();

            function removeTags(str) {
                if ((str === null) || (str === '')) {
                    return false;
                }
                str = str.toString();
                return str.replace(/(<([^>]+)>)/ig, '');
            }

            function converToSlug(slug) {
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                finalSlug = slug.replace(/  +/g, ' ');
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                return finalSlug;
            }

            $(document).on('keyup change', 'input[name="title"]', function (e) {
                var slug = converToSlug($(this).val());
                var url = `{{!empty(tenant()) ? route('tenant.frontend.homepage') : route('landlord.homepage')}}/` + removeTags(slug);
                $('.permalink_label').show();
                var data = $('#slug_show').text(url).css('color', 'blue');
                $('.blog_slug').val(removeTags(slug));

            });

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
                var update_input = $('.blog_slug').val();
                var slug = converToSlug(update_input);
                var url = `{{!empty(tenant()) ? route('tenant.frontend.homepage') : route('landlord.homepage')}}/` + removeTags(slug);
                $('#slug_show').text(url);
                $('.blog_slug').hide();
            });

            //For Footer
            var imgSelect = $('.img-select');
            var id = $('#footer_variant').val();
            imgSelect.removeClass('selected');
            $('img[data-home_id="' + id + '"]').parent().parent().addClass('selected');
            $(document).on('click', '.img-select img', function (e) {
                e.preventDefault();
                imgSelect.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#footer_variant').val($(this).data('home_id'));
            })

        });
    </script>
@endsection
