<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Sessions_Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BimarCourseSessionsContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
            $content =Bimar_Course_Sessions_Content::where('bimar_course_session_id',$id)->get();
            return view('trainer.addcourse_sessions_content', compact('id','content'));

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
        $request->validate([
            'bimar_course_session_id' => 'required|exists:bimar_course_sessions,id',
            'tr_course_session_content_desc' => 'required|string',
            'file' => 'required|file|mimes:pdf,pptx,docx,mp4,jpg,png|max:20480', // 20MB كحد أقصى
        ]);

        // جلب اسم الدورة التدريبية
        $session = \App\Models\Bimar_Course_Session::findOrFail($request->bimar_course_session_id);
        $sessionName = str_replace(' ', '_', $session->tr_course_session_desc); // تحويل الفراغات إلى "_" لتجنب الأخطاء في المسار

        // رفع الملف
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // تحديد المسار مع اسم الدورة التدريبية
            $path = $file->store("uploads/session_contents/{$sessionName}", 'public'); // المسار: uploads/session_contents/اسم_الدورة
        }

        // حفظ البيانات في قاعدة البيانات
        \App\Models\Bimar_Course_Sessions_Content::create([
            'bimar_course_session_id' => $request->bimar_course_session_id,
            'tr_course_session_content_desc' => $request->tr_course_session_content_desc,
            'tr_course_session_content_path' => $path ?? null,
        ]);

        return redirect()->back()->with('message','تم الإضافة');


    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Course_Sessions_Content $bimar_Course_Sessions_Content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_Course_Sessions_Content $bimar_Course_Sessions_Content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_Course_Sessions_Content $bimar_Course_Sessions_Content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file=Bimar_Course_Sessions_Content::whereId($id)->first();
        $oldImageName =$file->tr_course_session_content_path;
        if ($oldImageName) {
            File::delete(public_path('storage/') . $oldImageName);
           }
           Bimar_Course_Sessions_Content::findOrFail($id)->delete();
        return redirect()->back();
    }
}
