<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Roles;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'tr_role_code' => 'required|unique:bimar_roles',
            'tr_role_name_en' => 'required|unique:bimar_roles',
            'tr_role_name_ar' => 'required|unique:bimar_roles',
            'tr_role_status' => 'required|in:0,1',
          ]);

        $data = new Bimar_Roles;
        $data->tr_role_code = $request->tr_role_code;
        $data->tr_role_name_en = $request->tr_role_name_en;
        $data->tr_role_name_ar = $request->tr_role_name_ar;
        $data->tr_role_desc = $request->tr_role_desc;
        $data->tr_role_status = $request->tr_role_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
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
            $validated = $request->validate([
                'tr_role_code' => 'required',
            'tr_role_name_en' => 'required',
            'tr_role_name_ar' => 'required',
            'tr_role_status' => 'required|in:0,1',
            ]);

            $data = Bimar_Roles::findOrFail($id);
            $data->tr_role_code = $request->tr_role_code;
            $data->tr_role_name_en = $request->tr_role_name_en;
            $data->tr_role_name_ar = $request->tr_role_name_ar;
            $data->tr_role_desc = $request->tr_role_desc;
            $data->tr_role_status = $request->tr_role_status;
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
