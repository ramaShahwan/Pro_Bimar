<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Payment_Status extends Model
{
    use HasFactory;
    protected $fillable = ['tr_pay_status_name_ar', 'tr_pay_status_name_en', 'tr_pay_status_desc','tr_pay_status'];

    protected $table = 'bimar_payment_statuses';

    // public function Bimar_Enrollment_Payments(): HasMany
    //   {
    //       return $this->hasMany(Bimar_Enrollment_Payment::class);
    //   }

}
