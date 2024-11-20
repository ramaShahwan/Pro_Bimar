<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Helpers\PasswordGenerator;
use App\Models\Bimar_Users_Status;
use App\Models\Bimar_Roles;
use App\Models\Bimar_User_Academic_Degree;
use App\Models\Bimar_User_Gender;
use Illuminate\Support\Facades\File;

class BimarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function dashboard()
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
             return view('admin.home');
         } else {
             return redirect()->route('home');
         }
     }



    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_User::all();
        return view('admin.emp',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }
    
    public function searchForEmp(Request $request)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $searchTerm = $request->input('search');
        $request->session()->put('search', $searchTerm);
        $data = Bimar_User::where('tr_user_fname_ar', 'like', '%'.$searchTerm.'%')
        ->orwhere('tr_user_lname_ar', 'like', '%'.$searchTerm.'%')
        ->orwhere('tr_user_name', 'like', '%'.$searchTerm.'%')

        ->orderBy('tr_user_fname_ar', 'Asc')
        ->orderBy('tr_user_lname_ar', 'Asc')
        ->orderBy('tr_user_name', 'Asc')

        ->get();

    return view('admin.emp', compact('data'));
}else{
    return redirect()->route('home');
}
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
        $degrees = Bimar_User_Academic_Degree::where('tr_users_degree_status','1')->get();
        $roles = Bimar_Roles::where('tr_role_status','1')->get();
        $statuses = Bimar_Users_Status::where('tr_users_status','1')->get();

        return view('admin.addemp', compact('genders', 'degrees', 'roles', 'statuses'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $validated = $request->validate([
            'tr_user_name' => 'required|string|max:50',
            'tr_user_fname_en' => 'required|string|max:100',
            'tr_user_lname_en' => 'required|string|max:100',
            'tr_user_fname_ar' => 'required|string|max:100',
            'tr_user_lname_ar' => 'required|string|max:100',
            'tr_user_mobile' => 'required|string|max:50',
            'tr_user_email' => 'required|string|email|max:50|unique:bimar_users',
            // 'tr_user_pass' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


            $randomPassword = PasswordGenerator::generate(8);
            $data = Bimar_User::create([
                'tr_user_name' =>$request->tr_user_name,
                'tr_user_fname_en' => $request->tr_user_fname_en,
                'tr_user_lname_en' => $request->tr_user_lname_en,
                'tr_user_fname_ar' => $request->tr_user_fname_ar,
                'tr_user_lname_ar' => $request->tr_user_lname_ar,
                'tr_user_mobile' => $request->tr_user_mobile,
                'tr_user_phone'=>$request->tr_user_phone,
                'tr_user_email' => $request->tr_user_email,
                'bimar_users_status_id' =>$request->bimar_users_status_id,
                'tr_user_address' => $request->tr_user_address,
                'bimar_users_gender_id' => $request->bimar_users_gender_id,
                'bimar_users_academic_degree_id'=> $request->bimar_users_academic_degree_id,
                'bimar_role_id'=> $request->bimar_role_id,

                'tr_user_cv_facebook' => $request->tr_user_cv_facebook,
                'tr_user_cv_linkedin' => $request->tr_user_cv_linkedin,
                'tr_user_cv_youtube' => $request->tr_user_cv_youtube,
                'tr_user_cv_instagram' => $request->tr_user_cv_instagram,
                'tr_user_cv_qualifactions_ar' => $request->tr_user_cv_qualifactions_ar,
                'tr_user_cv_qualifactions_en'=>$request->tr_user_cv_qualifactions_en,
                'tr_user_cv_experience_ar' => $request->tr_user_cv_experience_ar,
                'tr_user_cv_experience_en' =>$request->tr_user_cv_experience_en,
                'tr_user_cv_specialization_ar' => $request->tr_user_cv_specialization_ar,
                'tr_user_cv_specialization_en' => $request->tr_user_cv_specialization_en,
                'tr_user_cv_other_info_ar'=> $request->tr_user_cv_other_info_ar,
                'tr_user_cv_other_info_en'=> $request->tr_user_cv_other_info_en,

                'tr_user_pass' => Hash::make($randomPassword),
                'tr_last_pass'=>null,
                'tr_user_lastaccess'=>null,

            ]);

                // store image
                if($request->hasFile('tr_user_personal_img')){
                    $newImage = $request->file('tr_user_personal_img');
                    //for change image name
                    $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
                    $newImage->move(public_path('img/user/'), $newImageName);
                    $data->tr_user_personal_img = $newImageName;
                    $data->update();
                }
            // return redirect()->route('user')->with('success',($randomPassword), ' تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور .');;
            return redirect()->route('user')->with('message', "تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور <br> " . $randomPassword);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_User::where('id',$id)->first();

        return view('admin.showemp',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_User::findOrFail($id);
        $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
        $degrees = Bimar_User_Academic_Degree::where('tr_users_degree_status','1')->get();
        $roles = Bimar_Roles::where('tr_role_status','1')->get();
        $statuses = Bimar_Users_Status::where('tr_users_status','1')->get();

        return view('admin.updateemp', compact('data', 'genders', 'degrees', 'roles', 'statuses'));
    }else{
        return redirect()->route('home');
    }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
          if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $validated = $request->validate([
                'tr_user_name' => 'required|string|max:50',
                'tr_user_fname_en' => 'required|string|max:100',
                'tr_user_lname_en' => 'required|string|max:100',
                'tr_user_fname_ar' => 'required|string|max:100',
                'tr_user_lname_ar' => 'required|string|max:100',
                'tr_user_mobile' => 'required|string|max:50',
                'tr_user_email' => 'required|string|email|max:50',

            ]);

            $data = Bimar_User::findOrFail($id);
            $oldImageName = $data->tr_user_personal_img;

            $data->tr_user_name = $request->tr_user_name;
            $data->tr_user_fname_en = $request->tr_user_fname_en;
            $data->tr_user_lname_en = $request->tr_user_lname_en;
            $data->tr_user_fname_ar = $request->tr_user_fname_ar;
            $data->tr_user_lname_ar = $request->tr_user_lname_ar;
            $data->tr_user_mobile = $request->tr_user_mobile;
            $data->tr_user_phone = $request->tr_user_phone;
            $data->tr_user_email = $request->tr_user_email;
            $data->tr_user_address = $request->tr_user_address;
            $data->bimar_users_status_id = $request->bimar_users_status_id;
            $data->bimar_users_gender_id = $request->bimar_users_gender_id;
            $data->bimar_users_academic_degree_id = $request->bimar_users_academic_degree_id;
            $data->bimar_role_id = $request->bimar_role_id;

            $data->tr_user_cv_facebook = $request->tr_user_cv_facebook;
            $data->tr_user_cv_linkedin = $request->tr_user_cv_linkedin;
            $data->tr_user_cv_youtube = $request->tr_user_cv_youtube;
            $data->tr_user_cv_instagram = $request->tr_user_cv_instagram;
            $data->tr_user_cv_qualifactions_ar = $request->tr_user_cv_qualifactions_ar;
            $data->tr_user_cv_qualifactions_en = $request->tr_user_cv_qualifactions_en;
            $data->tr_user_cv_experience_ar = $request->tr_user_cv_experience_ar;
            $data->tr_user_cv_experience_en = $request->tr_user_cv_experience_en;
            $data->tr_user_cv_specialization_ar = $request->tr_user_cv_specialization_ar;
            $data->tr_user_cv_specialization_en = $request->tr_user_cv_specialization_en;
            $data->tr_user_cv_other_info_ar = $request->tr_user_cv_other_info_ar;
            $data->tr_user_cv_other_info_en = $request->tr_user_cv_other_info_en;

            $data->update();


            // edit image
            if($request->hasFile('tr_user_personal_img')){
                if ($oldImageName) {
                    File::delete(public_path('img/user/') . $oldImageName);
                }
             $newImage = $request->file('tr_user_personal_img');
             //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/user/'), $newImageName);
            $data->tr_user_personal_img = $newImageName;
            $data->update();
     }
      return redirect()->route('user')->with(['message'=>'تم التعديل']);
    }else{
        return redirect()->route('home');
    }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_User $bimar_User)
    {
        //
    }
    public function edit_pass($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $user = Bimar_User::findOrFail($id);
        return view('emp.changepassword',compact('user'));
    }else{
        return redirect()->route('home');
    }
    }



    public function changePassword($id)
   {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
    $user = Bimar_User::findOrFail($id);

    $randomPassword = PasswordGenerator::generate(8);

    $old_password =  $user->tr_user_pass;
    $user->tr_last_pass =  $old_password;
    // $user = Auth::user();
    $user->tr_user_pass = Hash::make($randomPassword);
    $user->tr_user_passchangedate = now();
    $user->save();

    return redirect()->back()->with('message', "تم تعديل كلمة المرور بنجاح وهذه هي كلمة المرور الجديدة: <br>" . $randomPassword);
}else{
    return redirect()->route('home');
}
  }
