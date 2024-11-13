<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Training_Profile extends Model
{
    use HasFactory;
    protected $fillable = ['bimar_course_enrollment_id', 'bimar_trainee_id', 'bimar_enrollment_payment_id',
    'bimar_training_profile_status_id','tr_profile_oral','tr_profile_final','tr_profile_total_mark'
    ,'tr_profile_date'];

    protected $table = 'bimar_training_profiles';


    public function bimar_course_enrollment()
    {
        return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
    }
    public function bimar_trainee()
    {
        return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
    }
    
    public function bimar_enrollment_payment()
    {
        return $this->belongsTo(Bimar_Enrollment_Payment::class, 'bimar_enrollment_payment_id');
    }

    public function bimar_training_profile_status()
    {
        return $this->belongsTo(Bimar_Training_Profile_Status::class, 'bimar_training_profile_status_id');
    }
}
