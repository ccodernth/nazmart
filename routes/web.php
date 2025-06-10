<?php

use App\Http\Controllers\Landlord\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Landlord\Admin\LandlordAdminController;
use App\Http\Controllers\Landlord\Frontend\FrontendFormController;
use App\Http\Controllers\Landlord\Frontend\LandlordFrontendController;
use App\Http\Controllers\Landlord\Frontend\LandlordOtpLoginController; 
use App\Http\Controllers\Landlord\Frontend\PaymentLogController;
use App\Http\Controllers\Landlord\Frontend\SupportTicketController;
use App\Http\Controllers\Landlord\Frontend\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\SiteAnalytics\Http\Middleware\Analytics;

/*
|--------------------------------------------------------------------------
| Landlord Routes
|--------------------------------------------------------------------------
|
| Bu dosya, "Landlord" tarafındaki rotaları içerir. 
| Multi-tenancy yapısına göre Tenant ve Landlord ayrı ayrı yönetilir.
|
*/

/* ------------------------------------------------
  1) Bazı temel yapılar ve authentication ayarları
------------------------------------------------- */
Route::middleware(['landlord_glvar','maintenance_mode'])->group(function (){
    Auth::routes(['register' => false]);
});

/* ------------------------------------------------
  2) LANDLORD FRONTEND - ANASAYFA & DİL AYARLARI
------------------------------------------------- */
Route::middleware(['landlord_glvar','set_lang','maintenance_mode'])
    ->controller(LandlordFrontendController::class)
    ->group(function () {
        // Landlord Anasayfa
        Route::get('/', 'homepage')->name('landlord.homepage');

        // Dil Ayarı
        Route::get('set-locale/{param}', 'setLocale')->name('landlord.setLocale');

        // Subdomain kontrol
        Route::post('/subdomain-check',  'subdomain_check')->name('landlord.subdomain.check');
        Route::post('/custom-domain-check',  'subdomain_custom_domain_check')->name('landlord.subdomain.custom-domain.check');

        // E-mail doğrulama
        Route::get('/verify-email','verify_user_email')->name('tenant.email.verify');
        Route::post('/verify-email','check_verify_user_email');
        Route::get('/resend-verify-email','resend_verify_user_email')->name('tenant.email.verify.resend');

        // Landlord ile Tenant logout
        Route::get('/logout-from-landlord','logout_tenant_from_landlord')
            ->name('tenant.admin.logout.from.landlord.home');
    });


Route::get('/token-login/{token}', [LandlordFrontendController::class,'loginUsingToken'])->name('landlord.user.login.with.token');

/* ---------------------------------------
    3) LANDLORD ADMIN LOGIN ROUTES
---------------------------------------- */
Route::middleware('set_lang')
    ->controller(AdminLoginController::class)
    ->prefix('admin')
    ->group(function (){
        Route::get('/', 'login_form')->name('landlord.admin.login');
        Route::post('/', 'login_admin');
        Route::post('/logout','logout_admin')->name('landlord.admin.logout');

        Route::get('/login/forget-password','showUserForgetPasswordForm')
            ->name('landlord.admin.forget.password');
        Route::get('/login/reset-password/{user}/{token}','showUserResetPasswordForm')
            ->name('landlord.admin.reset.password');
        Route::post('/login/reset-password','UserResetPassword')
            ->name('landlord.admin.reset.password.change');
        Route::post('/login/forget-password','sendUserForgetPasswordMail');
    });

/* -----------------------------------------
    4) DİĞER FORM (custom-form) İŞLEMLERİ
----------------------------------------- */
Route::controller(FrontendFormController::class)
    ->prefix('landlord')
    ->group(function () {
        Route::post('submit-custom-form', 'custom_form_builder_message')
            ->name('landlord.frontend.form.builder.custom.submit');
    });



/* ----------------------------------------
    5) TENANT PANELİNİN (user-home) ROUTES
----------------------------------------- */
Route::prefix('user-home')
    ->middleware(['auth:web','maintenance_mode','userMailVerify'])
    ->controller(\App\Http\Controllers\Tenant\Admin\TenantDashboardController::class)
    ->group(function () {
        Route::get('/', 'redirect_to_tenant_admin_panel')->name('tenant.home');
    });

/*
|--------------------------------------------------------------------------
| Admin.php dosyasını dahil ediyorsanız:
|--------------------------------------------------------------------------
*/
require_once __DIR__ . '/admin.php';



