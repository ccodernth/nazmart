@extends('tenant.frontend.frontend-page-master')

@section('title')
    {{__('User Register')}}
@endsection

@section('style')
    <style>
        .toggle-password {
            position: absolute;
            bottom: 13px;
            right: 20px;
            cursor: pointer;
        }
        .generate-password:hover{
            color: var(--main-color-one);
        }
        .single-input{
            position: relative;
            z-index: 1;
            display: inline-block;
        }
        .toggle-password.show-pass .show-icon {
            display: none;
        }
        .toggle-password.show-pass .hide-icon {
            display: block;
        }
        .hide-icon {
            display: none;
        }
    </style>
@endsection

@section('page-title')
    {{__('User Register')}}
@endsection

@section('content')
    <div class="sign-in-area-wrapper" data-padding-top="50" data-padding-bottom="50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="sign-up register">
                        <h4 class="title">{{__('Sign Up')}}</h4>
                        <div class="form-wrapper mt-5">
                            <x-error-msg/>
                            <x-flash-msg/>
                            <form action="{{route('tenant.user.register.store')}}" method="post"
                                  enctype="multipart/form-data" class="contact-page-form style-01">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{__('Name')}} <x-fields.mandatory-indicator/></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                                   placeholder="{{__('Type your full name')}}" value="{{old('name')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">{{__('Username')}} <x-fields.mandatory-indicator/></label>
                                            <input type="text" class="form-control" name="username"
                                                   id="exampleInputEmail1"
                                                   placeholder="{{__('Type your username')}}"
                                                   value="{{old('username')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">{{__('Email Address')}} <x-fields.mandatory-indicator/></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                           placeholder="{{__('Type your email')}}" value="{{old('email')}}">
                                </div>

                                <div class="form-group single-input mt-2">
                                    <label for="phone_number">{{__('Phone Number')}} <x-fields.mandatory-indicator/></label>
                                    <input type="tel" name="phone" class="form-control" id="phone_number"
                                           placeholder="50 123 45 67" value="{{old('phone')}}">
                                </div>

                                {{-- ÜLKE ALANI: Dinamik olarak yüklenecek, Azerbaycan varsayılan seçili olacak --}}
                                <div class="form-group">
                                    <label for="countryField">{{__('Country')}}
                                        <x-fields.mandatory-indicator/>
                                    </label>
                                    <select class="form-control" name="country" id="countryField">
                                        <option value="">{{__('Select a country')}}</option>
                                        {{-- Options will be populated by JavaScript --}}
                                    </select>
                                </div>

                                {{-- "State" (İl/Bölge) alanı - JavaScript ile seçilen ülkeye göre dolacak --}}
                                <div class="form-group">
                                    <label for="stateField">{{__('State')}}</label>
                                    <select class="form-control" name="state" id="stateField">
                                        <option value="">{{__('Select a state')}}</option>
                                        {{-- Options will be populated by JavaScript --}}
                                    </select>
                                </div>

                                {{-- "City" (İlçe/Şehir) alanı - JavaScript ile seçilen ile göre dolacak --}}
                                <div class="form-group">
                                    <label for="cityField">{{__('City')}}</label>
                                    <select class="form-control" name="city" id="cityField">
                                        <option value="">{{__('Select a city')}}</option>
                                        {{-- Options will be populated by JavaScript --}}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('Post Code')}}</label>
                                    <input type="text" class="form-control" name="postal_code" id="exampleInputEmail1"
                                           placeholder="{{__('Type your postal code')}}" value="{{old('postal_code')}}">
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group single-input">
                                            <label for="exampleInputPassword1">{{__('Password')}} <x-fields.mandatory-indicator/></label>
                                            <input type="password" name="password" class="form-control"
                                                   id="exampleInputPassword1"
                                                   placeholder="{{__('Password')}}">
                                            <div class="icon toggle-password">
                                                <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                                <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="form-group single-input">
                                            <label for="exampleInputPassword1">{{__('Confirmed Password')}} <x-fields.mandatory-indicator/></label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="exampleInputPassword1"
                                                   placeholder="{{__('Confirmed Password')}}">
                                            <div class="icon toggle-password">
                                                <div class="show-icon"><i class="las la-eye-slash"></i></div>
                                                <span class="hide-icon"> <i class="las la-eye"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-item mt-2">
                                    <a class="generate-password" href="javascript:void(0)"><i class="las la-magic"></i> {{__('Generate random password')}}</a>
                                </div>

                                <div class="btn-wrapper mt-4">
                                    <button type="submit" id="register" class="btn-default rounded-btn">{{__('sign up')}}</button>
                                </div>
                            </form>
                            <p class="info">{{__('Already have an Account?')}} <a href="{{route('tenant.user.login')}}"
                                                                                   class="active">{{__('Sign in')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <x-custom-js.generate-password/>
    <x-custom-js.phone-number-config selector="#phone_number"/>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <x-btn.custom :id="'register'" :title="__('Please Wait..')"/>

                const GEONAMES_USERNAME = 'codernth'; // Sizin verdiğiniz kullanıcı adı

                const countryField = $('#countryField');
                const stateField = $('#stateField');
                const cityField = $('#cityField');

                // 1. Ülkeleri Yükle
                function loadCountries() {
                    countryField.empty().append(`<option value="">{{__('Yükleniyor...')}}</option>`).prop('disabled', true);
                    stateField.empty().append(`<option value="">{{__('Önce ülke seçin')}}</option>`).prop('disabled', true);
                    cityField.empty().append(`<option value="">{{__('Önce il seçin')}}</option>`).prop('disabled', true);

                    $.ajax({
                        url: `https://secure.geonames.org/countryInfoJSON`,
                        type: 'GET',
                        data: { username: GEONAMES_USERNAME },
                        dataType: 'json',
                        success: function (data) {
                            countryField.empty().append(`<option value="">{{__('Bir ülke seçin')}}</option>`).prop('disabled', false);
                            if (data.geonames) {
                                data.geonames.sort(function(a,b) {
                                    return a.countryName.localeCompare(b.countryName);
                                });
                                $.each(data.geonames, function (index, country) {
                                    countryField.append(
                                        `<option value="${country.countryCode}">${country.countryName}</option>`
                                    );
                                });

                                // YENİ: Azerbaycan'ı varsayılan olarak seç ve illerini yükle
                                countryField.val('AZ'); // Azerbaycan'ın ülke kodu 'AZ'
                                if (countryField.val() === 'AZ') { // Eğer 'AZ' geçerli bir değerse
                                    countryField.trigger('change'); // 'change' olayını tetikle ki iller yüklensin
                                }
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Ülkeler çekilirken hata: " + error);
                            countryField.empty().append(`<option value="">{{__('Ülkeler yüklenirken hata oluştu')}}</option>`).prop('disabled', false);
                        }
                    });
                }

                // Sayfa yüklendiğinde ülkeleri yükle (ve Azerbaycan'ı seçili getir)
                loadCountries();

                // 2. Ülke Değiştiğinde İlleri/Bölgeleri Yükle
                countryField.on('change', function(e) {
                    e.preventDefault();
                    let selectedCountryCode = $(this).val();

                    stateField.empty().append(`<option value="">{{__('Yükleniyor...')}}</option>`).prop('disabled', true);
                    cityField.empty().append(`<option value="">{{__('Önce il seçin')}}</option>`).prop('disabled', true);

                    if (!selectedCountryCode) {
                        stateField.empty().append(`<option value="">{{__('Önce ülke seçin')}}</option>`).prop('disabled', true);
                        return;
                    }

                    $.ajax({
                        url: `https://secure.geonames.org/searchJSON`,
                        type: 'GET',
                        data: {
                            country: selectedCountryCode,
                            featureCode: 'ADM1',
                            maxRows: 1000,
                            style: 'MEDIUM',
                            username: GEONAMES_USERNAME
                        },
                        dataType: 'json',
                        success: function (data) {
                            stateField.empty().append(`<option value="">{{__('Bir il seçin')}}</option>`).prop('disabled', false);
                            if (data.geonames && data.geonames.length > 0) {
                                data.geonames.sort(function(a,b) {
                                    return a.name.localeCompare(b.name);
                                });
                                $.each(data.geonames, function (index, state) {
                                    stateField.append(
                                        `<option value="${state.adminCode1 || state.name}" data-countrycode="${selectedCountryCode}">${state.name}</option>`
                                    );
                                });
                            } else {
                                stateField.append(`<option value="">{{__('Bu ülke için il bulunamadı')}}</option>`);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("İller/Bölgeler çekilirken hata: " + error);
                            stateField.empty().append(`<option value="">{{__('İller/Bölgeler yüklenirken hata oluştu')}}</option>`).prop('disabled', false);
                        }
                    });
                });

                // 3. İl/Bölge Değiştiğinde İlçeleri/Şehirleri Yükle
                $(document).on('change', 'select[name=state]', function (e) {
                    e.preventDefault();
                    let selectedStateAdminCode = $(this).val();
                    let selectedCountryCode = $(this).find(':selected').data('countrycode');

                    if (!selectedCountryCode) {
                        selectedCountryCode = countryField.val();
                    }

                    cityField.empty().append(`<option value="">{{__('Yükleniyor...')}}</option>`).prop('disabled', true);

                    if (!selectedStateAdminCode || !selectedCountryCode) {
                        cityField.empty().append(`<option value="">{{__('Önce il seçin')}}</option>`).prop('disabled', true);
                        return;
                    }

                    $.ajax({
                        url: `https://secure.geonames.org/searchJSON`,
                        type: 'GET',
                        data: {
                            country: selectedCountryCode,
                            adminCode1: selectedStateAdminCode,
                            featureClass: 'P',
                            maxRows: 1000,
                            style: 'MEDIUM',
                            username: GEONAMES_USERNAME
                        },
                        dataType: 'json',
                        success: function (data) {
                            cityField.empty().append(`<option value="">{{__('Bir ilçe/şehir seçin')}}</option>`).prop('disabled', false);
                            if (data.geonames && data.geonames.length > 0) {
                                data.geonames.sort(function(a,b) {
                                     return a.name.localeCompare(b.name);
                                });
                                $.each(data.geonames, function (index, city) {
                                    cityField.append(
                                        `<option value="${city.name}">${city.name}</option>`
                                    );
                                });
                            } else {
                                cityField.append(`<option value="">{{__('Bu il için ilçe/şehir bulunamadı')}}</option>`);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("İlçeler/Şehirler çekilirken hata: " + error);
                            cityField.empty().append(`<option value="">{{__('İlçeler/Şehirler yüklenirken hata oluştu')}}</option>`).prop('disabled', false);
                        }
                    });
                });

                $(document).on('click', '.generate-password', function () {
                    if (typeof generateRandomPassword === "function") {
                        let password = generateRandomPassword();
                        $('input[name=password]').val(password);
                        $('input[name=password_confirmation]').val(password);
                    } else {
                        console.error("generateRandomPassword fonksiyonu bulunamadı.");
                    }
                });

                $(document).on('click', '.toggle-password', function () {
                    $(this).toggleClass("show-pass");
                    var input = $(this).closest('.single-input').find('input[type="password"], input[type="text"]');
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
            });
        })(jQuery);
    </script>
@endsection