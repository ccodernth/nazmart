@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Edit Blog Post')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{global_asset('assets/landlord/admin/css/bootstrap-tagsinput.css')}}">
    <x-summernote.css/>
    <x-media-upload.css/>
    <style>
        .nav-pills .nav-link {
            margin: 8px 0px !important;
        }

        .col-lg-4.right-side-card {
            background: aliceblue;
        }

        #show-autocomplete {
            margin-top: 10px;
            padding: 10px;
            background: #0d6efd91;
            border-radius: 5px;
            box-shadow: 0 5px 10px 5px #198ae32b;
        }

        ul.autocomplete-warp {
            margin: 0;
            list-style-type: none;
            padding-left: 0;
        }

        li.tag_option {
            background-color: #fff;
            margin-bottom: 5px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-left: 15px;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">  {{__('Edit Blog Post')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <p></p>
                        <x-link-with-popover url="{{route(route_prefix().'admin.blog')}}" extraclass="ml-3">
                            {{__('All Blog Post')}}
                        </x-link-with-popover>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post"
                      action="{{route(route_prefix().'admin.blog.update',$blog_post->id)}}">
                    @csrf
                    <div class="row">


                        <div class="col-lg-8">
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
                                                            value="{{$blog_post->getTranslations()['title'][$language->slug] ?? ''}}"
                                                            id="title"/>
                                            <div class="form-group permalink_label" style="">
                                                <label class="text-dark">{{__('Permalink * : ')}}
                                                    <span id="lang-translate-{{$language->slug}}" class="display-inline"
                                                          style="color: blue;">{{getUserBasedDomain(tenant())}}/blog/{{$blog_post->getTranslations()['slug'][$language->slug] ?? ''}}</span>
                                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2 lang-translate-{{$language->slug}}"
                                               value="{{$blog_post->getTranslations()['slug'][$language->slug] ?? ''}}"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  data-lang="lang-translate-{{$language->slug}}"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                                </label>
                                            </div>

                                            <div class="my-3">
                                                @if($blog_post->page_builder === 1)
                                                    <x-link-with-popover class="dark"
                                                                         btn-size="btn-lg"
                                                                         url="{{route(route_prefix().'admin.pages.builder', $blog_post->id)}}"
                                                                         popover="{{__('edit with page builder')}}">
                                                        <i class="mdi mdi-settings"
                                                           style="vertical-align: text-bottom"></i> {{__('Edit with Page-Builder')}}
                                                    </x-link-with-popover>
                                                @endif
                                            </div>

                                            @php

                                              $blogContent =  $blog_post->getTranslations()['blog_content'][$language->slug] ?? '';
                                            @endphp
                                            <x-summernote.textarea label="{{__('Blog Content')}}"
                                                                   name="translate[{{$language->slug}}][blog_content]"
                                                                   value="{!! $blogContent !!}"/>

                                            <div class="meta-information-wrapper">
                                                @php
                                                    $selected_page = get_static_option($blog_post->slug.'_page');
                                                @endphp

                                                <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

                                                @if($selected_page != $blog_post->id)
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
                                                                        value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['title'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.textarea
                                                                        name="translate_meta[{{$language->slug}}][description]"
                                                                        label="{{__('Meta Description')}}"
                                                                        value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['description'][$language->slug] ?? '' : ''}}"/>

                                                                @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="1200x1200"
                                                                            id="{{ $blog_post->metainfo->getTranslations()['image'][$language->slug] }}"
                                                                    />
                                                                @else
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="{{__('1200x1200')}}"/>
                                                                @endif

                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-facebook-meta-info-{{$language->slug}}"
                                                                 role="tabpanel">
                                                                <x-fields.input
                                                                        name="translate_meta[{{$language->slug}}][fb_title]"
                                                                        label="{{__('Meta Title')}}"
                                                                        value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_title'][$language->slug] ?? '': ''}}"/>
                                                                <x-fields.textarea
                                                                        name="translate_meta[{{$language->slug}}][fb_description]"
                                                                        label="{{__('Meta Description')}}"
                                                                        value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_description'][$language->slug] ?? '' : ''}}"/>

                                                                @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][fb_image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="1200x1200"
                                                                            id="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' : $language->slug . 'fb_image' }}"/>

                                                                @else
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][fb_image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="{{__('1200x1200')}}"/>
                                                                @endif

                                                            </div>
                                                            <div class="tab-pane fade"
                                                                 id="v-twitter-meta-info-{{$language->slug}}"
                                                                 role="tabpanel">
                                                                <x-fields.input
                                                                        name="translate_meta[{{$language->slug}}][tw_title]"
                                                                        label="{{__('Meta Title')}}"
                                                                        value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['tw_title'][$language->slug] ?? '' : ''}}"/>
                                                                <x-fields.textarea
                                                                        name="translate_meta[{{$language->slug}}][tw_description]"
                                                                        label="{{__('Meta Description')}}"
                                                                        value="{{$blog_post->metainfo ?$blog_post->metainfo->getTranslations()['tw_description'][$language->slug] ?? '' : ''}}"/>


                                                                @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][tw_image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="1200x1200"
                                                                            id="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' : $language->slug . 'fb_image' }}"/>

                                                                @else
                                                                    <x-fields.media-upload
                                                                            name="translate_meta[{{$language->slug}}][tw_image]"
                                                                            title="{{__('Meta Image')}}"
                                                                            dimentions="{{__('1200x1200')}}"/>
                                                                @endif
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
                                                value="{{$blog_post->getTranslations()['title'][$language->slug] ?? ''}}"
                                                id="title"/>
                                <div class="form-group permalink_label" style="">
                                    <label class="text-dark">{{__('Permalink * : ')}}
                                        <span id="lang-translate-{{$language->slug}}" class="display-inline"
                                              style="color: blue;">{{getUserBasedDomain(tenant())}}/blog/{{$blog_post->getTranslations()['slug'][$language->slug] ?? ''}}</span>
                                        <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i
                                                     class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="translate[{{$language->slug}}][slug]"
                                               class="form-control blog_slug mt-2 lang-translate-{{$language->slug}}"
                                               value="{{$blog_post->getTranslations()['slug'][$language->slug]}}"
                                               style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2"
                                                  data-lang="lang-translate-{{$language->slug}}"
                                                  style="display: none">{{__('Update')}}</button>
                                    </span>
                                    </label>
                                </div>

                                <div class="my-3">
                                    @if($blog_post->page_builder === 1)
                                        <x-link-with-popover class="dark"
                                                             btn-size="btn-lg"
                                                             url="{{route(route_prefix().'admin.pages.builder', $blog_post->id)}}"
                                                             popover="{{__('edit with page builder')}}">
                                            <i class="mdi mdi-settings"
                                               style="vertical-align: text-bottom"></i> {{__('Edit with Page-Builder')}}
                                        </x-link-with-popover>
                                    @endif
                                </div>

                                <x-summernote.textarea label="{{__('Blog Content')}}"
                                                       name="translate[{{$language->slug}}][blog_content]"
                                                       value="{!! $blog_post->getTranslations()['blog_content'][$language->slug] !!}"/>

                                <div class="meta-information-wrapper">
                                    @php
                                        $selected_page = get_static_option($blog_post->slug.'_page');
                                    @endphp

                                    <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>

                                    @if($selected_page != $blog_post->id)
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
                                                            value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['title'][$language->slug] ?? '' : ''}}"/>
                                                    <x-fields.textarea
                                                            name="translate_meta[{{$language->slug}}][description]"
                                                            label="{{__('Meta Description')}}"
                                                            value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['description'][$language->slug] ?? '' : ''}}"/>

                                                    @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="1200x1200"
                                                                id="{{ $blog_post->metainfo->getTranslations()['image'][$language->slug] }}"
                                                        />
                                                    @else
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="{{__('1200x1200')}}"/>
                                                    @endif

                                                </div>
                                                <div class="tab-pane fade"
                                                     id="v-facebook-meta-info-{{$language->slug}}"
                                                     role="tabpanel">
                                                    <x-fields.input
                                                            name="translate_meta[{{$language->slug}}][fb_title]"
                                                            label="{{__('Meta Title')}}"
                                                            value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_title'][$language->slug] ?? '': ''}}"/>
                                                    <x-fields.textarea
                                                            name="translate_meta[{{$language->slug}}][fb_description]"
                                                            label="{{__('Meta Description')}}"
                                                            value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_description'][$language->slug] ?? '' : ''}}"/>

                                                    @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][fb_image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="1200x1200"
                                                                id="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' : $language->slug . 'fb_image' }}"/>

                                                    @else
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][fb_image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="{{__('1200x1200')}}"/>
                                                    @endif

                                                </div>
                                                <div class="tab-pane fade"
                                                     id="v-twitter-meta-info-{{$language->slug}}"
                                                     role="tabpanel">
                                                    <x-fields.input
                                                            name="translate_meta[{{$language->slug}}][tw_title]"
                                                            label="{{__('Meta Title')}}"
                                                            value="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['tw_title'][$language->slug] ?? '' : ''}}"/>
                                                    <x-fields.textarea
                                                            name="translate_meta[{{$language->slug}}][tw_description]"
                                                            label="{{__('Meta Description')}}"
                                                            value="{{$blog_post->metainfo ?$blog_post->metainfo->getTranslations()['tw_description'][$language->slug] ?? '' : ''}}"/>


                                                    @if($blog_post->metainfo && isset($blog_post->metainfo->getTranslations()['image'][$language->slug]))
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][tw_image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="1200x1200"
                                                                id="{{$blog_post->metainfo ? $blog_post->metainfo->getTranslations()['fb_image'][$language->slug] ?? $language->slug . 'fb_image' : $language->slug . 'fb_image' }}"/>

                                                    @else
                                                        <x-fields.media-upload
                                                                name="translate_meta[{{$language->slug}}][tw_image]"
                                                                title="{{__('Meta Image')}}"
                                                                dimentions="{{__('1200x1200')}}"/>
                                                    @endif
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
                        <div class="col-lg-4 right-side-card">
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="card my-3">
                                        <div class="card-body">
                                            @php
                                                $check = $blog_post->video_urll ? 'checked' : ''
                                            @endphp
                                            <x-landlord-others.blog-post-type/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="video_section" style="display: none">
                                        <div class="card my-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-body">
                                                        <x-fields.input type="text" name="video_url"
                                                                        label="{{__('Video Url')}}"
                                                                        value="{{$blog_post->video_url}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <x-fields.select name="category_id" class="form-control"
                                                                     title="{{__('Category')}}">
                                                        @foreach($all_blog_category as $cat)
                                                            <option value="{{$cat->id}}"
                                                                    @if($cat->id == $blog_post->category_id) selected @endif>{{$cat->title}}</option>
                                                        @endforeach
                                                    </x-fields.select>

                                                    <div class="form-group " id="blog_tag_list">
                                                        <label for="title">{{__('Product Tag')}}</label>
                                                        <input type="text" class="form-control tags_filed"
                                                               name="tags" id="datetimepicker1"
                                                               value="{{$blog_post->tags}}">
                                                        <div id="show-autocomplete" style="display: none;">
                                                            <ul class="autocomplete-warp"></ul>
                                                        </div>
                                                    </div>

                                                    <x-fields.switcher type="checkbox" name="featured"
                                                                       label="{{__('Featured')}}"
                                                                       value="{{$blog_post->featured}}"/>

                                                    <x-fields.select name="visibility" class="form-control"
                                                                     id="visibility" title="{{__('Visibility')}}">
                                                        <option value="public"
                                                                @if( $blog_post->visibility == 'public') selected @endif>{{__('Public')}}</option>
                                                        <option value="logged_user"
                                                                @if( $blog_post->visibility == 'logged_user') selected @endif>{{__('Logged User')}}</option>
                                                    </x-fields.select>


                                                    <x-fields.select name="status" class="form-control" id="status"
                                                                     title="{{__('Status')}}">
                                                        <option value="{{\App\Enums\StatusEnums::DRAFT}}"
                                                                @if( $blog_post->status == \App\Enums\StatusEnums::DRAFT) selected @endif>{{__("Draft")}}</option>
                                                        <option value="{{\App\Enums\StatusEnums::PUBLISH}}"
                                                                @if( $blog_post->status ==\App\Enums\StatusEnums::PUBLISH) selected @endif>{{__("Publish")}}</option>
                                                    </x-fields.select>

                                                    <x-landlord-others.edit-media-upload-image :label="'Blog Image'"
                                                                                               :name="'image'"
                                                                                               :value="$blog_post->image"/>
                                                    <x-landlord-others.edit-media-upload-gallery
                                                            :label="'Image Gallery'" :name="'image_gallery'"
                                                            :value="$blog_post->image_gallery"/>

                                                    <div class="submit_btn mt-5">
                                                        <button type="submit"
                                                                class="btn btn-gradient-primary pull-right">{{__('Update Post ')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <x-summernote.js/>
    <x-media-upload.js/>
    <script src="{{global_asset('assets/landlord/admin/js/bootstrap-tagsinput.js')}}"></script>

    <script>
        //Date Picker
        flatpickr('#tag_data', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            minDate: "today"
        });

        var blogTagInput = $('#blog_tag_list .tags_filed');
        var oldTag = '';
        blogTagInput.tagsinput();
        //For Tags
        $(document).on('keyup', '#blog_tag_list .bootstrap-tagsinput input[type="text"]', function (e) {
            e.preventDefault();
            var el = $(this);
            var inputValue = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ route('tenant.admin.blog.get.tags.by.ajax') }}",
                async: false,
                data: {
                    query: inputValue
                },

                success: function (data) {
                    oldTag = inputValue;
                    let html = '';
                    var showAutocomplete = '';
                    $('#show-autocomplete').html('<ul class="autocomplete-warp"></ul>');
                    if (el.val() != '' && data.markup != '') {
                        data.result.map(function (tag, key) {
                            html += '<li class="tag_option" data-id="' + key + '"  data-val="' + tag + '">' + tag + '</li>'
                        })

                        $('#show-autocomplete ul').html(html);
                        $('#show-autocomplete').show();
                    } else {
                        $('#show-autocomplete').hide();
                        oldTag = '';
                    }

                },
                error: function (res) {

                }
            });
        });

        $(document).on('click', '.tag_option', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let tag = $(this).data('val');
            blogTagInput.tagsinput('add', tag);
            $(this).parent().remove();
            blogTagInput.tagsinput('remove', oldTag);
        });
    </script>

    <script>
        $(document).ready(function () {
            //Status Code
            function converToSlug(slug) {
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                finalSlug = slug.replace(/  +/g, ' ');
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                return finalSlug;
            }

            //Permalink Code
            var sl = $('.blog_slug').val();
            var url = `{{url('/blog/')}}/` + sl;
            var data = $('.slug_show').text(url).css('color', 'blue');

            var form = $('#blog_new_form');

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
                var url = `{{url('/blog/')}}/` + slug;
                $('#' + dataLang).text(url);
                $('.blog_slug').hide();
            });


            $(document).on('change', 'select[name="lang"]', function (e) {
                $(this).closest('form').trigger('submit');
                $('input[name="lang"]').val($(this).val());
            });
            $(document).on('change', '.post_type', function () {
                var val = $(this).val();
                if (val === 'option2') {
                    $('.video_section').show();
                } else {
                    $('.video_section').hide();
                }
            })

        });

        if ('{{$check}}') {
            $('.video_section').show();
        }


        $('.summernote').summernote({
            height: 400,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            callbacks: {
                onChange: function (contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });
        if ($('.summernote').length > 0) {
            $('.summernote').each(function (index, value) {
                $(this).summernote('code', $(this).data('content'));
            });
        }


    </script>
@endsection
