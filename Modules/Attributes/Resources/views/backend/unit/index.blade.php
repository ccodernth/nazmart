@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Product Unit')}}
@endsection
@section('style')
    <x-datatable.css/>
    <x-bulk-action.css/>
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
            <div class="col-xl-7 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{__('All Units')}}</h4>
                        @can('product-unit-delete')
                            <x-bulk-action.dropdown/>
                        @endcan
                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-action.th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($product_units as $unit)
                                    <tr>
                                        <x-bulk-action.td :id="$unit->id"/>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$unit->name}}</td>
                                        <td>
                                            @can('product-unit-delete')
                                                <x-table.btn.swal.delete
                                                    :route="route('tenant.admin.product.units.delete', $unit->id)"/>
                                            @endcan
                                            @can('product-unit-edit')
                                                <a href="javascript:void(0)"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#unit_edit_modal"
                                                   class="btn btn-primary btn-sm btn-xs mb-3 mr-1 unit_edit_btn"
                                                   data-id="{{$unit->id}}"
                                                   data-name="{{$unit->name}}"
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
            @can('product-unit-create')
                <div class="col-xl-5 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">{{__('Add New Unit')}}</h4>
                            <form action="{{route('tenant.admin.product.units.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                                    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                        <div class="w-100 nav flex-row justify-content-center nav-pills me-3"
                                             role="tablist"
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
                                                    <label for="edit_name">{{__('Name')}}</label>
                                                    <input type="text" class="form-control"
                                                           id="translate-{{$language->slug}}-name"
                                                           name="translate[{{$language->slug}}][name]"
                                                           placeholder="{{__('Name')}}">
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                @else
                                    @php
                                        $language = default_lang();
                                    @endphp
                                    <div class="form-group">
                                        <label for="edit_name">{{__('Name')}}</label>
                                        <input type="text" class="form-control"
                                               id="translate-{{$language->slug}}-title"
                                               name="translate[{{$language->slug}}][name]"
                                               placeholder="{{__('Name')}}">
                                    </div>

                                @endif
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
    @can('product-unit-edit')
        <div class="modal fade" id="unit_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Unit')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('tenant.admin.product.units.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="unit_id">
                        <div class="modal-body">
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
                                                <label for="edit_name">{{__('Name')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-name"
                                                       name="translate[{{$language->slug}}][name]"
                                                       placeholder="{{__('Name')}}">
                                            </div>
                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp
                                <div class="form-group">
                                    <label for="edit_name">{{__('Name')}}</label>
                                    <input type="text" class="form-control"
                                           id="translate-{{$language->slug}}-name"
                                           name="translate[{{$language->slug}}][name]"
                                           placeholder="{{__('Name')}}">
                                </div>

                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary"
                                    data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection
@section('scripts')
    <x-datatable.js/>
    <x-table.btn.swal.js/>
    @can('product-unit-delete')
        <x-bulk-action.js :route="route('tenant.admin.product.units.bulk.action')"/>
    @endcan

    <script>
        $(document).ready(function () {
            $(document).on('click', '.unit_edit_btn', function () {
                let el = $(this);
                let id = el.data('id');
                let name = el.data('name');
                let modal = $('#unit_edit_modal');

                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.product.units.get-unit') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            modal.find('#translate-' + language.slug + '-name').val(JSON.parse(response.name)[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });
                modal.find('#unit_id').val(id);
                modal.find('#edit_name').val(name);

                modal.show();
            });
        });
    </script>

@endsection
