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
            ->where('bimar_questions_bank_id',$id)->get();

            $data = Bimar_Bank_Assess_Question::where('bimar_questions_bank_id',$id)
            ->where('tr_bank_assess_questions_status',1)
            ->get();
            
             return view('trainer.assessquestion',compact('data','validity'));
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
            return view('admin.addassessquestion',compact('types','id'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bimar_questions_bank_id' => 'required',
            'bimar_questions_type_id' => 'required',
            'tr_bank_assess_questions_name' => 'required',
            'tr_bank_assess_questions_body' => 'required',
            'tr_bank_assess_questions_grade' => 'required',
            'tr_bank_assess_questions_status' => 'required|in:0,1',

          ]);

          $user = Auth::guard('trainer')->user();
          $user_id =$user->id;

        $data = new Bimar_Bank_Assess_Question;
        $data->bimar_questions_bank_id = $request->bimar_questions_bank_id;
        $data->bimar_questions_type_id = $request->bimar_questions_type_id;
        $data->bimar_user_id = $user_id;
        $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
        $data->tr_bank_assess_questions_body = $request->tr_bank_assess_questions_body;
        $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
        $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
        $data->tr_bank_assess_questions_status = $request->tr_bank_assess_questions_status;
        $data->save();

        if($request->bimar_questions_type_id !==4 )
        {
            $request->validate([
                'tr_bank_assess_answers_body' => 'required',
                'tr_bank_assess_answers_response' => 'required',
              ]);
    
            $answer = new Bimar_Bank_Assess_Answer;
            $answer->bimar_bank_assess_question_id = $data->id;
            $answer->tr_bank_assess_answers_body = $request->tr_bank_assess_answers_body;
            $answer->tr_bank_assess_answers_response =  $request->tr_bank_assess_answers_response;
            $answer->save();
        }

     return redirect()->back()->with('message','تم الإضافة');
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
             return view('trainer.showquestion',compact('data'));
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
            $answer = Bimar_Bank_Assess_Answer :: where('bimar_bank_assess_question_id',$id)->get();
            return response()->json($data,$answer);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $ques_id,$ans_ids) 
    {
        if ( Auth::guard('trainer')->check()) {
            try {
                $validated = $request->validate([
                    'tr_bank_assess_questions_name' => 'required',
                    'tr_bank_assess_questions_body' => 'required',
                    'tr_bank_assess_questions_grade' => 'required',
              ]);

                $data = Bimar_Bank_Assess_Question::findOrFail($ques_id);
                $data->tr_bank_assess_questions_name = $request->tr_bank_assess_questions_name;
                $data->tr_bank_assess_questions_body = $request->tr_bank_assess_questions_body;
                $data->tr_bank_assess_questions_grade = $request->tr_bank_assess_questions_grade;
                $data->tr_bank_assess_questions_note = $request->tr_bank_assess_questions_note;
                $data->update();

                if($request->bimar_questions_type_id !==4 )
                {
                    if (!is_array($ans_ids) || empty($ans_ids)) {
                        return response()->json(['error' => 'Invalid answer IDs'], 400);
                    }
    
                    $validatedAnswers = $request->validate([
                        'tr_bank_assess_answers_body.*' => 'required|string',
                        'tr_bank_assess_answers_response.*' => 'required',
                    ]);
    
                    foreach ($ans_ids as $key => $id) {
                        $answer = Bimar_Bank_Assess_Answer::findOrFail($id);
                        $answer->update([
                            'tr_bank_assess_answers_body' => $request->tr_bank_assess_answers_body[$key] ?? $answer->tr_bank_assess_answers_body,
                            'tr_bank_assess_answers_response' => $request->tr_bank_assess_answers_response[$key] ?? $answer->tr_bank_assess_answers_response,
                        ]);
                    }
                }

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
