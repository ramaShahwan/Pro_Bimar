<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Class_Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarClassStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Class_Status::all();
             return view('admin.statusclass',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            return view('admin.addclass_status');
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
                'tr_class_status_name_ar' => 'arabic name',
                'tr_class_status_name_en' => 'english name',
                'tr_class_status' => 'status',
            ];

            $validator = Validator::make($request->all(), [
                'tr_class_status_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'tr_class_status_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'tr_class_status' => 'required|in:0,1',
            ]);

            $validator->setAttributeNames($customNames);

            // if ($validator->fails()) {
            //     return redirect()->back()
            //         ->withErrors($validator)
            //         ->withInput();
            // }
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }


            $data = new Bimar_Class_Status;
            $data->tr_class_status_name_ar = $request->tr_class_status_name_ar;
            $data->tr_class_status_name_en = $request->tr_class_status_name_en;
            $data->tr_class_status_desc = $request->tr_class_status_desc;
            $data->tr_class_status = $request->tr_class_status;
            $data->save();

            return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Class_Status $bimar_Class_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = Bimar_Class_Status::findOrFail($id);
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
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {

            try {
                $customNames = [
                    'tr_class_status_name_ar' => 'arabic name',
                    'tr_class_status_name_en' => 'english name',
                ];

                $validator = Validator::make($request->all(), [
                    'tr_class_status_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                    'tr_class_status_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                ]);
                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

                $data = Bimar_Class_Status::findOrFail($id);
                $data->tr_class_status_name_ar = $request->tr_class_status_name_ar;
                $data->tr_class_status_name_en = $request->tr_class_status_name_en;
                $data->tr_class_status_desc = $request->tr_class_status_desc;
                $data->update();

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
    public function destroy(Bimar_Class_Status $bimar_Class_Status)
    {
        //
    }

    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $status = Bimar_Class_Status::find($id);
        if($status){
            if($status->tr_class_status){
                $status->tr_class_status =0;
            }
            else{
                $status->tr_class_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
