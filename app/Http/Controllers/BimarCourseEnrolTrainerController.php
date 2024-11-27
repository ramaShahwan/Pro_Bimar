<?php

namespace App\Http\Controllers;
use App\Models\Bimar_Course_Enrollment;

use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BimarCourseEnrolTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }


    public function get_trainers_for_course($course_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$course_id)->get();
            $users = Bimar_User::where('bimar_role_id',3)->get();
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
            $validated = $request->validate([
                'bimar_course_enrollment_id' => 'required',
                'bimar_user_id' => 'required',
              ]);
            $all = Bimar_Course_Enrol_Trainer::all();
            foreach($all as $trainer)
            {
                if($trainer->bimar_course_enrollment_id ==$request->bimar_course_enrollment_id
                   && $trainer->bimar_user_id ==$request->bimar_user_id )
                   {
                    return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }

            $data = new Bimar_Course_Enrol_Trainer;
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
    public function show(Bimar_Course_Enrol_Trainer $bimar_Course_Enrol_Trainer)
    {
        //
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
