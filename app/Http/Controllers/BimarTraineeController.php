<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Trainee;
use Illuminate\Http\Request;
use App\Helpers\PasswordGenerator;
use Illuminate\Support\Facades\Hash;
use App\Models\Bimar_Users_Status;
use App\Models\Bimar_User_Gender;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Trainee::all();
        return view('admin.trainee',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }
    public function searchForTrainee(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $searchTerm = $request->input('search');
        $request->session()->put('search', $searchTerm);
        $data = Bimar_Trainee::where('trainee_fname_ar', 'like', '%'.$searchTerm.'%')
        ->orwhere('trainee_lname_ar', 'like', '%'.$searchTerm.'%')
        ->orwhere('trainee_fname_en', 'like', '%'.$searchTerm.'%')
        ->orwhere('trainee_lname_en', 'like', '%'.$searchTerm.'%')
        ->orwhere('trainee_mobile', 'like', '%'.$searchTerm.'%')
        ->orwhere('trainee_email', 'like', '%'.$searchTerm.'%') 


        ->orderBy('trainee_fname_ar', 'Asc')
        ->orderBy('trainee_lname_ar', 'Asc')
        ->orderBy('trainee_fname_en', 'Asc')
        ->orderBy('trainee_lname_en', 'Asc')
        ->orderBy('trainee_mobile', 'Asc')
        ->orderBy('trainee_email', 'Asc')

        ->get();
    return view('admin.trainee', compact('data'));
}else{
    return redirect()->route('home');
}
   }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.addtrainee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $customNames = [
            'trainee_fname_ar' => 'arabic first name',
            'trainee_lname_ar' => 'arabic last name',
            'trainee_fname_en' => 'english first name',
            'trainee_lname_en' => 'english last name',
            'trainee_mobile' => 'mobile',
            'trainee_email' => 'email',
        ];

        $validator = Validator::make($request->all(), [
            'trainee_fname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'trainee_lname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'trainee_fname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'trainee_lname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'trainee_mobile' => 'required|string|max:50',
            'trainee_email' => 'required|string|email|max:50|unique:bimar_trainees',
        ]);


        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $randomPassword = PasswordGenerator::generate(8);
        $data = Bimar_Trainee::create([
            'trainee_fname_ar' =>$request->trainee_fname_ar,
            'trainee_lname_ar' => $request->trainee_lname_ar,
            'trainee_fname_en' => $request->trainee_fname_en,
            'trainee_lname_en' => $request->trainee_lname_en,
            'trainee_mobile' => $request->trainee_mobile,
            'trainee_email' => $request->trainee_email,
            'bimar_users_status_id' => $request->bimar_users_status_id,
            'trainee_address' => $request->trainee_address,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,
            'trainee_pass' => Hash::make($randomPassword),
            'trainee_last_pass'=>null,
            'tr_user_lastaccess'=>null,

        ]);

            // store image
            if($request->hasFile('trainee_personal_img')){
                $newImage = $request->file('trainee_personal_img');
                //for change image name
                $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/trainee/'), $newImageName);
                $data->trainee_personal_img = $newImageName;
                $data->update();
            }
        return redirect()->route('admin.addtrainee')->with('success',($randomPassword), ' تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور .');;
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show_tr($id)

    {  
         if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Trainee::where('id',$id)->first();

        return view('admin.showtrainee',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Trainee::findOrFail($id);
        $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
        $statuses = Bimar_Users_Status::where('tr_users_status','1')->get();

        return view('admin.updatetrainee', compact('data', 'genders','statuses'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {

        try {
            $customNames = [
               'trainee_fname_ar' => 'arabic first name',
            'trainee_lname_ar' => 'arabic last name',
            'trainee_fname_en' => 'english first name',
            'trainee_lname_en' => 'english last name',
            'trainee_mobile' => 'mobile',
            'trainee_email' => 'email',
            ];

            $validator = Validator::make($request->all(), [
                'trainee_fname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'trainee_lname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'trainee_fname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'trainee_lname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'trainee_mobile' => 'required|string|max:50',
            'trainee_email' => 'required|string|email|max:50',
            ]);
            $validator->setAttributeNames($customNames);
            // if ($validator->fails())
            //     return response()->json(['errors' => $validator->errors()], 422);
            // }

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = Bimar_Trainee::findOrFail($id);
            $oldImageName = $data->trainee_personal_img;

            $data->trainee_fname_ar = $request->trainee_fname_ar;
            $data->trainee_lname_ar = $request->trainee_lname_ar;
            $data->trainee_fname_en = $request->trainee_fname_en;
            $data->trainee_lname_en = $request->trainee_lname_en;
            $data->trainee_mobile = $request->trainee_mobile;
            $data->trainee_email = $request->trainee_email;
            $data->trainee_address = $request->trainee_address;
            $data->bimar_users_status_id = $request->bimar_users_status_id;
            $data->bimar_users_gender_id = $request->bimar_users_gender_id;
            $data->save();

            // edit image
            if($request->hasFile('trainee_personal_img')){
                if ($oldImageName) {
                    File::delete(public_path('img/trainee/') . $oldImageName);
                }

             $newImage = $request->file('trainee_personal_img');
             //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/trainee/'), $newImageName);
            $data->trainee_personal_img = $newImageName;
            $data->update();
      }

 return redirect()->route('trainee')->with(['message'=>'تم التعديل بنجاح']);
} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 500);
}
}else{
    return redirect()->route('home');
}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Trainee $bimar_Trainee)
    {
        //
    }

    public function changePassword($id)
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
     $user = Bimar_Trainee::findOrFail($id);

     $randomPassword = PasswordGenerator::generate(8);

     $old_password =  $user->trainee_pass;
     $user->trainee_last_pass =  $old_password;
     // $user = Auth::user();
     $user->trainee_pass = Hash::make($randomPassword);
     $user->trainee_passchangedate = now();
     $user->save();
     return redirect()->back()->with('message', "تم تعديل كلمة المرور بنجاح وهذه هي كلمة المرور الجديدة:<br> " . $randomPassword);
    }else{
        return redirect()->route('home');
    }
   }

   //trainee_function
   public function my_profile($id)
   {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
    || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
       $data = Bimar_Trainee::where('id',$id)->first();

       return view('tainee.profile',compact('data'));
    }else{
        return redirect()->route('home');
    }
   }


   public function edit_profile($id)
   {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
    || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
       $data = Bimar_Trainee::findOrFail($id);
       $genders = Bimar_User_Gender::where('tr_users_status','1')->get();
       $statuses = Bimar_Users_Status::where('tr_users_status','1')->get();

       return view('user.update_user', compact('data', 'genders','statuses'));
    }else{
        return redirect()->route('home');
    }
   }

   public function update_profile(Request $request, $id)
   {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
    || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
    $data = Bimar_Trainee::findOrFail($id);
    $oldImageName = $data->trainee_personal_img;



    try {
        $customNames = [
      'trainee_fname_ar' => 'arabic first name',
            'trainee_lname_ar' => 'arabic last name',
            'trainee_fname_en' => 'english first name',
            'trainee_lname_en' => 'english last name',
            'trainee_mobile' => 'mobile',
            'trainee_email' => 'email',
        ];

        $validator = Validator::make($request->all(), [
            'trainee_fname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'trainee_lname_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'trainee_fname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'trainee_lname_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'trainee_mobile' => 'required|string|max:50',
            'trainee_email' => 'required|string|email|max:50',
        ]);
        $validator->setAttributeNames($customNames);
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

           $data->trainee_fname_ar = $request->trainee_fname_ar;
           $data->trainee_lname_ar = $request->trainee_lname_ar;
           $data->trainee_fname_en = $request->trainee_fname_en;
           $data->trainee_lname_en = $request->trainee_lname_en;
           $data->trainee_mobile = $request->trainee_mobile;
           $data->trainee_email = $request->trainee_email;
           $data->trainee_address = $request->trainee_address;
           $data->bimar_users_gender_id = $request->bimar_users_gender_id;
           $data->update();



           // edit image
           if($request->hasFile('trainee_personal_img')){
               if ($oldImageName) {
                   File::delete(public_path('img/trainee/') . $oldImageName);
               }

            $newImage = $request->file('trainee_personal_img');
            //for change image name
           $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
           $newImage->move(public_path('img/trainee/'), $newImageName);
           $data->trainee_personal_img = $newImageName;
           $data->update();
     }
     $user = auth()->guard('trainee')->user();
     $bimarTrainee = Bimar_Trainee::find($user->id);

     if ($user->bimar_users_status_id === 1) {
         $bimarTrainee->trainee_last_pass = now();
         $bimarTrainee->save();

         // تخزين بيانات المستخدم في الجلسة
         session(['user_data' => $bimarTrainee]);

         // توجيه المستخدم إلى الراوت الذي يجلب جميع البرامج
         return redirect()->route("all_programs")->with('message', 'تم التعديل بنجاح');
     } else {
         // المستخدم غير مفعل
         return back()->with(['message'=>'المستخدم غير فعال']);
     }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }else{
        return redirect()->route('home');
    }
// return redirect()->route('all_programs')->with(['message'=>'تم التعديل']);

   }


