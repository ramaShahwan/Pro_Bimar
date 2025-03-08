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
use App\Models\Bimar_Exam_Answer;
use App\Models\Bimar_Exam_Question;
use App\Models\Bimar_Bank_Assess_Questions_Used;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Helpers\PasswordGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $customNames = [
            'bimar_enrol_class_id' => 'class id',
            'bimar_assessment_type_id' => 'type id',
            'bimar_assessment_status_id' => 'status id ',
        ];
        
        $validator = Validator::make($request->all(), [
            'bimar_enrol_class_id' => 'required',
            'bimar_assessment_type_id' => 'required',
            'bimar_assessment_status_id' => 'required',
        ]);

        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) 
                ->withInput(); 
        }

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
        return redirect()->back()->with('message', "Assessment added successfully and this is passcode:" . $passcode);
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
            $users=Bimar_User::where('bimar_users_status_id',1)->get();

             return view('bank.addtrainerlink',compact('data','users','id'));
            }else{
                return redirect()->route('home');
            }
    }

    public function showTrainees($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment_Trainee::where('bimar_assessment_id',$id)
            ->get();
             return view('bank.taineelink',compact('data'));
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
            $statuses =Bimar_Assessment_Status::where('tr_assessment_status_enabled',1)->get();
            $start = Bimar_Assessment::where('id',$id)->value('tr_assessment_start_time');
            $start_date =  date('Y-m-d', strtotime($start));
            $start_time = date('H:i', strtotime($start));
            $end = Bimar_Assessment::where('id',$id)->value('tr_assessment_end_time');
            $end_date =  date('Y-m-d', strtotime($end));
            $end_time = date('H:i', strtotime($end));

            return view('bank.updatelink',compact('data','statuses','start_date','start_time','end_date','end_time'));

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

                 $useds = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id', $id)->get();

                 $trainees = Bimar_Assessment_Trainee::where('bimar_assessment_id', $id)->get();


                if($data->bimar_assessment_status_id == "3")
                {
                 foreach ($trainees as $trainee) {
                    foreach ($useds as $used) {
                    $question = new Bimar_Exam_Question;
                    $question->bimar_assessment_id = $id;
                    $question->bimar_bank_assess_question_id = $used->bimar_bank_assess_question_id;
                    $question->bimar_trainee_id = $trainee->bimar_trainee_id;
                    $question->tr_exam_questions_bank_grade = $used->Bimar_Bank_Assess_Question->tr_bank_assess_questions_grade;
                    $question->save();


               $assess_answers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id',$used->bimar_bank_assess_question_id)->get();
               foreach ($assess_answers as $assess) {
                    $answer = new Bimar_Exam_Answer;
                    $answer->bimar_assessment_id = $id;
                    $answer->bimar_bank_assess_question_id = $used->bimar_bank_assess_question_id;
                    $answer->bimar_trainee_id = $trainee->bimar_trainee_id;
                    $answer->bimar_bank_assess_answer_id = $assess->id;
                    $answer->tr_exam_answers_bank_response = $assess->tr_bank_assess_answers_response;
                    $answer->save();
                }
            }
                }
            }
                return redirect()->route('index',[$data->bimar_enrol_class_id])->with('message', 'تم تعديل الرابط بنجاح.');

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
