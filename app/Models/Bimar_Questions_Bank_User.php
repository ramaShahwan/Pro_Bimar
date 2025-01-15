<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Questions_Bank_User extends Model
{
    use HasFactory;
    protected $fillable = ['bimar_questions_bank_id', 'bimar_user_id', 'tr_questions_user_read',
    'tr_questions_user_update','tr_questions_user_add'];

    protected $table = 'bimar_questions_bank_users';


    public function Bimar_Questions_Bank()
    {
        return $this->belongsTo(Bimar_Questions_Bank::class, 'bimar_questions_bank_id');
    }

    public function Bimar_User()
    {
        return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
    }

}
