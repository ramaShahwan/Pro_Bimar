<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BimarCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Currency::all();
        return view('admin.currency',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addcurrency');
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
            'tr_currency_code' => 'code',
            'tr_currency_name_ar' => 'arabic name',
            'tr_currency_name_en' => 'english name',
            'tr_currency_status' => 'status',
        ];
    
        $validator = Validator::make($request->all(), [
            'tr_currency_code' => 'required|unique:bimar_currencies',
            'tr_currency_name_ar' => ['required', 'string', 'unique:bimar_currencies','max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'tr_currency_name_en' => ['required', 'string','unique:bimar_currencies', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'tr_currency_status' => 'required|in:0,1',
        ]);
    
        $validator->setAttributeNames($customNames);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
       
        $data = new Bimar_Currency;
        $data->tr_currency_code = $request->tr_currency_code;
        $data->tr_currency_name_ar = $request->tr_currency_name_ar;
        $data->tr_currency_name_en = $request->tr_currency_name_en;
        $data->tr_currency_desc = $request->tr_currency_desc;
        $data->tr_currency_status = $request->tr_currency_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Currency $Bimar_Currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Currency::findOrFail($id);
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
                'tr_currency_code' => 'code',
                'tr_currency_name_ar' => 'arabic name',
                'tr_currency_name_en' => 'english name',
                'tr_currency_status' => 'status',
            ];
        
            $validator = Validator::make($request->all(), [
                'tr_currency_code' => 'required|unique:bimar_currencies,tr_currency_code' . $id,
                'tr_currency_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'tr_currency_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'tr_currency_status' => 'required|in:0,1',
            ]);
   
            $validator->setAttributeNames($customNames);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
      
            $data = Bimar_Currency::findOrFail($id);
            $data->tr_currency_code = $request->tr_currency_code;
            $data->tr_currency_name_ar = $request->tr_currency_name_ar;
            $data->tr_currency_name_en = $request->tr_currency_name_en;
            $data->tr_currency_desc = $request->tr_currency_desc;
            $data->tr_currency_status = $request->tr_currency_status;
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
    public function destroy(Bimar_Currency $Bimar_Currency)
    {
        //
    }

    public function updateSwitch($currencyId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $currency = Bimar_Currency::find($currencyId);
        if($currency){
            if($currency->tr_currency_status){
                $currency->tr_currency_status =0;
            }
            else{
                $currency->tr_currency_status =1;
            }
            $currency->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }

}
