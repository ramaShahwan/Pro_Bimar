<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Questions_Bank;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
class BimarTrainingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Course::all();
        $programs = Bimar_Training_Program::where('tr_program_status','1')->get();
        return view('admin.courses',compact('data','programs'));
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        return view('admin.addcourse');
    }else{
        return redirect()->route('home');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        // Validate input fields
        $customNames = [
            'tr_course_code' => 'code',
            'tr_course_name_en' => 'english name',
            'tr_course_name_ar' => 'arabic name',
            'bimar_training_program_id' => 'program',
            'tr_is_diploma' => 'diploma',
        ];

        $validator = Validator::make($request->all(), [
            'tr_course_code' => 'required|regex:/^[a-zA-Z\s]+$/|unique:bimar_training_courses',
            'tr_course_name_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
             'tr_course_name_ar' =>  ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
            'bimar_training_program_id' => 'required',
            'tr_is_diploma' => 'required',
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


        // Create and save new course data
        $data = new Bimar_Training_Course();
        $data->tr_course_code = $request->tr_course_code;
        $data->tr_course_name_en = $request->tr_course_name_en;
        $data->tr_course_name_ar = $request->tr_course_name_ar;
        $data->bimar_training_program_id = $request->bimar_training_program_id;
        $data->tr_course_desc = $request->tr_course_desc;
        $data->tr_course_status = $request->tr_course_status;
        $data->tr_is_diploma = $request->tr_is_diploma;
        $data->save(); // Save the record first to get the ID

        // Store the uploaded image if present
        if ($request->hasFile('tr_course_img')) {
            $newImage = $request->file('tr_course_img');
            $newImageName = 'image_' . $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/course/'), $newImageName);
            $data->tr_course_img = $newImageName;
            $data->update(); // Update after assigning the image name
        }

          $path = Bimar_Questions_Bank::where('bimar_training_program_id', $data->bimar_training_program_id)
          ->value('tr_bank_path');

          $ques_id = Bimar_Questions_Bank::where('bimar_training_program_id',$data->bimar_training_program_id)
          ->value('id');

    Bimar_Questions_Bank::create([
        'bimar_training_program_id' => $data->bimar_training_program_id,
        'bimar_training_course_id' =>$data->id,
        'tr_bank_name' =>$data->tr_course_code,
        'tr_bank_path' => $path . ($data->tr_course_code),

        'tr_bank_parent_id' => $ques_id,
        'tr_bank_desc'=>$data->tr_course_code.' Questions Banks',
        'tr_bank_status' => 1,
        'tr_bank_create_date'=>now(),
    ]);

    return response()->json(['message' => 'تم الاضافة بنجاح'], 200);
    }else{
        return redirect()->route('home');
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Course $bimar_Training_Course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {    if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $data = Bimar_Training_Course::find($id);
        $programs = Bimar_Training_Program::where('tr_program_status','1')->get();
        // return view('admin.updatecourse', compact('data','programs'));
        return response()->json($data);
        // if (!$course) {
        //     return response()->json(['error' => 'Course not found'], 404);
        // }

        // return response()->json($course);
    }else{
        return redirect()->route('home');
    }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
            // Validate incoming data
            try {
                $customNames = [
                    'tr_course_code' => 'code',
                    'tr_course_name_en' => 'english name',
                    'tr_course_name_ar' => 'arabic name',
                    'tr_is_diploma' => 'diploma',
                ];

                $validator = Validator::make($request->all(), [
                    'tr_course_code' => 'required|regex:/^[a-zA-Z\s]+$/|unique:bimar_training_courses,tr_course_code,' . $id,
                    'tr_course_name_en' =>['required', 'string', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
                    'tr_course_name_ar' =>  ['required', 'string', 'max:100', 'regex:/^[\p{Arabic}\s]+$/u'],
                    'tr_is_diploma' => 'required',
                ]);

                

                $validator->setAttributeNames($customNames);
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }


            // Retrieve the current course to verify its existence
            $course = Bimar_Training_Course::findOrFail($id);
            $oldImageName = $course->tr_course_img;

            // Update course data
            $course->tr_course_code = $request->tr_course_code;
            $course->tr_course_name_en = $request->tr_course_name_en;
            $course->tr_course_name_ar = $request->tr_course_name_ar;
            // $course->bimar_training_program_id = $request->bimar_training_program_id;
            $course->tr_course_desc = $request->tr_course_desc;

            // $course->tr_is_diploma = $request->tr_is_diploma;
            $course->tr_is_diploma = $request->input('tr_is_diploma');
            // Handle image upload if a new image is provided
            if ($request->hasFile('tr_course_img')) {
                // Delete the old image if it exists
                if ($oldImageName) {
                    File::delete(public_path('img/course/') . $oldImageName);
                }

                // Upload the new image
                $newImage = $request->file('tr_course_img');
                $newImageName = 'image_' . $course->id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/course/'), $newImageName);

                // Update the image name in the course
                $course->tr_course_img = $newImageName;
            }

            // Save changes to the database
            $course->save();

            $path = Bimar_Questions_Bank::where('bimar_training_program_id', $course->bimar_training_program_id)
            ->value('tr_bank_path');

            $ques_id = Bimar_Questions_Bank::where('bimar_training_program_id',$course->bimar_training_program_id)
            ->value('id');

            $ques = Bimar_Questions_Bank::where('bimar_training_program_id',$id)->first();

            if($ques)
            {
               $ques->bimar_training_program_id = $course->bimar_training_program_id;
               $ques->tr_bank_name = $course->tr_course_code;
               $ques->tr_bank_parent_id =$ques_id;
               $ques->tr_bank_desc = $course->tr_course_code.' Questions Banks';
               $ques->tr_bank_path = $path . ($course->tr_course_code);
               $ques->save();
            }

            // return redirect()->route('courses')->with(['message'=>'تم التعديل']);
                return response()->json(['message' => 'تم التعديل بنجاح'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        }else{
            return redirect()->route('home');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Course $bimar_Training_Course)
    {
        //
    }

    public function updatSwitch($courseId)
    {   if (Auth::guard('administrator')->check() || Auth::guard('operation_user')->check() || Auth::guard('trainer')->check()) {
        $course = Bimar_Training_Course::find($courseId);
        if($course){
            if($course->tr_course_status){
                $course->tr_course_status =0;
            }
            else{
                $course->tr_course_status =1;
            }
            $course->save();
        }
        return back();
    }else{
        return redirect()->route('home');
    }
    }
}
