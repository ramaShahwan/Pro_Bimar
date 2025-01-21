<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Bank_Assess_Question extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_questions_bank_id', 'bimar_questions_type_id', 'bimar_user_id',
    'tr_bank_assess_questions_name','tr_bank_assess_questions_body','tr_bank_assess_questions_grade'
    ,'tr_bank_assess_questions_note','tr_bank_assess_questions_status'];

    protected $table = 'bimar_bank_assess_questions';


    public function Bimar_Questions_Bank()
    {
        return $this->belongsTo(Bimar_Questions_Bank::class, 'bimar_questions_bank_id');
    }
    public function Bimar_Questions_Type()
    {
        return $this->belongsTo(Bimar_Questions_Type::class, 'bimar_questions_type_id');
    }
    public function Bimar_User()
    {
        return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
    }
    public function Bimar_Bank_Assess_Answers(): HasMany
    {
        return $this->hasMany(Bimar_Bank_Assess_Answer::class);
    }
    // public function Bimar_Bank_Assess_Questions(): HasMany
    // {
    //     return $this->hasMany(Bimar_Bank_Assess_Question::class);
    // }

}
