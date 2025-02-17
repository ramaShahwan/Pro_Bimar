<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Bank_Assess_Answer extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_bank_assess_question_id', 'tr_bank_assess_answers_body'
    , 'tr_bank_assess_answers_response'];

    protected $table = 'bimar_bank_assess_answers';


    public function Bimar_Bank_Assess_Question()
    {
        return $this->belongsTo(Bimar_Bank_Assess_Question::class, 'bimar_bank_assess_question_id');
    }

    public function Bimar_Exam_Answers(): HasMany
    {
        return $this->hasMany(Bimar_Exam_Answer::class);
    }

}
