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
            $bank_ids = Bimar_Questions_Bank::where('tr_bank_parent_id', 1)
            ->where('tr_bank_status',1)
            ->pluck('id')
            ->toArray();

            $datas = Bimar_Questions_Bank::where('tr_bank_parent_id',1)
            ->where('tr_bank_status',1)
            ->get();
           
        $progs = [];

        foreach ($datas as $data) {

            $prog = Bimar_Training_Program::where('id', $data->bimar_training_program_id)
                ->where('tr_program_status', 1)
                ->first();

            if ($prog) {
                $progs[] = $prog;
            }
        }
            return view('admin.prog_questions_bank',compact('progs','bank_ids'));
        }else{
            return redirect()->route('home');
        }
     }
 
     public function get_courses_for_prog($prog_id)
     {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {

            $datas = Bimar_Questions_Bank::where('tr_bank_parent_id', '!=', 1)
            ->where('bimar_training_program_id',$prog_id)
            ->where('tr_bank_status', 1)
            ->get();

           
        $courses = [];

        foreach ($datas as $data) {

            $course = Bimar_Training_Course::where('id', $data->bimar_training_course_id)
            ->where('bimar_training_program_id',$prog_id)
                ->where('tr_course_status', 1)
                ->first();

            if ($course) {
                $courses[] = $course;
            }
        }
            return view('admin.course_questions_bank',compact('courses'));
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
