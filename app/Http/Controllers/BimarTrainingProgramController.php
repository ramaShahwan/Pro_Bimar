<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Trainee;
use App\Models\Bimar_Course_Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BimarTrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $validated = $request->validate([
            'tr_program_code' => 'required',
            'tr_program_name_en' => 'required',
            'tr_program_name_ar' => 'required',
          ]);

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

     return redirect()->back()->with('message','تم الإضافة');
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
     {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
         $validated = $request->validate([
             'tr_program_code' => 'required',
             'tr_program_name_en' => 'required',
             'tr_program_name_ar' => 'required',
         ]);

         $data = Bimar_Training_Program::findOrFail($id);
         $oldImageName = $data->tr_program_img;

         $data->tr_program_code = $request->tr_program_code;
         $data->tr_program_name_en = $request->tr_program_name_en;
         $data->tr_program_name_ar = $request->tr_program_name_ar;
         $data->tr_program_status = $request->tr_program_status;
         $data->tr_program_desc = $request->tr_program_desc;

         if ($request->hasFile('tr_program_img')) {
             if ($oldImageName) {
                 File::delete(public_path('img/program/') . $oldImageName);
             }
             $newImage = $request->file('tr_program_img');
             $newImageName = 'image_' . $data->id . '.' . $newImage->getClientOriginalExtension();
             $newImage->move(public_path('img/program/'), $newImageName);

             $data->tr_program_img = $newImageName;
         }

         $data->save();

         return response()->json(['message' => 'تم التعديل']);
        }else{
            return redirect()->route('home');
        }
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Program $bimar_Training_Program)
    {
        //
    }

    // public function updateSwitchStatus(Request $request, $id)
    // {
    //     $data = Bimar_Training_Program::find($id);

    //     if ($data) {
    //         $data->tr_program_status = $request->tr_program_status;
    //         $data->save();

    //         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    //     }
    // }
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
        $data = Bimar_Course_Enrollment::with(['bimar_training_year', 'bimar_training_type'])
            ->where('id', $id)
            ->first();

        return response()->json($data); // عودة البيانات كـ JSON
    } else {
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}


    //  public function Register_for_course()
    //  {
    //  if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()
    //     || Auth::guard('trainer')->check()|| Auth::guard('trainee')->check() ) {
    //       $user_id  = Auth::id();
    //       $trainee = Bimar_Trainee::where('id',$user_id)->first();
    //       if($trainee)
    //       {
    //         $registered = Bimar_Course_Enrollment::where()
    //           if()
    //       }
    //       else{
    //         return redirect()->back()->with('message',' you are not trainee');
    //       }
    //     }else{
    //         return redirect()->route('home');
    //     }
    // }

}
