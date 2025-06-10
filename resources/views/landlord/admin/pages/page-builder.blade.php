@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Edit With Page Builder')}}
@endsection
@section('style')
    <x-media-upload.css/>
    <x-summernote.css/>
    <x-pagebuilder::css/>
    <link rel="stylesheet" href="{{global_asset('assets/common/css/fontawesome-iconpicker.min.css')}}">
    <link href="{{ global_asset('assets/landlord/admin/css/nice-select.css') }}" rel="stylesheet">

    <style>
        .attachment-preview {
            overflow: hidden;
        }

        .attachment-preview .thumbnail .centered {
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(50%, 50%);
            width: 100%;
            height: 100%;
        }

        .attachment-preview .thumbnail .centered img {
            object-fit: contain;
        }
    </style>
@endsection
@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">{{$page->title}} <br> <small
                                class="text-small">{{__('Edit With Page Builder')}}</small></h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages')}}" extraclass="ml-3">
                            {{__('All Pages')}}
                        </x-link-with-popover>
                        <x-link-with-popover class="info" target="_blank"
                                             url="{{route(route_prefix().'dynamic.page', $page->slug)}}"
                                             popover="{{__('view item in frontend')}}">
                            <i class="mdi mdi-eye"></i>
                        </x-link-with-popover>
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages.edit', $page->id)}}">
                            <i class="mdi mdi-pencil"></i>
                        </x-link-with-popover>

                    </x-slot>
                </x-admin.header-wrapper>

            </div>
        </div>
    </div>


    <div class="row g-4">
        <div class="col-lg-12">
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
            @else
                @php
                    $language = default_lang();
                @endphp
            @endif
        </div>

        <div class="tab-content">
            @foreach(get_all_language() as $language)
                <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'active' : '' }}"
                     id="language-{{$language->slug}}"
                     role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <x-pagebuilder::draggable location="dynamic_page" :page="$page" :loop="$loop"
                                                          :language="$language"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <x-pagebuilder::widgets type="landlord"  :language="$language"/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <script src="{{global_asset('assets/common/js/fontawesome-iconpicker.min.js')}}"></script>
    <script src="{{global_asset('assets/common/js/jquery.nice-select.min.js')}}"></script>
    <x-media-upload.js/>
    <x-summernote.js/>
    <x-pagebuilder::js/>
    <x-pagebuilder::script :page="$page"/>
    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
