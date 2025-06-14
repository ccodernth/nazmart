@extends(route_prefix().'admin.admin-master')
@section('title')
    {{__('Product Child-Category')}}
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
                            <h4 class="header-title mb-4">{{__('All Products Child-Categories')}}</h4>
                            <div class="btn-wrap">
                                @can('product-child-category-create')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#child-category_create_modal"
                                       class="btn btn-sm btn-info mb-3 mr-1 text-light">{{__('New Child Category')}}</a>
                                @endcan
                                @can('product-category-delete')
                                    <a class="btn btn-sm btn-danger mb-3 mr-1 text-light" href="{{route('tenant.admin.product.child-category.trash.all')}}">{{__('Trash')}}</a>
                                @endcan
                            </div>
                        </div>
                        @can('product-child-category-delete')
                            <x-bulk-action.dropdown/>
                        @endcan

                        <div class="table-wrap table-responsive">
                            <table class="table table-default">
                                <thead>
                                <x-bulk-action.th/>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Category Name') }}</th>
                                <th>{{ __('Sub Category Name') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Action') }}</th>
                                </thead>
                                <tbody>
                                @foreach($data['all_child_category'] as $child_category)
                                    @php
                                        $category = $child_category->category?->name;
                                        $sub_category = $child_category->sub_category?->name;
                                    @endphp
                                    <tr>
                                        <x-bulk-action.td :id="$child_category->id"/>
                                        <td>{{$child_category->id}}</td>
                                        <td>{{ $category }}</td>
                                        <td>{{ $sub_category }}</td>
                                        <td>{{$child_category->name}}</td>
                                        <td>
                                            <x-status-span :status="$child_category->status?->name"/>
                                        </td>
                                        <td>
                                            <div class="attachment-preview">
                                                <div class="img-wrap">
                                                    {!! render_image_markup_by_attachment_id($child_category->image_id) !!}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @can('product-child-category-delete')
                                                <x-table.btn.swal.delete
                                                    :route="route('tenant.admin.product.child-category.delete', $child_category->id)"/>
                                            @endcan
                                            @can('product-child-category-edit')
                                                @php
                                                    $image = get_attachment_image_by_id($child_category->image_id, null, true);
                                                    $img_path = $image['img_url'];
                                                @endphp

                                                <a href="javascript:void(0)"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#child-category_edit_modal"
                                                   class="btn btn-sm btn-primary btn-xs mb-3 mr-1 child-category_edit_btn"
                                                   data-id="{{$child_category->id}}"
                                                   data-name="{{$child_category->name}}"
                                                   data-slug="{{$child_category->slug}}"
                                                   data-status="{{ $child_category->status_id }}"
                                                   data-imageid="{!! $child_category->image_id !!}"
                                                   data-image="{{ $img_path }}"
                                                   data-category-id="{{$child_category->category_id}}"
                                                   data-sub-category-id="{{$child_category->sub_category_id}}"
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

    @can('product-child-category-edit')
        <div class="modal fade" id="child-category_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Update Child-Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('tenant.admin.product.child-category.update')}}" method="post">
                        <input type="hidden" name="id" id="child-category_id">
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
                                <label for="category">{{__('Category')}}</label>
                                <select class="form-control" id="edit_category_id" name="category_id">
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach ($data['all_category'] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group edit-sub-category-wrapper">
                                <label for="category">{{__('Sub Category')}}</label>
                                <select class="form-control" id="edit_sub_category" name="sub_category_id">
                                    <option>{{ __('Select Sub Category') }}</option>
                                </select>
                            </div>

                            <div class="form-group edit-status-wrapper">
                                <label for="edit_status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="edit_status">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'200x200'"/>
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

    @can('product-child-category-create')
        <div class="modal fade" id="child-category_create_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Add Child-Category')}}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                    </div>
                    <form action="{{route('tenant.admin.product.child-category.new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
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

                            @endif
                                <div class="form-group category-wrapper">
                                    <label for="category_id">{{__('Category')}}</label>
                                    <select class="form-control" id="create_category_id" name="category_id">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach ($data['all_category'] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group create-sub-category-wrapper">
                                    <label for="category">{{__('Sub Category')}}</label>
                                    <select class="form-control" id="create_sub_category" name="sub_category_id">
                                        <option>{{ __('Select Sub Category') }}</option>
                                    </select>
                                </div>

                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status_id" class="form-control" id="status">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-fields.media-upload :title="__('Image')" :name="'image_id'" :dimentions="'200x200'"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <x-media-upload.markup/>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on("change", "#create_category_id", function () {
                let category_id = $(this).val();

                $.ajax({
                    url: '{{ route("tenant.admin.product.subcategory.all") }}/of-category/select/' + category_id,
                    type: 'GET',
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        "category_id": category_id
                    },
                    success: function (data) {
                        $("#create_sub_category").html(data.option);
                        $(".create-sub-category-wrapper .list").html(data.list);
                        $(".create-sub-category-wrapper span.current").html(`{{__('Select Sub Category')}}`);
                    },
                    error: function (err) {

                    }
                });
            });

            $(document).on("change", "#edit_sub_category_id", function () {
                let category_id = $(this).val();

                $.ajax({
                    url: '{{ route("tenant.admin.product.subcategory.all") }}/of-category/select/' + category_id,
                    type: 'GET',
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        "category_id": category_id
                    },
                    success: function (data) {
                        $("#edit_sub_category").html(data.option);
                        $(".edit-sub-category-wrapper .list").html(data.list);
                        $(".edit-sub-category-wrapper span.current").html(`{{__('Select Sub Category')}}`);
                    },
                    error: function (err) {
                        toastr.error('<?php echo __("An error occurred"); ?>');
                    }
                });
            });

            $('#create-name , #create-slug').on('keyup', function () {
                let title_text = $(this).val();
                $('#create-slug').val(convertToSlug(title_text))
            });

            $('#edit_name , #edit_slug').on('keyup', function () {
                let title_text = $(this).val();
                $('#edit_slug').val(convertToSlug(title_text))
            });
            $(document).on('click', '.child-category_edit_btn', function () {
                $("#edit_sub_category_id").attr("id", "edit_category_id");
                let el = $(this);
                let id = el.data('id');

                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.product.child-category.get-category') }}", // POST isteğinin gideceği URL'yi buraya yazın
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
                let status = el.data('status');
                let category_id = el.data('category-id');
                let sub_category_id = el.data('sub-category-id');
                let modal = $('#child-category_edit_modal');

                $.ajax({
                    url: '{{ route("tenant.admin.product.subcategory.all") }}/of-category/select/' + category_id,
                    type: 'GET',
                    data: {
                        _token: '<?php echo csrf_token(); ?>',
                        "category_id": category_id
                    },
                    success: function (data) {
                        $("#edit_sub_category").html(data.option);
                        $(".edit-sub-category-wrapper .list").html(data.list);

                        modal.find(".edit-sub-category-wrapper .list li[data-value='" + sub_category_id + "']").click();
                        modal.find(".modal-footer").click();
                        $("#edit_category_id").attr("id", "edit_sub_category_id");
                    },
                    error: function (err) {

                    }
                });

                modal.find('#child-category_id').val(id);
                modal.find('#edit_status option[value=' + status + ']').attr('selected', true);
                modal.find('#edit_name').val(name);
                modal.find('#edit_slug').val(slug);
                modal.find('#edit_category').val(category_id);
                modal.find(`.edit-category-wrapper select option`).attr('selected', false);
                modal.find(`.edit-category-wrapper select option[value="${category_id}"]`).attr('selected', true);
                modal.find(".edit-status-wrapper select option[value=" + status + "]").attr('selected', true);

                modal.find(".modal-footer").click();

                let image = el.data('image');
                let imageid = el.data('imageid');

                if (imageid != '') {
                    modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                    modal.find('.media-upload-btn-wrapper input').val(imageid);
                    modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text(`{{__('Change Image')}}`);
                }
            });
        });

        function convertToSlug(text) {
            return text
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
        }
    </script>
    <x-datatable.js/>
    <x-media-upload.js/>
    <x-table.btn.swal.js/>
    @can('product-child-category-delete')
        <x-bulk-action.js :route="route('tenant.admin.product.child-category.bulk.action')"/>
    @endcan
@endsection
