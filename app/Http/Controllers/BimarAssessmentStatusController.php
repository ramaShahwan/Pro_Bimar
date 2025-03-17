<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Assessment_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarAssessmentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Assessment_Status::all();
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
            $customNames = [
                'tr_assessment_status_name_en' => 'english name',
                'tr_assessment_status_name_ar' => 'arabic name',
                'tr_assessment_status_enabled' => 'start enabled ',
            ];
    
            $validator = Validator::make($request->all(), [
                'tr_assessment_status_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'tr_assessment_status_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'tr_assessment_status_enabled' => 'required|in:0,1',
            ]);


            $validator->setAttributeNames($customNames);
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = new Bimar_Assessment_Status;
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
    public function show(Bimar_Assessment_Status $Bimar_Assessment_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $data = Bimar_Assessment_Status::findOrFail($id);
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

            try {
                $customNames = [
                    'tr_assessment_status_name_en' => 'english name',
                    'tr_assessment_status_name_ar' => 'arabic name',
                    'tr_assessment_status_enabled' => 'start enabled ',
                ];
    
                $validator = Validator::make($request->all(), [
                    'tr_assessment_status_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                    'tr_assessment_status_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                    'tr_assessment_status_enabled' => 'required|in:0,1',
                ]);
                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }


                $data = Bimar_Assessment_Status::findOrFail($id);
                $data->tr_assessment_status_name_en = $request->tr_assessment_status_name_en;
                $data->tr_assessment_status_name_ar = $request->tr_assessment_status_name_ar;
                $data->tr_assessment_status_enabled = $request->tr_assessment_status_enabled;
                $data->update();

                return response()->json(['message' => 'تم التعديل بنجاح'], 200);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل: ' . $e->getMessage());
            }
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
        $status = Bimar_Assessment_Status::find($id);
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
