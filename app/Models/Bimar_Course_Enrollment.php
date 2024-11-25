<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Course_Enrollment extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'tr_course_enrol_id'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';
      // protected $guarded=[];
      protected $fillable = ['bimar_training_program_id', 'bimar_training_course_id', 'bimar_training_year_id', 
      'tr_course_enrol_arrangement', 'tr_course_enrol_discount','tr_course_enrol_desc','tr_course_enrol_reg_start_date',
      'tr_course_enrol_reg_end_date','tr_course_enrol_session_start_date','tr_course_enrol_session_end_date',
       'tr_course_enrol_mark','tr_course_enrol_oralmark','tr_course_enrol_finalmark','tr_course_enrol_price',
        'bimar_training_type_id','tr_course_enrol_status','tr_course_enrol_update_date','tr_course_enrol_create_date',
        'tr_course_enrol_sessions','tr_course_enrol_hours'];
      
      protected $table = 'bimar_course_enrollments';
 
      public function bimar_training_program()
      {
          return $this->belongsTo(Bimar_Training_Program::class, 'bimar_training_program_id');
      }

      public function bimar_training_course()
      {
          return $this->belongsTo(Bimar_Training_Course::class, 'bimar_training_course_id');
      }

      public function bimar_training_type()
      {
          return $this->belongsTo(Bimar_Training_Type::class, 'bimar_training_type_id');
      }

      public function bimar_training_year()
      {
          return $this->belongsTo(Bimar_Training_Year::class, 'bimar_training_year_id');
      }

      public function bimar_enrollment_payments(): HasMany
      {
          return $this->hasMany(Bimar_Enrollment_Payment::class);
      }

      public function Bimar_Course_Enrol_Trainers(): HasMany
      {
          return $this->hasMany(Bimar_Course_Enrol_Trainer::class);
      }

      public function Bimar_Course_Enrol_Times(): HasMany
      {
          return $this->hasMany(Bimar_Course_Enrol_Time::class);
      }

      public function Bimar_Enrol_Classes(): HasMany
      {
          return $this->hasMany(Bimar_Enrol_Class::class);
      }

      public function Bimar_Enrol_Classes_Trainees(): HasMany
      {
          return $this->hasMany(Bimar_Enrol_Classes_Trainee::class);
      }

      public function Bimar_Enrol_Classes_Trainers(): HasMany
      {
          return $this->hasMany(Bimar_Enrol_Classes_Trainer::class);
      }
}
