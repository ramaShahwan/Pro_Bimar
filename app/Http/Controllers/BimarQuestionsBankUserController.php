<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Questions_Bank_User;
use App\Models\Bimar_User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BimarQuestionsBankUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function get_trainers()
     {
        $trainers = Bimar_User::where('bimar_role_id',3)
        ->where('bimar_users_status_id',1)
        ->get();

        return view('admin.trainer_questions_bank',compact('trainers'));
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
    public function show_trainers_prog( $id_prog)
    {
        $trainers = Bimar_Questions_Bank_User::where('bimar_questions_bank_id',$id_prog)
        ->get();


        $all_trainers = Bimar_User::where('bimar_role_id',3)
        ->where('bimar_users_status_id',1)
        ->get();

        return view('bank.banktrainer',compact('trainers','id_prog','all_trainers'));
    }

    public function show_trainers_course( $id_course)
    {
        $trainers = Bimar_Questions_Bank_User::where('bimar_questions_bank_id',$id_course)
        ->get();


        $all_trainers = Bimar_User::where('bimar_role_id',3)
        ->where('bimar_users_status_id',1)
        ->get();

        return view('bank.coursesbanktrainer',compact('trainers','id_course','all_trainers'));
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
