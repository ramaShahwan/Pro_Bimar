<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Enrollment_Payment;
use App\Models\Bimar_Questions_Bank;
use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_Course_Enrol_Time;



use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BimarTrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function show_trainers_details($id)
    //  {
    //      $data = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$id)->get();
    //      return response()->json($data);
    //  }
//     public function show_trainers_details($id)
// {
//     $data = Bimar_Course_Enrol_Trainer::with(['Bimar_User.Bimar_User_Academic_Degree'])
//         ->where('bimar_course_enrollment_id', $id)
//         ->get();
// dd($data);
//     return response()->json($data);
// }
public function show_trainers_details($id)
{
    $data = Bimar_Course_Enrol_Trainer::with([
        'Bimar_User.Bimar_User_Academic_Degree'
    ])
    ->where('bimar_course_enrollment_id', $id)
    ->get();

    return response()->json($data);
}



public function show_times($id)
{
    $data = Bimar_Course_Enrol_Time::where('bimar_course_enrollment_id', $id)
    ->get();

    return response()->json($data);
}


    public function index()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Program::all();
        return view('admin.programs',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addprogram');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $customNames = [
            'tr_program_code' => 'code',
            'tr_program_name_en' => 'english name',
            'tr_program_name_ar' => 'arabic name',
        ];

        $validator = Validator::make($request->all(), [
            'tr_program_code' => 'required|regex:/^[a-zA-Z\s]+$/|unique:bimar_training_programs',
            'tr_program_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'tr_program_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
        ]);

        $validator->setAttributeNames($customNames);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data = new Bimar_Training_Program;
        $data->tr_program_code = $request->tr_program_code;
        $data->tr_program_name_en = $request->tr_program_name_en;
        $data->tr_program_name_ar = $request->tr_program_name_ar;
        $data->tr_program_status = $request->tr_program_status;
        $data->tr_program_desc = $request->tr_program_desc;
        $data->save();

         // store image
         if($request->hasFile('tr_program_img')){
            $newImage = $request->file('tr_program_img');
            //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/program/'), $newImageName);
            $data->tr_program_img = $newImageName;
            $data->update();
         }


    // $pathName = Bimar_Questions_Bank::where('id', 1)->value('tr_bank_name');
    // $path = '||' . $pathName . '|';
    // 'tr_bank_path' => $path ?? null,

    Bimar_Questions_Bank::create([
        'bimar_training_program_id' => $data->id,
        'bimar_training_course_id' =>null,
        'tr_bank_name' =>$data->tr_program_code,
        'tr_bank_path' => '||BIMAR|'.$data->tr_program_code . '|',
        'tr_bank_parent_id' => 1,
        'tr_bank_desc'=>$data->tr_program_code.' Questions Banks',
        'tr_bank_status' => 1,
        'tr_bank_create_date'=>now(),
    ]);

    return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Program $bimar_Training_Program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
         $data = Bimar_Training_Program::findOrFail($id);

         return response()->json($data);
        }else{
            return redirect()->route('home');
        }
     }

     public function update(Request $request, $id)
     {
         if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
             $validator = Validator::make($request->all(), [
                'tr_program_code' => 'required|regex:/^[a-zA-Z\s]+$/|unique:bimar_training_programs,tr_program_code,' . $id,
                 'tr_program_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                 'tr_program_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
             ], [
                 'tr_program_code.required' => '   يرجى إدخال رمز البرنامج' ,
                 'tr_program_name_en.required' => 'يرجى إدخال الاسم باللغة الإنجليزية',
                 'tr_program_name_ar.required' => 'يرجى إدخال الاسم باللغة العربية',
             ]);

             if ($validator->fails()) {
                 return response()->json(['errors' => $validator->errors()], 422);
             }

             $program = Bimar_Training_Program::findOrFail($id);

             $program->update([
                 'tr_program_code' => $request->tr_program_code,
                 'tr_program_name_en' =>  $request->tr_program_name_en,
                 'tr_program_name_ar' => $request->tr_program_name_ar,
                 'tr_program_desc' => $request->tr_program_desc,
             ]);

             if ($request->hasFile('tr_program_img')) {
                 $imageName = time() . '.' . $request->tr_program_img->extension();
                 $request->tr_program_img->move(public_path('img/program'), $imageName);
                 $program->update(['tr_program_img' => $imageName]);
             }

             return response()->json(['message' => 'تم التعديل بنجاح']);
         }

         return response()->json(['error' => 'غير مسموح'], 403);
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Program $bimar_Training_Program)
    {
        //
    }


    public function updateSwitch($programId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $program = Bimar_Training_Program::find($programId);
        if($program){
            if($program->tr_program_status){
                $program->tr_program_status =0;
            }
            else{
                $program->tr_program_status =1;
            }
            $program->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }

    }


     //trainee_function
     public function all_programs()
     {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
         $data = Bimar_Training_Program::where('tr_program_status','1')->get();
         return view('user.program',compact('data'));
        }else{
            return redirect()->route('home');
        }
     }

     public function courses_for_program($id)
     {  if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
        $program = Bimar_Training_Program::where('id',$id)->first();
         $data = Bimar_Course_Enrollment::where('bimar_training_program_id',$id)->where('tr_course_enrol_status',1)->get();
         return view('user.courses',compact('data','program'));
        }else{
            return redirect()->route('home');
        }
     }

     public function details_course_enrollment($id)
{
    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check() || Auth::guard('trainee')->check()) {
        $data = Bimar_Course_Enrollment::with(['bimar_training_program','bimar_training_course', 'bimar_training_type'])
            ->where('id', $id)
            ->first();

        return response()->json($data); // عودة البيانات كـ JSON
    } else {
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}


     public function Register_for_course(Request $request,$id)
     {
     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
        //   $user_id  =Auth::guard('trainee')->id();
        $user = Auth::guard('trainee')->user();
        $user_id =$user->id;
            $registered = Bimar_Enrollment_Payment::where('bimar_trainee_id',$user_id)->where('bimar_course_enrollment_id',$id)
            ->where('tr_enrol_pay_canceled','0')->first();
              if( $registered)
              {
                return redirect()->route('get_bills')->with('message','. عزيزي المتدرب: لقد قمت مسبقاً بالتسجيل على هذه الدورة التدريبية');
              }
              else
              {
                $price = Bimar_Course_Enrollment::where('id',$id)->pluck('tr_course_enrol_price')->first();
                $discount =Bimar_Course_Enrollment::where('id',$id)->pluck('tr_course_enrol_discount')->first();
                $final_price = $price - (($price * $discount) / 100);

                $data = new Bimar_Enrollment_Payment;
                $data->bimar_trainee_id = $user_id;
                $data->bimar_course_enrollment_id = $id;
                $data->tr_enrol_pay_net_price = $final_price;
                $data->bimar_currency_id = 1;


                //test
                $data->bimar_user_id = 1;


                $data->tr_enrol_pay_reg_date = now();
                $data->bimar_payment_status_id=1;
                $data->save();
            return redirect()->route('bill_courses',$data->id)->with('message','تم التسجيل على هذه الدورة التدريبية بنجاح');

              }
          }
           else{
            return redirect()->route('home');
        }
    }

    public function get_bills()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
            $user = Auth::guard('trainee')->user();
            $user_id =$user->id;

             $data = Bimar_Enrollment_Payment::where('bimar_trainee_id',$user_id)
             ->where('tr_enrol_pay_canceled',0)->get();
         return view('user.bill',compact('data'));

             }
        else{
              return redirect()->route('home');
          }
        }

     public function bill_courses($id)
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
            $user = Auth::guard('trainee')->user();
            $user_id =$user->id;

             $data = Bimar_Enrollment_Payment::where('bimar_trainee_id',$user_id)
             ->where('tr_enrol_pay_canceled',0)->where('id',$id)->first();
         return view('user.bill_courses',compact('data'));

             }
        else{
              return redirect()->route('home');
          }
     }


     public function cancle_bill($id)
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
        || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
            $user = Auth::guard('trainee')->user();
            $user_id =$user->id;

             $data = Bimar_Enrollment_Payment::where('bimar_trainee_id',$user_id)
             ->where('tr_enrol_pay_canceled',0)->where('id',$id)->first();

             $data->tr_enrol_pay_canceled = 1;
             $data->save();
            //  return redirect()->back()->with('message',' bill deleted successfully');
             return response()->json(['success' => true, 'message' => 'تم  حذف الفاتورة بنجاح']);

             }

        else{
              return redirect()->route('home');
          }
     }
     public function deactivate_cancle($id)
     {
         $data = Bimar_Enrollment_Payment::find($id);

         if (!$data) {
             return response()->json(['message' => 'السجل غير موجود'], 404);
         }

         return response()->json($data);
     }

    //  public function mydeactivate($id)
    //  {
    //      $data = bimar_enrollment_payment::find($id);

    //      if (!$data) {
    //          return response()->json(['message' => 'السجل غير موجود'], 404);
    //      }

    //      return response()->json($data);
    //  }
     public function deactivate_my_bill(Request $request, $id)
     {

 try {
    $customNames = [
        'tr_enrol_pay_deactivate_desc' => 'description',
    ];

    $validator = Validator::make($request->all(), [
        'tr_enrol_pay_deactivate_desc' => 'required|string|max:255',
    ]);

    $validator->setAttributeNames($customNames);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

             $data = Bimar_Enrollment_Payment::find($id);

             if (!$data) {
                 return response()->json(['message' => 'السجل غير موجود'], 404);
             }

             $trainee = Auth::guard('trainee')->user();

             if ($data->bimar_payment_status_id == 2 || $data->bimar_payment_status_id == 3) {
                 $data->bimar_payment_status_id = 4;
                 $data->tr_enrol_pay_deactivate_desc = $request->tr_enrol_pay_deactivate_desc;
                 $data->tr_enrol_pay_deactivate_date = now();
                 if ($trainee) {
                     $data->tr_enrol_pay_deactivate_userid = $trainee->id;
                 }
                 $data->save();
                 $profile = Bimar_Training_Profile::where('bimar_enrollment_payment_id',$data->id)->first();

                 //edit record in bimar_training_profile table
                $profile->bimar_training_profile_status_id = 4;
                $profile->save();

                 return response()->json(['success' => true, 'message' => 'تم الغاء التسجيل بنجاح']);
             }

             return response()->json(['message' => 'الحالة غير مناسبة لإلغاء التسجيل'], 400);

         } catch (\Exception $e) {
             Log::error('خطأ في إلغاء التسجيل: ' . $e->getMessage());
             return response()->json(['message' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()], 500);
         }
     }


}
