<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Questions_Bank;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Training_Course;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarQuestionsBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function get_programs()
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $progs = Bimar_Questions_Bank::where('tr_bank_parent_id', 1)
            ->get();
           
            $root_name = Bimar_Questions_Bank::where('tr_bank_parent_id',0)
            ->value('tr_bank_name');

            return view('admin.prog_questions_bank',compact('progs','root_name'));
        }else{
            return redirect()->route('home');
        }
     }
 
     public function get_courses_for_prog($prog_id)
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {

            $courses = Bimar_Questions_Bank::where('tr_bank_parent_id',$prog_id)->get();
            $root_name = Bimar_Questions_Bank::where('id',$prog_id)
            ->value('tr_bank_name');

            return view('admin.course_questions_bank',compact('courses','root_name'));
        }else{
            return redirect()->route('home');
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Questions_Bank $bimar_Questions_Bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Questions_Bank $bimar_Questions_Bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Questions_Bank $bimar_Questions_Bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Questions_Bank $bimar_Questions_Bank)
    {
        //
    }
}
