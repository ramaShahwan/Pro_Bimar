<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bimar_Trainee;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Bimar_User_Gender;
use App\Models\Bimar_Users_Status;





class TraineeRegisterController extends Controller
{
    /**
     * Display the registration view.
     */

     public function showregisterForm()
     {
        $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
        $statuses = Bimar_Users_Status::where('tr_users_status','1')->get();
         return view('auth.register',compact('genders','statuses'));
     }

    public function register(Request $request)
    {
        $request->validate([
            'trainee_fname_ar' => 'required|string|max:100|regex:/^[\p{Arabic}\s]+$/u',
            'trainee_lname_ar' => 'required|string|max:100|regex:/^[\p{Arabic}\s]+$/u',
            'trainee_fname_en' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'trainee_lname_en' => 'required|string|max:100|regex:/^[a-zA-Z\s]+$/',
            'trainee_mobile' => 'required|string|max:50|unique:bimar_trainees',
            'trainee_email' => 'required|string|email|max:50|unique:bimar_trainees',
            'trainee_pass' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = Bimar_Trainee::create([
            'trainee_fname_ar' => $request->trainee_fname_ar,
            'trainee_lname_ar' => $request->trainee_lname_ar,
            'trainee_fname_en' => $request->trainee_fname_en,
            'trainee_lname_en' => $request->trainee_lname_en,
            'trainee_mobile' => $request->trainee_mobile,
            'trainee_email' => $request->trainee_email,
            'tr_user_passchangedate' => null ,

            'trainee_address' => $request->trainee_address,
            'bimar_users_status_id' => 1,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,

            'trainee_pass' => Hash::make($request->trainee_pass),
        ]);
        $data->save();
            // store image
            if($request->hasFile('trainee_personal_img')){
                $newImage = $request->file('trainee_personal_img');
                //for change image name
                $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/trainee/'), $newImageName);
                $data->trainee_personal_img = $newImageName;
                $data->update();
            }

        return redirect()->route('login_trainee')->with('message', 'ان عملية إنشاء الحساب تمت بنجاح و سيتم استخدام رقم الموبايل للدخول للمنصة');
    }

    public function login(Request $request)
{
    $request->validate([
        'trainee_mobile' => 'required|string',
        'trainee_pass' => 'required|string',
    ]);

    $credentials = [
        'trainee_mobile' => $request->trainee_mobile,
        'password' => $request->trainee_pass,
    ];

    if (Auth::guard('trainee')->attempt($credentials)) {
        $user = auth()->guard('trainee')->user();

        // احصل على المستخدم من قاعدة البيانات
        $bimarTrainee = Bimar_Trainee::find($user->id);

        if ($user->bimar_users_status_id === 1) {
            $bimarTrainee->trainee_last_pass = now();
            $bimarTrainee->save();

            // تخزين بيانات المستخدم في الجلسة
            session(['user_data' => $bimarTrainee]);

            // توجيه المستخدم إلى الراوت الذي يجلب جميع البرامج
            return redirect()->route("all_programs");
        } else {
            // المستخدم غير مفعل
            return back()->with(['message'=>'المستخدم غير فعال']);
        }
    }

    return back()->withErrors(['trainee_mobile' => 'تم إدخال بيانات غير صحيحة.']);
}

    public function logout(Request $request)
{
    // تسجيل الخروج من المستخدم باستخدام حارس 'trainee'
    Auth::guard('trainee')->logout();
    session()->forget('user_data') ;
    // إلغاء الجلسة وتفريغ جميع بياناتها
    $request->session()->invalidate();

    // تجديد رمز الحماية للجلسة لمنع إعادة استخدام الجلسة القديمة
    $request->session()->regenerateToken();

    // إعادة توجيه المستخدم بعد تسجيل الخروج
    return redirect('/');
}

}
