@php
    if(!isset($metaData)){
        $metaData = null;
    }
@endphp

@if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
        <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
             aria-orientation="vertical">

            @foreach(get_all_language() as $language)
                <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab' : '' }}"
                        data-bs-toggle="pill"
                        data-bs-target="#seo-language-{{ $language->slug }}"
                        type="button" role="tab" aria-selected="true">
                    {{ $language->name }}</button>
            @endforeach

        </div>
    </div>

    <div class="tab-content">
        @foreach(get_all_language() as $language)

            <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent' : '' }}"
                 id="seo-language-{{$language->slug}}"
                 role="tabpanel">


                <div class="meta-body-wrapper mt-3">
                    <h4 class="dashboard-common-title-two mb-4"> {{ __("Meta SEO") }} </h4>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link general-meta active" id="general-meta-info-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#general-meta-info-{{$language->slug}}" type="button" role="tab" aria-controls="home" aria-selected="true">
                                {{__("General meta info")}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="facebook-meta-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#facebook-meta-{{$language->slug}}" type="button" role="tab" aria-controls="facebook-meta" aria-selected="false">
                                {{__("Facebook meta")}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="twitter-meta-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#twitter-meta-{{$language->slug}}" type="button" role="tab" aria-controls="twitter-meta" aria-selected="false">
                                {{__("Twitter meta")}}</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane py-4 fade show active general-meta-pane" id="general-meta-info-{{$language->slug}}" role="tabpanel" aria-labelledby="general-meta-info-tab">
                            <h4>{{__('General Info')}}</h4>
                            <div class="form-group dashboard-input">
                                <label for="general-title">{{__("Title")}}</label>
                                <input type="text" id="general-title" value="{{$metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''}}" class="form--control radius-10 " name="translate_meta[{{$language->slug}}][title]" placeholder="{{__("General info title")}}">
                            </div>
                            <div class="form-group">
                                <label for="general-description">{{__("Description")}}</label>
                                <textarea type="text" id="general-description" name="translate_meta[{{$language->slug}}][description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['description'][$language->slug] ?? '' : ''}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane py-4 fade" id="facebook-meta-{{$language->slug}}" role="tabpanel" aria-labelledby="facebook-meta-tab">
                            <h4>{{__("Facebook Info")}}</h4>
                            <div class="form-group dashboard-input">
                                <label for="facebook-title">{{__("Title")}}</label>
                                <input type="text" id="facebook-title" name="translate_meta[{{$language->slug}}][fb_title]" value="{{$metaData ? $metaData->getTranslations()['fb_title'][$language->slug] ?? '' : ''}}"  class="form--control radius-10 " placeholder="{{__("General info title")}}">
                            </div>
                            <div class="form-group">
                                <label for="facebook-description">{{__("Description")}}</label>
                                <textarea type="text" id="facebook-description" name="translate_meta[{{$language->slug}}][fb_description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['fb_description'][$language->slug] ?? '' : ''}}</textarea>
                            </div>
                            @if($metaData && isset($metaData->getTranslations()['fb_image'][$language->slug]))
                                <x-fields.media-upload
                                    name="translate_meta[{{$language->slug}}][fb_image]"
                                    title="{{__('General Info Meta Image')}}"
                                    dimentions="1200x1200"
                                    id="{{ $metaData->getTranslations()['fb_image'][$language->slug] }}"
                                />
                            @else
                                <x-fields.media-upload
                                    name="translate_meta[{{$language->slug}}][fb_image]"
                                    title="{{__('General Info Meta Image')}}"
                                    dimentions="{{__('1200x1200')}}"/>
                            @endif
                        </div>
                        <div class="tab-pane py-4 fade" id="twitter-meta-{{$language->slug}}" role="tabpanel" aria-labelledby="twitter-meta-tab">
                            <h4>{{__("Twitter Info")}}</h4>
                            <div class="form-group dashboard-input">
                                <label for="general-title">{{__("Title")}}</label>
                                <input type="text" id="twitter-title" value="{{$metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''}}" name="translate_meta[{{$language->slug}}][tw_title]"  class="form--control radius-10 " placeholder="{{__("General info title")}}">
                            </div>
                            <div class="form-group">
                                <label for="general-description">{{__("Description")}}</label>
                                <textarea type="text" id="twitter-description" name="translate_meta[{{$language->slug}}][tw_description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['tw_description'][$language->slug] ?? '' : ''}}</textarea>
                            </div>

                            @if($metaData && isset($metaData->getTranslations()['tw_image'][$language->slug]))
                                <x-fields.media-upload
                                    name="translate_meta[{{$language->slug}}][tw_image]"
                                    title="{{__('General Info Meta Image')}}"
                                    dimentions="1200x1200"
                                    id="{{ $metaData->getTranslations()['tw_image'][$language->slug] }}"
                                />
                            @else
                                <x-fields.media-upload
                                    name="translate_meta[{{$language->slug}}][tw_image]"
                                    title="{{__('General Info Meta Image')}}"
                                    dimentions="{{__('1200x1200')}}"/>
                            @endif
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


    <div class="meta-body-wrapper mt-3">
        <h4 class="dashboard-common-title-two mb-4"> {{ __("Meta SEO") }} </h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link general-meta active" id="general-meta-info-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#general-meta-info-{{$language->slug}}" type="button" role="tab" aria-controls="home" aria-selected="true">
                    {{__("General meta info")}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="facebook-meta-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#facebook-meta-{{$language->slug}}" type="button" role="tab" aria-controls="facebook-meta" aria-selected="false">
                    {{__("Facebook meta")}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="twitter-meta-tab-{{$language->slug}}" data-bs-toggle="tab" data-bs-target="#twitter-meta-{{$language->slug}}" type="button" role="tab" aria-controls="twitter-meta" aria-selected="false">
                    {{__("Twitter meta")}}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane py-4 fade show active general-meta-pane" id="general-meta-info-{{$language->slug}}" role="tabpanel" aria-labelledby="general-meta-info-tab">
                <h4>{{__('General Info')}}</h4>
                <div class="form-group dashboard-input">
                    <label for="general-title">{{__("Title")}}</label>
                    <input type="text" id="general-title" value="{{$metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''}}"  class="form--control radius-10 " name="translate_meta[{{$language->slug}}][title]" placeholder="{{__("General info title")}}">
                </div>
                <div class="form-group">
                    <label for="general-description">{{__("Description")}}</label>
                    <textarea type="text" id="general-description" name="translate_meta[{{$language->slug}}][description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['description'][$language->slug] ?? '' : ''}}</textarea>
                </div>
            </div>
            <div class="tab-pane py-4 fade" id="facebook-meta-{{$language->slug}}" role="tabpanel" aria-labelledby="facebook-meta-tab">
                <h4>{{__("Facebook Info")}}</h4>
                <div class="form-group dashboard-input">
                    <label for="facebook-title">{{__("Title")}}</label>
                    <input type="text" id="facebook-title" name="translate_meta[{{$language->slug}}][fb_title]" value="{{$metaData ? $metaData->getTranslations()['fb_title'][$language->slug] ?? '' : ''}}"  class="form--control radius-10 " placeholder="{{__("General info title")}}">
                </div>
                <div class="form-group">
                    <label for="facebook-description">{{__("Description")}}</label>
                    <textarea type="text" id="facebook-description" name="translate_meta[{{$language->slug}}][fb_description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['fb_description'][$language->slug] ?? '' : ''}}</textarea>
                </div>
                @if($metaData && isset($metaData->getTranslations()['fb_image'][$language->slug]))
                    <x-fields.media-upload
                        name="translate_meta[{{$language->slug}}][fb_image]"
                        title="{{__('General Info Meta Image')}}"
                        dimentions="1200x1200"
                        id="{{ $metaData->getTranslations()['fb_image'][$language->slug] }}"
                    />
                @else
                    <x-fields.media-upload
                        name="translate_meta[{{$language->slug}}][fb_image]"
                        title="{{__('General Info Meta Image')}}"
                        dimentions="{{__('1200x1200')}}"/>
                @endif
            </div>
            <div class="tab-pane py-4 fade" id="twitter-meta-{{$language->slug}}" role="tabpanel" aria-labelledby="twitter-meta-tab">
                <h4>{{__("Twitter Info")}}</h4>
                <div class="form-group dashboard-input">
                    <label for="general-title">{{__("Title")}}</label>
                    <input type="text" id="twitter-title" value="{{$metaData ? $metaData->getTranslations()['title'][$language->slug] ?? '' : ''}}" name="translate_meta[{{$language->slug}}][tw_title]"  class="form--control radius-10 " placeholder="{{__("General info title")}}">
                </div>
                <div class="form-group">
                    <label for="general-description">{{__("Description")}}</label>
                    <textarea type="text" id="twitter-description" name="translate_meta[{{$language->slug}}][tw_description]" class="form--control radius-10 py-2" rows="6" placeholder="{{__("General info description")}}">{{$metaData ? $metaData->getTranslations()['tw_description'][$language->slug] ?? '' : ''}}</textarea>
                </div>

                @if($metaData && isset($metaData->getTranslations()['tw_image'][$language->slug]))
                    <x-fields.media-upload
                        name="translate_meta[{{$language->slug}}][tw_image]"
                        title="{{__('General Info Meta Image')}}"
                        dimentions="1200x1200"
                        id="{{ $metaData->getTranslations()['tw_image'][$language->slug] }}"
                    />
                @else
                    <x-fields.media-upload
                        name="translate_meta[{{$language->slug}}][tw_image]"
                        title="{{__('General Info Meta Image')}}"
                        dimentions="{{__('1200x1200')}}"/>
                @endif
            </div>
        </div>
    </div>
@endif

