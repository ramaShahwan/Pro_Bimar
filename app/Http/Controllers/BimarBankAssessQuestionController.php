<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Bank_Assess_Question;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Models\Bimar_Questions_Type;
use App\Models\Bimar_Questions_Bank_User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarBankAssessQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (Auth::guard('trainer')->check()) {
            $user = Auth::guard('trainer')->user();
            $user_id =$user->id;

            $validity = Bimar_Questions_Bank_User :: where('bimar_user_id',$user_id)
            ->where('bimar_questions_bank_id',$id)->first();

            $data = Bimar_Bank_Assess_Question::where('bimar_questions_bank_id',$id)
            ->where('tr_bank_assess_questions_status',1)
            ->get();

             return view('trainer.questionsbank',compact('data','validity','id'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Auth::guard('trainer')->check()) {
            $types = Bimar_Questions_Type :: where('tr_questions_type_status',1)->get();
            return view('trainer.addquestionsbank',compact('types','id'));
        }else{
            return redirect()->route('home');
        }
    }


    public function store(Request $request)
    {
        $customNames = [
            'bimar_questions_bank_id' => 'bank ',
            'bimar_questions_type_id' => 'type ',
            'tr_bank_assess_questions_name' => 'name',
            'tr_bank_assess_questions_body' => 'body',
            'tr_bank_assess_questions_grade' => 'grade',
            'tr_bank_assess_questions_note' => 'note',
        ];

        $validator = Validator::make($request->all(), [
            'bimar_questions_bank_id' => 'required',
            'bimar_questions_type_id' => 'required',
            'tr_bank_assess_questions_name' => 'required|string|max:225',
            'tr_bank_assess_questions_body' => 'required|string',
            'tr_bank_assess_questions_grade' => 'required|numeric|min:0',
            'tr_bank_assess_questions_note' => 'nullable|string|max:255',
        ]);

        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $type_id = Bimar_Questions_Type::where('tr_questions_type_code', $request->bimar_questions_type_id)
            ->value('id');

        $user = Auth::guard('trainer')->user();
        $user_id = $user->id;

        $plainText = strip_tags($request->input('tr_bank_assess_questions_body'));

         $question = new Bimar_Bank_Assess_Question;
        $question->bimar_questions_bank_id = $request->bimar_questions_bank_id;
        $question->bimar_questions_type_id = $type_id;
        $question->bimar_user_id = $user_id;
        $question->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
        $question->tr_bank_assess_questions_body = $plainText;
        $question->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
        $question->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
        $question->tr_bank_assess_questions_status = 1;
        $question->save();

        $answers = $request->input('answers', []);
        $correctAnswers = $request->input('correct_answers', []);
        $singleCorrectAnswer = $request->input('correct_answer');
        $essayAnswer = $request->input('essayAnswer');

        foreach ($answers as $key => $answerBody) {
            // تحديد إذا كانت الإجابة صحيحة بناءً على نوع السؤال
            $isCorrect = 0;
            if (is_array($correctAnswers) && in_array($key + 1, $correctAnswers)) {
                $isCorrect = 1; // MR
            } elseif ($singleCorrectAnswer == $key + 1) {
                $isCorrect = 1; // TF أو MC
            }

            $ans = new Bimar_Bank_Assess_Answer;
            $ans->bimar_bank_assess_question_id = $question->id;
            $ans->tr_bank_assess_answers_body = $answerBody;
            $ans->tr_bank_assess_answers_response = $isCorrect;
            $ans->save();
        }

        if($essayAnswer)
        {
            $ans = new Bimar_Bank_Assess_Answer;
            $ans->bimar_bank_assess_question_id = $question->id;
            $ans->tr_bank_assess_answers_body = $essayAnswer;
            $ans->tr_bank_assess_answers_response = 1;
            $ans->save();
        }

        return redirect()->back()->with('message', 'تم إضافة السؤال بنجاح.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Bank_Assess_Question::where('id',$id)
            ->where('tr_bank_assess_questions_status',1)
            ->first();

            $answers = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$id)->get();

             return view('trainer.showquestionsbank',compact('data','answers'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
{
    if (Auth::guard('trainer')->check()) {
  
        $data = Bimar_Bank_Assess_Question::findOrFail($id);

        $answers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)->get();

        $correctAnswers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)
            ->where('tr_bank_assess_answers_response', 1)
            ->pluck('id')
            ->toArray();
            $maxSelectable = count($answers) - 1;

        return view('trainer.updatequestionsbank', compact('data', 'answers', 'correctAnswers', 'maxSelectable'));
    } else {
        return redirect()->route('home');
    }
}


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $ques_id)
    {
        if (Auth::guard('trainer')->check()) {
     
            try {
                $customNames = [
                    'tr_bank_assess_questions_name' => 'name',
                    'tr_bank_assess_questions_body' => 'body',
                    'tr_bank_assess_questions_grade' => 'grade',
                ];
        
                $validator = Validator::make($request->all(), [
                    'tr_bank_assess_questions_name' => 'required',
                    'tr_bank_assess_questions_body' => 'required',
                    'tr_bank_assess_questions_grade' => 'required',
                ]);
                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

            $plainText = strip_tags($request->input('tr_bank_assess_questions_body'));

            $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);
            $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
            $data->tr_bank_assess_questions_body = $plainText;
            $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
            $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
            $data->update();

            $bank_id = $data->bimar_questions_bank_id;

            if ($data->Bimar_Questions_Type->tr_questions_type_code === 'TF' ||
                $data->Bimar_Questions_Type->tr_questions_type_code === 'MC') {

                Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $ques_id)
                    ->update(['tr_bank_assess_answers_response' => 0]);

                if ($request->has('correct_answer')) {
                    $answer = Bimar_Bank_Assess_Answer::findOrFail($request->correct_answer);
                    $answer->update([
                        'tr_bank_assess_answers_response' => 1,
                    ]);
                }
            } elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'MR') {

                if ($request->has('correct_answers') && is_array($request->correct_answers)) {
                    if (count($request->correct_answers) > 3) {
                        return redirect()->back()->with('error', 'يمكنك اختيار 3 إجابات فقط.');
                    }

                    Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $ques_id)
                        ->update(['tr_bank_assess_answers_response' => 0]);

                    foreach ($request->correct_answers as $answerId) {
                        $answer = Bimar_Bank_Assess_Answer::findOrFail($answerId);
                        $answer->update([
                            'tr_bank_assess_answers_response' => 1,
                        ]);
                    }
                }
            }

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


            return redirect()->route('ques.index', ['id' => $bank_id])->with('message', 'تم التعديل بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل: ' . $e->getMessage());
        }
        } else {
            return redirect()->route('home');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Bank_Assess_Question $bimar_Bank_Assess_Question)
    {
        //
    }

    public function updateSwitch($id)
    {     if ( Auth::guard('trainer')->check()) {
        $status = Bimar_Bank_Assess_Question::find($id);
        if($status){
            if($status->tr_bank_assess_questions_status){
                $status->tr_bank_assess_questions_status =0;
            }
            else{
                $status->tr_bank_assess_questions_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