/* ------------------------------------------------
  6) LANDLORD FRONTEND ÖDEME / IPN ROUTES
------------------------------------------------- */
Route::middleware(['maintenance_mode','landlord_glvar'])
    ->controller(PaymentLogController::class)
    ->name('landlord.')
    ->group(function () {
        Route::post('/paytm-ipn', 'paytm_ipn')->name('frontend.paytm.ipn');
        Route::post('/toyyibpay-ipn', 'toyyibpay_ipn')->name('frontend.toyyibpay.ipn');
        Route::get('/mollie-ipn', 'mollie_ipn')->name('frontend.mollie.ipn');
        Route::get('/stripe-ipn', 'stripe_ipn')->name('frontend.stripe.ipn');
        Route::post('/razorpay-ipn', 'razorpay_ipn')->name('frontend.razorpay.ipn');
        Route::post('/payfast-ipn', 'payfast_ipn')->name('frontend.payfast.ipn');
        Route::get('/flutterwave/ipn', 'flutterwave_ipn')->name('frontend.flutterwave.ipn');
        Route::get('/paystack-ipn', 'paystack_ipn')->name('frontend.paystack.ipn');
        Route::get('/midtrans-ipn', 'midtrans_ipn')->name('frontend.midtrans.ipn');
        Route::post('/cashfree-ipn', 'cashfree_ipn')->name('frontend.cashfree.ipn');
        Route::get('/instamojo-ipn', 'instamojo_ipn')->name('frontend.instamojo.ipn');
        Route::get('/paypal-ipn', 'paypal_ipn')->name('frontend.paypal.ipn');
        Route::get('/marcadopago-ipn', 'marcadopago_ipn')->name('frontend.marcadopago.ipn');
        Route::get('/squareup-ipn', 'squareup_ipn')->name('frontend.squareup.ipn');
        Route::post('/cinetpay-ipn', 'cinetpay_ipn')->name('frontend.cinetpay.ipn');
        Route::post('/paytabs-ipn', 'paytabs_ipn')->name('frontend.paytabs.ipn');
        Route::post('/billplz-ipn', 'billplz_ipn')->name('frontend.billplz.ipn');
        Route::post('/zitopay-ipn', 'zitopay_ipn')->name('frontend.zitopay.ipn');
        Route::post('/iyzipay-ipn', 'iyzipay_ipn')->name('frontend.iyzipay.ipn');

        Route::post('/order-confirm','order_payment_form')->name('frontend.order.payment.form')->middleware('set_lang');
    });

/* -----------------------------------------------------------------
  7) LANDLORD HOME PAGE FRONTEND TENANT LOGIN - REGISTRATION vb.
------------------------------------------------------------------ */
Route::middleware(['landlord_glvar','set_lang','maintenance_mode'])
    ->controller(LandlordFrontendController::class)
    ->name('landlord.')
    ->group(function () {

        /* === Normal Giriş (Kullanıcı Adı / Şifre) === */
        Route::get('/login', 'showTenantLoginForm')->name('user.login');
        Route::post('/store-login','ajax_login')->name('user.ajax.login');

        /* === OTP İLE GİRİŞ ROTALARI === */
        Route::controller(LandlordOtpLoginController::class)->group(function(){
            Route::get('/login/otp','showForm')->name('user.login.otp');
            Route::post('/login/otp','sendOtp');
            Route::get('/login/verify','showVerifyForm')->name('user.login.otp.verify');
            Route::post('/login/verify','verify')->name('user.login.otp.verification');
            Route::get('/login/resend','resend')->name('user.login.otp.resend');
        });

        /* === Kayıt (Register) === */
        Route::get('/register','showTenantRegistrationForm')->name('user.register');
        Route::post('/register-store','tenant_user_create')->name('user.register.store');
        Route::get('/logout','tenant_logout')->name('user.logout');

        // Şifre sıfırlama
        Route::get('/login/forget-password','showUserForgetPasswordForm')->name('user.forget.password');
        Route::get('/login/reset-password/{user}/{token}','showUserResetPasswordForm')->name('user.reset.password');
        Route::post('/login/reset-password','UserResetPassword')->name('user.reset.password.change');
        Route::post('/login/forget-password','sendUserForgetPasswordMail');

        // Normal user logout
        Route::get('/user-logout','user_logout')->name('frontend.user.logout');

        // E-mail doğrulama
        Route::get('/verify-email','verify_user_email')->name('user.email.verify');
        Route::post('/verify-email','check_verify_user_email');
        Route::get('/resend-verify-email','resend_verify_user_email')->name('user.email.verify.resend');

        // Paket/Plan Sipariş
        Route::get('/plan-order/{id}','plan_order')->name('frontend.plan.order');
        Route::get('/order-success/{id}','order_payment_success')->name('frontend.order.payment.success');
        Route::get('/order-cancel/{id}','order_payment_cancel')->name('frontend.order.payment.cancel');
        Route::get('/order-cancel-static','order_payment_cancel_static')->name('frontend.order.payment.cancel.static');
        Route::get('/order-confirm/{id}','order_confirm')->name('frontend.order.confirm');

        // Trial Account
        Route::post('/user/trial/account', 'user_trial_account')->name('frontend.trial.account');

        // Coupon Apply
        Route::get('/apply-coupon', 'applyCoupon')->name('frontend.coupon.apply');
    });

