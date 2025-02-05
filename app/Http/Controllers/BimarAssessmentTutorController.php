<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentTutorController extends Controller
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
    public function show(Bimar_Assessment_Tutor $bimar_assessment_tutors)
    {
        //
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
