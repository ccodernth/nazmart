@extends(route_prefix().'admin.admin-master')

@section('title')
    {{__('Maintain Page Settings')}}
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
                        <h4 class="header-title mb-4">{{__('Maintain Page Settings')}}</h4>
                        <form action="{{route(route_prefix().'admin.maintains.page.settings')}}" method="post" enctype="multipart/form-data">
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
                                                            value="{{ get_static_option_convert('maintains_page_title')[$language->slug] ?? ''}}"
                                                            name="translate[{{$language->slug}}][maintains_page_title]" label="{{__('Title')}}"/>
                                            <x-fields.textarea type="text"
                                                               value="{{get_static_option_convert('maintains_page_description')[$language->slug] ?? ''}}"
                                                               name="translate[{{$language->slug}}][maintains_page_description]" label="{{__('Description')}}"/>


                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp

                                <x-fields.input type="text"
                                                value="{{ get_static_option_convert('maintains_page_title')[$language->slug] ?? ''}}"
                                                name="translate[{{$language->slug}}][maintains_page_title]" label="{{__('Title')}}"/>
                                <x-fields.textarea type="text"
                                                value="{{get_static_option_convert('maintains_page_description')[$language->slug] ?? ''}}"
                                                name="translate[{{$language->slug}}][maintains_page_description]" label="{{__('Description')}}"/>

                            @endif
                           <div class="form-group">
                               <label for="">{{__('Coming Back Date')}}</label>
                               <input type="date" name="mentenance_back_date" class="form-control mt-2 date" value="{{ get_static_option('mentenance_back_date') ?? ''}}" id="maintenance_date">
                           </div>

                            <x-fields.media-upload name="maintenance_logo" title="{{__('Maintenance Logo')}}"/>
                            <x-fields.media-upload name="maintenance_bg_image" title="{{__('Maintenance Background Image')}}"/>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
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
    <script>
        //Date Picker
        flatpickr('#maintenance_date', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d H:i"
        });
    </script>
@endsection

