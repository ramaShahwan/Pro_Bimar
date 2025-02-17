<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Exam_Answer extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_assessment_id', 'bimar_bank_assess_question_id', 'bimar_trainee_id', 
    'bimar_bank_assess_answer_id', 'tr_exam_answers_bank_response','tr_exam_answers_trainee_response','tr_exam_answers_body'];
    
    protected $table = 'bimar_exam_answers';

    public function bimar_trainee()
    {
        return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
    }

    public function Bimar_Bank_Assess_Question()
    {
        return $this->belongsTo(Bimar_Bank_Assess_Question::class, 'bimar_bank_assess_question_id');
    }

    public function Bimar_Assessment()
    {
        return $this->belongsTo(Bimar_Assessment::class, 'bimar_assessment_id');
    }

    public function Bimar_Bank_Assess_Answer()
    {
        return $this->belongsTo(Bimar_Bank_Assess_Answer::class, 'bimar_bank_assess_answer_id');
    }


}
