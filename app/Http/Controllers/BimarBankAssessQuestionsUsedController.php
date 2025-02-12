<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Bank_Assess_Questions_Used;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarBankAssessQuestionsUsedController extends Controller
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
            'bimar_assessment_id' => 'required',
            'bimar_bank_assess_question_ids' => 'required|array',
        ]);
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

        if (Auth::guard('trainer')->check()) {

        $existingQuestion = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id', $request->bimar_assessment_id)
            ->whereIn('bimar_bank_assess_question_id', $request->bimar_bank_assess_question_ids)
            ->pluck('bimar_bank_assess_question_id')
            ->toArray();

            $assessment_id = $request->bimar_assessment_id;

        $newQuestions = array_diff($request->bimar_bank_assess_question_ids, $existingQuestion);
        if (empty($newQuestions)) {
            return redirect()->route('assessment_tutor.create', ['assessment_id' => $assessment_id])->with('message', 'لا يمكن إضافة نفس المعلومات المضافة مسبقاً.');
        }

        foreach ($newQuestions as $questionId) {
            Bimar_Bank_Assess_Questions_Used::create([
                'bimar_assessment_id' => $request->bimar_assessment_id,
                'bimar_bank_assess_question_id' => $questionId,
                'bimar_user_id' => $user->id,
                'tr_bank_assess_questions_used_insertdate' => now(),
            ]);
        }
        return redirect()->route('assessment_tutor.create', ['assessment_id' => $assessment_id])->with('message', 'تمت الإضافة بنجاح.');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show( $assessment_id)
    {
        if (Auth::guard('trainer')->check()) {
            $data = Bimar_Bank_Assess_Questions_Used::where('bimar_assessment_id',$assessment_id)
            ->get();

             return view('bank.showassessment',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Bank_Assess_Questions_Used $bimar_bank_assess_questions_used)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Bank_Assess_Questions_Used $bimar_bank_assess_questions_used)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Bimar_Bank_Assess_Questions_Used::findOrFail($id)->delete();
        return redirect()->back();
    }
}
