<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Enrol_Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarCourseEnrolTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Course_Enrol_Time::all();
            return view('admin.enrol_time',compact('data'));
        }else{
            return redirect()->route('home');      
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            return view('admin.addenrol_time',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $validated = $request->validate([
                'tr_course_enrol_times_day' => 'required',
                'bimar_course_enrollment_id' => 'require',
                'tr_course_enrol_times_from' => 'required',
                'tr_course_enrol_times_to' => 'require',
              ]);
          
            $data = new Bimar_Course_Enrol_Time;
            $data->tr_course_enrol_times_desc = $request->tr_course_enrol_times_desc;
            $data->tr_course_enrol_times_day = $request->tr_course_enrol_times_day;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->tr_course_enrol_times_from = $request->tr_course_enrol_times_from;
            $data->tr_course_enrol_times_to = $request->tr_course_enrol_times_to;
            $data->save();
    
         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }


    public function get_times_for_course($course_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Course_Enrol_Time::where('bimar_course_enrollment_id',$course_id)->get();
            // return view('admin.enrol_time',compact('data'));
            return response()->json($data);
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
