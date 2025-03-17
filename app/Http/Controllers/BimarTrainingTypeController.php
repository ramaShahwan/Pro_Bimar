<?php

namespace App\Http\Controllers;
use App\Models\Bimar_Training_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarTrainingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Type::all();
        return view('admin.training_type',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }
    public function updateSwitch($typeId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $type = Bimar_Training_Type::find($typeId);
        if($type){
            if($type->tr_type_status){
                $type->tr_type_status =0;
            }
            else{
                $type->tr_type_status =1;
            }
            $type->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addtype');
    }else{
        return redirect()->route('home');
    }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $customNames = [
            'tr_type_name_en' => 'english name',
            'tr_type_name_ar' => 'arabic name',
        ];

        $validator = Validator::make($request->all(), [
            'tr_type_name_en' =>  ['required','unique:bimar_training_types', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'tr_type_name_ar' =>  ['required','unique:bimar_training_types', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
        ]);

        $validator->setAttributeNames($customNames);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $data = new Bimar_Training_Type;
        $data->tr_type_name_en = $request->tr_type_name_en;
        $data->tr_type_name_ar = $request->tr_type_name_ar;
        $data->tr_type_status = $request->tr_type_status;
        $data->save();

        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Type $bimar_Training_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Type::findOrFail($id);
        return response()->json($data);
    }else{
        return redirect()->route('home');
    }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        try {
            $customNames = [
                'tr_type_name_en' => 'english name',
                'tr_type_name_ar' => 'arabic name',
            ];

            $validator = Validator::make($request->all(), [
                'tr_type_name_en' =>  ['required','string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'tr_type_name_ar' =>  ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            ]);

            $validator->setAttributeNames($customNames);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

        $data = Bimar_Training_Type::findOrFail($id);
        $data->tr_type_name_en = $request->tr_type_name_en;
        $data->tr_type_name_ar = $request->tr_type_name_ar;
        // $data->tr_type_status = $request->tr_type_status;
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
    public function destroy(Bimar_Training_Type $bimar_Training_Type)
    {
        //
    }

    public function updateSwitchStatus(Request $request, $id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Type::find($id);

        if ($data) {
            $data->tr_type_status = $request->tr_type_status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }else{
        return redirect()->route('home');
    }
    }
}
