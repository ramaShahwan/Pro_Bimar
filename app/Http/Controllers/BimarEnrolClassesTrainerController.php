<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrol_Classes_Trainer;
use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;
use App\Models\Bimar_Enrol_Class;

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
        $datas = Bimar_Enrol_Classes_Trainer::where('bimar_course_enrollment_id', $id)->get();

        $classes = []; // مصفوفة لتخزين النتائج النهائية

        foreach ($datas as $data) {
            // استعلام للحصول على الصفوف المناسبة
            $class = Bimar_Enrol_Class::where('id', $data->bimar_enrol_class_id) // استخدام $data->bimar_class_id بدلاً من $id
                ->where('tr_enrol_classes_status', 1)
                ->first();

            if ($class) {
                $classes[] = $class; // أضف الكائن إلى المصفوفة
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
            return view('admin.updatetrainerclass', compact('data'));
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

                $validated = $request->validate([
                'tr_enrol_classes_trainer_percent' => 'required',
              ]);

                $data = Bimar_Enrol_Classes_Trainer::findOrFail($id);
                $data->tr_enrol_classes_trainer_percent = $request->tr_enrol_classes_trainer_percent;
                $data->tr_enrol_classes_trainer_desc = $request->tr_enrol_classes_trainer_desc;
                $data->update();

                $class_id = $data->bimar_enrol_class_id;
                // dd($course_id);[]
                return redirect()->route('class.show', ['class_id' => $class_id])->with(['message' => 'تم التعديل']);

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
