@extends(route_prefix().'admin.admin-master')
@section('title')   {{__('All Custom Form')}}@endsection

@section('style')
    <x-datatable.css/>
@endsection

@section('content')
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="header-title mb-4">{{__('All Custom Form')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#create_new_custom_form" class="btn btn-primary">{{__('New Form')}}</a>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-bulk-action/>
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
                        <th>{{__('Action')}}</th>
                    </x-slot>
                    <x-slot name="tr">
                        @foreach($all_forms as $data)
                            <tr>
                                <td>
                                    <div class="bulk-checkbox-wrapper">
                                        <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                    </div>
                                </td>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>
                                    <x-delete-popover :url="route(route_prefix().'admin.form.builder.delete',$data->id)"/>
                                    <x-edit-icon :url="route(route_prefix().'admin.form.builder.edit',$data->id)"/>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-datatable.table>

            </div>
        </div>
    </div>

    <div class="modal fade" id="create_new_custom_form" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add New Form')}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route(route_prefix().'admin.form.builder.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

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
                                            <label for="edit_slug">{{__('Button Title')}}</label>
                                            <input type="text" class="form-control"
                                                   id="translate-{{$language->slug}}-button_title"
                                                   name="translate[{{$language->slug}}][button_title]"
                                                   placeholder="{{__('Button Title')}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="edit_description">{{__('Success Message')}}</label>
                                            <input type="text" class="form-control"
                                                   id="translate-{{$language->slug}}-success_message"
                                                   name="translate[{{$language->slug}}][success_message]"
                                                   placeholder="{{__('form submit success message')}}">

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
                                <label for="edit_slug">{{__('Button Title')}}</label>
                                <input type="text" class="form-control"
                                       id="translate-{{$language->slug}}-button_title"
                                       name="translate[{{$language->slug}}][button_title]"
                                       placeholder="{{__('Button Title')}}">
                            </div>

                            <div class="form-group">
                                <label for="edit_description">{{__('Success Message')}}</label>
                                <input type="text" class="form-control"
                                       id="translate-{{$language->slug}}-success_message"
                                       name="translate[{{$language->slug}}][success_message]"
                                       placeholder="{{__('form submit success message')}}">

                            </div>

                        @endif

                        <div class="form-group">
                            <label for="text">{{__('Receiving Email')}}</label>
                            <input type="email" class="form-control" name="email" placeholder="{{__('Email')}}">
                            <span class="info-text">{{__('your will get mail with all info of from to this email')}}</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <x-datatable.js/>
    <x-bulk-action-js :url="route( 'landlord.admin.form.builder.bulk.action')" />
@endsection
