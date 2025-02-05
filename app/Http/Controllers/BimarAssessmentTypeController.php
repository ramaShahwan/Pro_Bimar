<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment_Type::all();
             return view('bank.assessment_type',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            return view('bank.addassessment_type');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $validated = $request->validate([
                'tr_assessment_type_name_en' => 'required',
                'tr_assessment_type_name_ar' => 'required',
                'tr_assessment_type_status' => 'required|in:0,1',
              ]);

            $data = new Bimar_Assessment_Type;
            $data->tr_assessment_type_name_en = $request->tr_assessment_type_name_en;
            $data->tr_assessment_type_name_ar = $request->tr_assessment_type_name_ar;
            $data->tr_assessment_type_status = $request->tr_assessment_type_status;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Assessment_Type $Bimar_Assessment_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $data = Bimar_Assessment_Type::findOrFail($id);
            return response()->json($data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $validated = $request->validate([
                'tr_assessment_type_name_en' => 'required',
                'tr_assessment_type_name_ar' => 'required',
                'tr_assessment_type_status' => 'required|in:0,1',
              ]);

                $data = Bimar_Assessment_Type::findOrFail($id);
                $data->tr_assessment_type_name_en = $request->tr_assessment_type_name_en;
               $data->tr_assessment_type_name_ar = $request->tr_assessment_type_name_ar;
               $data->tr_assessment_type_status = $request->tr_assessment_type_status;
                $data->update();

                return response()->json(['message' => 'تم التعديل بنجاح'], 200);

        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Assessment_Type $Bimar_Assessment_Type)
    {
        //
    }
    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
        $status = Bimar_Assessment_Type::find($id);
        if($status){
            if($status->tr_assessment_type_status){
                $status->tr_assessment_type_status =0;
            }
            else{
                $status->tr_assessment_type_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
