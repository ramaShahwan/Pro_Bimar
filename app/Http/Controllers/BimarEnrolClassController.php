<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Training_Course;
use App\Models\Bimar_Training_Year;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Class_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarEnrolClassController extends Controller
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
            $statuses = Bimar_Class_Status::where('tr_class_status',1)->get();
            $capacity =Bimar_Training_Profile::where('bimar_course_enrollment_id',$course_id)
            ->where('bimar_training_profile_status_id',1)->count();
            // $courses = Bimar_Course_Enrollment::where('id',$course_id)->get();
            return view('admin.addclasscourses', compact('data', 'statuses', 'course_id','capacity'));
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
            $customNames = [
                'bimar_class_status_id' => 'status ',
                'tr_enrol_classes_status' => 'status',
                'tr_enrol_classes_capacity' => 'capacity',
                'bimar_course_enrollment_id' => 'course ',
            ];

            $validator = Validator::make($request->all(), [
                'bimar_class_status_id' => 'required',
                'tr_enrol_classes_status' => 'required|in:0,1',
                'tr_enrol_classes_capacity' => 'required',
                'bimar_course_enrollment_id' => 'required',
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

            $num = 1;
            $all = Bimar_Enrol_Class::all();
            foreach ($all as $course) {
                if ($course->bimar_course_enrollment_id == $request->bimar_course_enrollment_id) {
                    $num++;
                }
            }

            // استرجاع كود البرنامج التدريبي
            $prog_id = Bimar_Course_Enrollment::where('id', $request->bimar_course_enrollment_id)
                ->select('bimar_training_program_id')
                ->first();

            if ($prog_id) {
                $prog_code = Bimar_Training_Program::where('id', $prog_id->bimar_training_program_id)
                    ->select('tr_program_code')
                    ->first();
            }

            // استرجاع كود الدورة التدريبية
            $course_id = Bimar_Course_Enrollment::where('id', $request->bimar_course_enrollment_id)
                ->select('bimar_training_course_id')
                ->first();

            if ($course_id) {
                $course_code = Bimar_Training_Course::where('id', $course_id->bimar_training_course_id)
                    ->select('tr_course_code')
                    ->first();
            }

            // استرجاع الترتيب وسنة التدريب
            $course_arrag = Bimar_Course_Enrollment::where('id', $request->bimar_course_enrollment_id)
                ->select('tr_course_enrol_arrangement')
                ->first();

            $year_id = Bimar_Course_Enrollment::where('id', $request->bimar_course_enrollment_id)
                ->select('bimar_training_year_id')
                ->first();

            $year = Bimar_Training_Year::where('id', $year_id?->bimar_training_year_id)
                ->select('tr_year')
                ->first();

            // إنشاء اسم الصف الجديد
            $data = new Bimar_Enrol_Class();
            $data->tr_enrol_classes_name = ($prog_code->tr_program_code ?? '') .'_'. ($course_code->tr_course_code ?? '') . '_C' . $num .'_'. ($course_arrag->tr_course_enrol_arrangement ?? '') .'_'. ($year->tr_year ?? '');
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->tr_enrol_classes_code = 'C' . $num;
            $data->bimar_class_status_id = $request->bimar_class_status_id;
            $data->tr_enrol_classes_status = $request->tr_enrol_classes_status;
            $data->tr_enrol_classes_capacity = $request->tr_enrol_classes_capacity;
            $data->save();

            return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
        } else {
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
    public function edit($id)
    {

        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Enrol_Class::findOrFail($id);
            $statuses = Bimar_Class_Status::where('tr_class_status', 1)->get(); // تأكد من استخدام get لجلب البيانات


            return view('admin.updateclasscourses', compact('data','statuses'));

        } else {
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
                $customNames = [
                    'bimar_class_status_id' => 'status ',

                    'tr_enrol_classes_capacity' => 'capacity',
                ];

                $validator = Validator::make($request->all(), [
                    'bimar_class_status_id' => 'required',

                    'tr_enrol_classes_capacity' => 'required',
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



                $data = Bimar_Enrol_Class::findOrFail($id);
                $data->bimar_class_status_id = $request->bimar_class_status_id;
                $data->tr_enrol_classes_capacity = $request->tr_enrol_classes_capacity;
                $data->update();

                $course_id = $data->bimar_course_enrollment_id;
                // dd($course_id);[]
                return redirect()->route('courses.show', ['course_id' => $course_id])->with(['message' => 'تم التعديل']);
                // return response()->json(['message' => 'تم التعديل بنجاح'], 200);

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
        $course_id = $status->bimar_course_enrollment_id;
        // dd($course_id);[]
        return redirect()->route('courses.show', ['course_id' => $course_id])->with(['message' => 'تم التعديل']);

     }else{
        return redirect()->route('home');
     }
    }
}
