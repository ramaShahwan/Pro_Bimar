<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Tutor;
use App\Models\Bimar_Assessment;
use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Questions_Bank_User;
use App\Models\Bimar_Questions_Bank;
use App\Models\Bimar_Questions_Type;
use App\Models\Bimar_Bank_Assess_Question;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Models\Bimar_Bank_Assess_Questions_Used;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($class_id)
    {
        $class_id = intval($class_id);

        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

        if (Auth::guard('trainer')->check()) {
            $assessments = Bimar_Assessment_Tutor::where('bimar_user_id',$user->id)->get();
            $links = [];
            foreach ($assessments as $assessment) {
                $data = Bimar_Assessment::where('id',$assessment->bimar_assessment_id)
                ->where('bimar_enrol_class_id',$class_id)
                ->where('bimar_assessment_status_id',2)
                ->first();

                if ($data) {
                    $links[] = $data;
                }

            }


            return view('trainer.link',compact('links'));
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
            return view('bank.addtutor');
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
                'bimar_user_id' => 'required',
                'bimar_assessment_id' => 'required',
              ]);
            $data = new Bimar_Assessment_Tutor;
            $data->bimar_user_id = $request->bimar_user_id;
            $data->bimar_assessment_id = $request->bimar_assessment_id;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show_assessment( $id)
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Assessment::where('id',$id)
            ->first();
            $class_id=Bimar_Assessment::where('id',$id)
            ->value('bimar_enrol_class_id');
            $student_count =Bimar_Assessment_Trainee::where('bimar_assessment_id',$id)
            ->count();
             return view('trainer.showlink',compact('data','student_count','class_id'));
            }else{
                return redirect()->route('home');
            }
    }

    public function trainers_permession($id)
    {
        if (Auth::guard('trainer')->check()) {
            $trainers = Bimar_Assessment_Tutor::where('bimar_assessment_id',$id)
            ->get();

            $data = [];

            foreach ($trainers as $trainer) {
                $perm = Bimar_Questions_Bank_User::where('bimar_user_id',$trainer->bimar_user_id)
                ->first();

                if ($perm) {
                    $data[] = $perm;
                }
            }
            return view('trainer.trainerlink',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    public function show_trainees($id)
    {
        if (Auth::guard('trainer')->check()) {
            $data =Bimar_Assessment_Trainee::where('bimar_assessment_id',$id)
            ->get();
             return view('trainer.traineelink',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    public function create_question($assessment_id)
    {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

        if (Auth::guard('trainer')->check()) {
            $banks= Bimar_Questions_Bank_User::where('bimar_user_id',$user->id)
            ->where('tr_questions_user_add',1)
            ->get();

            $data = [];

            foreach ($banks as $bank) {
                $param = Bimar_Questions_Bank::where('id',$bank->bimar_questions_bank_id)
                ->first();

                if ($param) {
                    $data[] = $param;
                }
            }

            $types=Bimar_Questions_Type::where('tr_questions_type_status',1)->get();

            $questions = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id',$assessment_id)
            ->get();
            return view('trainer.linkquestion',compact('data','types','assessment_id','questions'));
        }else{
            return redirect()->route('home');
        }
    }

    public function show_question_banks(Request $request)
    {
        if (Auth::guard('trainer')->check()) {
            $bank_id = $request->input('bimar_questions_bank_id');
            $type_id = $request->input('bimar_questions_type_id');
            $assessment_id = $request->input('bimar_assessment_id');

            $query = Bimar_Bank_Assess_Question::where('bimar_questions_bank_id', $bank_id)
            ->where('tr_bank_assess_questions_status', 1);

            if ($type_id != 0) {
                $query->where('bimar_questions_type_id', $type_id);
            }

            $data = $query->get();

            return view('trainer.addlinkquestion', compact('data','assessment_id'));
        } else {
            return redirect()->route('home');
        }
    }

    public function show_question_bank($id)
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Bank_Assess_Question::where('id',$id)
            ->where('tr_bank_assess_questions_status',1)
            ->first();

            $answers = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$id)->get();

             return view('trainer.showlinkquestion',compact('data','answers'));
            }else{
                return redirect()->route('home');
            }
    }

    public function edit_question_bank($id)
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Bank_Assess_Question::findOrFail($id);

            $answers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)->get();

            $correctAnswers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)
                ->where('tr_bank_assess_answers_response', 1)
                ->pluck('id')
                ->toArray();
                $maxSelectable = count($answers) - 1;
            return view('trainer.updatelinkquestion', compact('data', 'answers', 'correctAnswers', 'maxSelectable'));
        } else {
            return redirect()->route('home');
        }
    }

    public function update_question_bank(Request $request, $ques_id)
    {
        if (Auth::guard('trainer')->check()) {
            // التحقق من صحة البيانات المدخلة
            $validated = $request->validate([
                'tr_bank_assess_questions_name' => 'required',
                'tr_bank_assess_questions_body' => 'required',
                'tr_bank_assess_questions_grade' => 'required',
            ]);

            // إزالة الوسوم HTML من النص
            $plainText = strip_tags($request->input('tr_bank_assess_questions_body'));

            // العثور على السؤال وتحديث بياناته
            $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);
            $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
            $data->tr_bank_assess_questions_body = $plainText;
            $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
            $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
            $data->update();

            // الحصول على معرف بنك الأسئلة المرتبط
            // $bank_id = $data->bimar_questions_bank_id;

            // تحديث الإجابات بناءً على نوع السؤال
            if ($data->Bimar_Questions_Type->tr_questions_type_code === 'TF' ||
                $data->Bimar_Questions_Type->tr_questions_type_code === 'MC') {
                // السماح بإجابة واحدة فقط
                Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $ques_id)
                    ->update(['tr_bank_assess_answers_response' => 0]);

                if ($request->has('correct_answer')) {
                    $answer = Bimar_Bank_Assess_Answer::findOrFail($request->correct_answer);
                    $answer->update([
                        'tr_bank_assess_answers_response' => 1,
                    ]);
                }
            } elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'MR') {
                // التأكد من الحد الأقصى المسموح به من الإجابات الصحيحة
                if ($request->has('correct_answers') && is_array($request->correct_answers)) {
                    if (count($request->correct_answers) > 3) {
                        return redirect()->back()->with('error', 'يمكنك اختيار 3 إجابات فقط.');
                    }

                    // إعادة تعيين جميع الإجابات إلى غير صحيحة
                    Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $ques_id)
                        ->update(['tr_bank_assess_answers_response' => 0]);

                    // تحديد الإجابات الصحيحة المختارة
                    foreach ($request->correct_answers as $answerId) {
                        $answer = Bimar_Bank_Assess_Answer::findOrFail($answerId);
                        $answer->update([
                            'tr_bank_assess_answers_response' => 1,
                        ]);
                    }
                }
            }

            // ✅ **تحديث نص الإجابة عند التعديل**
            if ($request->has('answers')) {
                foreach ($request->answers as $answerData) {
                    if (isset($answerData['id']) && isset($answerData['body'])) {
                        $answer = Bimar_Bank_Assess_Answer::find($answerData['id']);
                        if ($answer) {
                            $answer->update([
                                'tr_bank_assess_answers_body' => $answerData['body'],
                            ]);
                        }
                    }
                }
            }


            return redirect()->back()->with('message', 'تم التعديل بنجاح');
                } else {
            return redirect()->route('home');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Assessment_Tutor $bimar_assessment_tutors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Assessment_Tutor $bimar_assessment_tutors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bimar_Assessment_Tutor::findOrFail($id)->delete();
        return redirect()->back();
    }
}
