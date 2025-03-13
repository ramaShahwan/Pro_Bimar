<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_General_Content;
use App\Models\Bimar_Training_Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $customNames = [
            'tr_course_general_content_desc' => 'description',
            'bimar_training_course_id' => 'course',
            'file' => 'file',
            'tr_course_general_content_status' => 'status',
        ];

        $validator = Validator::make($request->all(), [
            'bimar_training_course_id' => 'required|exists:bimar_training_courses,id',
            'tr_course_general_content_desc' => 'required|string',
            'file' => 'required|file|mimes:pdf,pptx,docx,mp4,jpg,png|max:20480', // 20MB كحد أقصى
            'tr_course_general_content_status' =>'required',
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

        $course = Bimar_Training_Course::findOrFail($request->bimar_training_course_id);
        $courseName = str_replace(' ', '_', $course->tr_course_name_en); // تحويل الفراغات إلى "_" لتجنب الأخطاء في المسار

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // إنشاء اسم الملف مع امتداده الأصلي
            $fileName = time() . '_' . $file->getClientOriginalName();

            // تحديد المسار الجديد داخل مجلد `public/uploads/general_contents/اسم_الدورة`
            $destinationPath = public_path("uploads/general_contents/{$courseName}");

            // التأكد من أن المجلد موجود، وإذا لم يكن موجودًا يتم إنشاؤه
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }

            // نقل الملف إلى المسار الجديد
            $file->move($destinationPath, $fileName);

            // حفظ المسار في قاعدة البيانات بدون "public/"
            $path = "uploads/general_contents/{$courseName}/" . $fileName;
        }


        Bimar_Course_General_Content::create([
            'bimar_training_course_id' => $request->bimar_training_course_id,
            'tr_course_general_content_desc' => $request->tr_course_general_content_desc,
            'tr_course_general_content_path' => $path ?? null,
            'tr_course_general_content_status' => $request->tr_course_general_content_status,
        ]);

        return response()->json(['message' => 'تم الاضافة بنجاح'], 200);

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
    $file = Bimar_Course_General_Content::findOrFail($id);

    if ($file->tr_course_general_content_path) {
        $filePath = public_path($file->tr_course_general_content_path); // تحديد المسار الفعلي

        if (File::exists($filePath)) { // التحقق من وجود الملف
            File::delete($filePath); // حذف الملف
        }
    }

    $file->delete(); // حذف السجل من قاعدة البيانات

    return redirect()->back()->with('message', 'تم الحذف بنجاح');
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
