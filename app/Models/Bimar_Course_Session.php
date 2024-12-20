<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Course_Session extends Model
{
    use HasFactory;
    
    protected $fillable = ['bimar_enrol_class_id', 'tr_course_session_desc',
    'tr_course_session_date','tr_course_session_arrangement'];

   protected $table = 'bimar_course_sessions';

   public function Bimar_Enrol_Class()
   {
       return $this->belongsTo(Bimar_Enrol_Class::class, 'bimar_enrol_class_id');
   }
   public function Bimar_Course_Sessions_Attendances(): HasMany
   {
       return $this->hasMany(Bimar_Course_Sessions_Attendance::class);
   }
   public function Bimar_Course_Sessions_Contents(): HasMany
   {
       return $this->hasMany(Bimar_Course_Sessions_Content::class);
   }
}
