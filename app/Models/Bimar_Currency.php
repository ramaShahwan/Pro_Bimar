<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Bimar_Currency extends Model
{
    use HasFactory;
    
    protected $fillable = ['tr_currency_code', 'tr_currency_name_ar', 'tr_currency_name_en','tr_currency_desc','tr_currency_status'];

    protected $table = 'bimar_currencies';

    public function Bimar_Enrollment_Payments(): HasMany
      {
          return $this->hasMany(Bimar_Enrollment_Payment::class);
      }

}
