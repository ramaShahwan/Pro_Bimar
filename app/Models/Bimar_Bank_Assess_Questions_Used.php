<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Bank_Assess_Questions_Used extends Model
{
    use HasFactory;

    
protected $fillable = ['bimar_assessment_id', 'bimar_bank_assess_question_id', 'bimar_user_id',
'tr_bank_assess_questions_used_insertdate'];

protected $table = 'bimar_bank_assess_questions_useds';


public function Bimar_Assessment()
{
    return $this->belongsTo(Bimar_Assessment::class, 'bimar_assessment_id');
}
public function Bimar_Bank_Assess_Question()
{
    return $this->belongsTo(Bimar_Bank_Assess_Question::class, 'bimar_bank_assess_question_id');
}
public function Bimar_User()
{
    return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
}


}
