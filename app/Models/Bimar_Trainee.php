<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Trainee extends Authenticatable
{
    // use HasFactory;

    protected $fillable = ['trainee_fname_ar', 'trainee_lname_ar','trainee_fname_en','trainee_lname_en',
     'trainee_mobile','trainee_email','bimar_users_status_id','bimar_users_gender_id',
    'trainee_address','trainee_personal_img','trainee_pass','trainee_last_pass','trainee_passchangedate',
     'trainee_createdate','trainee_lastaccess'];
    //  protected $guarded = [];

    protected $table = 'bimar_trainees';
    protected $primaryKey = 'id';


       // تحديد اسم حقل اسم المستخدم
       public function getAuthIdentifierName()
       {
           return 'trainee_mobile';
       }

       // تحديد حقل كلمة المرور
       public function getAuthPassword()
       {
           return $this->trainee_pass;
       }

       // تعطيل تذكير التوكن إذا لم يكن موجودًا
       public $rememberTokenName = false;


    public function Bimar_User_Gender()
    {
        return $this->belongsTo(Bimar_User_Gender::class, 'bimar_users_gender_id');
    }

    public function Bimar_Users_Status()
    {
        return $this->belongsTo(Bimar_Users_Status::class, 'bimar_users_status_id');
    }

        public function Bimar_Enrollment_Payments(): HasMany
      {
          return $this->hasMany(Bimar_Enrollment_Payment::class);
      }

      public function Bimar_Enrol_Classes_Trainees(): HasMany
      {
          return $this->hasMany(Bimar_Enrol_Classes_Trainee::class);
      }
      public function Bimar_Course_Sessions_Attendances(): HasMany
      {
          return $this->hasMany(Bimar_Course_Sessions_Attendance::class);
      }

      public function Bimar_Assessment_Trainees(): HasMany
      {
          return $this->hasMany(Bimar_Assessment_Trainee::class);
      }

      public function Bimar_Exam_Answers(): HasMany
      {
          return $this->hasMany(Bimar_Exam_Answer::class);
      }

      public function Bimar_Exam_Questions(): HasMany
      {
          return $this->hasMany(Bimar_Exam_Question::class);
      }
}



