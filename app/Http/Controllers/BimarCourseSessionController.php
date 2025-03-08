<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BimarCourseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = Auth::guard('administrator')->user()
        ?? Auth::guard('operation_user')->user()
        ?? Auth::guard('trainer')->user();


    $role = $user->bimar_role_id;

    if ($role == 3) {
        $data =Bimar_Course_Session::where('bimar_enrol_class_id',$id)->get();
        return view('trainer.addcourse_sessions', compact('id','data'));
    }
    else{
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
        $customNames = [
            'bimar_enrol_class_id' => 'class ',
            'tr_course_session_desc' => 'description ',
            'tr_course_session_date' => 'date',
        ];

        $validator = Validator::make($request->all(), [
           'bimar_enrol_class_id' => 'required',
                'tr_course_session_desc' => 'required',
                'tr_course_session_date' => 'required',
        ]);

        $validator->setAttributeNames($customNames);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


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

            $num = 1;
            foreach ($all as $sess) {
                if ($sess->bimar_enrol_class_id == $request->bimar_enrol_class_id) {
                    $num++;
                }
            }

            $data = new Bimar_Course_Session;
            $data->bimar_enrol_class_id = $request->bimar_enrol_class_id;
            $data->tr_course_session_desc = $request->tr_course_session_desc;
            $data->tr_course_session_date = $request->tr_course_session_date;
            $data->tr_course_session_arrangement = $num;
            $data->save();

         return redirect()->back()->with('message','تم الإضافة');
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
