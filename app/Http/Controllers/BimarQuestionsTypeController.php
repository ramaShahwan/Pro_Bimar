<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Questions_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarQuestionsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Questions_Type::all();
             return view('bank.banktype',compact('data'));
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            return view('admin.addquestionstype');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $customNames = [
                'tr_questions_type_name' => 'name',
                'tr_questions_type_code' => 'code',
                'tr_questions_type_status' => 'status',
            ];
        
            $validator = Validator::make($request->all(), [
                'tr_questions_type_name' => 'required',
                'tr_questions_type_code' => 'required',
                'tr_questions_type_status' => 'required|in:0,1',
            ]);
    
        
            $validator->setAttributeNames($customNames);
        
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }


            $data = new Bimar_Questions_Type;
            $data->tr_questions_type_name = $request->tr_questions_type_name;
            $data->tr_questions_type_code = $request->tr_questions_type_code;
            $data->tr_questions_type_desc = $request->tr_questions_type_desc;
            $data->tr_questions_type_status = $request->tr_questions_type_status;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Questions_Type $bimar_Questions_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $data = Bimar_Questions_Type::findOrFail($id);
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
                        'tr_questions_type_name' => 'name',
                        'tr_questions_type_code' => 'code',
                        'tr_questions_type_status' => 'status',
                    ];
                
                    $validator = Validator::make($request->all(), [
                      'tr_questions_type_name' => 'required',
                    'tr_questions_type_code' => 'required',
                    'tr_questions_type_status' => 'required|in:0,1',
                    ]);
                    $validator->setAttributeNames($customNames);
                    if ($validator->fails()) {
                        return response()->json(['errors' => $validator->errors()], 422);
                    }
              

                $data = Bimar_Questions_Type::findOrFail($id);
                $data->tr_questions_type_name = $request->tr_questions_type_name;
                $data->tr_questions_type_code = $request->tr_questions_type_code;
                $data->tr_questions_type_desc = $request->tr_questions_type_desc;
                $data->tr_questions_type_status = $request->tr_questions_type_status;
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
    public function destroy(Bimar_Questions_Type $bimar_Questions_Type)
    {
        //
    }

    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
        $status = Bimar_Questions_Type::find($id);
        if($status){
            if($status->tr_questions_type_status){
                $status->tr_questions_type_status =0;
            }
            else{
                $status->tr_questions_type_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
