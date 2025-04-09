<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Enrol_Classes_Trainee;
use App\Models\Bimar_Course_Sessions_Content;
use App\Models\Bimar_Course_General_Content;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Enrol_Classes_Trainer;
use App\Models\Bimar_User;
use App\Models\Bimar_Course_Session;


use App\Models\Bimar_Course_Enrollment;


use Illuminate\Http\Request;

class BimarTrainingProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function get_courses_for_trainee()
     {
      $user = Auth::guard('trainee')->user();
      $user_id =$user->id;



       $course_ids = Bimar_Training_Profile::where('bimar_trainee_id', $user_id)
       ->pluck('bimar_course_enrollment_id')
       ->toArray();

       $courses = [];

       foreach($course_ids as $course_id)
       {

            $course = Bimar_Course_Enrollment::where('id', $course_id) // استخدام $data->bimar_class_id بدلاً من $id
                ->where('tr_course_enrol_status', 1)
                ->first();

            if ($course) {
                $courses[] = $course;
            }

       }

      return view('user.coursestrainee', compact('courses'));
     }

     public function get_sessions_for_course($course_id)
     {
        $course_id = intval($course_id);

      $user = Auth::guard('trainee')->user();
      $user_id =$user->id;

       $class_id = Bimar_Enrol_Classes_Trainee::where('bimar_trainee_id', $user_id)
       ->where('bimar_course_enrollment_id',$course_id)
       ->pluck('bimar_enrol_class_id')
       ->first();

       $trainer_id = Bimar_Enrol_Classes_Trainer::where('bimar_course_enrollment_id',$course_id)
       ->where('bimar_enrol_class_id',$class_id)
       ->pluck('bimar_user_id')
       ->first();

       $trainer = Bimar_User::where('id',$trainer_id)->first();

     $data= Bimar_Course_Session::where('bimar_enrol_class_id',$class_id)->get();

      return view('user.sessioncourses', compact('data','trainer'));
     }

     public function get_content_for_session($session_id)
     {
       $content = Bimar_Course_Sessions_Content::
       where('bimar_course_session_id',$session_id)
       ->get();

      return view('user.contentcourses', compact('content'));
     }

     public function get_general_content($course_id)
     {
       $id = Bimar_Course_Enrollment::
       where('id',$course_id)
       ->pluck('bimar_training_course_id')
       ->first();

       $content = Bimar_Course_General_Content::where('bimar_training_course_id',$id)
       ->where('tr_course_general_content_status',1)->get();
      return view('user.generalcontent', compact('content'));
     }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Profile $bimar_Training_Profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Training_Profile $bimar_Training_Profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Training_Profile $bimar_Training_Profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Profile $bimar_Training_Profile)
    {
        //
    }
}
