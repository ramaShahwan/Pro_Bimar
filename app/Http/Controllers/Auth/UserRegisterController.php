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

    // جرب تسجيل الدخول باستخدام الحراس المختلفة
    $user = null; // تعريف المتغير قبل استخدامه

    if (Auth::guard('administrator')->attempt($credentials)) {
        $user = auth()->guard('administrator')->user();
    } elseif (Auth::guard('operation_user')->attempt($credentials)) {
        $user = auth()->guard('operation_user')->user();
    } elseif (Auth::guard('trainer')->attempt($credentials)) {
        $user = auth()->guard('trainer')->user();
    }

    // تحقق مما إذا تم العثور على المستخدم
    if (!$user) {
        return back()->withErrors(['tr_user_pass' => 'تم إدخال بيانات غير صحيحة.']);
    }

    // احصل على المستخدم من قاعدة البيانات
    $bimarUser = Bimar_User::find($user->id);

    // تحقق من حالة المستخدم
    if ($bimarUser && $bimarUser->bimar_users_status_id === 1) {
        // تحقق من قيمة tr_last_pass للمستخدم المصادق عليه
        if ($bimarUser->tr_last_pass === null) {
            return redirect()->route('edit_pass_emp', ['id' => $bimarUser->id]);
        } else {
            $bimarUser->tr_user_lastaccess = now();
            $bimarUser->save();
            session(['user_data' => $bimarUser]);
            return redirect()->route('dashboard');
        }
    } else {
        // المستخدم غير مفعل
        return back()->with(['message' => 'المستخدم غير فعال']);
    }
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
