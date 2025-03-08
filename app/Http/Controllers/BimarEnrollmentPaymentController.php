<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Enrollment_Payment;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Bank;
use App\Models\Bimar_Payment_Status;
use App\Models\Bimar_Trainee;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BimarEnrollmentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrollment_Payment::where('tr_enrol_pay_canceled','0')->get();
            $banks = Bimar_Bank::where('tr_bank_status','1')->get();
            $statuses = Bimar_Payment_Status::where('tr_pay_status','1')->get();

            return view('admin.bill',compact('data','banks','statuses'));
        }else{
            return redirect()->route('home');
        }
    }

public function saerch_b()
{

    $banks = Bimar_Bank::where('tr_bank_status', '1')->get();
    $statuses = Bimar_Payment_Status::where('tr_pay_status', '1')->get();

    return view('admin.search',compact('banks','statuses'));
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
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrollment_Payment::where('id',$id)->first();
            $discount_userid = Bimar_User::where('id',$data->tr_enrol_pay_discount_userid)->first();
            $deactivate_userid = Bimar_User::where('id',$data->tr_enrol_pay_deactivate_userid)->first();

            return view('admin.showbill',compact('data','discount_userid','deactivate_userid'));
        }else{
            return redirect()->route('home');
        }
    }
    public function show_bill($id)
{
    $data = Bimar_Enrollment_Payment::find($id);
    return response()->json($data);
}
public function details_active($id)
{
    $data = Bimar_Enrollment_Payment::find($id);
    $banks = Bimar_Bank::where('tr_bank_status', '1')->get();
    $statuses = Bimar_Payment_Status::where('tr_pay_status', '1')->get();


    Log::info('Banks:', $banks->toArray());
    Log::info('Statuses:', $statuses->toArray());

    return response()->json([
        'data' => $data,
        'banks' => $banks,
        'statuses' => $statuses
    ]);

    // try {
    //     $banksArray = $banks ? $banks->toArray() : [];
    //     $statusesArray = $statuses ? $statuses->toArray() : [];

    //     return response()->json([
    //         'data' => $data,
    //         'banks' => $banksArray,
    //         'statuses' => $statusesArray
    //     ]);
    // } catch (\Exception $e) {
    //     return response()->json([
    //         'error' => 'An error occurred: ' . $e->getMessage()
    //     ], 500);
    // }

}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Enrollment_Payment $Bimar_Enrollment_Payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function add_discount(Request $request, $id)
    {
        try {
            if (!Auth::guard('administrator')->check() && !Auth::guard('operation_user')->check()) {
                return response()->json(['success' => false, 'message' => 'غير مصرح'], 403);
            }

            $data = Bimar_Enrollment_Payment::find($id);

            if (!$data) {
                return response()->json(['success' => false, 'message' => 'السجل غير موجود'], 404);
            }

            if ($data->bimar_payment_status_id != 1) {
                return response()->json(['success' => false, 'message' => 'لا يمكن إضافة حسم لهذا السجل']);
            }

            $old_price = $data->tr_enrol_pay_net_price;
            $new_discount = $request->input('tr_enrol_pay_discount', 0);
            $admin= Auth::guard('administrator')->user();
            $operation= Auth::guard('operation_user')->user();

            $data->tr_enrol_pay_discount = $new_discount;
            $data->tr_enrol_pay_discount_desc = $request->input('tr_enrol_pay_discount_desc', '');
            $data->tr_enrol_pay_discount_date = now();
            $data->tr_enrol_pay_net_price = $old_price - (($old_price * $new_discount) / 100);

            if($operation)
            {
                $data->tr_enrol_pay_discount_userid=$operation->id;
            }
           else if($admin)

            if($admin)
            {
                $data->tr_enrol_pay_discount_userid=$admin->id;
            }
            $data->save();

            return response()->json(['success' => true, 'message' => 'تم حفظ الحسم بنجاح']);
        } catch (\Exception $e) {
            // تسجيل الخطأ
            Log::error('خطأ أثناء حفظ الحسم: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'حدث خطأ داخلي'], 500);
        }
    }




    public function active_bill(Request $request, $id)
{
    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
        $data = Bimar_Enrollment_Payment::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'تعذر العثور على البيانات.'
            ]);
        }

        if ($data->bimar_payment_status_id == 1 || $data->bimar_payment_status_id == 3) {
            $admin = Auth::guard('administrator')->user();
            $operation = Auth::guard('operation_user')->user();

            $data->bimar_payment_status_id = 2;
            $data->tr_enrol_pay_desc = $request->tr_enrol_pay_desc;
            $data->bimar_bank_id = $request->bimar_bank_id;
            $data->tr_enrol_pay_date = now();

            if ($admin) {
                $data->bimar_user_id = $admin->id;
            } else if ($operation) {
                $data->bimar_user_id = $operation->id;
            }
            $data->save();

            $numOfCource = Bimar_Course_Enrollment::find($data->bimar_course_enrollment_id);

            if ($numOfCource) {
                $profile = new Bimar_Training_Profile;
                $profile->bimar_course_enrollment_id = $numOfCource->id;
                $profile->bimar_enrollment_payment_id = $data->id;
                $profile->bimar_trainee_id = $data->bimar_trainee_id;
                $profile->tr_profile_oral = 0;
                $profile->tr_profile_final = 0;
                $profile->tr_profile_total_mark = 0;
                $profile->bimar_training_profile_status_id = 1;
                $profile->tr_profile_date = now();
                $profile->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'تم تفعيل الوصل بنجاح.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'حالة الوصل غير صالحة للتفعيل.'
            ]);
        }
    } else {
        return response()->json([
            'success' => false,
            'message' => 'غير مصرح لك بتنفيذ هذا الإجراء.'
        ]);
    }
}
public function deactivate($id)
{
    $data = Bimar_Enrollment_Payment::find($id);

    if (!$data) {
        return response()->json(['message' => 'السجل غير موجود'], 404);
    }

    return response()->json($data);
}

