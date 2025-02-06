<?php

namespace App\Http\Controllers;
use App\Models\Bimar_User;
use App\Models\Bimar_Assessment;
use App\Models\Bimar_Assessment_Type;
use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Enrol_Classes_Trainee;
use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Assessment_Tutor;
use App\Models\Bimar_Assessment_Status;
use App\Helpers\PasswordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment::where('bimar_enrol_class_id',$id)->get();
            $types= Bimar_Assessment_Type::where('tr_assessment_type_status',1)->get();
            $statuses =Bimar_Assessment_Status::where('tr_assessment_status_enabled',1)->get();
             return view('bank.link',compact('data','types','statuses','id'));
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
            return view('bank.addassessment');
        }else{
            return redirect()->route('home');
        }
    }

    public function chooseTrainer()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data::Bimar_User::where('bimar_users_status_id',1)->get();
            return view('bank.addtrainerlink',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bimar_enrol_class_id' => 'required',
            'bimar_assessment_type_id' => 'required',
            'bimar_assessment_status_id' => 'required',
        ]);

        $type_name = Bimar_Assessment_Type::where('id', $request->bimar_assessment_type_id)
            ->value('tr_assessment_type_name_en');

            $class_name = Bimar_Enrol_Class::where('id', $request->bimar_enrol_class_id)
            ->value('tr_enrol_classes_name');

            if($request->bimar_assessment_type_id == 2 )
            {
                $passcode = PasswordGenerator::generate(6);
            }
            else{
                $passcode = null;
            }

        $data = new Bimar_Assessment;
        $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
        $data->bimar_assessment_type_id =$request->bimar_assessment_type_id;
        $data->bimar_assessment_status_id = $request->bimar_assessment_status_id;
        $data->tr_assessment_name = $class_name . '_' . $type_name . '_' . date('Y-m-d', strtotime($request->tr_assessment_start_time));
        $data->tr_assessment_start_time = $request->tr_assessment_start_time;
        $data->tr_assessment_end_time = $request->tr_assessment_end_time;
        $data->tr_assessment_note = $request->tr_assessment_note;
        $data->tr_assessment_passcode = $passcode;
        $data->save();

         $trainees = Bimar_Enrol_Classes_Trainee::
          where('bimar_enrol_class_id',$request->bimar_enrol_class_id)
          ->get();

        foreach ($trainees as $trainee) {

            $train = new Bimar_Assessment_Trainee;
            $train->bimar_assessment_id = $data->id;
            $train->bimar_trainee_id = $trainee->bimar_trainee_id;
            $train->tr_assessment_trainee_grade = null;
            $train->tr_assessment_trainee_start_time = null;
            $train->tr_assessment_trainee_end_time = null;
            $train->tr_assessment_trainee_login_ip = null;
            $train->save();
        }
        if($passcode != null){
        return redirect()->back()->with('message', "تم إنشاء الرابط بنجاح. وهذه هي كلمة المرور <br> " . $passcode);
        }
        else{
        return redirect()->back()->with('message', 'تم إضافة الرابط بنجاح.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment::where('id',$id)
            ->first();
             return view('bank.showassessment',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    public function showTrainers($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment_Tutor::where('bimar_assessment_id',$id)
            ->get();
             return view('bank.showatrainers',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    public function showTrainees($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment_Trainee::where('bimar_assessment_id',$id)
            ->get();
             return view('bank.showtrainees',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $data = Bimar_Assessment::findOrFail($id);
            return response()->json($data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $validated = $request->validate([
                'tr_assessment_start_time' => 'required',
                'tr_assessment_end_time' => 'required',
                'bimar_assessment_status_id' => 'required',

              ]);

                $data = Bimar_Assessment::findOrFail($id);
                $data->bimar_assessment_status_id = $request->bimar_assessment_status_id;
                $data->tr_assessment_start_time = $request->tr_assessment_start_time;
                $data->tr_assessment_end_time = $request->tr_assessment_end_time;
                $data->tr_assessment_note = $request->tr_assessment_note;
                $data->tr_assessment_passcode = $request->tr_assessment_passcode;
                $data->update();

                return response()->json(['message' => 'تم التعديل بنجاح'], 200);

        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */



    public function destroy(bimar_assessment $bimar_assessment)
    {
        //
    }
}
