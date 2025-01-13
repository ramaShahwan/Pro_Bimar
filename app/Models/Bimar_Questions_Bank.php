<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Questions_Bank extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_training_program_id', 'bimar_training_course_id', 'tr_bank_name',
    'tr_bank_parent_id','tr_bank_path','tr_bank_desc','tr_bank_status'
    ,'tr_bank_create_date'];

    protected $table = 'bimar_questions_banks';


    // public function Bimar_Training_Program()
    // {
    //     return $this->belongsTo(Bimar_Training_Program::class, 'bimar_training_program_id');
    // }
    
    // public function Bimar_Training_Course()
    // {
    //     return $this->belongsTo(Bimar_Training_Course::class, 'bimar_training_course_id');
    // }

    public function Bimar_Questions_Bank_Users(): HasMany
    {
        return $this->hasMany(Bimar_Questions_Bank_User::class);
    }
    
}