//profile
public function emp_edit_profile($id)
  {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
      $data = Bimar_User::findOrFail($id);
      $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
      $degrees = Bimar_User_Academic_Degree::where('tr_users_degree_status','1')->get();
      return view('emp.profile', compact('data', 'genders', 'degrees'));
    }else{
        return redirect()->route('home');
    }
  }

  public function update_profile(Request $request,  $id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $validated = $request->validate([
                'tr_user_name' => 'required|string|max:50',
                'tr_user_fname_en' => 'required|string|max:100',
                'tr_user_lname_en' => 'required|string|max:100',
                'tr_user_fname_ar' => 'required|string|max:100',
                'tr_user_lname_ar' => 'required|string|max:100',
                'tr_user_mobile' => 'required|string|max:50',
                'tr_user_email' => 'required|string|email|max:50',

            ]);

            $data = Bimar_User::findOrFail($id);
            $oldImageName = $data->tr_user_personal_img;

            $data->tr_user_name = $request->tr_user_name;
            $data->tr_user_fname_en = $request->tr_user_fname_en;
            $data->tr_user_lname_en = $request->tr_user_lname_en;
            $data->tr_user_fname_ar = $request->tr_user_fname_ar;
            $data->tr_user_lname_ar = $request->tr_user_lname_ar;
            $data->tr_user_mobile = $request->tr_user_mobile;
            $data->tr_user_phone = $request->tr_user_phone;
            $data->tr_user_email = $request->tr_user_email;
            $data->tr_user_address = $request->tr_user_address;
            $data->bimar_users_gender_id = $request->bimar_users_gender_id;
            $data->bimar_users_academic_degree_id = $request->bimar_users_academic_degree_id;

            
            $data->tr_user_cv_facebook = $request->tr_user_cv_facebook;
            $data->tr_user_cv_linkedin = $request->tr_user_cv_linkedin;
            $data->tr_user_cv_youtube = $request->tr_user_cv_youtube;
            $data->tr_user_cv_instagram = $request->tr_user_cv_instagram;
            $data->tr_user_cv_qualifactions_ar = $request->tr_user_cv_qualifactions_ar;
            $data->tr_user_cv_qualifactions_en = $request->tr_user_cv_qualifactions_en;
            $data->tr_user_cv_experience_ar = $request->tr_user_cv_experience_ar;
            $data->tr_user_cv_experience_en = $request->tr_user_cv_experience_en;
            $data->tr_user_cv_specialization_ar = $request->tr_user_cv_specialization_ar;
            $data->tr_user_cv_specialization_en = $request->tr_user_cv_specialization_en;
            $data->tr_user_cv_other_info_ar = $request->tr_user_cv_other_info_ar;
            $data->tr_user_cv_other_info_en = $request->tr_user_cv_other_info_en;
            $data->update();


            // edit image
            if($request->hasFile('tr_user_personal_img')){
                if ($oldImageName) {
                    File::delete(public_path('img/user/') . $oldImageName);
                }
             $newImage = $request->file('tr_user_personal_img');
             //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/user/'), $newImageName);
            $data->tr_user_personal_img = $newImageName;
            $data->update();
     }
      return back()->with(['message'=>'تم التعديل']);
    }else{
        return redirect()->route('home');
    }
    }

    public function changePass_emp(Request $request, $id)
{     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
    $user = Bimar_User::findOrFail($id);

    $request->validate([
        'tr_user_pass' => [
            'required',
            'string',
            'confirmed',
            'min:8',
            'regex:/[a-z]/',      
            'regex:/[A-Z]/',      
            'regex:/[0-9]/',      
            'regex:/[@$!%*#?&]/', 
            function ($attribute, $value, $fail) use ($user) {
                if (Hash::check($value, $user->tr_user_pass)) {
                    $fail('كلمة السر الجديدة لا يمكن أن تكون مطابقة لكلمة السر القديمة.');
                }
            },
        ],
    ]);

    $old_password = $user->tr_user_pass;

    if ($request->tr_user_pass) {
        if ($old_password) {
            $user->tr_last_pass = $old_password;
            $user->tr_user_pass = Hash::make($request->tr_user_pass);
            $user->tr_user_passchangedate = now();
        }
        $user->save(); // استخدم save بدلاً من update
    }
    return redirect()->route('login_user');
}else{
    return redirect()->route('home');
}
    // return redirect()->back()->with('message', "تم تعديل كلمة المرور بنجاح");
}


    //trainer_function
  public function my_profile($id)
  {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
      $data = Bimar_User::where('id',$id)->first();

      return view('tainer.profile',compact('data'));
    }else{
        return redirect()->route('home');
    }
  }

  public function emp_edit($id)
  {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
      $data = Bimar_User::findOrFail($id);
      $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
      $degrees = Bimar_User_Academic_Degree::where('tr_users_degree_status','1')->get();
      return view('emp.updateemp', compact('data', 'genders', 'degrees'));
    }else{
        return redirect()->route('home');
    }
  }

  public function emp_update(Request $request, $id)
{    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
    $data = Bimar_User::findOrFail($id); 
    $oldImageName = $data->tr_user_personal_img;
    $old_password =  $data->tr_user_pass;

    $validated = $request->validate([
        'tr_user_name' => 'required|string|max:50',
        'tr_user_fname_en' => 'required|string|max:100',
        'tr_user_lname_en' => 'required|string|max:100',
        'tr_user_fname_ar' => 'required|string|max:100',
        'tr_user_lname_ar' => 'required|string|max:100',
        'tr_user_mobile' => 'required|string|max:50',
        'tr_user_email' => 'required|string|email|max:50',
        'tr_user_pass' => [
            'required',
            'string',
            'confirmed',
            'min:8',
            'regex:/[a-z]/',      
            'regex:/[A-Z]/',      
            'regex:/[0-9]/',      
            'regex:/[@$!%*#?&]/', 
            function ($attribute, $value, $fail) use ($data) {
                if (Hash::check($value, $data->tr_user_pass)) {
                    $fail('كلمة السر الجديدة لا يمكن أن تكون مطابقة لكلمة السر القديمة.');
                }
            },
        ],
    ]);

    $data->tr_user_name = $request->tr_user_name;
    $data->tr_user_fname_en = $request->tr_user_fname_en;
    $data->tr_user_lname_en = $request->tr_user_lname_en;
    $data->tr_user_fname_ar = $request->tr_user_fname_ar;
    $data->tr_user_lname_ar = $request->tr_user_lname_ar;
    $data->tr_user_mobile = $request->tr_user_mobile;
    $data->tr_user_phone = $request->tr_user_phone;
    $data->tr_user_email = $request->tr_user_email;
    $data->tr_user_address = $request->tr_user_address;
    $data->bimar_users_gender_id = $request->bimar_users_gender_id;
    $data->bimar_users_academic_degree_id = $request->bimar_users_academic_degree_id;

    $data->tr_user_cv_facebook = $request->tr_user_cv_facebook;
    $data->tr_user_cv_linkedin = $request->tr_user_cv_linkedin;
    $data->tr_user_cv_youtube = $request->tr_user_cv_youtube;
    $data->tr_user_cv_instagram = $request->tr_user_cv_instagram;
    $data->tr_user_cv_qualifactions_ar = $request->tr_user_cv_qualifactions_ar;
    $data->tr_user_cv_qualifactions_en = $request->tr_user_cv_qualifactions_en;
    $data->tr_user_cv_experience_ar = $request->tr_user_cv_experience_ar;
    $data->tr_user_cv_experience_en = $request->tr_user_cv_experience_en;
    $data->tr_user_cv_specialization_ar = $request->tr_user_cv_specialization_ar;
    $data->tr_user_cv_specialization_en = $request->tr_user_cv_specialization_en;
    $data->tr_user_cv_other_info_ar = $request->tr_user_cv_other_info_ar;
    $data->tr_user_cv_other_info_en = $request->tr_user_cv_other_info_en;
    
    if($request->tr_user_pass){
        if ($old_password) {
            $data->tr_last_pass =  $old_password;
            $data->tr_user_pass = Hash::make($request->tr_user_pass);
            $data->tr_user_passchangedate = now();
        }
    }
    if ($request->hasFile('tr_user_personal_img')) {
        if ($oldImageName) {
            File::delete(public_path('img/user/') . $oldImageName);
        }
        $newImage = $request->file('tr_user_personal_img');
        $newImageName = 'image_' . $data->id . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('img/user/'), $newImageName);
        $data->tr_user_personal_img = $newImageName;
    }

    $data->save(); 

    if ($data->tr_user_lastaccess === null) {
        return redirect()->route('login_user')->with(['message' => 'تم التعديل']);
    } else {
        return redirect()->route('dashboard')->with(['message' => 'تم التعديل']);
    }
}else{
    return redirect()->route('home');
}
}


}
