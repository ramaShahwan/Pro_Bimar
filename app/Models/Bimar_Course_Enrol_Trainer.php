<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Course_Enrol_Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['tr_course_enrol_trainers_desc', 'bimar_course_enrollment_id', 'bimar_user_id'];

    protected $table = 'bimar_course_enrol_trainers';

  
      public function Bimar_User()
      {
          return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
      }

      public function Bimar_Course_Enrollment()
      {
          return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
      }
}
