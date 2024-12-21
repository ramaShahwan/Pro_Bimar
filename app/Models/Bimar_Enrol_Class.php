<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Enrol_Class extends Model
{
    use HasFactory;
    protected $fillable = ['bimar_class_status_id', 'bimar_course_enrollment_id','tr_enrol_classes_status',
     'tr_enrol_classes_name','tr_enrol_classes_code','tr_enrol_classes_capacity'];

    protected $table = 'bimar_enrol_classes';

    public function Bimar_Course_Enrollment()
    {
        return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
    }

    public function Bimar_Class_Status()
    {
        return $this->belongsTo(Bimar_Class_Status::class, 'bimar_class_status_id');
    }

    public function Bimar_Enrol_Classes_Trainees(): HasMany
    {
        return $this->hasMany(Bimar_Enrol_Classes_Trainee::class);
    }
    
    public function Bimar_Enrol_Classes_Trainers(): HasMany
    {
        return $this->hasMany(Bimar_Enrol_Classes_Trainer::class);
    }
    public function Bimar_Course_Sessions(): HasMany
    {
        return $this->hasMany(Bimar_Course_Session::class);
    }
}
