<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Bank_Assess_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarBankAssessQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Bank_Assess_Question::all();
             return view('trainer.assessquestion',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('trainer')->check()) {
            return view('admin.addassessquestion');
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

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Bank_Assess_Question $bimar_Bank_Assess_Question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Bank_Assess_Question $bimar_Bank_Assess_Question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Bank_Assess_Question $bimar_Bank_Assess_Question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Bank_Assess_Question $bimar_Bank_Assess_Question)
    {
        //
    }
}
