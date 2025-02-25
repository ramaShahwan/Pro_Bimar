<?php
use App\Http\Controllers\BimarTrainingYearController;
use App\Http\Controllers\BimarTrainingProgramController;
use App\Http\Controllers\BimarTrainingTypeController;
use App\Http\Controllers\BimarTrainingCourseController;
use App\Http\Controllers\BimarCourseEnrollmentController;
use App\Http\Controllers\BimarEnrollmentPaymentController;
use App\Http\Controllers\BimarUserController;
use App\Http\Controllers\BimarRolesController;
use App\Http\Controllers\BimarUserAcademicDegreeController;
use App\Http\Controllers\BimarUserGenderController;
use App\Http\Controllers\BimarUsersStatusController;
use App\Http\Controllers\BimarTraineeController;
use App\Http\Controllers\BimarCourseEnrolTrainerController;
use App\Http\Controllers\BimarBankController;
use App\Http\Controllers\BimarCurrencyController;
use App\Http\Controllers\BimarPaymentStatusController;
use App\Http\Controllers\BimarTrainingProfileStatusController;
use App\Http\Controllers\BimarCourseEnrolTimeController;
use App\Http\Controllers\BimarClassStatusController;
use App\Http\Controllers\BimarEnrolClassController;
use App\Http\Controllers\BimarEnrolClassesTraineeController;
use App\Http\Controllers\BimarEnrolClassesTrainerController;
use App\Http\Controllers\BimarCourseGeneralContentController;
use App\Http\Controllers\BimarCourseSessionController;
use App\Http\Controllers\BimarCourseSessionsContentController;
use App\Http\Controllers\BimarCourseSessionsAttendanceController;
use App\Http\Controllers\BimarTrainingProfileController;
use App\Http\Controllers\BimarQuestionsBankController;
use App\Http\Controllers\BimarQuestionsBankUserController;
use App\Http\Controllers\BimarQuestionsTypeController;
use App\Http\Controllers\BimarBankAssessQuestionController;
use App\Http\Controllers\BimarAssessmentStatusController;
use App\Http\Controllers\BimarAssessmentTypeController;
use App\Http\Controllers\BimarAssessmentController;
use App\Http\Controllers\BimarAssessmentTutorController;
use App\Http\Controllers\BimarBankAssessQuestionsUsedController;
use App\Http\Controllers\BimarAssessmentTraineeController;



use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::view('/', 'pages.home')->name('home');
Route::view('/bim', 'pages.bim')->name('bim');
Route::view('/bill', 'admin.bill')->name('bill');
Route::view('/showbill', 'admin.showbill')->name('showbill');
Route::view('/addclasscourses', 'admin.addclasscourses')->name('addclasscourses');
Route::view('/addtrainerclass', 'admin.addtrainerclass')->name('addtrainerclass');
Route::view('/trainer_home', 'trainer.home')->name('trainer_home');
Route::view('/course_sessions_attendance', 'trainer.course_sessions_attendance')->name('course_sessions_attendance');
Route::view('/student', 'trainer.student')->name('student');
Route::view('/coursestrainee', 'user.coursestrainee')->name('coursestrainee');
Route::view('/sessioncourses', 'user.sessioncourses')->name('sessioncourses');
Route::view('/addquestionsbank', 'trainer.addquestionsbank')->name('addquestionsbank');
Route::view('/link', 'user.link')->name('yylink');
Route::view('/questionslink', 'user.questionslink')->name('yyquestionslink');
Route::view('/notequestion', 'user.notequestion')->name('notequestion');

// Route::view('/search_bill', 'admin.search')->name('search');

// Route::view('/bill', 'user.bill')->name('bill');
// Route::view('/bill_courses', 'user.bill_courses')->name('bill_courses');

Route::view('/allshowbim', 'pages.allshowbim')->name('allshowbim');
// Route::view('/programbank', 'bank.programbank')->name('programbank');
// Route::view('/coursesbank', 'bank.coursesbank')->name('coursesbank');
Route::view('/questionbank', 'bank.questionbank')->name('questionbank');

