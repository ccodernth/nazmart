@php
    if(!isset($product)){
        $product = null;
    }
@endphp

<div class="general-info-wrapper">
    <h4 class="dashboard-common-title-two"> {{ __("General Information") }} </h4>
    <div class="general-info-form mt-0 mt-lg-4">
        <form action="#">
            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                         aria-orientation="vertical">

                        @foreach(get_all_language() as $language)
                            <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab' : '' }}"
                                    data-bs-toggle="pill"
                                    data-bs-target="#language-{{ $language->slug }}"
                                    type="button" role="tab" aria-selected="{{ $loop->iteration == 1 ? 'true' : 'false' }}">
                                {{ $language->name }}</button>
                        @endforeach

                    </div>
                </div>

                <div class="tab-content">
                    @foreach(get_all_language() as $language)

                        <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent' : '' }}"
                             id="language-{{$language->slug}}"
                             role="tablist">
                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> {{ __("Name") }} </label>
                                <input type="text" class="form--control radius-10" id="product-name"
                                       value="{{$product?->getTranslations()['name'][$language->slug] ?? ''}}"
                                       name="translate[{{$language->slug}}][name]"
                                       placeholder="{{ __("Write product Name...") }}">
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2">
                                    {{ __("Slug") }}
                                    <i class="mdi mdi-alert-circle-outline" data-bs-toggle="tooltip"
                                       data-bs-placement="right"
                                       data-bs-title="{{__('Only selected language text will convert into slug')}}"></i>
                                </label>

                                <input type="text" class="form--control radius-10" id="product-slug"
                                       value="{{$product?->getTranslations()['slug'][$language->slug] ?? ''}}"
                                       name="translate[{{$language->slug}}][slug]"
                                       placeholder="{{ __("Write product slug...") }}">
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> {{ __("Summery") }} </label>
                                <textarea style="height: 120px" class="form--control form--message  radius-10"
                                          name="translate[{{$language->slug}}][summary]"
                                          placeholder="{{ __("Write product Summery...") }}">{!! $product?->getTranslations()['summary'][$language->slug] ?? '' !!} </textarea>
                            </div>

                            <div class="dashboard-input mt-4">
                                <label class="dashboard-label color-light mb-2"> {{ __("Description") }} </label>
                                <textarea class="form--control summernote radius-10"
                                          name="translate[{{$language->slug}}][description]"
                                          placeholder="{{ __("Type Description") }}">{!! $product?->getTranslations()['description'][$language->slug] ?? '' !!}</textarea>
                            </div>




                        </div>

                    @endforeach
                </div>


            @else
                @php
                    $language = default_lang();
                @endphp
                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> {{ __("Name") }} </label>
                    <input type="text" class="form--control radius-10" id="product-name"
                           value="{!! $product?->name ?? "" !!}" name="name"
                           placeholder="{{ __("Write product Name...") }}">
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2">
                        {{ __("Slug") }}
                        <i class="mdi mdi-alert-circle-outline" data-bs-toggle="tooltip" data-bs-placement="right"
                           data-bs-title="{{__('Only selected language text will convert into slug')}}"></i>
                    </label>

                    <input type="text" class="form--control radius-10" id="product-slug"
                           value="{{ $product?->slug ?? "" }}" name="slug"
                           placeholder="{{ __("Write product slug...") }}">
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> {{ __("Summery") }} </label>
                    <textarea style="height: 120px" class="form--control form--message  radius-10" name="summery"
                              placeholder="{{ __("Write product Summery...") }}">{!! $product?->summary ?? "" !!} </textarea>
                </div>

                <div class="dashboard-input mt-4">
                    <label class="dashboard-label color-light mb-2"> {{ __("Description") }} </label>
                    <textarea class="form--control summernote radius-10" name="description"
                              placeholder="{{ __("Type Description") }}">{!! $product?->description ?? "" !!}</textarea>
                </div>

            @endif

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Included files") }} <sup class="text-primary">{{__('Optional')}}</sup> </label>
                <input type="text" class="form--control radius-10" id="included_file" value="{{ $product?->included_files ?? "" }}" name="included_files" placeholder="{{ __("Write included file names...") }}">
            </div>

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Version") }} <sup class="text-primary">{{__('(Optional)')}}</sup> </label>
                <input type="text" class="form--control radius-10" id="version" value="{{ $product?->version ?? "" }}" name="version" placeholder="{{ __("Write version number...") }}">
            </div>

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Release Date") }} <sup class="text-primary">{{__('(Optional)')}}</sup> </label>
                <input type="date" class="form--control radius-10 flatpickr" id="release_date" value="{{ $product?->release_date ?? "" }}" name="release_date" placeholder="{{ __("Write release date...") }}">
            </div>

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Latest Update") }} <sup class="text-primary">{{__('(Optional)')}}</sup> </label>
                <input type="date" class="form--control radius-10 flatpickr" id="latest_date" value="{{ $product?->update_date ?? "" }}" name="update_date" placeholder="{{ __("Write latest update...") }}">
            </div>

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Preview Link") }} <sup class="text-primary">{{__('(Optional)')}}</sup> </label>
                <input type="text" class="form--control radius-10" id="preview_link" value="{{ $product?->preview_link ?? "" }}" name="preview_link" placeholder="{{ __("Write preview link...") }}">
            </div>

            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Quantity") }} <sup class="text-primary">{{__('(Optional - If applicable)')}}</sup> </label>
                <input type="text" class="form--control radius-10" id="quantity" value="{{ $product?->quantity ?? "" }}" name="quantity" placeholder="{{ __("Write quantity...") }}">
            </div>
        </form>
    </div>
</div>
