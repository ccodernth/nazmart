@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Product Sub Category')}}
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
    $statuses = \App\Models\Status::all();
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
                            <h4 class="header-title mb-4">{{__('All Sub Categories')}}</h4>
                            <div class="btn-wrap">
                                @can('product-category-create')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#category_create_modal"
                                       class="btn btn-sm btn-info mb-3 mr-1 text-light">{{__('New Sub Category')}}</a>
                                @endcan
                                @can('product-category-delete')
                                    <a class="btn btn-sm btn-danger mb-3 mr-1 text-light"
                                       href="{{route('tenant.admin.product.subcategory.trash.all')}}">{{__('Trash')}}</a>
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
                                <th>{{__('Sub Category Name')}}</th>
                                <th>{{__('Category Name')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>

                                @foreach($data['all_sub_category'] as $category)
                                    <tr>
                                        <x-bulk-action.td :id="$category->id"/>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->category?->name}}</td>
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
                                                    :route="route('tenant.admin.product.subcategory.delete', $category->id)"/>
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
                                                   data-category="{{$category->category?->id}}"
                                                   data-name="{{$category->name}}"
                                                   data-status="{{$category->status_id}}"
                                                   data-slug="{{$category->slug}}"
                                                   data-description="{{$category->description}}"
                                                   data-imageid="{{$category->image}}"
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
                        <h5 class="modal-title">{{__('Update Sub Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{ route('tenant.admin.product.subcategory.update') }}" method="post">
                        <input type="hidden" name="id" id="category_id">
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

                            <div class="form-group edit-category-wrapper">
                                <label for="name">{{__('Category')}}</label>
                                <select type="text" class="form-control" id="category_id" name="category_id">
                                    <option value="">{{__('Select Category')}}</option>
                                    @foreach($data['all_category'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'200x200'"/>
                            <div class="form-group edit-status-wrapper">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="edit_status">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
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
                        <h5 class="modal-title">{{__('Create Sub Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tenant.admin.product.subcategory.new') }}" method="post"
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


                            <div class="form-group">
                                <label for="name">{{__('Category')}}</label>
                                <select type="text" class="form-control" id="create_category_id" name="category_id">
                                    <option value="">{{__('Select Category')}}</option>
                                    @foreach($data['all_category'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'200x200'"/>

                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="status">

                                    @foreach($statuses as $status)
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
        <x-bulk-action.js :route="route('tenant.admin.product.subcategory.bulk.action')"/>
    @endcan

    <script>
        $(document).ready(function () {
            $(document).on('click', '.category_edit_btn', function () {
                let el = $(this);
                let id = el.data('id');

                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.product.subcategory.get-category') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            modal.find('#translate-' + language.slug + '-name').val(JSON.parse(response.name)[language.slug]);
                            modal.find('#translate-' + language.slug + '-slug').val(JSON.parse(response.slug)[language.slug]);
                            modal.find('#translate-' + language.slug + '-description').val(JSON.parse(response.description)[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });


                let name = el.data('name');
                let slug = el.data('slug');
                let description = el.data('description');
                let category = el.data("category");

                let status = el.data('status');
                let modal = $('#category_edit_modal');

                modal.find('#category_id').val(id);
                modal.find('#edit_status option[value="' + status + '"]').attr('selected', true);
                modal.find('#edit_name').val(name);
                modal.find('#edit_slug').val(slug);
                modal.find('#edit_description').val(description);
                modal.find(".edit-status-wrapper .list li[data-value='" + status + "']").click();
                modal.find(".edit-category-wrapper select option[value=" + category + "]").attr('selected', true);
                modal.find(".modal-footer").click();

                let image = el.data('image');
                let imageid = el.data('imageid');

                if (imageid !== '') {
                    modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                    modal.find('.media-upload-btn-wrapper input').val(imageid.id);
                    modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text(`{{__('Change Image')}}`);
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

            function convertToSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            }
        });
    </script>
@endsection
