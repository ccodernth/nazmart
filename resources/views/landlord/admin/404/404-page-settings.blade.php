@extends(route_prefix().'admin.admin-master')

@section('title')
    {{__('404 Error Page Settings')}}
@endsection

@section('style')
    <x-media-upload.css/>
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-error-msg/>
                <x-flash-msg/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{__('404 Error Page Settings')}}</h4>
                        <form action="{{route(route_prefix().'admin.404.page.settings')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach(get_all_language() as $language)
                                            <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab' : '' }}"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#language-new-{{ $language->slug }}"
                                                    type="button" role="tab"
                                                    aria-selected="{{ $loop->iteration == 1 ? 'true' : 'false' }}">
                                                {{ $language->name }}</button>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="tab-content">
                                    @foreach(get_all_language() as $language)

                                        <div
                                            class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent' : '' }}"
                                            id="language-new-{{$language->slug}}"
                                            role="tablist">

                                            <x-fields.input type="text"
                                                            value="{{ get_static_option_convert('error_404_page_subtitle')[$language->slug] ?? ''}}"
                                                            name="translate[{{$language->slug}}][error_404_page_subtitle]" label="{{__('Title')}}"/>
                                            <x-fields.input type="text"
                                                            value="{{get_static_option_convert('error_404_page_button_text')[$language->slug] ?? ''}}"
                                                            name="translate[{{$language->slug}}][error_404_page_button_text]" label="{{__('Button Text')}}"/>


                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp

                                <x-fields.input type="text"
                                                value="{{ get_static_option_convert('error_404_page_subtitle')[$language->slug] ?? ''}}"
                                                name="translate[{{$language->slug}}][error_404_page_subtitle]" label="{{__('Title')}}"/>
                                <x-fields.input type="text"
                                                value="{{get_static_option_convert('error_404_page_button_text')[$language->slug] ?? ''}}"
                                                name="translate[{{$language->slug}}][error_404_page_button_text]" label="{{__('Button Text')}}"/>

                            @endif
                            <x-fields.media-upload name="error_image" title="{{__('Site Logo')}}"/>

                            <button type="submit"
                                    class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <x-media-upload.js/>
@endsection
