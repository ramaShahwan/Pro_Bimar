<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Course_Enrollment;
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
            $students =
            $courses = Bimar_Course_Enrollment::where('id',$course_id);
            return view('admin.addenrolclass', compact('data', 'statuses', 'courses', 'course_id'));
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
                'bimar_course_enrollment_id' => 'required',
                'bimar_class_status_id' => 'required',
                'tr_enrol_classes_status' => 'required|in:0,1',
                'bimar_class_status_id' => 'required',
                'bimar_course_enrollment_id' => 'required',
                'bimar_class_status_id' => 'required',
              ]);
              
            ['bimar_class_status_id', 'bimar_course_enrollment_id','tr_enrol_classes_status',
              'tr_enrol_classes_name','tr_enrol_classes_code','tr_enrol_classes_capacity'];
         
            $data = new Bimar_Enrol_Class;
            $data->tr_course_enrol_trainers_desc = $request->tr_course_enrol_trainers_desc;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->bimar_user_id = $request->bimar_user_id;
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
    public function edit(Bimar_Enrol_Class $bimar_Enrol_Classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Enrol_Class $bimar_Enrol_Classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Enrol_Class $bimar_Enrol_Classes)
    {
        //
    }
}
