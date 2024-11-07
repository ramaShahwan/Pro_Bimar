<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Payment_Status;
use Illuminate\Http\Request;

class BimarPaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Payment_Status::all();
        return view('admin.payment_status',compact('data'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addpayment_status');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $validated = $request->validate([
            'tr_pay_status_name_ar' => 'required|unique:bimar_payment_statuses',
            'tr_pay_status_name_en' => 'required|unique:bimar_payment_statuses',
            'tr_pay_status' => 'required|in:0,1',
          ]);


        $data = new Bimar_Payment_Status;
        $data->tr_pay_status_name_ar = $request->tr_pay_status_name_ar;
        $data->tr_pay_status_name_en = $request->tr_pay_status_name_en;
        $data->tr_pay_status_desc = $request->tr_pay_status_desc;
        $data->tr_pay_status = $request->tr_pay_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Payment_Status $Bimar_Payment_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Payment_Status::findOrFail($id);
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
            $validated = $request->validate([
                'tr_pay_status_name_ar' => 'required',
                'tr_pay_status_name_en' => 'required',
                'tr_pay_status' => 'required|in:0,1',
              ]);

            $data = Bimar_Payment_Status::findOrFail($id);
            $data->tr_pay_status_name_ar = $request->tr_pay_status_name_ar;
            $data->tr_pay_status_name_en = $request->tr_pay_status_name_en;
            $data->tr_pay_status_desc = $request->tr_pay_status_desc;
            $data->tr_pay_status = $request->tr_pay_status;
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
    public function destroy(Bimar_Payment_Status $Bimar_Payment_Status)
    {
        //
    }

    public function updateSwitch($paymentId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $payment = Bimar_Payment_Status::find($paymentId);
        if($payment){
            if($payment->tr_pay_status){
                $payment->tr_pay_status =0;
            }
            else{
                $payment->tr_pay_status =1;
            }
            $payment->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }
}
