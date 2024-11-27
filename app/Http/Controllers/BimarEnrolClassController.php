<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Course_Enrollment;
use App\Models\bimar_training_program;
use App\Models\Bimar_Training_Course;
use App\Models\bimar_training_year;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Class_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarEnrolClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function get_classes_for_course($course_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrol_Class::where('bimar_course_enrollment_id',$course_id)->get();
            $statuses = Bimar_Class_Status::all();
            $capacity =Bimar_Training_Profile::where('bimar_course_enrollment_id',$course_id)
            ->where('bimar_training_profile_status_id',3)->count()->get();
            // $courses = Bimar_Course_Enrollment::where('id',$course_id)->get();
            return view('admin.addenrolclass', compact('data', 'statuses', 'course_id','capacity'));
        }else{
            return redirect()->route('home');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $validated = $request->validate([
                'bimar_class_status_id' => 'required',
                'tr_enrol_classes_status' => 'required|in:0,1',
                'tr_enrol_classes_capacity' => 'required',
                'bimar_course_enrollment_id' => 'required',

              ]);

              $num=0;
              $all = Bimar_Enrol_Class::all();
              foreach($all as $course)
              { if($course->bimar_course_enrollment_id ==$request->bimar_course_enrollment_id)
                     { $num++; }
                     else
                     { $num++; }
                     return $num;
              }   

            $prog_id = Bimar_Course_Enrollment::where('id',$request->bimar_course_enrollment_id)->select('bimar_training_program_id')->first();
            $prog_code = bimar_training_program::where('id',$prog_id)->select('tr_program_code')->first();

            $course_id = Bimar_Course_Enrollment::where('id',$request->bimar_course_enrollment_id)->select('bimar_training_course_id')->first();
            $course_code = Bimar_Training_Course::where('id',$course_id)->select('tr_course_code')->first();

            $course_arrag =Bimar_Course_Enrollment::where('id',$request->bimar_course_enrollment_id)->select('tr_course_enrol_arrangement')->first();

            $year_id = Bimar_Course_Enrollment::where('id',$request->bimar_course_enrollment_id)->select('bimar_training_year_id')->first();
            $year = bimar_training_year::where('id',$year_id)->select('tr_year')->first();
            
            $data = new Bimar_Enrol_Class;
            $data->tr_enrol_classes_name = $prog_code+$course_code+'C'+$num+$course_arrag+$year;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->tr_enrol_classes_code ='C'+$num;
            $data->bimar_class_status_id =$request->bimar_class_status_id;
            $data->tr_enrol_classes_status =$request->tr_enrol_classes_status;
            $data->tr_enrol_classes_capacity =$request->tr_enrol_classes_capacity;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Enrol_Class $bimar_Enrol_Classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Enrol_Class::findOrFail($id);
            $statuses = Bimar_Class_Status::all();
            return response()->json($data,$statuses);
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
            try {
                $validated = $request->validate([
                    'bimar_class_status_id' => 'required',
                    'tr_enrol_classes_status' => 'required|in:0,1',
                    'tr_enrol_classes_capacity' => 'required',
              ]);
    
                $data = Bimar_Enrol_Class::findOrFail($id);
                $data->bimar_class_status_id = $request->bimar_class_status_id;
                $data->tr_enrol_classes_status = $request->tr_enrol_classes_status;
                $data->tr_enrol_classes_capacity = $request->tr_enrol_classes_capacity;
                $data->update();
    
                return response()->json(['message' => 'تم التعديل بنجاح'], 200);
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
    public function destroy(Bimar_Enrol_Class $bimar_Enrol_Classes)
    {
        //
    }

    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $status = Bimar_Enrol_Class::find($id);
        if($status){
            if($status->tr_enrol_classes_status){
                $status->tr_enrol_classes_status =0;
            }
            else{
                $status->tr_enrol_classes_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
