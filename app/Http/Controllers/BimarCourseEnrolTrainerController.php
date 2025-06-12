<?php

namespace App\Http\Controllers;
use App\Models\Bimar_Course_Enrollment;

use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Assessment;

use App\Models\Bimar_Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class

BimarCourseEnrolTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_courses_for_trainer()
{
    $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

    $datas = Bimar_Course_Enrol_Trainer::where('bimar_user_id', $user->id)->get();

    $courses = [];
    foreach ($datas as $data) {
        $course = Bimar_Course_Enrollment::where('id', $data->bimar_course_enrollment_id)
            ->where('tr_course_enrol_status', 1)
            ->first(); // احصل على العنصر الأول فقط بدلاً من مجموعة كاملة
        if ($course) {
            $courses[] = $course;
        }
    }

    return view('trainer.addmycourses', compact('courses'));
}



    public function get_trainers_for_course($course_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$course_id)->get();
            $users = Bimar_User::where('bimar_role_id',3)->where('bimar_users_status_id',1)->get();
            $courses = Bimar_Course_Enrollment::where('tr_course_enrol_status',1);
            // dd($users);
            // return view('admin.enrol_trainer',compact('data'));
            return view('admin.addtrainercourse', compact('data', 'users', 'courses', 'course_id'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $customNames = [
                'bimar_course_enrollment_id' => 'enrollment',
                'bimar_user_id' => 'user id',
            ];

            $validator = Validator::make($request->all(), [
                'bimar_course_enrollment_id' => 'required',
                'bimar_user_id' => 'required',
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

            $all = Bimar_Course_Enrol_Trainer::all();
            foreach($all as $trainer)
            {
                if($trainer->bimar_course_enrollment_id ==$request->bimar_course_enrollment_id
                   && $trainer->bimar_user_id ==$request->bimar_user_id )
                   {
                    return response()->json(['message' => ' لا يمكن اضافة نفس المعلومات المضافة مسبقاً'], 422);
                    // return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }

            $data = new Bimar_Course_Enrol_Trainer;
            $data->tr_course_enrol_trainers_desc = $request->tr_course_enrol_trainers_desc;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->bimar_user_id = $request->bimar_user_id;
            $data->save();

        //  return redirect()->back()->with('message','تم الإضافة');
        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);

        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show_students($class_id)
{
    $class_id = intval($class_id);

    // 1. الحصول على جميع التقييمات الخاصة بالصف
    $assessments = Bimar_Assessment::where('bimar_enrol_class_id', $class_id)->get();

    // 2. جمع جميع العلامات باستخدام whereIn
    $assessment_ids = $assessments->pluck('id')->toArray();

    $marks = Bimar_Assessment_Trainee::whereIn('bimar_assessment_id', $assessment_ids)
        ->with(['bimar_trainee', 'bimar_assessment']) // تحميل العلاقات (اختياري)
        ->get();

    return view('trainer.trainercourse', compact('marks'));
}

  public function show_students_admin($class_id)
{
    $class_id = intval($class_id);

    // 1. الحصول على جميع التقييمات الخاصة بالصف
    $assessments = Bimar_Assessment::where('bimar_enrol_class_id', $class_id)->get();

    // 2. جمع جميع العلامات باستخدام whereIn
    $assessment_ids = $assessments->pluck('id')->toArray();

    $marks = Bimar_Assessment_Trainee::whereIn('bimar_assessment_id', $assessment_ids)
        ->with(['bimar_trainee', 'bimar_assessment']) // تحميل العلاقات (اختياري)
        ->get();

    return view('admin.trainercourse', compact('marks'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_Enrol_Trainer $bimar_Course_Enrol_Trainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_Enrol_Trainer $bimar_Course_Enrol_Trainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bimar_Course_Enrol_Trainer::findOrFail($id)->delete();
        return redirect()->back();
    }
}
