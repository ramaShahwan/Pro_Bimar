<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Training_Profile_Status extends Model
{
    use HasFactory;
    protected $fillable = ['tr_profile_status_code', 'tr_profile_status_name_ar', 'tr_profile_status_name_en','tr_profile_status_desc','tr_profile_status'];

    protected $table = 'bimar_training_profile_statuses';

    // public function Bimar_Enrollment_Payments(): HasMany
    //   {
    //       return $this->hasMany(Bimar_Enrollment_Payment::class);
    //   }

}
