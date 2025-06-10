
@if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
        <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
             aria-orientation="vertical">

            @foreach(get_all_language() as $language)
                <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab' : '' }}"
                        data-bs-toggle="pill"
                        data-bs-target="#return-language-{{ $language->slug }}"
                        type="button" role="tab" aria-selected="true">
                    {{ $language->name }}</button>
            @endforeach

        </div>
    </div>

    <div class="tab-content">
        @foreach(get_all_language() as $language)

            <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent' : '' }}"
                 id="return-language-{{$language->slug}}"
                 role="tabpanel">

                <div class="general-info-wrapper px-3">
                    <h4 class="dashboard-common-title-two">{{ __("Product Shipping and Return Policy") }}</h4>
                    <div class="general-info-form mt-0 mt-lg-4">
                        <div class="dashboard-input mt-4">
                            <label class="dashboard-label color-light mb-2"> {{ __("Policy Description") }} </label>
                            <textarea class="form--control summernote radius-10" name="translate_policy_description[{{$language->slug}}]" placeholder="{{ __("Type Description") }}">{!! isset($product) && $product?->return_policy ? $product?->return_policy->getTranslations()['shipping_return_description'][$language->slug] ?? '' : '' !!}</textarea>
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


    <div class="general-info-wrapper px-3">
        <h4 class="dashboard-common-title-two">{{ __("Product Shipping and Return Policy") }}</h4>
        <div class="general-info-form mt-0 mt-lg-4">
            <div class="dashboard-input mt-4">
                <label class="dashboard-label color-light mb-2"> {{ __("Policy Description") }} </label>
                <textarea class="form--control summernote radius-10" name="translate_policy_description[{{$language->slug}}]" placeholder="{{ __("Type Description") }}">{!! isset($product) && $product?->return_policy ? $product?->return_policy->getTranslations()['shipping_return_description'][$language->slug] ?? '' : '' !!}</textarea>
            </div>
        </div>
    </div>
@endif
