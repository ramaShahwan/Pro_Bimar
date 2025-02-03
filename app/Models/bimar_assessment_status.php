<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Assessment_Status extends Model
{
    use HasFactory;


    protected $fillable = ['tr_assessment_status_name_en', 'tr_assessment_status_name_ar', 'tr_assessment_status_enabled'];

    protected $table = 'bimar_assessment_statuses';

       public function Bimar_Assessments(): HasMany
      {
          return $this->hasMany(Bimar_Assessment::class);
      }
}


