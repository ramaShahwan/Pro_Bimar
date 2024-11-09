<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Bank extends Model
{
    use HasFactory;


    protected $fillable = ['tr_bank_code', 'tr_bank_name_ar', 'tr_bank_name_en','tr_bank_desc','tr_bank_status'];

    protected $table = 'bimar_banks';

    public function Bimar_Enrollment_Payments(): HasMany
      {
          return $this->hasMany(Bimar_Enrollment_Payment::class);
      }

}
