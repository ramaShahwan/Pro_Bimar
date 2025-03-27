<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Classes_Trainer;
use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;
use App\Models\Bimar_Enrol_Class;
use Illuminate\Support\Facades\Validator;
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
    public function get_classes_for_trainer($id)
    {
        $id = intval($id);

        $user = Auth::guard('trainer')->user();
        $user_id =$user->id;

        $datas = Bimar_Enrol_Classes_Trainer::where('bimar_course_enrollment_id', $id)
        ->where('bimar_user_id',$user_id)->get();

        $classes = [];

        foreach ($datas as $data) {

            $class = Bimar_Enrol_Class::where('id', $data->bimar_enrol_class_id)
                ->where('tr_enrol_classes_status', 1)
                ->first();

            if ($class) {
                $classes[] = $class;
            }
        }
        return view('trainer.myclasses', compact('classes'));
    }


    public function get_trainers_for_class($class_id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $class_id = intval($class_id);

            $data = Bimar_Enrol_Classes_Trainer::where('bimar_enrol_class_id', $class_id)->get();
            // $course_id = Bimar_Enrol_Class::where('id', $class_id)
            //     ->pluck('bimar_course_enrollment_id');

            $course_id = Bimar_Enrol_Class::where('id', $class_id)
            ->value('bimar_course_enrollment_id'); // يعيد القيمة مباشرة وليس كمصفوفة


            $trainers = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id', $course_id)->get();
            return view('admin.addtrainerclass', compact('data', 'trainers', 'course_id', 'class_id'));
        } else {
            return redirect()->route('home');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {

            $customNames = [
                'bimar_course_enrollment_id' => 'enrollment',
                'bimar_user_id' => 'user',
                'bimar_enrol_class_id' => 'class',
                'tr_enrol_classes_trainer_percent' => 'percent',
            ];

            $validator = Validator::make($request->all(), [
                'bimar_course_enrollment_id' => 'required',
                'bimar_user_id' => 'required',
                'bimar_enrol_class_id' => 'required',
                'tr_enrol_classes_trainer_percent' => 'required',
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


            $all = Bimar_Enrol_Classes_Trainer::all();
            foreach($all as $trainer)
            {
                if($trainer->bimar_enrol_class_id ==$request->bimar_enrol_class_id
                   && $trainer->bimar_user_id ==$request->bimar_user_id )
                   {
                    // return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                    return response()->json(['message' => '  لا يمكن اضافة نفس المعلومات المضافة مسبقاً'], 200);

                }
            }

            $data = new Bimar_Enrol_Classes_Trainer;
            $data->tr_enrol_classes_trainer_desc = $request->tr_enrol_classes_trainer_desc;
            $data->bimar_course_enrollment_id = $request->bimar_course_enrollment_id;
            $data->bimar_user_id = $request->bimar_user_id;
            $data->tr_enrol_classes_trainer_percent = $request->tr_enrol_classes_trainer_percent;
            $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
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
                $customNames = [
                    'tr_enrol_classes_trainer_percent' => 'percent',
                ];

                $validator = Validator::make($request->all(), [
                    'tr_enrol_classes_trainer_percent' => 'required',
                ]);
                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }


                $data = Bimar_Enrol_Classes_Trainer::findOrFail($id);
                $data->tr_enrol_classes_trainer_percent = $request->tr_enrol_classes_trainer_percent;
                $data->tr_enrol_classes_trainer_desc = $request->tr_enrol_classes_trainer_desc;
                $data->update();

                $class_id = $data->bimar_enrol_class_id;
                // dd($course_id);[]
                return response()->json(['message' => 'تم التعديل بنجاح'], 200);

                // return redirect()->route('class.show', ['class_id' => $class_id])->with(['message' => 'تم التعديل']);
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
