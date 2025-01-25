<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Bank_Assess_Question;
use App\Models\Bimar_Bank_Assess_Answer;
use App\Models\Bimar_Questions_Type;
use App\Models\Bimar_Questions_Bank_User;


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

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'bimar_questions_bank_id' => 'required',
    //         'bimar_questions_type_id' => 'required',
    //         'tr_bank_assess_questions_name' => 'required',
    //         'tr_bank_assess_questions_body' => 'required',
    //         'tr_bank_assess_questions_grade' => 'required',
    //     ]);

    //     $type_id = Bimar_Questions_Type::where('tr_questions_type_code', $request->bimar_questions_type_id)
    //         ->value('id');

    //     $user = Auth::guard('trainer')->user();
    //     $user_id = $user->id;

    //     $data = new Bimar_Bank_Assess_Question;
    //     $data->bimar_questions_bank_id = $request->bimar_questions_bank_id;
    //     $data->bimar_questions_type_id = $type_id;
    //     $data->bimar_user_id = $user_id;
    //     $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
    //     $data->tr_bank_assess_questions_body = $request->tr_bank_assess_questions_body;
    //     $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
    //     $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
    //     $data->tr_bank_assess_questions_status = 1;
    //     $data->save();

    //     if ($request->has('answers') && is_array($request->answers)) {
    //         $correctAnswersCount = 0;
    //         $answersList = [];

    //         foreach ($request->answers as $index => $answer) {
    //             if (is_array($answer)) {
    //                 $isCorrect = isset($answer['response']) ? 1 : 0;
    //                 $answerText = isset($answer['body']) ? $answer['body'] : '';


    //                 $answersList[] = $answerText;


    //                 if ($isCorrect) {
    //                     $correctAnswersCount++;
    //                 }


    //                 $questionAnswer->bimar_questions_bank_id = $data->id;
    //                 $questionAnswer->tr_bank_assess_answers_body = $answerText;
    //                 $questionAnswer->tr_bank_assess_answers_response = $isCorrect;
    //                 $questionAnswer->save();
    //             }
    //         }


    //         if ($correctAnswersCount == 0) {
    //             return redirect()->back()->withErrors('يجب أن يكون هناك إجابة صحيحة واحدة على الأقل.');
    //         }


    //         $answersListStr = implode(',', $answersList);
    //         $data->tr_bank_assess_answers_body = $answersListStr;
    //         $data->save();
    //     } else {
    //         return redirect()->back()->withErrors('يجب تقديم الإجابات بشكل صحيح.');
    //     }

    //     return redirect()->back()->with('message', 'تم الإضافة');
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bimar_questions_bank_id' => 'required',
            'bimar_questions_type_id' => 'required',
            'tr_bank_assess_questions_name' => 'required|string|max:225',
            'tr_bank_assess_questions_body' => 'required|string',
            'tr_bank_assess_questions_grade' => 'required|numeric|min:0',
            'tr_bank_assess_questions_note' => 'nullable|string|max:255',
        ]);


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
    // public function edit($id)
    // {
    //     if (Auth::guard('trainer')->check()) {
    //         $data = Bimar_Bank_Assess_Question::findOrFail($id);
    //         $answers = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$id)->get();
    //         $correctAnswers = Bimar_Bank_Assess_Answer::
    //         where('tr_bank_assess_answers_response', 1)
    //         ->pluck('id')
    //         ->toArray();

    //         return view('trainer.updatequestionsbank',compact('data','answers','correctAnswers'));
    //     }else{
    //         return redirect()->route('home');
    //     }
    // }
    public function edit($id)
{
    if (Auth::guard('trainer')->check()) {
        // جلب بيانات السؤال المحدد
        $data = Bimar_Bank_Assess_Question::findOrFail($id);

        // جلب جميع الإجابات المتعلقة بالسؤال
        $answers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)->get();

        // جلب معرفات الإجابات الصحيحة فقط
        $correctAnswers = Bimar_Bank_Assess_Answer::where('bimar_bank_assess_question_id', $id)
            ->where('tr_bank_assess_answers_response', 1)
            ->pluck('id')
            ->toArray();
            $maxSelectable = count($answers) - 1;
        // تمرير البيانات إلى الواجهة
        return view('trainer.updatequestionsbank', compact('data', 'answers', 'correctAnswers', 'maxSelectable'));
    } else {
        return redirect()->route('home');
    }
}


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,  $ques_id,$ans_ids)
    // {
    //     if ( Auth::guard('trainer')->check()) {
    //         try {
    //             $validated = $request->validate([
    //                 'tr_bank_assess_questions_name' => 'required',
    //                 'tr_bank_assess_questions_body' => 'required',
    //                 'tr_bank_assess_questions_grade' => 'required',
    //           ]);

    //             $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);
    //             $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
    //             $data->tr_bank_assess_questions_body = $request->tr_bank_assess_questions_body;
    //             $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
    //             $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
    //             $data->update();

    //             if($request->bimar_questions_type_id !==4 )
    //             {
    //                 if (!is_array($ans_ids) || empty($ans_ids)) {
    //                     return response()->json(['error' => 'Invalid answer IDs'], 400);
    //                 }

    //                 $validatedAnswers = $request->validate([
    //                     'tr_bank_assess_answers_body.*' => 'required|string',
    //                     'tr_bank_assess_answers_response.*' => 'required',
    //                 ]);

    //                 foreach ($ans_ids as $key => $id) {
    //                     $answer = Bimar_Bank_Assess_Answer::findOrFail($id);
    //                     $answer->update([
    //                         'tr_bank_assess_answers_body' => $request->tr_bank_assess_answers_body[$key] ?? $answer->tr_bank_assess_answers_body,
    //                         'tr_bank_assess_answers_response' => $request->tr_bank_assess_answers_response[$key] ?? $answer->tr_bank_assess_answers_response,
    //                     ]);
    //                 }
    //             }

    //             return response()->json(['message' => 'تم التعديل بنجاح'], 200);
    //         } catch (\Exception $e) {
    //             return response()->json(['error' => $e->getMessage()], 500);
    //         }
    //     }else{
    //         return redirect()->route('home');
    //     }
    // }
    public function update(Request $request, $ques_id)
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

            // العثور على السؤال بناءً على معرفه
            $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);
            $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
            $data->tr_bank_assess_questions_body = $plainText;
            $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
            $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
            $data->update(); // تحديث بيانات السؤال

            // الحصول على معرف بنك الأسئلة المرتبط
            $bank_id = $data->bimar_questions_bank_id;

            // التحقق من الإجابات بناءً على نوع السؤال
            if ($data->Bimar_Questions_Type->tr_questions_type_code === 'TF' || $data->Bimar_Questions_Type->tr_questions_type_code === 'MC') {
                // إذا كان نوع السؤال radio (اختيار واحد)
                $isCorrect = 0;
                if ($request->has('correct_answer')) {
                    $isCorrect = 1; // الإجابة الصحيحة
                    $answer = Bimar_Bank_Assess_Answer::findOrFail($request->correct_answer);
                    // تحديث الإجابة
                    $answer->update([
                        'tr_bank_assess_answers_response' => $isCorrect,
                    ]);
                }
            } elseif ($data->Bimar_Questions_Type->tr_questions_type_code === 'MR') {
                // إذا كان نوع السؤال checkbox (اختيارات متعددة)
                if ($request->has('correct_answers') && is_array($request->correct_answers)) {
                    foreach ($request->correct_answers as $answerId) {
                        $answer = Bimar_Bank_Assess_Answer::findOrFail($answerId);
                        // تعيين الإجابة الصحيحة
                        $answer->update([
                            'tr_bank_assess_answers_response' => 1,
                        ]);
                    }
                }
            }

            return redirect()->route('ques.index', ['id' => $bank_id])->with('message', 'تم التعديل بنجاح');
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
