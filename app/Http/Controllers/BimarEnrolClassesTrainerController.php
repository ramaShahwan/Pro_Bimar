<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Classes_Trainer;
use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarEnrolClassesTrainerController extends Controller
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

    public function get_trainers_for_class($class_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrol_Classes_Trainer::where('bimar_enrol_class_id',$class_id)->get();
            $course_id = Bimar_Enrol_Classes_Trainer::where('bimar_enrol_class_id',$class_id)
            ->select('bimar_course_enrollment_id')->first();
            $trainers = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$course_id)->get();
            dd($course_id);
            return view('admin.addtrainerclass',compact('data','trainers','course_id','class_id'));
            $course_id = Bimar_Enrol_Classes_Trainer::where('bimar_enrol_class_id',$class_id)->first();
            $trainers = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$course_id->bimar_course_enrollment_id)->get();
            return view('admin.addtimecourse',compact('data','trainers','course_id','class_id'));
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
                'bimar_user_id' => 'required',
                'bimar_enrol_class_id' => 'required',
                'tr_enrol_classes_trainer_percent' => 'required',
              ]);

            $all = Bimar_Enrol_Classes_Trainer::all();
            foreach($all as $trainer)
            {
                if($trainer->bimar_enrol_class_id ==$request->bimar_enrol_class_id
                   && $trainer->bimar_user_id ==$request->bimar_user_id )
                   {
                    return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }

            $data = new Bimar_Enrol_Classes_Trainer;
            $data->tr_enrol_classes_trainer_desc = $request->tr_enrol_classes_trainer_desc;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->bimar_user_id = $request->bimar_user_id;
            $data->tr_enrol_classes_trainer_percent = $request->tr_enrol_classes_trainer_percent;
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
    public function show(Bimar_Enrol_Classes_Trainer $bimar_Enrol_Classes_Trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Enrol_Classes_Trainer::findOrFail($id);
            return response()->json($data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            try {
                $validated = $request->validate([
                'tr_enrol_classes_trainer_percent' => 'required',
              ]);

                $data = Bimar_Enrol_Classes_Trainer::findOrFail($id);
                $data->tr_enrol_classes_trainer_percent = $request->tr_enrol_classes_trainer_percent;
                $data->tr_enrol_classes_trainer_desc = $request->tr_enrol_classes_trainer_desc;
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
    public function destroy($id)
    {
        Bimar_Enrol_Classes_Trainer::findOrFail($id)->delete();
        return redirect()->back();
    }
}
