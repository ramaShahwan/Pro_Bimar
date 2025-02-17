<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Trainee;
use App\Models\Bimar_Assessment;
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
                ->where('bimar_assessment_type_id',2)
                ->orwhere('bimar_assessment_type_id',3)
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
