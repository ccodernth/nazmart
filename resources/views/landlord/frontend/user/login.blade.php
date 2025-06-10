@extends('landlord.frontend.frontend-page-master')
@section('title', __('OTP Sign In'))

@section('content')
    <div class="sign-in-area-wrapper padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="sign-in register">
                        <h4 class="title">{{ __('OTP Sign In') }}</h4>
                        <div class="form-wrapper custom--form mt-4">
                            <x-error-msg/>
                            <x-flash-msg/>

                            <form action="{{ route('landlord.user.login.otp') }}" method="post" class="account-form">
                                @csrf
                                <div class="form-group single-input">
                                    <label for="telephone" class="label-title mb-2">{{ __('Phone Number') }}</label>
                                    <input type="tel" name="phone" class="form-control" id="telephone"
                                           placeholder="{{ __('Enter your phone number') }}">
                                </div>

                                <div class="form-group form-check d-flex align-items-center mt-3">
                                    <input type="checkbox" name="remember" class="form-check-input me-2" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                                </div>

                                <div class="btn-wrapper mt-4">
                                    <button type="submit" class="cmn-btn cmn-btn-bg-1 w-100">{{ __('Send OTP') }}</button>
                                </div>
                            </form>
                            <p class="info mt-3">
                                {{ __("Do not have an account?") }}
                                <a href="{{ route('landlord.user.register') }}"><strong>{{ __('Sign up') }}</strong></a>
                            </p>
                        </div><!-- form-wrapper -->
                    </div><!-- sign-in register -->
                </div><!-- col-md-6 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- sign-in-area-wrapper -->
@endsection
