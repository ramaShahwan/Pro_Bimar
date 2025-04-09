<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Sessions_Content;
use App\Models\Bimar_Course_Session;
use Illuminate\Support\Facades\Validator;

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
        $customNames = [
            'bimar_course_session_id' => 'session ',
            'tr_course_session_content_desc' => 'description',
            'file' => 'file', // 20MB كحد أقصى
        ];

        $validator = Validator::make($request->all(), [
            'bimar_course_session_id' => 'required|exists:bimar_course_sessions,id',
            'tr_course_session_content_desc' => 'required|string',
            'file' => 'required|file|mimes:pdf,pptx,docx,mp4,jpg,png|max:20480', // 20MB كحد أقصى
        ]);

        $validator->setAttributeNames($customNames);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $session = Bimar_Course_Session::findOrFail($request->bimar_course_session_id);
        $sessionName = str_replace(' ', '_', $session->tr_course_session_desc); // تحويل الفراغات إلى "_" لتجنب الأخطاء في المسار


        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // إنشاء اسم الملف مع امتداده الأصلي
            $fileName = time() . '_' . $file->getClientOriginalName();

            // تحديد المسار الجديد داخل مجلد `public/uploads/general_contents/اسم_الدورة`
            $destinationPath = public_path("uploads/session_contents/{$sessionName}");

            // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا يتم إنشاؤه
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }

            // نقل الملف إلى المسار الجديد
            $file->move($destinationPath, $fileName);

            // حفظ المسار في قاعدة البيانات بدون "public/"
            $path = "uploads/session_contents/{$sessionName}/" . $fileName;
        }

        Bimar_Course_Sessions_Content::create([
            'bimar_course_session_id' => $request->bimar_course_session_id,
            'tr_course_session_content_desc' => $request->tr_course_session_content_desc,
            'tr_course_session_content_path' => $path ?? null,
        ]);

        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);


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
    $file = Bimar_Course_Sessions_Content::findOrFail($id);

    if ($file->tr_course_session_content_path) {
        $filePath = public_path($file->tr_course_session_content_path); // تحديد المسار الفعلي

        if (File::exists($filePath)) { // التحقق من وجود الملف
            File::delete($filePath); // حذف الملف
        }
    }

    $file->delete(); // حذف السجل من قاعدة البيانات

    return redirect()->back()->with('message', 'تم الحذف بنجاح');
}
}
