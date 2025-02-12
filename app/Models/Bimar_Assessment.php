<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Assessment extends Model
{
    use HasFactory;
    protected $fillable = ['bimar_enrol_class_id', 'bimar_assessment_type_id',
    'bimar_assessment_status_id','tr_assessment_name','tr_assessment_start_time',
     'tr_assessment_end_time','tr_assessment_note','tr_assessment_passcode'];

    protected $table = 'bimar_assessments';


    public function Bimar_Enrol_Class()
    {
        return $this->belongsTo(Bimar_Enrol_Class::class, 'bimar_enrol_class_id');
    }

    public function Bimar_Assessment_Type()
    {
        return $this->belongsTo(Bimar_Assessment_Type::class, 'bimar_assessment_type_id');
    }

    public function Bimar_Assessment_Status()
    {
        return $this->belongsTo(Bimar_Assessment_Status::class, 'bimar_assessment_status_id');
    }

    public function Bimar_Assessment_Tutors(): HasMany
    {
        return $this->hasMany(Bimar_Assessment_Tutor::class);
    }

    public function Bimar_Assessment_Trainees(): HasMany
    {
        return $this->hasMany(Bimar_Assessment_Trainee::class);
    }

    public function Bimar_Bank_Assess_Questions_Useds(): HasMany
{
    return $this->hasMany(Bimar_Bank_Assess_Questions_Used::class);
}
}
