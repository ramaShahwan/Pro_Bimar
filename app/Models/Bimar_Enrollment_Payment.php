<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Enrollment_Payment extends Model
{
    use HasFactory;

    protected $fillable = ['bimar_trainee_id', 'bimar_course_enrollment_id', 'bimar_user_id', 
    'bimar_currency_id', 'tr_enrol_pay_discount','tr_enrol_pay_discount_desc','tr_enrol_pay_discount_date',
    'tr_enrol_pay_discount_userid','tr_enrol_pay_net_price','bimar_payment_status_id',
     'tr_enrol_pay_desc','tr_enrol_pay_reg_date','tr_enrol_pay_date','tr_enrol_pay_canceled',
      'bimar_bank_id'];
    

    protected $table = 'bimar_enrollment_payments';

    public function bimar_trainee()
    {
        return $this->belongsTo(Bimar_Trainee::class, 'bimar_trainee_id');
    }

    public function bimar_course_enrollment()
    {
        return $this->belongsTo(Bimar_Course_Enrollment::class, 'bimar_course_enrollment_id');
    }

    public function bimar_user()
    {
        return $this->belongsTo(Bimar_User::class, 'bimar_user_id');
    }

    public function bimar_currency()
    {
        return $this->belongsTo(Bimar_Currency::class, 'bimar_currency_id');
    }

    public function bimar_payment_status()
    {
        return $this->belongsTo(Bimar_Payment_Status::class, 'bimar_payment_status_id');
    }

    public function bimar_bank()
    {
        return $this->belongsTo(Bimar_Bank::class, 'bimar_bank_id');
    }

}






