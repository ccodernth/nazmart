@extends(route_prefix().'admin.admin-master')
@section('title') {{__('All Blog Categories')}} @endsection

@section('style')
    <x-media-upload.css/>
    <x-datatable.css/>
@endsection

@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">{{__('All Blog Categories')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex ">
                        <div class="right-button ml-2">
                         <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#new_category">{{__('Add New Category')}}</button>
                        </div>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-bulk-action permissions="blog-category-delete"/>
                <x-error-msg/>
                <x-flash-msg/>
                <x-datatable.table>
                    <x-slot name="th">
                        <th class="no-sort">
                            <div class="mark-all-checkbox">
                                <input type="checkbox" class="all-checkbox">
                            </div>
                        </th>
                        <th>{{__('ID')}}</th>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Action')}}</th>
                    </x-slot>
                    <x-slot name="tr">
                        @foreach($all_blog_category as $data)
                            <tr>
                                <td>
                                    <x-bulk-delete-checkbox :id="$data->id"/>
                                </td>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title }}</td>
                                <td>{{ \App\Enums\StatusEnums::getText($data->status)  }}</td>
                                <td>
                                    @can('blog-category-edit')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#category_item_edit_modal"
                                       class="btn btn-primary btn-xs mb-3 mr-1 category_edit_btn"
                                       data-bs-placement="top"
                                       title="{{__('Edit')}}"
                                       data-id="{{$data->id}}"
                                       data-action="{{route(route_prefix().'admin.blog.category.update')}}"
                                       data-title="{{$data->title}}"
                                       data-slug="{{$data->slug}}"
                                       data-status="{{$data->status}}"
                                    >
                                        <i class="las la-edit"></i>
                                    </a>
                                    @endcan
                                    <x-delete-popover permissions="blog-category-delete" url="{{route(route_prefix().'admin.blog.category.delete', $data->id)}}"/>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable.table>

            </div>
        </div>
    </div>

    @can('blog-category-create')
    <div class="modal fade" id="new_category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{__('New Blog Category')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route(route_prefix().'admin.blog.category.store')}}" method="post">
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
                                            <label for="edit_name">{{__('Title')}}</label>
                                            <input type="text" class="form-control"
                                                   id="translate-{{$language->slug}}-title"
                                                   name="translate[{{$language->slug}}][title]"
                                                   placeholder="{{__('Title')}}">
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
                                <label for="edit_name">{{__('Title')}}</label>
                                <input type="text" class="form-control"
                                       id="translate-{{$language->slug}}-title"
                                       name="translate[{{$language->slug}}][title]"
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
                        @csrf

                        <x-fields.select name="status" title="{{__('Status')}}">
                            <option value="{{\App\Enums\StatusEnums::PUBLISH}}">{{__('Publish')}}</option>
                            <option value="{{\App\Enums\StatusEnums::DRAFT}}">{{__('Draft')}}</option>
                        </x-fields.select>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan

    @can('blog-category-edit')
    <div class="modal fade" id="category_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{__('Edit Blog Category Item')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" class="category_edit_modal_form" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
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
                                                   placeholder="{{__('Title')}}">
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
                                <label for="edit_name">{{__('Title')}}</label>
                                <input type="text" class="form-control"
                                       id="translate-{{$language->slug}}-title"
                                       name="translate[{{$language->slug}}][title]"
                                       placeholder="{{__('Title')}}">
                            </div>

                            <div class="form-group">
                                <label for="edit_slug">{{__('Slug')}}</label>
                                <input type="text" class="form-control"
                                       id="translate-{{$language->slug}}-slug"
                                       name="translate[{{$language->slug}}][slug]"
                                       placeholder="{{__('Slug')}}">
                            </div>

                        @endif
                        <input type="hidden" name="id" class="category_id" value="">

                        <x-fields.select name="status" title="{{__('Status')}}" class="edit_status">
                            <option value="{{\App\Enums\StatusEnums::PUBLISH}}">{{__('Publish')}}</option>
                            <option value="{{\App\Enums\StatusEnums::DRAFT}}">{{__('Draft')}}</option>
                        </x-fields.select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <x-media-upload.js/>
    <x-datatable.js/>
    <x-bulk-action-js :url="route(route_prefix().'admin.blog.category.bulk.action')" />
    <script>
        $(document).ready(function($){
            "use strict";

                $(document).on('change','select[name="lang"]',function (e){
                    $(this).closest('form').trigger('submit');
                    $('input[name="lang"]').val($(this).val());
                });

            $(document).on('click', '.category_edit_btn', function () {
                let el = $(this);
                let id = el.data('id');

                let form = $('.category_edit_modal_form');
                $.ajax({
                    type: "POST",
                    url: "{{ route('tenant.admin.blog.category.get-category') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            console.log(language, language.slug, response)
                            form.find('#translate-' + language.slug + '-title').val(response.title[language.slug]);
                            form.find('#translate-' + language.slug + '-slug').val(response.slug[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });

                let title = el.data('title');
                let slug = el.data('slug');
                let action = el.data('action');

                form.attr('action', action);
                form.find('.category_id').val(id);
                form.find('.edit_title').val(title);
                form.find('.edit_slug').val(slug);
               form.find('.edit_status option[value="'+el.data('status')+'"]').attr('selected',true);

            });

        });
    </script>
@endsection
