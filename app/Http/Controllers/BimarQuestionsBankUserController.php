<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Questions_Bank_User;
use App\Models\Bimar_Questions_Bank;
use App\Models\Bimar_Roles;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BimarQuestionsBankUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function get_prog_trainer()
     {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

    $datas = Bimar_Questions_Bank_User::where('bimar_user_id', $user->id)->get();

    $progs = [];
    foreach ($datas as $data) {
        $prog = Bimar_Questions_Bank::where('id', $data->bimar_questions_bank_id)
            ->where('tr_bank_parent_id','=', 1)
            ->where('tr_bank_status', 1)
            ->first();
        if ($prog) {
            $progs[] = $prog;
        }
    }
    $root_name = Bimar_Questions_Bank::where('tr_bank_parent_id',0)
    ->value('tr_bank_name');
    return view('trainer.bankprogram', compact('progs','root_name'));
     }

     public function get_course_trainer($id_prog)
     {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();

    $datas = Bimar_Questions_Bank_User::where('bimar_user_id', $user->id)->get();

    $courses = [];
    foreach ($datas as $data) {
        $course = Bimar_Questions_Bank::where('id', $data->bimar_questions_bank_id)
            ->where('tr_bank_parent_id','!=', 1)
            ->where('tr_bank_parent_id',$id_prog)
            ->where('tr_bank_status', 1)
            ->first();

        if ($course) {
            $courses[] = $course;
        }
    }

    $root_name = Bimar_Questions_Bank::where('id',$id_prog)
    ->value('tr_bank_name');
    return view('trainer.bankcourses', compact('courses','root_name'));
     }

    public function index()
    {
        //
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
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {
            $validated = $request->validate([
                'bimar_questions_bank_id' => 'required',
                'bimar_user_id' => 'required',
              ]);

            $data = new Bimar_Questions_Bank_User;
            $data->bimar_questions_bank_id = $request->bimar_questions_bank_id;
            $data->bimar_user_id = $request->bimar_user_id;
            $data->tr_questions_user_read = $request->tr_questions_user_read;
            $data->tr_questions_user_update = $request->tr_questions_user_update;
            $data->tr_questions_user_add = $request->tr_questions_user_add;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */

    public function show_trainers_prog($id_prog)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check())
        {
        $trainers = Bimar_Questions_Bank_User::where('bimar_questions_bank_id',$id_prog)
        ->get();


        $roles = Bimar_Roles::where('tr_role_status',1)
        ->get();

        return view('bank.banktrainer',compact('trainers','id_prog','roles'));
    }else{
        return redirect()->route('home');
    }
    }

    public function show_trainers_course($id_course)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check())
        {
        $trainers = Bimar_Questions_Bank_User::where('bimar_questions_bank_id',$id_course)
        ->get();

        $roles = Bimar_Roles::where('tr_role_status',1)
        ->get();

        return view('bank.coursesbanktrainer',compact('trainers','id_course','roles'));
    }else{
        return redirect()->route('home');
    }
    }

    public function get_users(Request $request)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $roleId = $request->input('bimar_role_id');

            if (!$roleId) {
                return response()->json([], 400); // إذا لم يتم إرسال الدور
            }

            // جلب المستخدمين المرتبطين بالدور
            $users = DB::table('bimar_users')
                ->where('bimar_role_id', $roleId)
                ->where('bimar_users_status_id', '1') // فقط المستخدمين النشطين
                ->get(['id', 'tr_user_fname_ar', 'tr_user_lname_ar']);

            return response()->json($users);
        } else {
            return redirect()->route('home');
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $data = Bimar_Questions_Bank_User::findOrFail($id);
            return view('bank.updatebanktrainer',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() ) {

            $data = Bimar_Questions_Bank_User::findOrFail($id);
            $data->tr_questions_user_read = $request->tr_questions_user_read;
            $data->tr_questions_user_update = $request->tr_questions_user_update;
            $data->tr_questions_user_add = $request->tr_questions_user_add;
            $data->update();

            return redirect()->back()->with('message','تم التعديل');
              }else{
        return redirect()->route('home');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Bimar_Questions_Bank_User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
