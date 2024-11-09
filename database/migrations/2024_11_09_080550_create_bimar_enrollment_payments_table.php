<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimar_enrollment_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_trainee_id');
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->unsignedBigInteger('bimar_user_id');
            $table->unsignedBigInteger('bimar_currency_id');
            $table->integer('tr_enrol_pay_discount')->default(0);
            $table->longText('tr_enrol_pay_discount_desc')->nullable();
            $table->timestamp('tr_enrol_pay_discount_date')->nullable();
            $table->timestamp('tr_enrol_pay_discount_userid')->nullable();
            $table->float('tr_enrol_pay_net_price');
            $table->unsignedBigInteger('bimar_payment_status_id')->default(1);
            $table->longText('tr_enrol_pay_desc')->nullable();
            $table->timestamp('tr_enrol_pay_reg_date')->useCurrent();
            $table->timestamp('tr_enrol_pay_date')->nullable();
            $table->tinyInteger('tr_enrol_pay_canceled')->default(0);
            $table->unsignedBigInteger('bimar_bank_id')->nullable();
             $table->timestamps();

            if (Schema::hasTable('bimar_trainees')) {
                $table->foreign('bimar_trainee_id')->references('id')->on('bimar_trainees')->cascadeOnDelete()->unique();
            }

            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete()->unique();
            }

            if (Schema::hasTable('bimar_currencies')) {
                $table->foreign('bimar_currency_id')->references('id')->on('bimar_currencies')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_payment_statuses')) {
                $table->foreign('bimar_payment_status_id')->references('id')->on('bimar_payment_statuses')->cascadeOnDelete();
            }
            
            if (Schema::hasTable('bimar_banks')) {
                $table->foreign('bimar_bank_id')->references('id')->on('bimar_banks')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users')) {
                $table->foreign('bimar_user_id')->references('id')->on('bimar_users')->cascadeOnDelete();
            }
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_enrollment_payments');
    }
};
