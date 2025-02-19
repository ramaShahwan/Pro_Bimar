<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Assessment;
use App\Models\Bimar_Bank_Assess_Questions_Used;
use App\Models\Bimar_Enrol_Class;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Models\Bimar_Bank_Assess_Question;

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
            $assessments = Bimar_Assessment_Trainee::where('bimar_trainee_id',$user->id)->get();
            $links = [];

            foreach ($assessments as $assessment) {
                $data = Bimar_Assessment::where('id',$assessment->bimar_assessment_id)
                ->where('bimar_assessment_status_id',2)
                ->orwhere('bimar_assessment_status_id',3)
                ->first();
                if ($data) {
                    $links[] = $data;
                }
            }
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
                $course_enrol = Bimar_Course_Enrollment::where('id', $enrol_course_id)->get();

                $start_time_date = Carbon::parse($assessment->tr_assessment_start_time);
                $date = $start_time_date->toDateString();
                $start_time = $start_time_date->toTimeString();

                $end_time_date = Carbon::parse($assessment->tr_assessment_end_time);
                $end_time = $end_time_date->toTimeString();


                return view('user.questionslink', compact('questions', 'question_count', 'trainee',
                'course_enrol','date','start_time','end_time'));
            }

        }else{
            return redirect()->route('home');
        }
    }


    public function show($id)
    {        $id = intval($id);

        if (Auth::guard('trainee')->check()) {
            $data = Bimar_Bank_Assess_Question::where('id',$id)
            ->where('tr_bank_assess_questions_status',1)
            ->first();
            $answers = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$id)->get();

             return view('user.showquestionlink',compact('data','answers'));
            }else{
                return redirect()->route('home');
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
