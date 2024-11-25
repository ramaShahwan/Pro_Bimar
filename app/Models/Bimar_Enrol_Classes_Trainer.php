<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Enrol_Classes_Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_enrol_class_id', 'bimar_course_enrollment_id','bimar_user_id',
               'tr_enrol_classes_trainer_percent','tr_enrol_classes_trainer_desc'];

    protected $table = 'bimar_enrol_classes_trainers';
 
    public function Bimar_Course_Enrollment()
    {
        return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
    }
 
    public function Bimar_Enrol_Class()
    {
        return $this->belongsTo(Bimar_Enrol_Class::class, 'bimar_enrol_class_id');
    }

    public function Bimar_User()
    {
        return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
    }
}
