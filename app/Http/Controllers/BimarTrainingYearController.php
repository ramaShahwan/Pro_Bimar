<?php

namespace App\Http\Controllers;
use App\Models\Bimar_Training_Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BimarTrainingYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
         $data = Bimar_Training_Year::all();
         return view('admin.year',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addyear');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {

        $customNames = [
            'tr_year_name' => 'name',
            'tr_year' => 'year',
            'tr_year_start_date' => 'start date ',
            'tr_year_end_date' => ' end date',
            'tr_year_status' => 'status',
        ];

        $validator = Validator::make($request->all(), [
            'tr_year_name' => 'required|unique:bimar_training_years',
            'tr_year' => 'required|unique:bimar_training_years',
            'tr_year_start_date' => 'required',
            'tr_year_end_date' => 'required',
            'tr_year_status' => 'required|in:0,1',
        ]);

        $validator->setAttributeNames($customNames);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'errors' => $errors,
                'message' => 'There are validation errors.'
            ], 422); // لا حاجة لإعادة توجيه المستخدم
        }

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $data = new Bimar_Training_Year;
        $data->tr_year_name = $request->tr_year_name;
        $data->tr_year = $request->tr_year;
        $data->tr_year_start_date = $request->tr_year_start_date;
        $data->tr_year_end_date = $request->tr_year_end_date;
        $data->tr_year_status = $request->tr_year_status;
        $data->tr_year_desc = $request->tr_year_desc;
        $data->save();

        // return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    } else {
        return redirect()->route('home');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Year $bimar_Training_Year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Year::findOrFail($id);
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
                'tr_year_name' => 'name',
                'tr_year' => 'year',
                'tr_year_start_date' => 'start date',
                'tr_year_end_date' => 'end date',
                'tr_year_status' => 'status',
            ];

            $data = Bimar_Training_Year::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'tr_year_name' => 'required|unique:bimar_training_years,tr_year_name,' . $id,
                'tr_year' => 'required|unique:bimar_training_years,tr_year,' . $id . ',id',
                'tr_year_start_date' => 'required|date',
                'tr_year_end_date' => 'required|date',
                'tr_year_status' => 'required|in:0,1',
            ]);
            $validator->setAttributeNames($customNames);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $data->tr_year_name = $request->tr_year_name;
            $data->tr_year = $request->tr_year;
            $data->tr_year_start_date = $request->tr_year_start_date;
            $data->tr_year_end_date = $request->tr_year_end_date;
            $data->tr_year_status = $request->tr_year_status;
            $data->tr_year_desc = $request->tr_year_desc;
            $data->save();

            return response()->json(['message' => 'تم التحديث بنجاح'], 200);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التعديل: ' . $e->getMessage());
        }
    } else {
        return redirect()->route('home');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Year $bimar_Training_Year)
    {
        //
    }
    public function updateSwitchStatus(Request $request, $id)
    {
          if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Year::find($id);

        if ($data) {
            // تحديث حالة "tr_year_status" بناءً على القيمة المرسلة
            $data->tr_year_status = $request->input('tr_year_status');
            $data->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }else{
        return redirect()->route('home');
    }
    }

    public function updateSwitch($yearId)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $year = Bimar_Training_Year::find($yearId);
        if($year){
            if($year->tr_year_status){
                $year->tr_year_status =0;
            }
            else{
                $year->tr_year_status =1;
            }
            $year->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }

}
