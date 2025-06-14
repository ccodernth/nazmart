@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Product Category')}}
@endsection
@section('style')
    <x-media-upload.css/>
    <x-datatable.css/>
    <x-bulk-action.css/>

    <style>
        .img-wrap img {
            width: 100%;
        }
    </style>
@endsection

@php
    $all_status = \App\Models\Status::all();
@endphp

@section('content')
    <div class="col-lg-12 col-ml-12">
        <x-error-msg/>
        <x-flash-msg/>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex flex-wrap justify-content-between">
                            <h4 class="header-title mb-4">{{__('All Products Categories')}}</h4>
                            <div class="div">
                                @can('product-category-create')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#category_create_modal"
                                       class="btn btn-sm btn-info mb-3 mr-1 text-light">{{__('New Category')}}</a>
                                @endcan
                                @can('product-category-delete')
                                    <a class="btn btn-sm btn-danger mb-3 mr-1 text-light"
                                       href="{{route('tenant.admin.product.category.trash.all')}}">{{__('Trash')}}</a>
                                @endcan
                            </div>
                        </div>
                        @can('product-category-delete')
                            <x-bulk-action.dropdown/>
                        @endcan

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-action.th/>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>

                                @foreach($all_category as $key => $category)
                                    <tr>
                                        <x-bulk-action.td :id="$category->id"/>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <div class="attachment-preview">
                                                <div class="img-wrap">
                                                    {!! render_image_markup_by_attachment_id($category->image_id) !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <x-status-span :status="$category->status?->name"/>
                                        </td>
                                        <td>
                                            @can('product-category-delete')
                                                <x-table.btn.swal.delete
                                                    :route="route('tenant.admin.product.category.delete', $category->id)"/>
                                            @endcan

                                            @can('product-category-edit')
                                                @php
                                                    $image = get_attachment_image_by_id($category->image_id, null, true);
                                                    $img_path = $image['img_url'];
                                                @endphp

                                                <a href="#"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#category_edit_modal"
                                                   class="btn btn-sm btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                                   data-id="{{$category->id}}"
                                                   data-name="{{$category->name}}"
                                                   data-status="{{$category->status?->id}}"
                                                   data-slug="{{$category->slug}}"
                                                   data-description="{{$category->description}}"
                                                   data-imageid="{{$category->image_id}}"
                                                   data-image="{{$img_path}}"
                                                >
                                                    <i class="mdi mdi-lead-pencil"></i>
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
        </div>
    </div>
    @can('product-category-edit')
        <div class="modal fade" id="category_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{ route('tenant.admin.product.category.update') }}" method="post">

                        <input type="hidden" name="id" id="category_id">
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

                                            <div class="form-group">
                                                <label for="edit_slug">{{__('Slug')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-slug"
                                                       name="translate[{{$language->slug}}][slug]"
                                                       placeholder="{{__('Slug')}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_description">{{__('Description')}}</label>
                                                <textarea type="text" class="form-control"
                                                          id="translate-{{$language->slug}}-description"
                                                          name="translate[{{$language->slug}}][description]"
                                                          placeholder="{{__('Description')}}"></textarea>
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

                                <div class="form-group">
                                    <label for="edit_slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control"
                                           id="translate-{{$language->slug}}-slug"
                                           name="translate[{{$language->slug}}][slug]"
                                           placeholder="{{__('Slug')}}">
                                </div>

                                <div class="form-group">
                                    <label for="edit_description">{{__('Description')}}</label>
                                    <textarea type="text" class="form-control"
                                              id="translate-{{$language->slug}}-description"
                                              name="translate[{{$language->slug}}][description]"
                                              placeholder="{{__('Description')}}"></textarea>
                                </div>

                            @endif
                            @csrf

                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'120x120'"/>

                            <div class="form-group edit-status-wrapper">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="edit_status">
                                    @foreach($all_status as $status)
                                        <option value="{{$status->id}}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    @can('product-category-create')
        <div class="modal fade" id="category_create_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Create Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tenant.admin.product.category.new') }}" method="post"
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

                                            <div class="form-group">
                                                <label for="edit_name">{{__('Name')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-name"
                                                       name="translate[{{$language->slug}}][name]"
                                                       placeholder="{{__('Name')}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_slug">{{__('Slug')}}</label>
                                                <input type="text" class="form-control"
                                                       id="translate-{{$language->slug}}-slug"
                                                       name="translate[{{$language->slug}}][slug]"
                                                       placeholder="{{__('Slug')}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="edit_description">{{__('Description')}}</label>
                                                <textarea type="text" class="form-control"
                                                          id="translate-{{$language->slug}}-description"
                                                          name="translate[{{$language->slug}}][description]"
                                                          placeholder="{{__('Description')}}"></textarea>
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

                                <div class="form-group">
                                    <label for="edit_slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control"
                                           id="translate-{{$language->slug}}-slug"
                                           name="translate[{{$language->slug}}][slug]"
                                           placeholder="{{__('Slug')}}">
                                </div>

                                <div class="form-group">
                                    <label for="edit_description">{{__('Description')}}</label>
                                    <textarea type="text" class="form-control"
                                              id="translate-{{$language->slug}}-description"
                                              name="translate[{{$language->slug}}][description]"
                                              placeholder="{{__('Description')}}"></textarea>
                                </div>

                            @endif
                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'120x120'"/>
                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="status">
                                    @foreach($all_status as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <div class="body-overlay-desktop"></div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <x-datatable.js/>
    <x-media-upload.js/>
    <x-table.btn.swal.js/>
    @can('product-category-delete')
        <x-bulk-action.js :route="route('tenant.admin.product.category.bulk.action')"/>
    @endcan

    <script>
        $(document).ready(function () {
            $(document).on('click', '.category_edit_btn', function () {
                console.log('geldi');
                let el = $(this);
                let id = el.data('id');
                let modal = $('#category_edit_modal');
                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.product.category.get-category') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            console.log('az için', response.name['az'], 'dil içinde', response.name,language.slug, response.name[language.slug])
                            modal.find('#translate-' + language.slug + '-name').val(JSON.parse(response.name)[language.slug]);
                            modal.find('#translate-' + language.slug + '-slug').val(JSON.parse(response.slug)[language.slug]);
                            modal.find('#translate-' + language.slug + '-description').val(JSON.parse(response.description)[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });

                let status = el.data('status');


                modal.find('#category_id').val(id);
                modal.find('#edit_status option[value="' + status + '"]').attr('selected', true);
                modal.find(".edit-status-wrapper .list li[data-value='" + status + "']").click();
                modal.find(".modal-footer").click();

                let image = el.data('image');
                let imageid = el.data('imageid');

                if (imageid != '') {
                    modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                    modal.find('.media-upload-btn-wrapper input').val(imageid);
                    modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }

            });

            $('#create-name , #create-slug').on('keyup', function () {
                let title_text = $(this).val();
                $('#create-slug').val(convertToSlug(title_text))
            });

            $('#edit_name , #edit_slug').on('keyup', function () {
                let title_text = $(this).val();
                $('#edit_slug').val(convertToSlug(title_text))
            });
        });

        function convertToSlug(text) {
            return text
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
        }
    </script>
@endsection
