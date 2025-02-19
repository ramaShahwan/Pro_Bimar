<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Questions_Type extends Model
{
    use HasFactory;

    protected $fillable = ['tr_questions_type_name', 'tr_questions_type_code', 
    'tr_questions_type_desc','tr_questions_type_status'];

    protected $table = 'bimar_questions_types';
    
    // public function Bimar_Training_Course()
    // {
    //     return $this->belongsTo(Bimar_Training_Course::class, 'bimar_training_course_id');
    // }

    public function Bimar_Questions_Bank_Users(): HasMany
    {
        return $this->hasMany(Bimar_Questions_Bank_User::class);
    }
    public function Bimar_Bank_Assess_Questions(): HasMany
    {
        return $this->hasMany(Bimar_Bank_Assess_Question::class);
    }

}
