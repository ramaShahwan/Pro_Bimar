<?php

namespace App\Http\Controllers;

use App\Models\bimar_enrollment_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarEnrollmentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = bimar_enrollment_payment::where('tr_enrol_pay_canceled',0)->get();
            return view('admin.bill',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = bimar_enrollment_payment::where('id',$id)->first();
    
            return view('admin.showbill',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bimar_enrollment_payment $bimar_enrollment_payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bimar_enrollment_payment $bimar_enrollment_payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bimar_enrollment_payment $bimar_enrollment_payment)
    {
        //
    }
}
