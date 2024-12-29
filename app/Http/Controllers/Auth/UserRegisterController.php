<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_User;
class UserRegisterController  extends Controller
{
    public function showLoginForm()
    {
        return view('auth.emplogin');
    }

    public function login(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'tr_user_name' => 'required|string',
            'tr_user_pass' => 'required|string',
        ]);

        // إعداد بيانات الاعتماد
        $credentials = [
            'tr_user_name' => $request->tr_user_name,
            'password' => $request->tr_user_pass,
        ];

        // جلب المستخدم من قاعدة البيانات للتحقق من الدور
        $bimarUser = Bimar_User::where('tr_user_name', $request->tr_user_name)->first();

        if (!$bimarUser) {
            return back()->withErrors(['tr_user_name' => 'اسم المستخدم غير صحيح.']);
        }

        // تحديد الحارس بناءً على bimar_role_id
        $guard = match ($bimarUser->bimar_role_id) {
            1 => 'administrator',
            2 => 'operation_user',
            3 => 'trainer',
            default => null,
        };

        if (!$guard) {
            return back()->withErrors(['tr_user_name' => 'دور المستخدم غير معرف.']);
        }

        // محاولة تسجيل الدخول باستخدام الحارس المناسب
        if (!Auth::guard($guard)->attempt($credentials)) {
            return back()->withErrors(['tr_user_pass' => 'كلمة المرور غير صحيحة.']);
        }

        // الحصول على المستخدم المصادق عليه
        $user = auth()->guard($guard)->user();

        // تحقق من حالة المستخدم
        if ($bimarUser->bimar_users_status_id !== 1) {
            return back()->with(['message' => 'المستخدم غير فعال']);
        }

        // تحقق من قيمة tr_last_pass
        if ($bimarUser->tr_last_pass === null) {
            return redirect()->route('edit_pass_emp', ['id' => $bimarUser->id]);
        }

        // تحديث آخر تسجيل دخول
        $bimarUser->tr_user_lastaccess = now();
        $bimarUser->save();

        // تخزين بيانات المستخدم في الجلسة
        session(['user_data' => $bimarUser]);

        return redirect()->route('dashboard');
    }





    public function logout(Request $request)
{
    // تسجيل الخروج من المستخدم باستخدام حارس 'trainee'

    if (Auth::guard('administrator')) {
        Auth::guard('administrator')->logout();}

    if (Auth::guard('operation_user')) {
        Auth::guard('operation_user')->logout();}

        if (Auth::guard('trainer')) {
            Auth::guard('trainer')->logout();}


    // إلغاء الجلسة وتفريغ جميع بياناتها
    $request->session()->invalidate();
    session()->forget('user_data') ;
    // تجديد رمز الحماية للجلسة لمنع إعادة استخدام الجلسة القديمة
    $request->session()->regenerateToken();

    // إعادة توجيه المستخدم بعد تسجيل الخروج
    return redirect()->route("home");
}

}
