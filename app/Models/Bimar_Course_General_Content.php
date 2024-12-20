<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Course_General_Content extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_training_course_id', 'tr_course_general_content_desc',
    'tr_course_general_content_path','tr_course_general_content_status'];

   protected $table = 'bimar_course_general_contents';

   public function Bimar_Training_Course()
   {
       return $this->belongsTo(Bimar_Training_Course::class, 'bimar_training_course_id');
   }
}
