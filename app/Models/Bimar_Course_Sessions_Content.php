<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Course_Sessions_Content extends Model
{
    use HasFactory;

      
    protected $fillable = ['bimar_course_session_id', 'tr_course_session_content_desc',
    'tr_course_session_content_path'];

   protected $table = 'bimar_course_sessions_contents';

   public function Bimar_Course_Session()
   {
       return $this->belongsTo(Bimar_Course_Session::class, 'bimar_course_session_id');
   }

}
