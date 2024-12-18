<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Classes_Trainee;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_Enrol_Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarEnrolClassesTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function get_trainees_for_class($class_id)
    {
        $class_id = intval($class_id);
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrol_Classes_Trainee::where('bimar_enrol_class_id',$class_id)->get();
            $course_id = Bimar_Enrol_Class::where('id', $class_id)
            ->value('bimar_course_enrollment_id');

            $trainees = Bimar_Training_Profile::where('bimar_course_enrollment_id',$course_id)
            ->where('bimar_training_profile_status_id',1)->get();

            // dd( $trainees);
            return view('admin.addtraineeclass',compact('data','trainees','course_id','class_id'));
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
                'bimar_course_enrollment_id' => 'required',
                'bimar_trainee_id' => 'required',
                'bimar_enrol_class_id' => 'required',
              ]);

            $all = Bimar_Enrol_Classes_Trainee::all();
            foreach($all as $trainee)
            {
                if($trainee->bimar_enrol_class_id ==$request->bimar_enrol_class_id
                   && $trainee->bimar_trainee_id ==$request->bimar_trainee_id )
                   {
                    return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }

            $data = new Bimar_Enrol_Classes_Trainee;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->bimar_trainee_id = $request->bimar_trainee_id;
            $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Enrol_Classes_Trainee $bimar_Enrol_Classes_Trainee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Enrol_Classes_Trainee::findOrFail($id);
            $classes = Bimar_Enrol_Class::where('bimar_course_enrollment_id',$data->bimar_course_enrollment_id)
            ->where('bimar_class_status_id',1)->where('tr_enrol_classes_status',1)->get();

            return view('admin.movetraineeclass', compact('data','classes'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)

    {$id = intval($id);
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {

                $validated = $request->validate([
                'bimar_enrol_class_id' => 'required',
                // 'bimar_trainee_id' => 'required',
              ]);
                $data = Bimar_Enrol_Classes_Trainee::findOrFail($id);
                $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
                $data->bimar_trainee_id = $id;
                $data->save();

                $class_id = $data->bimar_enrol_class_id;
                // dd($course_id);[]
                return redirect()->route('trinee.show', ['class_id' => $class_id])->with(['message' => 'تم التعديل']);

        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bimar_Enrol_Classes_Trainee::findOrFail($id)->delete();
        return redirect()->back();
    }
}
