<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BimarRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Roles::all();
         return view('admin.roles',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addrole');
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
            'tr_role_code' => 'code',
            'tr_role_name_en' => 'english name',
            'tr_role_name_ar' => 'arabic name',
            'tr_role_status' => 'status',
        ];

        $validator = Validator::make($request->all(), [
            'tr_role_code' => 'required|unique:bimar_roles',
            'tr_role_name_en' => ['required', 'string','unique:bimar_roles', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'tr_role_name_ar' => ['required', 'string','unique:bimar_roles', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'tr_role_status' => 'required|in:0,1',
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

        $data = new Bimar_Roles;
        $data->tr_role_code = $request->tr_role_code;
        $data->tr_role_name_en = $request->tr_role_name_en;
        $data->tr_role_name_ar = $request->tr_role_name_ar;
        $data->tr_role_desc = $request->tr_role_desc;
        $data->tr_role_status = $request->tr_role_status;
        $data->save();

        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Roles $bimar_Roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Roles::findOrFail($id);
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
                'tr_role_code' => 'code',
            'tr_role_name_en' => 'english name',
            'tr_role_name_ar' => 'arabic name',
            'tr_role_status' => 'status',
            ];

            $validator = Validator::make($request->all(), [
                'tr_role_code' => 'required',
                'tr_role_name_en' => ['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                'tr_role_name_ar' => ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                'tr_role_status' => 'required|in:0,1',
            ]);

            $validator->setAttributeNames($customNames);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $data = Bimar_Roles::findOrFail($id);
            $data->tr_role_code = $request->tr_role_code;
            $data->tr_role_name_en = $request->tr_role_name_en;
            $data->tr_role_name_ar = $request->tr_role_name_ar;
            $data->tr_role_desc = $request->tr_role_desc;
            // $data->tr_role_status = $request->tr_role_status;
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
    public function destroy(Bimar_Roles $bimar_Roles)
    {
        //
    }

    public function updateSwitch($roleId)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $role = Bimar_Roles::find($roleId);
        if($role){
            if($role->tr_role_status){
                $role->tr_role_status =0;
            }
            else{
                $role->tr_role_status =1;
            }
            $role->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
