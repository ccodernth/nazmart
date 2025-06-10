<?php

namespace App\Http\Controllers\Landlord\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Tenant; 

class LandlordOtpLoginController extends Controller
{
    public function showForm()
    {
        // Landlord tarafındaki OTP formunu döndüren view
        return view('landlord.frontend.user.login-otp');
    }

    public function sendOtp(Request $request)
    {
        // 1) Validasyon
        $request->validate([
            'phone' => 'required'
        ], [
            'phone.required' => __('Telefon numarası gereklidir.')
        ]);

        // 2) Telefonu normalize et. Örneğin + işareti ekleyebilirsiniz:
        $phoneFromForm = $request->phone; 
        $phoneWithPlus = '+'.ltrim($phoneFromForm, '+');

        // 3) Kullanıcıyı mobil üzerinden bul
        $user = User::where('mobile', $phoneWithPlus)->first();
        if (!$user) {
            return back()->with([
                'msg'  => __('Telefon numarası bulunamadı'),
                'type' => 'danger'
            ]);
        }

        // 4) OTP üret (örnek: 6 haneli rastgele sayı)
        $otp = random_int(100000, 999999);

        // 5) Session'a at (ya da DB’de saklayabilirsiniz)
        Session::put('landlord_otp_login', [
            'user_id'    => $user->id,
            'phone'      => $phoneWithPlus,
            'code'       => $otp,
            'expires_at' => now()->addMinutes(5),  // 5 dk geçerli olsun
            'remember'   => $request->get('remember'),
        ]);

        // 6) OTP’yi SMS olarak gönderin (örneğin lsim.az ile):
        // —————————————————————————————————————————————————————
        // !!! Bu kısım tamamen sizdeki SMS API’ye göre değişecek !!! 
        // —————————————————————————————————————————————————————
        $login    = 'user4cruxsoft';  // Örnek
        $password = 'n5h%De1*Nq@x';    // Örnek
        $sender   = 'cruxsoft.az';    // Örnek
        $text     = __('Giriş kodunuz: ').$otp;

        // + olmadan gideceği için:
        $msisdn = ltrim($phoneWithPlus, '+');
        $key    = md5(md5($password) . $login . $text . $msisdn . $sender);

        $params = http_build_query([
            'login'   => $login,
            'msisdn'  => $msisdn,
            'text'    => $text,
            'sender'  => $sender,
            'key'     => $key,
            'unicode' => 'false'
        ]);

        $url = "https://apps.lsim.az/quicksms/v1/send?$params";
        @file_get_contents($url); 
        // Hata yönetimini try-catch ile yapmanız önerilir.

        // 7) Verify sayfasına yönlendir
        return redirect()->route('landlord.user.login.otp.verify');
    }

    public function showVerifyForm()
    {
        // Session’da OTP bilgisi yoksa 404
        abort_unless(Session::has('landlord_otp_login'), 404);

        $data = Session::get('landlord_otp_login');
        // Doğrulama sayfasına, expire_time gibi bilgileri de gönderebilirsiniz
        $userOtp = (object)['expire_date' => $data['expires_at']];

        return view('landlord.frontend.user.otp-verify', compact('userOtp'));
    }

public function verify(Request $request)
{
    // 1) Validasyon
    $request->validate(
        ['otp' => 'required'],
        ['otp.required' => __('OTP is required')]
    );

    // 2) Session’daki OTP bilgiler
    $data = Session::get('landlord_otp_login');
    // a) Hiç yoksa veya
    // b) Girilen OTP eşleşmiyorsa veya
    // c) Süresi dolmuşsa
    if (
        !$data ||
        $request->otp != $data['code'] ||
        now()->gt($data['expires_at'])
    ) {
        return back()->with([
            'msg'  => __('Kod geçersiz veya süresi dolmuş'),
            'type' => 'danger'
        ]);
    }

    // 3) Kullanıcı var mı?
    $user = User::find($data['user_id']);
    if (!$user) {
        return back()->with([
            'msg'  => __('Kullanıcı bulunamadı'),
            'type' => 'danger'
        ]);
    }

    // 4) Kullanıcıyı oturum aç
    Auth::guard('web')->login($user, $request->filled('remember'));

    // 5) Session’daki OTP kaydını temizle
    Session::forget('landlord_otp_login');

    // 6) Redirect + kullanıcı bilgilerini ->with() ile gönder
    //    (blade içinde session('username'), session('email') vs. şeklinde erişilebilir)
    return redirect()
        ->route('landlord.user.home')
        ->with([
            'msg'      => __('Login Success Redirecting'),
            'type'     => 'success',
            'username' => $user->username,
            'email'    => $user->email,
        ]);
}


    public function resend()
    {
        // OTP’yi tekrar gönder
        if (!Session::has('landlord_otp_login')) {
            return redirect()->route('landlord.user.login');
        }
        $phone = Session::get('landlord_otp_login.phone');

        // Aynı controller içerisindeki sendOtp metodunu tekrar çağırıyoruz
        return $this->sendOtp(new Request(['phone' => $phone]));
    }
}