/* -----------------------------------------------------------
  8) LANDLORD USER DASHBOARD ROUTES (Kullanıcı Paneli vs.)
----------------------------------------------------------- */
Route::controller(UserDashboardController::class)
    ->middleware(['landlord_glvar','set_lang','maintenance_mode','tenantMailVerify'])
    ->name('landlord.')
    ->group(function(){
        Route::get('/user-home', 'user_index')->name('user.home');
        Route::get('/user/download/file/{id}', 'download_file')->name('user.dashboard.download.file');
        Route::get('/user/change-password', 'change_password')->name('user.home.change.password');
        Route::get('/user/edit-profile', 'edit_profile')->name('user.home.edit.profile');
        Route::post('/user/profile-update', 'user_profile_update')->name('user.profile.update');
        Route::post('/user/password-change', 'user_password_change')->name('user.password.change');
        Route::get('/user/support-tickets', 'support_tickets')->name('user.home.support.tickets');
        Route::get('support-ticket/view/{id}', 'support_ticket_view')->name('user.dashboard.support.ticket.view');
        Route::post('support-ticket/priority-change', 'support_ticket_priority_change')->name('user.dashboard.support.ticket.priority.change');
        Route::post('support-ticket/status-change', 'support_ticket_status_change')->name('user.dashboard.support.ticket.status.change');
        Route::post('support-ticket/message', 'support_ticket_message')->name('user.dashboard.support.ticket.message');
        Route::get('/package-orders', 'package_orders')->name('user.dashboard.package.order');
        Route::get('/custom-domain', 'custom_domain')->name('user.dashboard.custom.domain');
        Route::post('/custom-domain', 'submit_custom_domain');
        Route::post('/package-order/cancel', 'package_order_cancel')->name('user.dashboard.package.order.cancel');
        Route::post('/package-user/generate-invoice', 'generate_package_invoice')->name('frontend.package.invoice.generate');
        Route::post('/package/check', 'package_check')->name('frontend.package.check');
    });

/* ----------------------------------------
   9) USER SUPPORT TICKET ROUTES
----------------------------------------- */
Route::controller(SupportTicketController::class)
    ->middleware(['landlord_glvar','set_lang'])
    ->name('landlord.')
    ->group(function(){
        Route::get('support-tickets', 'page')->name('frontend.support.ticket');
        Route::post('support-tickets/new', 'store')->name('frontend.support.ticket.store');
    });

/* ----------------------------------------
   10) NEWSLETTER (Visitor) Routes
----------------------------------------- */
Route::controller(LandlordFrontendController::class)
    ->middleware('landlord_glvar')
    ->name('landlord.')
    ->group(function(){
        Route::post('newsletter/new', 'newsletter_store')->name('frontend.newsletter.store.ajax');
    });

/* -----------------------------------------------------
   11) SAYFA ROUTES (Dinamik Tekil Sayfa vs.)
------------------------------------------------------ */
Route::middleware(['landlord_glvar','set_lang','maintenance_mode'])
    ->controller(LandlordFrontendController::class)
    ->name('landlord.')
    ->group(function () {
        // plan-order
        Route::get('/plan-order/{id}','plan_order')->name('frontend.plan.order');
        Route::get('/order-success/{id}','order_payment_success')->name('frontend.order.payment.success');
        Route::get('/order-cancel/{id}','order_payment_cancel')->name('frontend.order.payment.cancel');
        Route::get('/order-cancel-static','order_payment_cancel_static')->name('frontend.order.payment.cancel.static');
        Route::get('/view-plan/{id}/{trial?}','view_plan')->name('frontend.plan.view');
        Route::get('/order-confirm/{id}','order_confirm')->name('frontend.order.confirm');

        // dil değişimi
        Route::get('/lang-change','lang_change')->name('langchange');

        // dinamik tekil sayfa
        Route::get('/{page:slug}', 'dynamic_single_page')->name('dynamic.page');
    });

/* ----------------------------------------
   12) Tema veya ödeme görsel rotaları
----------------------------------------- */
// Örneğin tema screenshot, ödeme gateway görseli vs. 
Route::get("assets/theme/screenshot/{theme}", function ($theme){
    $themeData = renderPrimaryThemeScreenshot($theme);
    $image_name = last(explode('/',$themeData));

    if(file_exists(str_replace('/assets','/screenshot', theme_assets($image_name, $theme)))){
        return response()->file(str_replace('/assets','/screenshot', theme_assets($image_name, $theme)));
    }

    return abort(404);
})->name("theme.primary.screenshot");

Route::get("assets/payment-gateway/screenshot/{moduleName}/{gatewayName}", function ($moduleName, $gatewayName){
    $image_name = getPaymentGatewayImagePath($gatewayName);
    $module_path = module_path($moduleName).'/assets/payment-gateway-image/'.$image_name;

    if(file_exists($module_path)){
        return response()->file($module_path);
    }

    return abort(404);
})->name("payment.gateway.logo");
