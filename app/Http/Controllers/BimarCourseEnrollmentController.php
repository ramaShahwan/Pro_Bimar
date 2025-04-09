<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Enrollment;
use Illuminate\Http\Request;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Training_Year;
use App\Models\Bimar_Training_Type;
use App\Models\Bimar_Training_Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BimarCourseEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Course_Enrollment::all();
        $years = Bimar_Training_Year::where('tr_year_status','1')->get();
        $programs = Bimar_Training_Program::where('tr_program_status','1')->get();
        return view('admin.course_enrollments',compact('data','years','programs'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $types = Bimar_Training_Type::where('tr_type_status','1')->get();
        $years = Bimar_Training_Year::where('tr_year_status','1')->get();
        $programs = Bimar_Training_Program::where('tr_program_status','1')->get();
        return view('admin.addcourse_enrollments')->with(['years' => $years,'programs'=> $programs,'types'=> $types]);
    }else{
        return redirect()->route('home');
    }
    }
    public function getcourse(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $courses = DB::table('bimar_training_courses')
            ->where('bimar_training_program_id', $request->bimar_training_program_id)
            ->where('tr_course_status','1')
            ->get(['id as id', 'tr_course_name_ar as name']);

        return response()->json($courses);
    }else{
        return redirect()->route('home');
    }
    //     $courses = Bimar_Training_Course::where('bimar_training_program_id', $request->bimar_training_program_id)->get();
    // return response()->json($courses);
    }


    public function filter(Request $request)
    {
        $query = Bimar_Course_Enrollment::query();
    
        if ($request->filled('bimar_training_program_id')) {
            $query->where('bimar_training_program_id', $request->bimar_training_program_id);
        }
    
        if ($request->filled('bimar_training_course_id')) {
            $query->where('bimar_training_course_id', $request->bimar_training_course_id);
        }
    
        if ($request->filled('bimar_training_year_id')) {
            $query->where('bimar_training_year_id', $request->bimar_training_year_id);
        }
    
        $data = $query->with([
            'bimar_training_program:id,tr_program_name_ar',
            'bimar_training_course:id,tr_course_name_ar',
            'bimar_training_year:id,tr_year'
        ])->get();
    
        $years = Bimar_Training_Year::where('tr_year_status', '1')->get();
        $programs = Bimar_Training_Program::where('tr_program_status', '1')->get();
    
        return view('admin.course_enrollments', compact('data', 'years', 'programs'));
    }
    



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customNames = [
            'bimar_training_program_id' => 'program ',
            'bimar_training_course_id' => 'course ',
            'bimar_training_year_id' => 'year ',
            'bimar_training_type_id' => 'type ',
            'tr_course_enrol_price' => 'price',
        ];

        $validator = Validator::make($request->all(), [
            'bimar_training_program_id' => 'required',
            'bimar_training_course_id' => 'required',
            'bimar_training_year_id' => 'required',
            'bimar_training_type_id' => 'required',
            'tr_course_enrol_price' => 'required',
        ]);

        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $existingCourse = Bimar_Course_Enrollment::where([
            ['bimar_training_year_id', $request->bimar_training_year_id],
            ['bimar_training_program_id', $request->bimar_training_program_id],
            ['bimar_training_course_id', $request->bimar_training_course_id],
            ['tr_course_enrol_status', 1]
        ])->exists();

        if ($existingCourse) {
            return redirect()->back()
                ->withErrors(['error' => 'لا يمكن فتح دورتين متماثلتين في نفس الوقت.'])
                ->withInput();
        }

        $lastArrangement = Bimar_Course_Enrollment::where('bimar_training_course_id', $request->bimar_training_course_id)
            ->max('tr_course_enrol_arrangement');

        $newArrangement = $lastArrangement ? $lastArrangement + 1 : 1;

        $data = new Bimar_Course_Enrollment;
        $data->bimar_training_program_id = $request->bimar_training_program_id;
        $data->bimar_training_course_id = $request->bimar_training_course_id;
        $data->bimar_training_year_id = $request->bimar_training_year_id;
        $data->bimar_training_type_id = $request->bimar_training_type_id;
        $data->tr_course_enrol_arrangement = $newArrangement;
        $data->tr_course_enrol_discount = $request->tr_course_enrol_discount;
        $data->tr_course_enrol_desc = $request->tr_course_enrol_desc;
        $data->tr_course_enrol_reg_start_date = $request->tr_course_enrol_reg_start_date;
        $data->tr_course_enrol_reg_end_date = $request->tr_course_enrol_reg_end_date;
        $data->tr_course_enrol_session_start_date = $request->tr_course_enrol_session_start_date;
        $data->tr_course_enrol_session_end_date = $request->tr_course_enrol_session_end_date;
        $data->tr_course_enrol_mark = $request->tr_course_enrol_mark;
        $data->tr_course_enrol_oralmark = $request->tr_course_enrol_oralmark;
        $data->tr_course_enrol_finalmark = $request->tr_course_enrol_finalmark;
        $data->tr_course_enrol_price = $request->tr_course_enrol_price;
        $data->tr_course_enrol_hours = $request->tr_course_enrol_hours;
        $data->tr_course_enrol_sessions = $request->tr_course_enrol_sessions;
        $data->tr_course_enrol_status = $request->tr_course_enrol_status;
        $data->tr_course_enrol_update_date = now();
        $data->tr_course_enrol_create_date = now();
        $data->save();

        return redirect()->route('course_enrollments')->with(['message' => 'تمت الإضافة بنجاح']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Bimar_Course_Enrollment::where('id',$id)->first();

        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();


    $role = $user->bimar_role_id;

    if ($role == 1 || $role == 2) {
        return view('admin.showcourse_enr',compact('data'));
    } elseif ($role == 3) {
        return view('trainer.showcourse_enr',compact('data'));
    }

    else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Course_Enrollment::findOrFail($id);
        $types = Bimar_Training_Type::where('tr_type_status','1')->get();
        $years = Bimar_Training_Year::where('tr_year_status','1')->get();
        $programs = Bimar_Training_Program::where('tr_program_status','1')->get();

        // الحصول على البرنامج والكورس المرتبطين بالسجل
        $my_program = Bimar_Training_Program::find($data->bimar_training_program_id);
        $my_course = Bimar_Training_Course::find($data->bimar_training_course_id);

        return view('admin.updatecourse_enr', compact('data', 'types', 'years', 'programs', 'my_program', 'my_course'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        try {
                $customNames = [
                    'bimar_training_program_id' => 'program ',
                    'bimar_training_course_id' => 'course ',
                    'bimar_training_year_id' => 'year ',
                    'bimar_training_type_id' => 'type ',
                    // 'tr_course_enrol_arrangement' => 'arrangement',
                    'tr_course_enrol_price' => 'price',
                ];

                $validator = Validator::make($request->all(), [
                    'bimar_training_program_id' => 'required',
                    'bimar_training_course_id' => 'required',
                    'bimar_training_year_id' => 'required',
                    // 'tr_course_enrol_arrangement' => 'required',
                    'tr_course_enrol_price' => 'required',
                    'bimar_training_type_id' => 'required',
                ]);
                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }



       $data = Bimar_Course_Enrollment::findOrFail($id);
       $data->bimar_training_program_id = $request->bimar_training_program_id;
       $data->bimar_training_course_id = $request->bimar_training_course_id;
       $data->bimar_training_year_id = $request->bimar_training_year_id;
    //    $data->tr_course_enrol_arrangement = $request->tr_course_enrol_arrangement;
       $data->tr_course_enrol_discount = $request->tr_course_enrol_discount;
       $data->tr_course_enrol_desc = $request->tr_course_enrol_desc;
       $data->tr_course_enrol_reg_start_date = $request->tr_course_enrol_reg_start_date;
       $data->tr_course_enrol_reg_end_date = $request->tr_course_enrol_reg_end_date;
       $data->tr_course_enrol_session_start_date = $request->tr_course_enrol_session_start_date;
       $data->tr_course_enrol_session_end_date = $request->tr_course_enrol_session_end_date;
       $data->tr_course_enrol_mark = $request->tr_course_enrol_mark;
       $data->tr_course_enrol_oralmark = $request->tr_course_enrol_oralmark;
       $data->tr_course_enrol_finalmark = $request->tr_course_enrol_finalmark;
       $data->tr_course_enrol_price = $request->tr_course_enrol_price;

       $data->tr_course_enrol_hours = $request->tr_course_enrol_hours;
       $data->tr_course_enrol_sessions = $request->tr_course_enrol_sessions;

       $data->bimar_training_type_id = $request->bimar_training_type_id;
    //    $data->tr_course_enrol_status = $request->tr_course_enrol_status;
       $data->tr_course_enrol_update_date = now();
    //    dd($data);
       $data->update();

       return redirect()->route('course_enrollments')->with(['message'=>'تم التعديل']);
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
    public function destroy(Bimar_Course_Enrollment $bimar_Course_Enrollment)
    {
        //
    }

    public function updateSwitchStatus(Request $request, $id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Course_Enrollment::find($id);

        if ($data) {
            $data->tr_course_enrol_status = $request->tr_course_enrol_status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }else{
        return redirect()->route('home');
    }
    }
    public function updatSwitch($Id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $course = Bimar_Course_Enrollment::find($Id);
        if($course){
            if($course->tr_course_enrol_status){
                $course->tr_course_enrol_status =0;
            }
            else{
                $course->tr_course_enrol_status =1;
            }
            $course->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }
}
