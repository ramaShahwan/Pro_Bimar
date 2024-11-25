<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Enrol_Classes_Trainee extends Model
{
    use HasFactory;
    protected $fillable = ['bimar_enrol_class_id', 'bimar_course_enrollment_id','bimar_trainee_id'];

   protected $table = 'bimar_enrol_classes_trainees';

   public function Bimar_Course_Enrollment()
   {
       return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
   }

   public function Bimar_Enrol_Class()
   {
       return $this->belongsTo(Bimar_Enrol_Class::class, 'bimar_enrol_class_id');
   }

   public function Bimar_Trainee()
   {
       return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
   }
}