// Admin Routes
// Route::middleware(['auth', 'verified', 'administrator', 'trainer','operation_user'])->group(function () {

// Route::view('/', 'admin.home')->name('home');

// Route::view('/dashboard', 'admin.home')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[BimarUserController::class,'dashboard'])-> name('dashboard');
Route::get('/get_courses_for_trainer',[BimarCourseEnrolTrainerController::class,'get_courses_for_trainer'])-> name('getmycourse');
Route::get('/get_classes_for_trainer/{id}',[BimarEnrolClassesTrainerController::class,'get_classes_for_trainer'])-> name('getmyclass');

// Route::view('/changepass', 'emp.changepass')->name('changepass');
Route::view('/profile', 'admin.profile')->name('profile');
Route::view('/form', 'admin.form')->name('form');
Route::view('/table', 'admin.table')->name('table');

Route::view('/tt', 'admin.tt')->name('tt');

// Route::view('/year', 'admin.year')->name('year');
// Route::view('/programs', 'admin.programs')->name('programs');
Route::get('/programs',[BimarTrainingProgramController::class,'index'])-> name('programs');
// Route::view('/courses', 'admin.courses')->name('courses');
Route::get('/courses',[BimarTrainingCourseController::class,'index'])-> name('courses');
// Route::view('/training_type', 'admin.training_type')->name('training_type');
Route::get('/training_type',[BimarTrainingTypeController::class,'index'])-> name('training_type');
// Route::view('/course_enrollments', 'admin.course_enrollments')->name('course_enrollments');
Route::get('/course_enrollments',[BimarCourseEnrollmentController::class,'index'])-> name('course_enrollments');
Route::get('/role',[BimarRolesController::class,'index'])-> name('role');
Route::get('/gender',[BimarUserGenderController::class,'index'])-> name('gender');
Route::get('/grade',[BimarUserAcademicDegreeController::class,'index'])-> name('grade');
Route::get('/status',[BimarUsersStatusController::class,'index'])-> name('status');
// Route::get('/status',[BimarUsersStatusController::class,'index'])-> name('status');
Route::get('/trainee',[BimarTraineeController::class,'index'])-> name('trainee');
Route::get('/user',[BimarUserController::class,'index'])-> name('user');

