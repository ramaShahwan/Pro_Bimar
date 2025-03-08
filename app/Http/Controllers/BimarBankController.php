<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BimarBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Bank::all();
        return view('admin.bank',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addbank');
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
            'tr_bank_code' => 'code',
            'tr_bank_name_ar' => 'arabic name',
            'tr_bank_name_en' => 'english name',
            'tr_bank_status' => 'status',
        ];

        $validator = Validator::make($request->all(), [
            'tr_bank_code' => 'required',
            'tr_bank_name_ar' => 'required',
            'tr_bank_name_en' => 'required',
            'tr_bank_status' => 'required|in:0,1',
        ]);

        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
       
        $data = new Bimar_Bank;
        $data->tr_bank_code = $request->tr_bank_code;
        $data->tr_bank_name_ar = $request->tr_bank_name_ar;
        $data->tr_bank_name_en = $request->tr_bank_name_en;
        $data->tr_bank_desc = $request->tr_bank_desc;
        $data->tr_bank_status = $request->tr_bank_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(bimar_bank $Bimar_Bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Bank::findOrFail($id);
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
                'tr_bank_code' => 'code',
                'tr_bank_name_ar' => 'arabic name',
                'tr_bank_name_en' => 'english name',
                'tr_bank_status' => 'status',
            ];
    
            $validator = Validator::make($request->all(), [
                'tr_bank_code' => 'required',
                'tr_bank_name_ar' => 'required',
                'tr_bank_name_en' => 'required',
                'tr_bank_status' => 'required|in:0,1',
            ]);
            $validator->setAttributeNames($customNames);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }


            $data = Bimar_Bank::findOrFail($id);
            $data->tr_bank_code = $request->tr_bank_code;
            $data->tr_bank_name_ar = $request->tr_bank_name_ar;
            $data->tr_bank_name_en = $request->tr_bank_name_en;
            $data->tr_bank_desc = $request->tr_bank_desc;
            $data->tr_bank_status = $request->tr_bank_status;
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
    public function destroy(bimar_bank $Bimar_Bank)
    {
        //
    }

    public function updateSwitch($bankId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $bank = Bimar_Bank::find($bankId);
        if($bank){
            if($bank->tr_bank_status){
                $bank->tr_bank_status =0;
            }
            else{
                $bank->tr_bank_status =1;
            }
            $bank->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }

}