public function changePass(Request $request, $id)
{
    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check() || Auth::guard('trainee')->check()) {

        try {
            $data = Bimar_Trainee::findOrFail($id);

            $customNames = [
                'trainee_pass' => 'password'
            ];

            $validator = Validator::make($request->all(), [
                'trainee_pass' => [
                    'required',
                    'string',
                    'confirmed',
                    'min:8',
                    'regex:/[a-z]/',
                    'regex:/[A-Z]/',
                    'regex:/[0-9]/',
                    'regex:/[@$!%*#?&]/',
                    function ($attribute, $value, $fail) use ($data) {
                        if (Hash::check($value, $data->trainee_pass)) {
                            $fail('كلمة السر الجديدة لا يمكن أن تكون مطابقة لكلمة السر القديمة.');
                        }
                    },
                ],
            ]);

            $validator->setAttributeNames($customNames);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $old_password = $data->trainee_pass;

            if ($request->trainee_pass) {
                if ($old_password) {
                    $data->trainee_last_pass = $old_password;
                    $data->trainee_pass = Hash::make($request->trainee_pass);
                    $data->trainee_passchangedate = now();
                }
                $data->update();
            }

            return response()->json(['message' => 'تم تغيير كلمة المرور بنجاح.'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    } else {
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}


}