public function deactivate_bill(Request $request, $id)
{
    try {
        $customNames = [
            'tr_enrol_pay_deactivate_desc' => 'description',
        ];
    
        $validator = Validator::make($request->all(), [
            'tr_enrol_pay_deactivate_desc' => 'description',
        ]);
        $validator->setAttributeNames($customNames);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = Bimar_Enrollment_Payment::find($id);

        if (!$data) {
            return response()->json(['message' => 'السجل غير موجود'], 404);
        }

        $admin= Auth::guard('administrator')->user();
        $operation= Auth::guard('operation_user')->user();

        if ($data->bimar_payment_status_id == 2 || $data->bimar_payment_status_id == 3) {
            $data->bimar_payment_status_id = 4;
            $data->tr_enrol_pay_deactivate_desc = $request->tr_enrol_pay_deactivate_desc;
            $data->tr_enrol_pay_deactivate_date = now();
            if($operation)
            {
                $data->tr_enrol_pay_deactivate_userid=$operation->id;
            }
           else if($admin)

            if($admin)
            {
                $data->tr_enrol_pay_deactivate_userid=$admin->id;
            }
            $data->save();

            $profile = Bimar_Training_Profile::where('bimar_enrollment_payment_id',$data->id)->first();

            //edit record in bimar_training_profile table
           $profile->bimar_training_profile_status_id = 4;
           $profile->save();

            return response()->json(['success' => true, 'message' => 'تم الغاء التسجيل بنجاح']);
        }

        return response()->json(['message' => 'الحالة غير مناسبة لإلغاء التسجيل'], 400);

    } catch (\Exception $e) {
        Log::error('خطأ في إلغاء التسجيل: ' . $e->getMessage());
        return response()->json(['message' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()], 500);
    }
}
public function search_bill(Request $request)
{
    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
        $searchTerm = $request->input('search');
        $searchType = $request->input('type');

        if (!$searchTerm || !$searchType) {
            return response()->json([
                'status' => 'error',
                'message' => 'يرجى إدخال البيانات المطلوبة.'
            ], 400);
        }

        $query = Bimar_Enrollment_Payment::with([
            'bimar_trainee',
            'bimar_course_enrollment.bimar_training_course',
            'bimar_payment_status'
        ]);

        switch ($searchType) {
            case 'login': // البحث برقم الإيصال
                $query->where('id', 'like', '%' . $searchTerm . '%');
                break;

            case 'register': // البحث بالاسم
                $query->whereHas('bimar_trainee', function ($query) use ($searchTerm) {
                    $query->where('trainee_fname_ar', 'like', '%' . $searchTerm . '%')
                          ->orWhere('trainee_lname_ar', 'like', '%' . $searchTerm . '%');
                });
                break;

            case 'contact': // البحث برقم الهاتف
                $query->whereHas('bimar_trainee', function ($query) use ($searchTerm) {
                    $query->where('trainee_mobile', 'like', '%' . $searchTerm . '%');
                });
                break;

            default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'نوع البحث غير مدعوم.'
                ], 400);
        }

        $data = $query->get();

        if ($data->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'لا توجد نتائج مطابقة.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'غير مصرح لك بتنفيذ هذا الإجراء.'
    ], 403);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Enrollment_Payment::where('id', $id)->first();
            if (!$data) {
                return response()->json(['error' => 'البيانات غير موجودة'], 404);
            }

            if ($data->bimar_payment_status_id == 1) {
                $data->tr_enrol_pay_canceled = 1;
                $data->save();
            }

            return response()->json(['success' => true, 'message' => 'تم إلغاء التفعيل بنجاح']);
        } else {
            return redirect()->route('home');
        }
    }

}
