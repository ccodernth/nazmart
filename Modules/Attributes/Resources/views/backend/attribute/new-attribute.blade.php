@extends('tenant.admin.admin-master')
@section('title')
    {{__('New Variant')}}
@endsection
@section('site-title')
    {{__('New Variant')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="margin-top-40">
                    <x-flash-msg/>
                    <x-error-msg/>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapper d-flex justify-content-between">
                            <h4 class="header-title mb-4">{{__('Add New Variant')}}</h4>
                            @can('product-attribute-list')
                            <a href="{{route('tenant.admin.products.attributes.all')}}" class="btn btn-primary">{{__('All Variants')}}</a>
                            @endcan
                        </div>

                        @can('product-attribute-create')
                        <form action="{{route('tenant.admin.products.attributes.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
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

                                        <div class="tab-content">
                                            @foreach(get_all_language() as $language)

                                                <div class="tab-pane fade show {{ $loop->iteration == 1 ? 'active' : '' }}"
                                                     id="language-{{$language->slug}}"
                                                     role="tabpanel">

                                                    <div class="form-group">
                                                        <label for="title">{{__('Title')}}</label>
                                                        <input type="text" class="form-control"  name="translate[{{$language->slug}}][title]" value="{{old('title')}}" placeholder="{{__('Title')}}">
                                                    </div>

                                                    <div class="form-group attributes-field product-variants">
                                                        <label for="attributes">{{__('Terms')}}</label>
                                                        <div class="attribute-field-wrapper">
                                                            <input type="text" class="form-control" name="translate[{{$language->slug}}][terms][]" placeholder="{{__('terms')}}">
                                                            <div class="icon-wrapper">
                                                                <span class="btn btn-sm btn-info add_attributes" data-lang="{{$language->slug}}"><i class="las la-plus"></i></span>
                                                                <span class="btn btn-sm btn-danger remove_attributes" data-lang="{{$language->slug}}"><i class="las la-minus"></i></span>
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

                                        <div class="form-group">
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" class="form-control"  name="translate[{{$language->slug}}][title]" value="{{old('title')}}" placeholder="{{__('Title')}}">
                                        </div>
                                        <div class="form-group attributes-field product-variants">
                                            <label for="attributes">{{__('Terms')}}</label>
                                            <div class="attribute-field-wrapper">
                                                <input type="text" class="form-control" name="translate[{{$language->slug}}][terms][]" placeholder="{{__('terms')}}">
                                                <div class="icon-wrapper">
                                                    <span class="btn btn-sm btn-info add_attributes" data-lang="{{$language->slug}}"><i class="las la-plus"></i></span>
                                                    <span class="btn btn-sm btn-danger remove_attributes" data-lang="{{$language->slug}}"><i class="las la-minus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Save Changes')}}</button>
                                </div>
                            </div>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
                $(document).on('click', '.attribute-field-wrapper .add_attributes', function (e) {
                    e.preventDefault();
                    var langValue = this.getAttribute('data-lang');

                    $(this).parent().parent().parent().append(' <div class="attribute-field-wrapper">\n' +
                        '<input type="text" class="form-control" name="translate['+ langValue +'][terms][]" placeholder="{{__('terms')}}">\n' +
                        '<div class="icon-wrapper">\n' +
                        '<span class="btn btn-sm btn-info add_attributes" data-lang="'+ langValue +'"><i class="las la-plus"></i></span>\n' +
                        '<span class="btn btn-sm btn-danger remove_attributes" data-lang="'+ langValue +'"><i class="las la-minus"></i></span>\n' +
                        '</div>\n' +
                        '</div>');
                });

                $(document).on('click', '.attribute-field-wrapper .remove_attributes', function (e) {
                    e.preventDefault();
                    if($(".attribute-field-wrapper").length > 1){
                        $(this).parent().parent().remove();
                    }
                });
            });
        })(jQuery)
    </script>
@endsection
