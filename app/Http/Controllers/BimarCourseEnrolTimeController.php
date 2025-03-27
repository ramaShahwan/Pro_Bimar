<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Enrol_Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Course_Enrollment;
use Illuminate\Support\Facades\Validator;

class BimarCourseEnrolTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'tr_course_enrol_times_day' => 'day',
            'bimar_course_enrollment_id' => 'enrollment ',
            'tr_course_enrol_times_from' => 'from',
            'tr_course_enrol_times_to' => 'to',
        ];

        $validator = Validator::make($request->all(), [
            'tr_course_enrol_times_day' => 'required',
            'bimar_course_enrollment_id' => 'required',
            'tr_course_enrol_times_from' => 'required',
            'tr_course_enrol_times_to' => 'required',
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


            $all = Bimar_Course_Enrol_Time::all();
            foreach($all as $times)
            {
                if($times->bimar_course_enrollment_id ==$request->bimar_course_enrollment_id
                   && $times->tr_course_enrol_times_day ==$request->tr_course_enrol_times_day
                   && $times->tr_course_enrol_times_from == $request->tr_course_enrol_times_from
                   && $times->tr_course_enrol_times_to ==$request->tr_course_enrol_times_to )
                   {
                    return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }
            $data = new Bimar_Course_Enrol_Time;
            $data->tr_course_enrol_times_desc = $request->tr_course_enrol_times_desc;
            $data->tr_course_enrol_times_day = $request->tr_course_enrol_times_day;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->tr_course_enrol_times_from = $request->tr_course_enrol_times_from;
            $data->tr_course_enrol_times_to = $request->tr_course_enrol_times_to;
            $data->save();

        //  return redirect()->back()->with('message','تم الإضافة');
        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);

        }else{
            return redirect()->route('home');
        }
    }


    public function get_times_for_course($course_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Course_Enrol_Time::where('bimar_course_enrollment_id',$course_id)->get();
            $courses = Bimar_Course_Enrollment::where('tr_course_enrol_status',1);
            return view('admin.addtimecourse',compact('data','courses','course_id'));
        }else{
            return redirect()->route('home');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Bimar_Course_Enrol_Time $bimar_Course_Enrol_Time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_Enrol_Time $bimar_Course_Enrol_Time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_Enrol_Time $bimar_Course_Enrol_Time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bimar_Course_Enrol_Time::findOrFail($id)->delete();
        return redirect()->back();
    }
}
