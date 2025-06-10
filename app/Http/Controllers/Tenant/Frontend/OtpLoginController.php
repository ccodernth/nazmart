<?php
namespace App\Http\Controllers\Tenant\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OtpLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('web'); // CSRF korumasını aktif eder
    }

    public function showForm()
    {
        return view('tenant.frontend.user.login');
    }

    public function sendOtp(Request $request)
    {
        // Validasyon
        $request->validate(['phone' => 'required']);

        // Kullanıcının girdiği numara
        $phoneFromForm = $request->phone; // Ör: 994509814433 veya +994509814433
        // DB'deki user->mobile alanında + var mı, yok mu tamamen size bağlı.
        // Örnek olsun diye + işaretiyle normalize ediyoruz:
        $phoneWithPlus = '+'.ltrim($phoneFromForm, '+');

        // Kullanıcı sorgusu
        $user = User::where('mobile', $phoneWithPlus)->first();
        if (!$user) {
            return back()->with([
                'msg'  => __('Telefon numarası bulunamadı'),
                'type' => 'danger'
            ]);
        }

        // OTP üret
        $otp = random_int(100000, 999999);

        // OTP bilgilerini session'a at (veya DB'ye, proje yapınıza göre)
        Session::put('otp_login', [
            'user_id'    => $user->id,
            'phone'      => $phoneWithPlus,
            'code'       => $otp,
            'expires_at' => now()->addMinutes(5),
            'remember'   => $request->get('remember')
        ]);

        // ***** SMS API parametreleri *****
        $login    = 'user4cruxsoft';
        $password = 'n5h%De1*Nq@x';
        $sender   = 'cruxsoft.az';
        $text     = __('Giriş kodunuz: ') . $otp;

        // ==== Burada en önemli kısım: $msisdn "başında + olmadan" ====
        // Yani +99450... yerine 99450... gönderiyoruz
        $msisdn = ltrim($phoneWithPlus, '+'); // Örn: 994509814433

        // Key oluştur
        $key = md5(md5($password) . $login . $text . $msisdn . $sender);

        $params = http_build_query([
            'login'   => $login,
            'msisdn'  => $msisdn,
            'text'    => $text,
            'sender'  => $sender,
            'key'     => $key,
            'unicode' => 'false'
        ]);

        $url = "https://apps.lsim.az/quicksms/v1/send?$params";

        // SMS isteği
        @file_get_contents($url);

        // OTP doğrulama sayfasına yönlendirme
        return redirect()->route('tenant.user.login.otp.verify');
    }

    public function showVerifyForm()
    {
        abort_unless(Session::has('otp_login'), 404);
        $data = Session::get('otp_login');
        $userOtp = (object)['expire_date' => $data['expires_at']];
        return view('tenant.frontend.user.otp-verify', compact('userOtp'));
    }

    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required']);
        $data = Session::get('otp_login');
        if (!$data || $request->otp != $data['code'] || now()->gt($data['expires_at'])) {
            return back()->with(['msg' => __('Kod geçersiz veya süresi dolmuş'), 'type' => 'danger']);
        }
        $user = User::find($data['user_id']);
        if (!$user) {
            return back()->with(['msg' => __('Kullanıcı bulunamadı'), 'type' => 'danger']);
        }
        Auth::guard('web')->login($user, $request->filled('remember'));
        Session::forget('otp_login');
        return redirect()->route('tenant.user.home');
    }

    public function resend()
    {
        if (!Session::has('otp_login')) {
            return redirect()->route('tenant.user.login');
        }
        $phone = Session::get('otp_login.phone');
        return $this->sendOtp(new Request(['phone' => $phone]));
    }
}
 

