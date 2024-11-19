<?php

namespace App\Http\Controllers;

use App\Models\bimar_enrollment_payment;
use App\Models\Bimar_Course_Enrollment;
use App\Models\Bimar_Bank;
use App\Models\Bimar_Payment_Status;
use App\Models\Bimar_Trainee;
use App\Models\Bimar_Training_Profile;
use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BimarEnrollmentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = bimar_enrollment_payment::where('tr_enrol_pay_canceled','0')->get();
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
            $data = bimar_enrollment_payment::where('id',$id)->first();
            $discount_userid = Bimar_User::where('id',$data->tr_enrol_pay_discount_userid)->first();
            $deactivate_userid = Bimar_User::where('id',$data->tr_enrol_pay_deactivate_userid)->first();

            return view('admin.showbill',compact('data','discount_userid','deactivate_userid'));
        }else{
            return redirect()->route('home');
        }
    }
    public function show_bill($id)
{
    $data = bimar_enrollment_payment::find($id);
    return response()->json($data);
}
public function details_active($id)
{
    $data = bimar_enrollment_payment::find($id);
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
    public function edit(bimar_enrollment_payment $bimar_enrollment_payment)
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

            $data = bimar_enrollment_payment::find($id);

            if (!$data) {
                return response()->json(['success' => false, 'message' => 'السجل غير موجود'], 404);
            }

            if ($data->bimar_payment_status_id != 1) {
                return response()->json(['success' => false, 'message' => 'لا يمكن إضافة حسم لهذا السجل']);
            }

            $old_price = $data->tr_enrol_pay_net_price;
            $new_discount = $request->input('tr_enrol_pay_discount', 0);

            $data->tr_enrol_pay_discount = $new_discount;
            $data->tr_enrol_pay_discount_desc = $request->input('tr_enrol_pay_discount_desc', '');
            $data->tr_enrol_pay_discount_date = now();
            $data->tr_enrol_pay_net_price = $old_price - (($old_price * $new_discount) / 100);

            $data->tr_enrol_pay_discount_userid = Auth::id();
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
        $data = bimar_enrollment_payment::find($id);

        // التحقق من وجود البيانات
        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'تعذر العثور على البيانات.'
            ]);
        }

        // التحقق من حالة الوصل
        if ($data->bimar_payment_status_id == 1 || $data->bimar_payment_status_id == 3) {
            $admin = Auth::guard('administrator')->user();
            $operation = Auth::guard('operation_user')->user();

            // تحديث البيانات
            $data->bimar_payment_status_id = 2; // تغيير الحالة
            $data->tr_enrol_pay_desc = $request->tr_enrol_pay_desc;
            $data->bimar_bank_id = $request->bimar_bank_id;
            $data->tr_enrol_pay_date = now();

            // تحديد المستخدم
            if ($admin) {
                $data->bimar_user_id = $admin->id;
            } else if ($operation) {
                $data->bimar_user_id = $operation->id;
            }

            $data->save();

            // إضافة سجل جديد في جدول bimar_training_profile
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

            // إرجاع استجابة ناجحة
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
    // العثور على السجل
    $data = bimar_enrollment_payment::find($id);

    // التأكد من وجود السجل
    if (!$data) {
        // إرجاع استجابة خطأ (404)
        return response()->json(['message' => 'السجل غير موجود'], 404);
    }

    // إرجاع البيانات كـ JSON
    return response()->json($data);
}
public function deactivate_bill(Request $request, $id)
{
    try {
        // التحقق من البيانات المدخلة
        $request->validate([
            'tr_enrol_pay_deactivate_desc' => 'required|string|max:255',
        ]);

        // العثور على السجل
        $data = bimar_enrollment_payment::find($id);

        // التحقق من وجود السجل
        if (!$data) {
            return response()->json(['message' => 'السجل غير موجود'], 404);
        }

        // التحقق من حالة السجل
        if ($data->bimar_payment_status_id == 2 || $data->bimar_payment_status_id == 3) {
            // تحديث حالة الدفع إلى إلغاء
            $data->bimar_payment_status_id = 4;
            $data->tr_enrol_pay_deactivate_desc = $request->tr_enrol_pay_deactivate_desc;
            $data->tr_enrol_pay_deactivate_date = now();

            // حفظ التغييرات
            $data->save();

            // إرجاع استجابة نجاح
            return response()->json(['success' => true, 'message' => 'تم الغاء التسجيل بنجاح']);
        }

        // إرجاع استجابة بعدم صلاحية الحالة
        return response()->json(['message' => 'الحالة غير مناسبة لإلغاء التسجيل'], 400);

    } catch (\Exception $e) {
        // في حال وجود خطأ غير متوقع
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
            ], 400); // خطأ بسبب البيانات الناقصة
        }

        $query = bimar_enrollment_payment::with([
            'bimar_trainee',
            'bimar_course_enrollment.bimar_training_course',
            'bimar_payment_status'
        ]);

        // نوع البحث
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
            ], 404); // لا توجد نتائج
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'غير مصرح لك بتنفيذ هذا الإجراء.'
    ], 403); // خطأ في الصلاحيات
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = bimar_enrollment_payment::where('id', $id)->first();

            // تأكد من أن البيانات موجودة قبل القيام بأي عملية
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
