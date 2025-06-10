@extends(route_prefix().'admin.admin-master')
@section('title') {{__('All Support Ticket Category')}} @endsection

@section('style')
    <x-datatable.css/>
@endsection

@section('content')
    @php
        $lang_slug = request()->get('lang') ?? \App\Facades\GlobalLanguage::default_slug();
    @endphp
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-4">{{__('All Support Ticket Category')}}</h4>
                        <x-bulk-action permissions="support-ticket-department-delete"/>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <form action="" method="get">
                            <x-fields.select name="lang" title="{{__('Language')}}">
                                @foreach(\App\Facades\GlobalLanguage::all_languages() as $lang)
                                    <option value="{{$lang->slug}}" @if($lang->slug === $lang_slug) selected @endif>{{$lang->name}}</option>
                                @endforeach
                            </x-fields.select>
                        </form>
                        <p></p>
                        <button class="btn btn-info btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#new_support_department_category">{{__('Add New Department')}}</button>
                    </x-slot>
                </x-admin.header-wrapper>

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
                        @foreach($all_category as $data)
                            <tr>
                                <td>
                                    <x-bulk-delete-checkbox :id="$data->id"/>
                                </td>
                                <td>{{$data->id}}</td>
                                <td>
                                    {{ $data->name}}
                                </td>
                                <td>{{ \App\Enums\StatusEnums::getText($data->status)  }}</td>
                                <td>
                                    @can('support-ticket-department-edit')
                                    <a href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#support_department_category_item_edit_modal"
                                       class="btn btn-primary btn-xs mb-3 mr-1 support_department_edit_btn"
                                       data-bs-placement="top"
                                       title="{{__('Edit')}}"
                                       data-id="{{$data->id}}"
                                       data-action="{{route(route_prefix().'admin.support.ticket.department.update')}}"
                                       data-name="{{$data->name}}"
                                       data-status="{{$data->status}}"
                                    >
                                        <i class="las la-edit"></i>
                                    </a>
                                    @endcan
                                    <x-delete-popover permissions="support-ticket-department-delete" url="{{route(route_prefix().'admin.support.ticket.department.delete', $data->id)}}"/>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable.table>

            </div>
        </div>
    </div>

    @can('support-ticket-department-create')
        <div class="modal fade" id="new_support_department_category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{__('New Department')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route(route_prefix().'admin.support.ticket.department')}}" method="post" enctype="multipart/form-data">
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

                                        <x-fields.input name="translate[{{$language->slug}}][name]" label="{{__('Name')}}"/>

                                    </div>

                                @endforeach
                            </div>

                        @else
                            @php
                                $language = default_lang();
                            @endphp
                            <x-fields.input name="translate[{{$language->slug}}][name]" label="{{__('Name')}}"/>

                        @endif
                        <input type="hidden" name="lang" value="{{$default_lang}}">
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
    @can('support-ticket-department-edit')
    <div class="modal fade" id="support_department_category_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{__('Edit Department')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="support_department_categoryy_edit_modal_form" method="post"
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

                                        <x-fields.input name="translate[{{$language->slug}}][name]" label="{{__('Name')}}" class="translate-{{$language->slug}}-name"/>


                                    </div>

                                @endforeach
                            </div>

                        @else
                            @php
                                $language = default_lang();
                            @endphp
                            <x-fields.input name="translate[{{$language->slug}}][name]" label="{{__('Name')}}" id="translate-{{$language->slug}}-title"/>


                        @endif
                        <input type="hidden" name="lang" value="{{$default_lang}}">
                        <input type="hidden" name="id" class="support_department_id" value="">
                        <x-fields.select name="status" title="{{__('Status')}}" class="edit_status">
                            <option value="1">{{__('Publish')}}</option>
                            <option value="0">{{__('Draft')}}</option>
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

@endsection
@section('scripts')
    <x-datatable.js/>
    <x-bulk-action-js :url="route( route_prefix().'admin.support.ticket.department.bulk.action')"/>
    <script>
        $(document).ready(function($){
            "use strict";
                $(document).on('change','select[name="lang"]',function (e){
                    $(this).closest('form').trigger('submit');
                    $('input[name="lang"]').val($(this).val());
                });

            $(document).on('click', '.support_department_edit_btn', function () {
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var action = el.data('action');

                var form = $('#support_department_categoryy_edit_modal_form');
                $.ajax({
                    type: "POST",
                    url: "{{ route(route_prefix().'admin.support.ticket.department.get-category-translate') }}", // POST isteğinin gideceği URL'yi buraya yazın
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token'ını meta etiketinden alıyoruz
                        id
                    }, // Gönderilecek veriyi buraya yazın
                    success: function (response) {

                        let languages = {!! get_all_language() !!};

                        languages.forEach(function (language) {
                            console.log(language, language.slug, response)
                            form.find('.translate-' + language.slug + '-name').val(response.name[language.slug]);

                        });
                    },
                    error: function (e) {
                        console.log('işlem başarısız')
                    }
                });
                form.attr('action', action);
                form.find('.support_department_id').val(id);
                form.find('.edit_name').val(name);
                form.find('.edit_status option[value="' + el.data('status') + '"]').attr('selected', true);

            });

        });
    </script>
@endsection
