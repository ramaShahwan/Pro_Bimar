<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_General_Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimarCourseGeneralContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            $content =Bimar_Course_General_Content::where('bimar_training_course_id',$id)->get();
            return view('admin.addbookcourses', compact('id','content'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
            return view('admin.addbookcourses', compact('id'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bimar_training_course_id' => 'required|exists:bimar_training_courses,id',
            'tr_course_general_content_desc' => 'required|string',
            'file' => 'required|file|mimes:pdf,docx,mp4,jpg,png|max:20480', // 20MB كحد أقصى
        ]);
    
        // جلب اسم الدورة التدريبية
        $course = \App\Models\Bimar_Training_Course::findOrFail($request->bimar_training_course_id);
        $courseName = str_replace(' ', '_', $course->tr_course_name_en); // تحويل الفراغات إلى "_" لتجنب الأخطاء في المسار
    
        // رفع الملف
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            // تحديد المسار مع اسم الدورة التدريبية
            $path = $file->store("uploads/general_contents/{$courseName}", 'public'); // المسار: uploads/general_contents/اسم_الدورة
        }
    
        // حفظ البيانات في قاعدة البيانات
        \App\Models\Bimar_Course_General_Content::create([
            'bimar_training_course_id' => $request->bimar_training_course_id,
            'tr_course_general_content_desc' => $request->tr_course_general_content_desc,
            'tr_course_general_content_path' => $path ?? null,
            'tr_course_general_content_status' => 0, // الوضع الافتراضي
        ]);
    
        return redirect()->back()->with('message','تم الإضافة');
 
    }
    public function show($id)
    {
        $content = Bimar_Course_General_Content::findOrFail($id);

        return view('contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_General_Content $bimar_Course_General_Content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_General_Content $bimar_Course_General_Content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Bimar_Course_General_Content::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function updateSwitch($id)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check()) {
        $status = Bimar_Course_General_Content::find($id);
        if($status){
            if($status->tr_course_general_content_status){
                $status->tr_course_general_content_status =0;
            }
            else{
                $status->tr_course_general_content_status =1;
            }
            $status->save();
        }
        return back();
     }else{
        return redirect()->route('home');
     }
    }
}
