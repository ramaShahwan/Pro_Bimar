<?php
use App\Http\Controllers\BimarTrainingYearController;
use App\Http\Controllers\BimarTrainingProgramController;
use App\Http\Controllers\BimarTrainingTypeController;
use App\Http\Controllers\BimarTrainingCourseController;
use App\Http\Controllers\BimarCourseEnrollmentController;

use App\Http\Controllers\BimarUserController;
use App\Http\Controllers\BimarRolesController;
use App\Http\Controllers\BimarUserAcademicDegreeController;
use App\Http\Controllers\BimarUserGenderController;
use App\Http\Controllers\BimarUsersStatusController;
use App\Http\Controllers\BimarTraineeController;

use App\Http\Controllers\BimarBankController;
use App\Http\Controllers\BimarCurrencyController;
use App\Http\Controllers\BimarPaymentStatusController;
use App\Http\Controllers\BimarTrainingProfileStatusController;


use App\Http\Controllers\ProfileController;
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
// Route::view('/bill', 'user.bill')->name('bill');
// Route::view('/bill_courses', 'user.bill_courses')->name('bill_courses');

Route::view('/allshowbim', 'pages.allshowbim')->name('allshowbim');
// Admin Routes
// Route::middleware(['auth', 'verified', 'administrator', 'trainer','operation_user'])->group(function () {

// Route::view('/', 'admin.home')->name('home');

// Route::view('/dashboard', 'admin.home')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[BimarUserController::class,'dashboard'])-> name('dashboard');

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


});
Route::prefix('trainee_profile')->controller(BimarTraineeController::class)->group(function(){


    Route::post('/changePass/{id}', 'changePass');

    Route::get('/edit_profile/{id}', 'edit_profile');
    Route::put('/update_profile/{id}', 'update_profile');

});
// });
// Route::get('all_programs', [BimarTrainingProgramController::class, 'all_programs'])->name('all_programs');


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
