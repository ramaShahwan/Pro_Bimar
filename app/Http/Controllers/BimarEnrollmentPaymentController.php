<?php

namespace App\Http\Controllers;

use App\Models\bimar_enrollment_payment;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Bank;
use App\Models\Bimar_Payment_Status;
use App\Models\Bimar_Training_Profile;

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
            $data = bimar_enrollment_payment::where('tr_enrol_pay_canceled','0')->get();
            $banks = Bimar_Bank::where('tr_bank_status','1')->get();
            $statuses = Bimar_Payment_Status::where('tr_pay_status','1')->get();

            return view('admin.bill',compact('data','banks','statuses'));
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
    public function add_discount(Request $request, $id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = bimar_enrollment_payment::where('id',$id)->first();
              if($data->bimar_payment_status_id=1)
              {
                $old_price = $data->tr_enrol_pay_net_price;
                $new_descount =$request->tr_enrol_pay_discount_desc;
               $trainer= Auth::guard('trainer')->user();
               $admin= Auth::guard('administrator')->user();
               $operation= Auth::guard('operation_user')->user();

                $data->tr_enrol_pay_discount=$new_descount;
                $data->tr_enrol_pay_discount_desc=$request->tr_enrol_pay_discount_desc;
                $data->tr_enrol_pay_discount_date=now();
                $data->tr_enrol_pay_net_price=$old_price - (($old_price * $new_descount) / 100);
                if($trainer)
                {
                    $data->tr_enrol_pay_discount_userid=$trainer->id;
                }
               else if($admin)
                {
                    $data->tr_enrol_pay_discount_userid=$admin->id;
                }
                else if($operation)
                {
                    $data->tr_enrol_pay_discount_userid=$operation->id;
                }

                $data->save();
              }
            return view('admin.bill');
        }else{
            return redirect()->route('home');
        }
    }

    public function active_bill(Request $request,$id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = bimar_enrollment_payment::where('id',$id)->first();
              if($data->bimar_payment_status_id=1 ||$data->bimar_payment_status_id=3 )
              {
                $trainer= Auth::guard('trainer')->user();
                $admin= Auth::guard('administrator')->user();
                $operation= Auth::guard('operation_user')->user();
 

                $data->bimar_payment_status_id = $request->bimar_payment_status_id;
                $data->tr_enrol_pay_desc = $request->tr_enrol_pay_desc;
                $data->bimar_bank_id = $request->bimar_bank_id;
                $data->tr_enrol_pay_date = now();

                 if($trainer)
                {
                    $data->bimar_user_id=$trainer->id;
                }
               else if($admin)
                {
                    $data->bimar_user_id=$admin->id;
                }
                else if($operation)
                {
                    $data->bimar_user_id=$operation->id;
                }

                $data->save();


                $numOfCource = Bimar_Course_Enrollment::where('id',$data->bimar_course_enrollment_id)->first();
                   //new record in bimar_training_profile table
                  $profile = new Bimar_Training_Profile;
                  $profile->bimar_course_enrollment_id = $numOfCource;
                  $profile->bimar_enrollment_payment_id = $data->id;
                  $profile->bimar_trainee_id = $data->bimar_trainee_id;
                  $profile->tr_profile_oral = 0;
                  $profile->tr_profile_final = 0;
                  $profile->tr_profile_total_mark = 0;
                  $profile->bimar_training_profile_status_id = 1;
                  $profile->tr_profile_date = now();

                  $profile->save();

              }
            }else{
                return redirect()->route('home');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            $data = bimar_enrollment_payment::where('id',$id)->first();
              if($data->bimar_payment_status_id=1)
              {
                $data->tr_enrol_pay_canceled=1;
                $data->save();
              }
            return view('admin.bill');
        }else{
            return redirect()->route('home');
        }
    }
}
