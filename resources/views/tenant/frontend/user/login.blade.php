@extends('tenant.frontend.frontend-page-master')

@section('title')
    {{ __('User Login') }}
@endsection

@section('page-title')
    {{ __('OTP Sign In') }}
@endsection

{{-- İsteğe bağlı özel stiller --}}
@section('style')
    <style>
        .sign-in-area-wrapper {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            border-radius: 10px;
            padding-top: 60px;   
            padding-bottom: 60px;
        }
        .sign-in.register {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 40px; /* İç boşluk ayarı */
        }
        .sign-in.register .title {
            font-size: 24px;
            margin-bottom: 25px;
            font-weight: 600;
            text-align: center;
        }
        .form-wrapper.custom--form {
            margin-top: 30px;
        }
        .form-group.single-input label {
            font-weight: 500;
            margin-bottom: 10px;
            display: inline-block;
        }
        .form-group.single-input input {
            border-radius: 5px;
            height: 50px;
        }
        .form-check {
            margin-top: 20px;
        }
        .btn-wrapper {
            margin-top: 30px;
        }
        .btn-default {
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 5px;
            height: 48px;
            transition: all .3s;
        }
        .btn-default:hover {
            opacity: 0.9;
        }
        .info {
            text-align: center;
            margin-top: 20px;
        }
        .info a {
            color: #3b82f6;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <!-- sign-in area start -->
    <div class="sign-in-area-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                {{-- Daha geniş bir kolon kullanmak isterseniz col-md-9 yapabilirsiniz --}}
                <div class="col-md-6 col-lg-5">
                    <div class="sign-in register">
                        <h4 class="title">{{ __('OTP Sign In') }}</h4>
                        <div class="form-wrapper custom--form">
                            <x-error-msg />
                            <x-flash-msg />
                            
                            <!-- OTP Giriş Formu -->
                            <form action="{{ route(route_prefix() . 'user.login.otp') }}"
                                  method="post"
                                  enctype="multipart/form-data"
                                  class="account-form"
                                  id="login_form_order_page">
                                @csrf
                                
                                <div class="error-wrap"></div>
                                
                                {{-- Telefon Numarası Alanı --}}
                                <div class="form-group single-input">
                                    <label for="telephone" class="label-title mb-2">
                                        {{ __('Phone Number') }}
                                        <x-fields.mandatory-indicator/>
                                    </label>
                                    <input type="tel"
                                           name="phone"
                                           class="form-control"
                                           id="telephone"
                                           placeholder="{{ __('Your Phone Number') }}"
                                           value="{{ old('phone') }}">
                                </div>

                                {{-- Beni Hatırla CheckBox --}}
                                <div class="form-group form-check d-flex align-items-center">
                                    <input type="checkbox"
                                           name="remember"
                                           class="form-check-input me-2"
                                           id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">
                                        {{ __('Remember me') }}
                                    </label>
                                </div>

                                {{-- OTP Gönder Butonu --}}
                                <div class="btn-wrapper">
                                    <button type="submit"
                                            id="login_btn"
                                            class="btn-default w-100">
                                        {{ __('Send OTP') }}
                                    </button>
                                </div>
                            </form>

                            {{-- Kayıt Ol Linki --}}
                            <p class="info mt-3">
                                {{ __("Do not have an account?") }}
                                <a href="{{ route('tenant.user.register') }}" class="active">
                                    <strong>{{ __('Sign up') }}</strong>
                                </a>
                            </p>
                        </div><!-- //.form-wrapper -->
                    </div><!-- //.sign-in register -->
                </div><!-- //.col-md-6 col-lg-5 -->
            </div><!-- //.row -->
        </div><!-- //.container -->
    </div>
    <!-- sign-in area end -->
@endsection

@section('scripts')
    {{-- Eğer phone number (intlTelInput vs.) yapısı kullanıyorsanız --}}
    <x-custom-js.phone-number-config selector="#telephone" submit-button-id="login_btn"/>
@endsection
