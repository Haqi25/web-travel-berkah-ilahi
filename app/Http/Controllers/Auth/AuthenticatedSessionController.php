<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\EmailOtp;
use App\Mail\SendOtpMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        
      
    $user = User::where('email', $request->email)->first();

    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return redirect()->back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

     

        $otp = rand(100000, 999999);

        EmailOtp::updateOrCreate(['email' => $request->email], [
            'email' => $request->email,
            'otp' => $otp,
            'expired_at' => Carbon::now()->addMinute(10)
        ]);

        Mail::to($request->email)->send(new SendOtpMail($otp));

        $request->session()->put('login_email', $request->email);
        $request->session()->put('login_password', Hash::make($request->password));

        return redirect()->route('verify.otp');

    }

    public function verifyOtp(){
        return view('auth.otp-verification');
    }

    public function verifyOtpStore(Request $request){
        
        $request->validate([
            'otp' => ['required', 'string', 'size:6']
        ]);

        $email = $request->session()->get('login_email');
        $password = $request->session()->get('login_password');

        $emailOtp = EmailOtp::where('email', $email)
        ->where('otp', $request->otp)
        ->where('expired_at', '>=', Carbon::now())
        ->first();

        if(!$emailOtp){
            return redirect()->back()->withInput()->with(['message' => 'Kode Otp Salah atau kadaluarsa']);
        }

    
    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->route('login')
            ->withErrors(['email' => 'User tidak terdaftar di sistem kami.']);
    }

   
    Auth::login($user);

  
    $emailOtp->delete();
    
    
    $request->session()->forget(['login_email', 'login_password']);
    
    
    $request->session()->regenerate();

    // 7. REDIRECT ke Dashboard
    return redirect()->intended(route('dashboard', absolute: false))
        ->with('status', 'Selamat datang kembali, ' . $user->name);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function sendOtp(Request $request) {
    $request->validate(['email' => 'required|email|exists:users,email']);
    
    $user = User::where('email', $request->email)->first();
    $otp = rand(100000, 999999);

    $user->update([
        'otp_code' => $otp,
        'otp_expires_at' => now()->addMinutes(10) 
    ]);

    Mail::to($user->email)->send(new SendOtpMail($otp));

    return redirect()->route('password.otp.view', ['email' => $user->email]);
}
}