Route::get('/year',[BimarTrainingYearController::class,'index'])-> name('year');
Route::prefix('year')->controller(BimarTrainingYearController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});
Route::prefix('course')->controller(BimarTrainingCourseController::class)->group(function(){

    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::prefix('course_enrollments')->controller(BimarCourseEnrollmentController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::prefix('type')->controller(BimarTrainingTypeController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});
Route::prefix('program')->controller(BimarTrainingProgramController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});

//new routes
Route::prefix('bank')->controller(BimarBankController::class)->group(function(){
    Route::get('/index','index')->name('bank');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('currency')->controller(BimarCurrencyController::class)->group(function(){
    Route::get('/index','index')->name('currency');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('pay_status')->controller(BimarPaymentStatusController::class)->group(function(){
    Route::get('/index','index')->name('pay_status');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('profile_status')->controller(BimarTrainingProfileStatusController::class)->group(function(){
    Route::get('/index','index')->name('profile_status');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});

Route::prefix('status')->controller(BimarUsersStatusController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('gender')->controller(BimarUserGenderController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::prefix('role')->controller(BimarRolesController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('emp')->controller(BimarUserController::class)->group(function(){


    Route::put('/emp_update/{id}', 'emp_update');

});
Route::get('emp_edit/{id}', [BimarUserController::class, 'emp_edit'])-> name('emp_edit');
Route::get('role/{id}', [BimarRolesController::class, 'updateSwitch']);
Route::get('gender/{id}', [BimarUserGenderController::class, 'updateSwitch']);
Route::get('grade/{id}', [BimarUserAcademicDegreeController::class, 'updateSwitch']);
Route::get('status/{id}', [BimarUsersStatusController::class, 'updateSwitch']);

Route::prefix('grade')->controller(BimarUserAcademicDegreeController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});

Route::prefix('trainee')->controller(BimarTraineeController::class)->group(function(){
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('/show/{id}', 'show');
    Route::get('updateSwitch/{id}','updateSwitch');
    Route::post('/changePassword/{id}', 'changePassword');
});
Route::prefix('user')->controller(BimarUserController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('/show/{id}', 'show');
    Route::post('/changePassword/{id}', 'changePassword');
    Route::get('/emp_edit_profile/{id}', 'emp_edit_profile');
    Route::put('/update_profile/{id}', 'update_profile');
});

Route::get('getcourse', [BimarCourseEnrollmentController::class, 'getcourse'])->name('getcourse');
Route::post('/update-switch/{id}', [BimarTrainingYearController::class, 'updateSwitchStatus']);

Route::get('/years/edit/{id}', [BimarTrainingYearController::class, 'edit'])->name('years.edit');
Route::put('/years/update/{id}', [BimarTrainingYearController::class, 'update'])->name('years.update');
Route::get('/program/edit/{id}', [BimarTrainingProgramController::class, 'edit'])->name('program.edit');
Route::POST('/program/update/{id}', [BimarTrainingProgramController::class, 'update'])->name('program.update');
Route::get('type/{id}', [BimarTrainingTypeController::class, 'updateSwitch']);
Route::get('year/{id}', [BimarTrainingYearController::class, 'updateSwitch']);
Route::get('program/{id}', [BimarTrainingProgramController::class, 'updateSwitch']);
Route::get('/type/edit/{id}', [BimarTrainingTypeController::class, 'edit'])->name('type.edit');
Route::put('/type/update/{id}', [BimarTrainingTypeController::class, 'update'])->name('type.update');
Route::get('course/{id}', [BimarTrainingCourseController::class, 'updatSwitch']);
Route::get('course_enrollments/{id}', [BimarCourseEnrollmentController::class, 'updatSwitch']);
Route::get('course_enrollments/show/{id}', [BimarCourseEnrollmentController::class, 'show']);
Route::get('changepass/{id}', [BimarUserController::class, 'edit_pass'])->name('changepass');
Route::POST('changePass_emp/{id}', [BimarUserController::class, 'changePass_emp']);
Route::get('searchForEmp', [BimarUserController::class, 'searchForEmp']);
Route::get('searchForTrainee', [BimarTraineeController::class, 'searchForTrainee']);
// Route::get('all_bill_admin', [BimarEnrollmentPaymentController::class, 'index'])->name('all_bill_admin');

Route::prefix('trainer')->controller(BimarUserController::class)->group(function(){

    Route::get('/my_profile', 'my_profile');
    Route::get('/emp_edit/{id}', 'emp_edit')->name('edit_pass_emp');
    Route::put('/emp_update/{id}', 'emp_update');
});
// });

// Route::middleware(['auth', 'verified', 'trainee'])->group(function () {
Route::prefix('user_trainee')->controller(BimarTrainingProgramController::class)->group(function(){
    Route::get('/all_programs', 'all_programs')->name('all_programs');
    Route::get('/courses_for_program/{id}', 'courses_for_program');
    Route::get('/details_course_enrollment/{id}', 'details_course_enrollment');
    Route::post('/Register_for_course/{id}', 'Register_for_course');
    Route::get('/get_bills', 'get_bills')->name('get_bills');
    Route::get('/bill_courses/{id}', 'bill_courses')->name('bill_courses');
    Route::post('/cancle_bill/{id}', 'cancle_bill');
    Route::get('/mydeactivate_show/{id}', 'mydeactivate');
    // Route::post('/deactivate_my_bill/{id}', 'deactivate_my_bill')->name('user_trainee.deactivate_my_bill');

});
Route::prefix('trainee_profile')->controller(BimarTraineeController::class)->group(function(){
    Route::post('/changePass/{id}', 'changePass');
    Route::get('/edit_profile/{id}', 'edit_profile');
    Route::put('/update_profile/{id}', 'update_profile');
});

Route::prefix('bill')->controller(BimarEnrollmentPaymentController::class)->group(function(){

    Route::get('/all', 'index')->name('bill.all');;
    Route::get('/details/{id}', 'show_bill');
    Route::post('/discount/{id}', 'add_discount')->name('bill.discount');
    Route::get('/details_active/{id}', 'details_active');
    Route::post('/active/{id}', 'active_bill')->name('bill.active');
    Route::get('/deactivate_show/{id}', 'deactivate');
    Route::post('/deactivate/{id}', 'deactivate_bill')->name('bill.deactivate');

    Route::post('/destroy/{id}', 'destroy');


});
Route::get('/bill/search_bill', [BimarEnrollmentPaymentController::class, 'search_bill'])->name('search_bill');

Route::get('saerch-bi', [BimarEnrollmentPaymentController::class, 'saerch_b'])->name('search');

Route::prefix('user_bill')->controller(BimarEnrollmentPaymentController::class)->group(function(){
    Route::get('/show/{id}', 'show');
    Route::post('/store', 'store');
});

Route::prefix('set_trainer')->controller(BimarCourseEnrolTrainerController::class)->group(function(){
    Route::get('/get_trainers_for_course/{course_id}', 'get_trainers_for_course');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');
});

Route::prefix('set_time')->controller(BimarCourseEnrolTimeController::class)->group(function(){
    Route::get('/get_times_for_course/{course_id}', 'get_times_for_course');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');
});

Route::prefix('class')->controller(BimarClassStatusController::class)->group(function(){

    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::get('class/{id}', [BimarClassStatusController::class, 'updateSwitch']);
Route::get('/class_status',[BimarClassStatusController::class,'index'])-> name('class_status');

Route::prefix('class_enrol')->controller(BimarEnrolClassController::class)->group(function(){
    Route::get('/get_classes_for_course/{course_id}', 'get_classes_for_course')->name('courses.show');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});
// Route::post('/update-switch/{id}', [BimarEnrolClassController::class, 'updateSwitch']);

Route::prefix('enrol_trainee')->controller(BimarEnrolClassesTraineeController::class)->group(function(){
    Route::get('/get_trainees_for_class/{class_id}', 'get_trainees_for_class')->name('trinee.show');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/destroy/{id}', 'destroy');
});

Route::prefix('enrol_trainer')->controller(BimarEnrolClassesTrainerController::class)->group(function(){
    Route::get('/get_trainers_for_class/{class_id}', 'get_trainers_for_class')->name('class.show');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/destroy/{id}', 'destroy');
});

Route::prefix('general_content')->controller(BimarCourseGeneralContentController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('general.show');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('session')->controller(BimarCourseSessionController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('index.show');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');

});
Route::prefix('session_content')->controller(BimarCourseSessionsContentController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('index.content');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');

});
Route::prefix('attendance')->controller(BimarCourseSessionsAttendanceController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('attendance.index');
    Route::get('/create/{id}', 'create');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');

});

Route::prefix('profile')->controller(BimarTrainingProfileController::class)->group(function(){
    Route::get('/get_courses_for_trainee', 'get_courses_for_trainee');
    Route::get('/get_sessions_for_course/{course_id}', 'get_sessions_for_course');
    Route::get('/get_content_for_session/{session_id}', 'get_content_for_session');
    Route::get('/get_general_content/{course_id}', 'get_general_content');
});

Route::prefix('bank_ques')->controller(BimarQuestionsBankController::class)->group(function(){
    Route::get('/get_programs', 'get_programs');
    Route::get('/get_courses_for_prog/{prog_id}', 'get_courses_for_prog');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('bank_trainer')->controller(BimarQuestionsBankUserController::class)->group(function(){
    Route::get('/get_trainers', 'get_trainers');
    Route::get('/get_prog_trainer', 'get_prog_trainer');
    Route::get('/get_course_trainer/{id_prog}', 'get_course_trainer');
    Route::get('/get_users', 'get_users');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::get('/show_trainers_prog/{id_prog}', 'show_trainers_prog');
    Route::get('/show_trainers_course/{id_course}', 'show_trainers_course');
    Route::post('/update/{id}', 'update');
    Route::post('/destroy/{id}', 'destroy');

});

Route::prefix('ques_type')->controller(BimarQuestionsTypeController::class)->group(function(){
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('ques')->controller(BimarBankAssessQuestionController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('ques.index');
    Route::get('/create/{id}', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{ques_id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('assessment_status')->controller(BimarAssessmentStatusController::class)->group(function(){
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('assessment_type')->controller(BimarAssessmentTypeController::class)->group(function(){
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('assessment')->controller(BimarAssessmentController::class)->group(function(){
    Route::get('/index/{id}', 'index')->name('index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::get('/showTrainers/{id}', 'showTrainers');
    Route::get('/showTrainees/{id}', 'showTrainees');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update/{id}', 'update');
    Route::post('/updateSwitch/{id}', 'updateSwitch');
});

Route::prefix('assessment_tutor')->controller(BimarAssessmentTutorController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');

    Route::get('/index/{class_id}', 'index')->name('assessment_tutor.index');
    Route::get('/show_assessment/{id}', 'show_assessment');
    Route::get('/trainers_permession/{id}', 'trainers_permession');
    Route::get('/show_trainees/{id}', 'show_trainees');
    Route::get('/create_question/{assessment_id}', 'create_question')->name('assessment_tutor.create');
    Route::get('/show_question_banks', 'show_question_banks')->name('assessment_tutor.show_question_banks');
    Route::get('/show_question_bank/{id}', 'show_question_bank');
    Route::get('/edit_question_bank/{id}', 'edit_question_bank');
    Route::put('/update_question_bank/{ques_id}', 'update_question_bank');
});

Route::prefix('question_used')->controller(BimarBankAssessQuestionsUsedController::class)->group(function(){
    Route::get('/show/{assessment_id}', 'show');
    Route::post('/store', 'store');
    Route::post('/destroy/{id}', 'destroy');
});

Route::prefix('trainee')->controller(BimarAssessmentTraineeController::class)->group(function(){
    Route::get('/show_assessment', 'show_assessment')->name('show_assessment');
    Route::post('/open_assessment/{assessment_id}', 'open_assessment');
    Route::get('/show/{id}', 'show');
    Route::get('/trainee_info/{assessment_id}', 'trainee_info');
    Route::post('/update_validate/{ques_id}', 'update_validate');

});

//for admin with auth
// Route::middleware(['auth:administrator', 'administrator'])->group(function () {
//     Route::get('/administrator/dashboard', [BimarUserController::class, 'dashboard'])->name('administrator.dashboard');
// });

//for operation_user with auth
// Route::middleware(['auth:operation_user', 'operation_user'])->group(function () {
//     Route::get('/operation_user/dashboard', [BimarUserController::class, 'dashboard'])->name('operation_user.dashboard');
// });

//for trainer with auth
// Route::middleware(['auth:trainer', 'trainer'])->group(function () {
//     Route::get('/trainer/dashboard', [BimarUserController::class, 'dashboard'])->name('trainer.dashboard');
// });

//for trainee with auth
// Route::middleware(['auth:trainee', 'trainee'])->group(function () {
//     Route::get('/trainee/dashboard', [BimarUserController::class, 'dashboard'])->name('trainee.dashboard');
// });




require __DIR__.'/auth.php';
