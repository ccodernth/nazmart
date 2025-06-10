@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Product Delivery Manage')}}
@endsection
@section('site-title')
    {{__('Product Delivery Manage')}}
@endsection
@section('style')
    <link href="{{ global_asset('assets/common/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">
    <x-datatable.css />
    <x-bulk-action.css />
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="">
                    <x-error-msg/>
                    <x-flash-msg/>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex flex-wrap justify-content-between">
                            <h4 class="header-title mb-4">{{__('All Delivery Manages')}}</h4>
                        </div>
                        @can('product-delivery-manage-delete')
                            <x-bulk-action.dropdown />
                            <a class="btn btn-danger btn-sm" href="{{route('tenant.admin.product.delivery.option.trash.all')}}">{{__('Trash')}}</a>
                        @endcan
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-action.th />
                                <th>{{__('ID')}}</th>
                                <th>{{__('Icon')}}</th>
                                <th>{{__('Title')}}</th>
                                <th>{{__('Sub Title')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($delivery_manages as $item)
                                    <tr>
                                        <x-bulk-action.td :id="$item->id" />
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <i class="{{$item->icon}}"></i>
                                        </td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->sub_title}}</td>
                                        <td>
                                            @can('product-delivery_manage-delete')
                                                <x-table.btn.swal.delete :route="route('tenant.admin.product.delivery.option.delete', $item->id)" />
                                            @endcan
                                            @can('product-delivery_manage-edit')
                                                <a href="javascript:void(0)"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#delivery_manage_edit_modal"
                                                   class="btn btn-primary btn-sm btn-xs mb-3 mr-1 delivery_manage_edit_btn"
                                                   data-id="{{$item->id}}"
                                                   data-title="{{$item->title}}"
                                                   data-sub-title="{{$item->sub_title}}"
                                                   data-icon="{{$item->icon}}"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @can('product-delivery_manage-create')
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">{{__('Add New Delivery Manage')}}</h4>
                            <form action="{{route('tenant.admin.product.delivery.option.store')}}" method="post" enctype="multipart/form-data">
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

                                                <div class="form-group">
                                                    <label for="edit_name">{{__('Title')}}</label>
                                                    <input type="text" class="form-control"
                                                           id="translate-{{$language->slug}}-title"
                                                           name="translate[{{$language->slug}}][title]"
                                                           placeholder="{{__('Name')}}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="edit_slug">{{__('Sub Title')}}</label>
                                                    <input type="text" class="form-control"
                                                           id="translate-{{$language->slug}}-sub_title"
                                                           name="translate[{{$language->slug}}][sub_title]"
                                                           placeholder="{{__('Slug')}}">
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                @else
                                    @php
                                        $language = default_lang();
                                    @endphp
                                    <div class="form-group">
                                        <label for="edit_name">{{__('Title')}}</label>
                                        <input type="text" class="form-control"
                                               id="translate-{{$language->slug}}-title"
                                               name="translate[{{$language->slug}}][title]"
                                               placeholder="{{__('Name')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_slug">{{__('Sub Title')}}</label>
                                        <input type="text" class="form-control"
                                               id="translate-{{$language->slug}}-sub_title"
                                               name="translate[{{$language->slug}}][sub_title]"
                                               placeholder="{{__('Slug')}}">
                                    </div>

                                @endif

                                <div class="form-group">
                                    <x-fields.icon-picker/>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
    @can('product-delivery_manage-edit')
        <div class="modal fade" id="delivery_manage_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Delivery Manage')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('tenant.admin.product.delivery.option.update')}}"  method="post">
                        @csrf
                        <input type="hidden" name="id" id="delivery_manage_id">
                        <div class="modal-body">
                            @csrf
                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach(get_all_language() as $language)
                                            <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab' : '' }}"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#language-{{ $language->slug }}"
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
                                            id="language-{{$language->slug}}"
                                            role="tablist">

                                            <div class="form-group">
                                                <label for="edit_name">{{__('Title')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-title"
                                                       name="translate[{{$language->slug}}][title]"
                                                       placeholder="{{__('Title')}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_slug">{{__('Sub Title')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-sub_title"
                                                       name="translate[{{$language->slug}}][sub_title]"
                                                       placeholder="{{__('Slug')}}">
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp
                                <div class="form-group">
                                    <label for="edit_name">{{__('Title')}}</label>
                                    <input type="text" class="form-control"
                                           id="translate-{{$language->slug}}-title"
                                           name="translate[{{$language->slug}}][title]"
                                           placeholder="{{__('Title')}}">
                                </div>

                                <div class="form-group">
                                    <label for="edit_slug">{{__('Sub Title')}}</label>
                                    <input type="text" class="form-control"
                                           id="translate-{{$language->slug}}-sub_title"
                                           name="translate[{{$language->slug}}][sub_title]"
                                           placeholder="{{__('Slug')}}">
                                </div>

                            @endif

                            <x-fields.icon-picker/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('scripts')
    <script src="{{global_asset('assets/common/js/fontawesome-iconpicker.min.js')}}"></script>
    <x-datatable.js />
    <x-table.btn.swal.js />

    @can('product-delivery_manage-delete')
        <x-bulk-action.js :route="route('tenant.admin.product.delivery.option.bulk.action')" />
    @endcan
    <script>
        $(document).ready(function () {
            <x-icon-picker/>
            $(document).on('click','.delivery_manage_edit_btn',function(){
                let el = $(this);
                let id = el.data('id');
                let modal = $('#delivery_manage_edit_modal');

                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.product.delivery.option.get-delivery-option') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            modal.find('#translate-' + language.slug + '-title').val(JSON.parse(response.title)[language.slug]);
                            modal.find('#translate-' + language.slug + '-sub_title').val(JSON.parse(response.sub_title)[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });
                let title = el.data('title');
                let sub_title = el.data('sub-title');

                modal.find('#delivery_manage_id').val(id);
                modal.find('#edit-title').val(title);
                modal.find('#edit-sub-title').val(sub_title);
                // modal.find('#edit-icon').val(icon);
                modal.find('.icp-dd').attr('data-selected', el.data('icon'));
                modal.find('.iconpicker-component i').attr('class', el.data('icon'));

                modal.show();
            });
        });
    </script>
@endsection
