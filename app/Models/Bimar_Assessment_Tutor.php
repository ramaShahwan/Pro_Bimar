<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Assessment_Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_user_id', 'bimar_assessment_id'];

    protected $table = 'bimar_assessment_tutors';

    public function Bimar_User()
    {
        return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
    }

    public function Bimar_Assessment()
    {
        return $this->belongsTo(Bimar_Assessment::class, 'bimar_assessment_id');
    }


}
