<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Exam_Question extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_assessment_id', 'bimar_bank_assess_question_id', 'bimar_trainee_id',
    'tr_exam_questions_bank_grade', 'tr_exam_questions_trainee_grade','tr_exam_questions_correct'];

    protected $table = 'bimar_exam_questions';

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



}
