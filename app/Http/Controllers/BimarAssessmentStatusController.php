<?php

namespace App\Http\Controllers;

use App\Models\bimar_assessment_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarAssessmentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = bimar_assessment_status::all();
             return view('bank.assessment_status',compact('data'));
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
            return view('bank.addassessment_status');
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
                'tr_assessment_status_name_en' => 'required',
                'tr_assessment_status_name_ar' => 'required',
                'tr_assessment_status_enabled' => 'required|in:0,1',
              ]);


            $data = new bimar_assessment_status;
            $data->tr_assessment_status_name_en = $request->tr_assessment_status_name_en;
            $data->tr_assessment_status_name_ar = $request->tr_assessment_status_name_ar;
            $data->tr_assessment_status_enabled = $request->tr_assessment_status_enabled;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bimar_assessment_status $bimar_assessment_status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $data = bimar_assessment_status::findOrFail($id);
            return response()->json($data);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $validated = $request->validate([
                'tr_assessment_status_name_en' => 'required',
                'tr_assessment_status_name_ar' => 'required',
                'tr_assessment_status_enabled' => 'required|in:0,1',
              ]);

                $data = bimar_assessment_status::findOrFail($id);
                $data->tr_assessment_status_name_en = $request->tr_assessment_status_name_en;
                $data->tr_assessment_status_name_ar = $request->tr_assessment_status_name_ar;
                $data->tr_assessment_status_enabled = $request->tr_assessment_status_enabled;
                $data->update();

                return response()->json(['message' => 'تم التعديل بنجاح'], 200);
           
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }

    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
        $status = bimar_assessment_status::find($id);
        if($status){
            if($status->tr_assessment_status_enabled){
                $status->tr_assessment_status_enabled =0;
            }
            else{
                $status->tr_assessment_status_enabled =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
