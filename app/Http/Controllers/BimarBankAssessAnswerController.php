<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Bank_Assess_Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarBankAssessAnswerController extends Controller
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
        $request->validate([
            'bimar_bank_assess_question_id' => 'required',
            'tr_bank_assess_answers_body' => 'required',
            'tr_bank_assess_answers_response' => 'required',
          ]);

        $data = new Bimar_Bank_Assess_Answer;
        $data->bimar_bank_assess_question_id = $request->bimar_bank_assess_question_id;
        $data->tr_bank_assess_answers_body = $request->tr_bank_assess_answers_body;
        $data->tr_bank_assess_answers_response =  $request->tr_bank_assess_answers_response;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Bank_Assess_Answer $bimar_Bank_Assess_Answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Bank_Assess_Answer $bimar_Bank_Assess_Answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Bank_Assess_Answer $bimar_Bank_Assess_Answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Bank_Assess_Answer $bimar_Bank_Assess_Answer)
    {
        //
    }
}
