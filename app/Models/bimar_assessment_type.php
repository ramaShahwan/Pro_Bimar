<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class bimar_assessment_type extends Model
{
    use HasFactory;
    
    protected $fillable = ['tr_assessment_type_name_en', 'tr_assessment_type_name_ar', 
    'tr_assessment_type_status'];

    protected $table = 'bimar_assessment_types';

    // public function Bimar_Assessments(): HasMany
    //   {
    //       return $this->hasMany(Bimar_Assessment::class);
    //   }
}
