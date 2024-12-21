<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BimarCourseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (Auth::guard('trainer')->check()) {
            $data =Bimar_Course_Session::where('bimar_enrol_class_id',$id)->get();
            return view('admin.addsession', compact('id','data'));
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
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $request->validate([
                'bimar_enrol_class_id' => 'required',
                'tr_course_session_desc' => 'required',
                'tr_course_session_date' => 'required',
              ]);

             $num = 
            $all = Bimar_Course_Session::all();
            foreach($all as $sessions)
            {
                if($sessions->bimar_enrol_class_id ==$request->bimar_enrol_class_id
                   && $sessions->tr_course_session_desc ==$request->tr_course_session_desc
                   && $sessions->tr_course_session_date == $request->tr_course_session_date )
                   {
                    return redirect()->back()->with('message',' لا يمكن اضافة نفس المعلومات المضافة مسبقاً');
                   }
            }
            $data = new Bimar_Course_Session;
            $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
            $data->tr_course_session_desc = $request->tr_course_session_desc;
            $data->tr_course_session_date = $request->tr_course_session_date;
            $data->tr_course_session_arrangement = $num;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Course_Session $bimar_Course_Session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_Session $bimar_Course_Session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_Session $bimar_Course_Session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Bimar_Course_Session::findOrFail($id)->delete();
        return redirect()->back();
    }
}
