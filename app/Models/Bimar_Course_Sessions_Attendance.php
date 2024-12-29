<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Course_Sessions_Attendance extends Model
{
    use HasFactory;


    protected $fillable = ['bimar_course_session_id','bimar_trainee_id'];

   protected $table = 'bimar_course_sessions_attendances';

   public function Bimar_Course_Session()
   {
       return $this->belongsTo(Bimar_Course_Session::class, 'bimar_course_session_id');
   }

   public function Bimar_Trainee()
   {
       return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
   }


}
