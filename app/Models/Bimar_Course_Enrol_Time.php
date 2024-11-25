<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Course_Enrol_Time extends Model
{
    use HasFactory;
    protected $fillable = ['tr_course_enrol_times_day', 'bimar_course_enrollment_id',
     'tr_course_enrol_times_from','tr_course_enrol_times_to','tr_course_enrol_times_desc'];

    protected $table = 'bimar_course_enrol_times';

      public function Bimar_Course_Enrollment()
      {
          return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
      }
}
