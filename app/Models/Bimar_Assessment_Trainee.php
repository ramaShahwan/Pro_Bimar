<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Assessment_Trainee extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_assessment_id', 'bimar_trainee_id','tr_assessment_trainee_grade',
    'tr_assessment_trainee_start_time','tr_assessment_trainee_end_time','tr_assessment_trainee_login_ip'];


    protected $table = 'bimar_assessment_trainees';

    public function Bimar_Assessment()
    {
        return $this->belongsTo(Bimar_Assessment::class, 'bimar_assessment_id');
    }

    public function Bimar_Trainee()
    {
        return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
    }


}
