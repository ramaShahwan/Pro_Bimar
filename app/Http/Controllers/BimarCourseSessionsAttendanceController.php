<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Sessions_attendance;
use App\Models\Bimar_Course_Session;
use App\Models\Bimar_Enrol_Classes_Trainee;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class BimarCourseSessionsAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($id)
    {
        $data =Bimar_Course_Sessions_attendance::where('bimar_course_session_id',$id)->get();
        return view('trainer.student', compact('id','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id = intval($id);
        $class_id =Bimar_Course_Session::where('id',$id)->pluck('bimar_enrol_class_id')->first();


        $data =Bimar_Enrol_Classes_Trainee::where('bimar_enrol_class_id',$class_id)->get();
        // dd($data );
        return view('trainer.course_sessions_attendance', compact('data','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customNames = [
        'bimar_course_session_id' => 'session ',
        'bimar_trainee_ids' => 'trainees', 
    ];

    $validator = Validator::make($request->all(), [
        'bimar_course_session_id' => 'required',
        'bimar_trainee_ids' => 'required|array', 
    ]);

    $validator->setAttributeNames($customNames);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }


        $existingAttendances = Bimar_Course_Sessions_attendance::where('bimar_course_session_id', $request->bimar_course_session_id)
            ->whereIn('bimar_trainee_id', $request->bimar_trainee_ids)
            ->pluck('bimar_trainee_id')
            ->toArray();

            $id = $request->bimar_course_session_id;

        $newAttendances = array_diff($request->bimar_trainee_ids, $existingAttendances);
        if (empty($newAttendances)) {
            return redirect()->route('attendance.index', ['id' => $id])->with('message', 'لا يمكن إضافة نفس المعلومات المضافة مسبقاً.');
        }

        foreach ($newAttendances as $traineeId) {
            Bimar_Course_Sessions_attendance::create([
                'bimar_course_session_id' => $request->bimar_course_session_id,
                'bimar_trainee_id' => $traineeId,
            ]);
        }
        return redirect()->route('attendance.index', ['id' => $id])->with('message', 'تمت الإضافة بنجاح.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Bimar_Course_Sessions_attendance $bimar_Course_Sessions_attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_Sessions_attendance $bimar_Course_Sessions_attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_Sessions_attendance $bimar_Course_Sessions_attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Bimar_Course_Sessions_attendance::findOrFail($id)->delete();
        return redirect()->back();
    }
}
