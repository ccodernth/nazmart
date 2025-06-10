@extends(route_prefix().'admin.admin-master')

@section('title')
    {{__('Ticket Page Settings')}}
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12">
                <x-flash-msg/>
                <x-error-msg/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{__("Ticket Page Settings")}}</h4>
                        <form action="{{route(route_prefix().'admin.support.ticket.page.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                                <label for="support_ticket_login_notice">{{__('Login Notice')}}</label>
                                                <input type="text" name="translate[{{$language->slug}}][support_ticket_login_notice]"  class="form-control" value="{{get_static_option_convert('support_ticket_login_notice')[$language->slug]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="support_ticket_form_title">{{__('Form Title')}}</label>
                                                <input type="text" name="translate[{{$language->slug}}][support_ticket_form_title]"  class="form-control" value="{{get_static_option_convert('support_ticket_form_title')[$language->slug]}}" >
                                            </div>
                                            <div class="form-group">
                                                <label for="support_ticket_button_text">{{__('Button Text')}}</label>
                                                <input type="text" name="translate[{{$language->slug}}][support_ticket_button_text]"  class="form-control" value="{{get_static_option_convert('support_ticket_button_text')[$language->slug]}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="support_ticket_success_message">{{__('Success Message')}}</label>
                                                <input type="text" name="translate[{{$language->slug}}][support_ticket_success_message]"  class="form-control" value="{{get_static_option_convert('support_ticket_success_message')[$language->slug]}}">
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            @else
                                @php
                                    $language = default_lang();
                                @endphp

                                <div class="form-group">
                                    <label for="support_ticket_login_notice">{{__('Login Notice')}}</label>
                                    <input type="text" name="translate[{{$language->slug}}][support_ticket_login_notice]"  class="form-control" value="{{get_static_option_convert('support_ticket_login_notice')[$language->slug]}}">
                                </div>
                                <div class="form-group">
                                    <label for="support_ticket_form_title">{{__('Form Title')}}</label>
                                    <input type="text" name="translate[{{$language->slug}}][support_ticket_form_title]"  class="form-control" value="{{get_static_option_convert('support_ticket_form_title')[$language->slug]}}" >
                                </div>
                                <div class="form-group">
                                    <label for="support_ticket_button_text">{{__('Button Text')}}</label>
                                    <input type="text" name="translate[{{$language->slug}}][support_ticket_button_text]"  class="form-control" value="{{get_static_option_convert('support_ticket_button_text')[$language->slug]}}">
                                </div>
                                <div class="form-group">
                                    <label for="support_ticket_success_message">{{__('Success Message')}}</label>
                                    <input type="text" name="translate[{{$language->slug}}][support_ticket_success_message]"  class="form-control" value="{{get_static_option_convert('support_ticket_success_message')[$language->slug]}}">
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
