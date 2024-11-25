<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Class_Status extends Model
{
    use HasFactory;
    protected $fillable = ['tr_class_status_name_ar', 'tr_class_status_name_en','tr_class_status_desc',
    'tr_class_status'];

   protected $table = 'bimar_class_statuses';

   public function Bimar_Enrol_Classes(): HasMany
   {
       return $this->hasMany(Bimar_Enrol_Class::class);
   }
}
