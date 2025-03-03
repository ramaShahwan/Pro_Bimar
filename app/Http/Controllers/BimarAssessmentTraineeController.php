<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Assessment;
use App\Models\Bimar_Bank_Assess_Questions_Used;
use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Models\Bimar_Bank_Assess_Question;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Training_Course;
use App\Models\Bimar_Course_Enrol_Trainer;
use App\Models\Bimar_User;
use App\Models\Bimar_Exam_Answer;
use App\Models\Bimar_Exam_Question;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentTraineeController extends Controller
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
    public function show_assessment()
    {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $links = Bimar_Assessment_Trainee::where('bimar_trainee_id', $user->id)
            ->whereHas('Bimar_Assessment', function ($query) {
                $query->whereIn('bimar_assessment_status_id', [2, 3]);
            })
            ->get();
        

            return view('user.link',compact('links'));
        }else{
            return redirect()->route('home');
        }
    }


    public function open_assessment(Request $request,$assessment_id)
    {
        $assessment_id = intval($assessment_id);
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $passcode = $request->input('tr_assessment_passcode');
            $assessment = Bimar_Assessment::find($assessment_id);

            if (!$assessment) {
                return redirect()->route('home')->with('error', 'Assessment not found.');
            }

            $trainee = Bimar_Assessment_Trainee::where('bimar_trainee_id',$user->id)
            ->where('bimar_assessment_id',$assessment_id)->first();


        if (
            $passcode == $assessment->tr_assessment_passcode &&
            now()->greaterThanOrEqualTo($assessment->tr_assessment_start_time) &&
            now()->lessThanOrEqualTo($assessment->tr_assessment_end_time) &&
            $trainee &&
            is_null($trainee->tr_assessment_trainee_start_time)
        ) {
            $trainee->update([
                'tr_assessment_trainee_start_time' => now(),
                'tr_assessment_trainee_login_ip' => request()->getClientIp(),
            ]);

                $questions = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id', $assessment_id)->get();
                $question_count = $questions->count();

                $class_id = $assessment->bimar_enrol_class_id;
                $enrol_course_id = Bimar_Enrol_Class::where('id', $class_id)->value('bimar_course_enrollment_id');
                $course_enrol = Bimar_Course_Enrollment::where('id', $enrol_course_id)->first();

                $user_id = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$enrol_course_id)->value('bimar_user_id');
                $bimar_user =Bimar_User::where('id',$user_id)->first();
        // dd($bimar_user);
                $program = optional($course_enrol)->bimar_training_program_id
                    ? Bimar_Training_Program::where('id', $course_enrol->bimar_training_program_id)->first()
                    : null;

                $course = optional($course_enrol)->bimar_training_course_id
                    ? Bimar_Training_Course::where('id', $course_enrol->bimar_training_course_id)->first()
                    : null;

                $start_time_date = Carbon::parse($assessment->tr_assessment_start_time);
                $date = $start_time_date->toDateString();
                $start_time = $start_time_date->toTimeString();

                $end_time_date = Carbon::parse($assessment->tr_assessment_end_time);
                $end_time = $end_time_date->toTimeString();

                session(['user_data' => $trainee]);
                session(['questions' => $questions]);
                session(['assessment_id' => $assessment_id]);
                return view('user.home', compact('questions', 'question_count', 'trainee','assessment_id',
                 'program', 'course', 'bimar_user'  , 'course_enrol','date','start_time','end_time'));
            }
            else{
                return redirect()->route('show_assessment')->with('message','لا يمكنك الدخول للامتحان اكثر من مرة ');;
            }
        }else{
            return redirect()->route('home');
        }
    }



    public function trainee_info(Request $request, $assessment_id)
{
    $assessment_id = intval($assessment_id);
    $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

    if (Auth::guard('trainee')->check()) {
        $assessment = Bimar_Assessment::find($assessment_id);

        if (!$assessment) {
            return redirect()->route('home')->with('error', 'Assessment not found.');
        }

        $trainee = Bimar_Assessment_Trainee::where('bimar_trainee_id', $user->id)
            ->where('bimar_assessment_id', $assessment_id)
            ->first();

        $questions = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id', $assessment_id)->get();
        $question_count = $questions->count();

        $class_id = $assessment->bimar_enrol_class_id;
        $enrol_course_id = Bimar_Enrol_Class::where('id', $class_id)->value('bimar_course_enrollment_id');

        $course_enrol = Bimar_Course_Enrollment::where('id', $enrol_course_id)->first();

        $user_id = Bimar_Course_Enrol_Trainer::where('bimar_course_enrollment_id',$enrol_course_id)->value('bimar_user_id');
        $bimar_user =Bimar_User::where('id',$user_id)->first();
// dd($bimar_user);
        $program = optional($course_enrol)->bimar_training_program_id
            ? Bimar_Training_Program::where('id', $course_enrol->bimar_training_program_id)->first()
            : null;

        $course = optional($course_enrol)->bimar_training_course_id
            ? Bimar_Training_Course::where('id', $course_enrol->bimar_training_course_id)->first()
            : null;

        $start_time_date = Carbon::parse($assessment->tr_assessment_start_time);
        $date = $start_time_date->toDateString();
        $start_time = $start_time_date->toTimeString();

        $end_time_date = Carbon::parse($assessment->tr_assessment_end_time);
        $end_time = $end_time_date->toTimeString();

        return view('user.notequestion', compact('question_count', 'trainee', 'program', 'course',
         'bimar_user'  , 'course_enrol', 'date', 'start_time', 'end_time'));
    }

    return redirect()->route('home');
}


    public function show($id)
    {        $id = intval($id);

        if (Auth::guard('trainee')->check()) {
            $user = Auth::guard('administrator')->user()
            ?? Auth::guard('operation_user')->user()
            ?? Auth::guard('trainer')->user()
            ?? Auth::guard('trainee')->user();

           $data =Bimar_Exam_Answer::where('bimar_bank_assess_question_id',$id)->first();

            $ques = Bimar_Bank_Assess_Question::where('id',$data->bimar_bank_assess_question_id)
            ->where('tr_bank_assess_questions_status',1)
            ->first();
            $answers = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$data->bimar_bank_assess_question_id)->get();

            $correctAnswers = Bimar_Exam_Answer::where('bimar_bank_assess_question_id', $id)
                ->where('tr_exam_answers_trainee_response', 1)
                ->where('bimar_trainee_id', $user->id)
                ->pluck('bimar_bank_assess_answer_id')
                ->toArray();

                $body = Bimar_Exam_Answer::where('bimar_bank_assess_question_id', $id)
                ->where('tr_exam_answers_trainee_response', 1)
                ->where('bimar_trainee_id', $user->id)
                ->value('tr_exam_answers_body');

             return view('user.showquestionlink',compact('ques','answers','correctAnswers','body'));
            }else{
                return redirect()->route('home');
            }
    }


    public function update_validate(Request $request, $ques_id)
    {

        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $validated = $request->validate([
                'bimar_assessment_id' => 'required',
            ]);

            $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);

            if ($data->Bimar_Questions_Type->tr_questions_type_code === 'TF' ||
                $data->Bimar_Questions_Type->tr_questions_type_code === 'MC') {

                if ($request->has('correct_answer')) {

                    $exam = Bimar_Exam_Answer::
                    where('bimar_bank_assess_question_id',$ques_id)
                    ->where('bimar_assessment_id',$request->bimar_assessment_id)
                    ->where('bimar_trainee_id',$user->id)
                    ->where('bimar_bank_assess_answer_id',$request->correct_answer)
                    ->first();

                    Bimar_Exam_Answer::where('bimar_bank_assess_question_id', $ques_id)
                    ->update(['tr_exam_answers_trainee_response' => 0]);

                    $exam->tr_exam_answers_trainee_response =1;
                    $exam->save();
            }

        }
            elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'MR') {
                if ($request->has('correct_answers') && is_array($request->correct_answers)) {

                    Bimar_Exam_Answer::where('bimar_bank_assess_question_id', $ques_id)
                        ->update(['tr_exam_answers_trainee_response' => 0]);

                    foreach ($request->correct_answers as $answerId) {
                        $answer = Bimar_Exam_Answer::where('bimar_bank_assess_answer_id',$answerId)->first();
                        $answer->update([
                            'tr_exam_answers_trainee_response' => 1,
                        ]);
                    }
                }
            }

            elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'ES'){

            if ($request->has('answers')) {
                foreach ($request->answers as $answerData) {
                    if (isset($answerData['id']) && isset($answerData['body'])) {

                        $answer = Bimar_Exam_Answer::
                        where('bimar_bank_assess_question_id',$ques_id)
                        ->where('bimar_assessment_id',$request->bimar_assessment_id)
                        ->where('bimar_trainee_id',$user->id)
                        ->where('bimar_bank_assess_answer_id',$answerData['id'])
                        ->first();

                        if ($answer) {
                            $answer->tr_exam_answers_body = $answerData['body'];
                            $answer->tr_exam_answers_trainee_response = 1;
                            $answer->save();
                        }
                    }
                }
            }

        }
            return redirect()->back()->with('message', ' تمت الإجابة على السؤال بنجاح ');
        } else {
            return redirect()->route('home');
        }
    }


    public function delete_validate(Request $request, $ques_id)
    {

        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $validated = $request->validate([
                'bimar_assessment_id' => 'required',
            ]);

                   $data= Bimar_Exam_Answer::where('bimar_bank_assess_question_id', $ques_id)
                    ->where('bimar_assessment_id',$request->bimar_assessment_id)
                    ->where('bimar_trainee_id',$user->id)->get();

                    if($data)
                    foreach( $data as $call)
                  {
                    {
                        $call->tr_exam_answers_trainee_response =0;
                        $call->tr_exam_answers_body =null;
                        $call->save();
                    }
                  }
            return redirect()->back()->with('message', ' تمت حذف الاجوبة هذا السؤال بنجاح ');
        } else {
            return redirect()->route('home');
        }
    }

    public function exam_info($assessment_id)
    {
        $user = Auth::guard('administrator')->user()
            ?? Auth::guard('operation_user')->user()
            ?? Auth::guard('trainer')->user()
            ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $question_ids = Bimar_Exam_Answer::where('bimar_assessment_id', $assessment_id)
                ->pluck('bimar_bank_assess_question_id')
                ->unique();

            $answered_questions_count = Bimar_Exam_Answer::where('bimar_assessment_id', $assessment_id)
            ->where('tr_exam_answers_trainee_response', 1)
            ->distinct('bimar_bank_assess_question_id')
            ->count();

            $not_answered_count = $question_ids->count() - $answered_questions_count;

            $start_time = Bimar_Assessment_Trainee::where('bimar_assessment_id', $assessment_id)
            ->where('bimar_trainee_id', $user->id)
            ->value('tr_assessment_trainee_start_time') ?? now();


           $end_time = Bimar_Assessment::where('id', $assessment_id)
            ->value('tr_assessment_end_time') ?? now();

            $Time_remaining = max(strtotime($end_time) - time(), 0);
            $Time_taken = time() - strtotime($start_time);
            return response()->json([
                'total_questions' => $question_ids->count(),
                'answered_questions' => $answered_questions_count,
                'not_answered_questions' => $not_answered_count,
                'Time_remaining' => max($Time_remaining, 0),
                'Time_taken' => $Time_taken,
            ]);
        }
    }


    public function submit_exam(Request $request,$assessment_id)
    {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user()
        ?? Auth::guard('trainee')->user();

        $answers = Bimar_Exam_Answer::where('bimar_assessment_id', $assessment_id)->get();

        foreach ($answers as $answer) {
            $questions = Bimar_Exam_Question::where('bimar_assessment_id', $answer->bimar_assessment_id)->get();

            foreach ($questions as $question) {
                if ($answer->tr_exam_answers_bank_response == $answer->tr_exam_answers_trainee_response &&
                    $answer->tr_exam_answers_bank_response == 1) {

                    $question->update([
                        'tr_exam_questions_correct' => 1,
                        'tr_exam_questions_trainee_grade' => $question->tr_exam_questions_bank_grade,
                    ]);
                } else {
                    $question->update([
                        'tr_exam_questions_correct' => 0,
                        'tr_exam_questions_trainee_grade' => 0,
                    ]);
                }
            }
        }


        if (Auth::guard('trainee')->check()) {
            $mark = Bimar_Exam_Question::where('bimar_assessment_id', $assessment_id)
                ->sum('tr_exam_questions_trainee_grade');

            $exam = Bimar_Assessment_Trainee::where('bimar_assessment_id', $assessment_id)
                ->where('bimar_trainee_id', $user->id)
                ->first();

            if ($exam) {
                $exam->tr_assessment_trainee_end_time = now();
                $exam->tr_assessment_trainee_grade = $mark;
                $exam->save();
            }


            // Bimar_Assessment::where('bimar_assessment_id', $assessment_id)
            // ->update(['bimar_assessment_status_id' => 4]);


            Auth::guard('trainee')->logout();

            session()->forget(['user_data', 'questions', 'assessment_id']);

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', ' تم إنهاء الامتحان بنجاح ');
        }
        else {
            return redirect()->route('home');
        }

    }

    public function show_mark($assessment_id)
    {
        $user = Auth::guard('administrator')->user()
            ?? Auth::guard('operation_user')->user()
            ?? Auth::guard('trainer')->user()
            ?? Auth::guard('trainee')->user();

        if (Auth::guard('trainee')->check()) {
            $mark = Bimar_Assessment_Trainee::where('bimar_trainee_id', $user->id)
                ->where('bimar_assessment_id', $assessment_id)
                ->value('tr_assessment_trainee_grade');

            return response()->json(['mark' => $mark]); // إرجاع البيانات بصيغة JSON
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Assessment_Trainee $Bimar_Assessment_Trainees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Assessment_Trainee $Bimar_Assessment_Trainees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Assessment_Trainee $Bimar_Assessment_Trainees)
    {
        //
    }
}
