<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User_Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarUserGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_User_Gender::all();
        return view('admin.gender',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addgender');
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
            'tr_users_gender_name_en' => 'english gender name',
            'tr_users_gender_name_ar' => 'arabic gender name',
            'tr_users_status' => 'status',

        ];

        $validator = Validator::make($request->all(), [
            'tr_users_gender_name_en' => ['required','string','unique:bimar_users_genders', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'tr_users_gender_name_ar' => ['required', 'string','unique:bimar_users_genders', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'tr_users_status' => 'required|in:0,1',
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



        $data = new Bimar_User_Gender;
        $data->tr_users_gender_name_en = $request->tr_users_gender_name_en;
        $data->tr_users_gender_name_ar = $request->tr_users_gender_name_ar;
        $data->tr_users_status = $request->tr_users_status;
        $data->save();

        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_User_Gender $bimar_User_Gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_User_Gender::findOrFail($id);
        return response()->json($data);
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {

            try {
                $customNames = [
                   'tr_users_gender_name_en' => 'english gender name',
            'tr_users_gender_name_ar' => 'arabic gender name',
            'tr_users_status' => 'status',
                ];

                $validator = Validator::make($request->all(), [
                    'tr_users_gender_name_en' => ['required','string','max:100', 'regex:/^[a-zA-Z\s]+$/'],
                    'tr_users_gender_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                    'tr_users_status' => 'required|in:0,1',
                ]);

                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

            $data = Bimar_User_Gender::findOrFail($id);
            $data->tr_users_gender_name_en = $request->tr_users_gender_name_en;
            $data->tr_users_gender_name_ar = $request->tr_users_gender_name_ar;
            // $data->tr_users_status = $request->tr_users_status;
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
    public function destroy(Bimar_User_Gender $bimar_User_Gender)
    {
        //
    }

    public function updateSwitch($genderId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $gender = Bimar_User_Gender::find($genderId);
        if($gender){
            if($gender->tr_users_status){
                $gender->tr_users_status =0;
            }
            else{
                $gender->tr_users_status =1;
            }
            $gender->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }
}
