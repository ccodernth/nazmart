@extends(route_prefix().'admin.admin-master')
@section('title') {{__('All Testimonial')}} @endsection

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
                        <h4 class="card-title mb-4">{{__('All Testimonial')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <p></p>
                        <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#new_testimonial">{{__('Add New Testimonial')}}</button>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-bulk-action permissions="testimonial-delete"/>
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
                        <th>{{__('Image')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Designation')}}</th>
                        <th>{{__('Company')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Action')}}</th>
                    </x-slot>
                    <x-slot name="tr">
                        @foreach($all_testimonials as $data)
                            <tr>
                                <td>
                                    <x-bulk-delete-checkbox :id="$data->id"/>
                                </td>
                                <td>{{$data->id}}</td>
                                <td>
                                    @php
                                        $testimonial_img = get_attachment_image_by_id($data->image,null,true);
                                    @endphp
                                    {!! render_attachment_preview_for_admin($data->image ?? '') !!}
                                    @php  $img_url = $testimonial_img['img_url']; @endphp
                                </td>

                                <td>
                                    {{ $data->name}}
                                </td>
                                <td>{{$data->designation}}</td>
                                <td>{{$data->company}}</td>
                                <td>{{ \App\Enums\StatusEnums::getText($data->status)  }}</td>
                                <td>
                                @can('testimonial-edit')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#testimonial_item_edit_modal"
                                       class="btn btn-primary btn-xs mb-3 mr-1 testimonial_edit_btn"
                                       data-bs-placement="top"
                                       title="{{__('Edit')}}"
                                       data-id="{{$data->id}}"
                                       data-action="{{route(route_prefix().'admin.testimonial.update')}}"
                                       data-name="{{$data->name}}"
                                       data-status="{{$data->status}}"
                                       data-rating="{{$data->rating}}"
                                       data-description="{{$data->description}}"
                                       data-designation="{{$data->designation}}"
                                       data-company="{{$data->company}}"
                                       data-imageid="{{$data->image}}"
                                       data-image="{{$img_url}}"
                                    >
                                        <i class="las la-edit"></i>
                                    </a>

                                    <x-clone-icon :action="route(route_prefix().'admin.testimonial.clone')" :id="$data->id"/>
                                    @endcan
                                    <x-delete-popover permissions="testimonial-delete" url="{{route(route_prefix().'admin.testimonial.delete', $data->id)}}"/>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable.table>

            </div>
        </div>
    </div>

    @can('testimonial-create')
        <div class="modal fade" id="new_testimonial" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('New Testimonial')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route(route_prefix().'admin.testimonial.store')}}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach(get_all_language() as $language)
                                            <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab active' : '' }}"
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
                                            class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent active' : '' }}"
                                            id="language-{{$language->slug}}"
                                            role="tablist">


                                            <x-fields.input name="translate[{{$language->slug}}][designation]" label="{{__('Designation')}}" />
                                            <x-fields.textarea name="translate[{{$language->slug}}][description]" label="{{__('Description')}}" />

                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp
                                <x-fields.input name="translate[{{$language->slug}}][designation]" label="{{__('Designation')}}" />
                                <x-fields.textarea name="translate[{{$language->slug}}][description]" label="{{__('Description')}}" />


                            @endif
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <x-fields.input name="name" label="{{__('Name')}}" />

                            <x-fields.input name="company" label="{{__('Company')}}" />
                            <x-fields.select name="status" title="{{__('Status')}}">
                                <option value="{{\App\Enums\StatusEnums::PUBLISH}}">{{__('Publish')}}</option>
                                <option value="{{\App\Enums\StatusEnums::DRAFT}}">{{__('Draft')}}</option>
                            </x-fields.select>
                            <x-fields.media-upload name="image" title="{{__('Image')}}" dimentions="{{__('360x360 px image recommended')}}"/>
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

    @can('testimonial-edit')
        <div class="modal fade" id="testimonial_item_edit_modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('Edit Testimonial Item')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" id="testimonial_edit_modal_form" method="post"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))

                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                                         aria-orientation="vertical">

                                        @foreach(get_all_language() as $language)
                                            <button class="nav-link {{ $loop->iteration == 1 ? 'activeTab active' : '' }}"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#edit-language-{{ $language->slug }}"
                                                    type="button" role="tab"
                                                    aria-selected="{{ $loop->iteration == 1 ? 'true' : 'false' }}">
                                                {{ $language->name }}</button>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="tab-content">
                                    @foreach(get_all_language() as $language)

                                        <div
                                            class="tab-pane fade show {{ $loop->iteration == 1 ? 'activeContent active' : '' }}"
                                            id="edit-language-{{$language->slug}}"
                                            role="tablist">
                                            <x-fields.input name="translate[{{$language->slug}}][designation]" label="{{__('Designation')}}" class="translate-{{$language->slug}}-designation" />
                                            <x-fields.textarea name="translate[{{$language->slug}}][description]" label="{{__('Description')}}" class="translate-{{$language->slug}}-description" />

                                        </div>

                                    @endforeach
                                </div>

                            @else
                                @php
                                    $language = default_lang();
                                @endphp
                                <x-fields.input name="translate[{{$language->slug}}][designation]" label="{{__('Designation')}}" class="translate-{{$language->slug}}-designation" />
                                <x-fields.textarea name="translate[{{$language->slug}}][description]" label="{{__('Description')}}" class="translate-{{$language->slug}}-description" />


                            @endif
                            @csrf
                            <input type="hidden" name="lang" value="{{$default_lang}}">
                            <input type="hidden" name="id" class="testimonial_id" value="">
                            <x-fields.input name="name" label="{{__('Name')}}" class="edit_name" />
                            <x-fields.input name="company" label="{{__('Company')}}" class="edit_company" />
                            <x-fields.select name="status" title="{{__('Status')}}" class="edit_status">
                                <option value="{{\App\Enums\StatusEnums::PUBLISH}}">{{__('Publish')}}</option>
                                <option value="{{\App\Enums\StatusEnums::DRAFT}}">{{__('Draft')}}</option>
                            </x-fields.select>
                            <x-fields.media-upload name="image" title="{{__('Image')}}" dimentions="{{__('360x360 px image recommended')}}" />
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
    <x-bulk-action-js :url="route( route_prefix().'admin.testimonial.bulk.action')" />

    <script>
        $(document).ready(function($){
            "use strict";

            $(document).on('click', '.testimonial_edit_btn', function () {
                var el = $(this);
                var id = el.data('id');
                var form = $('#testimonial_edit_modal_form');

                $.ajax({
                    type: "POST",
                    url: "{{ route(route_prefix() .'admin.testimonial.get-testimonial') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};
                        languages.forEach(function (language) {
                        console.log('dsdsdsd', response.description[language.slug])
                            form.find('.translate-' + language.slug + '-description').val(response.description[language.slug]);
                            form.find('.translate-' + language.slug + '-designation').val(response.designation[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });
                var name = el.data('name');
                var company = el.data('company');
                var action = el.data('action');
                var rating = el.data('rating');
                var image = el.data('image');
                var imageid = el.data('imageid');


                form.attr('action', action);
                form.find('.testimonial_id').val(id);
                form.find('.edit_name').val(name);
                form.find('.edit_company').val(company);
                form.find('.edit_status option[value="' + el.data('status') + '"]').attr('selected', true);
                form.find('.edit_rating option[value="' + rating + '"]').attr('selected', true);

                if (imageid != '') {
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered">' +
                        '<img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });

        });
    </script>
@endsection
