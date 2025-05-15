<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserRegisterController  extends Controller
{
    public function showLoginForm()
    {
        return view('auth.managerlogin');
    }

public function login(Request $request)
{
    $request->validate([
        'user_name' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = [
        'user_name' => $request->user_name,
        'password' => $request->password,
    ];

    $manager = User::where('user_name', $request->user_name)->first();

    if (!$manager) {
        return back()->withErrors(['user_name' => 'اسم المستخدم غير صحيح.']);
    }

    // تعديل هنا حسب نوع الـ role كـ string
    $guard = match ($manager->role) {
        'admin' => 'admin',
        'manager' => 'manager',
        default => null,
    };

    if (!$guard) {
        return back()->withErrors(['user_name' => 'المستخدم غير معرف.']);
    }

    if (!Auth::guard($guard)->attempt($credentials)) {
        return back()->withErrors(['password' => 'كلمة المرور غير صحيحة.']);
    }

    $user = auth()->guard($guard)->user();

    session(['user_data' => $user]);

    return redirect()->route('dashboard');
}




    public function logout(Request $request)
{

    if (Auth::guard('admin')) {
        Auth::guard('admin')->logout();}

    if (Auth::guard('manager')) {
        Auth::guard('manager')->logout();}


    $request->session()->invalidate();
    session()->forget('user_data') ;

    $request->session()->regenerateToken();

    return redirect()->route("home");
}

}
