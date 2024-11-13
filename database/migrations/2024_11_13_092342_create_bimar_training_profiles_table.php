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
        Schema::create('bimar_training_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_enrollment_id')->nullable();
            $table->unsignedBigInteger('bimar_trainee_id')->nullable();
            $table->unsignedBigInteger('bimar_enrollment_payment_id')->nullable();
            $table->unsignedBigInteger('bimar_training_profile_status_id')->default(1);

            $table->float('tr_profile_oral', 5, 2)->nullable();
            $table->float('tr_profile_final', 5, 2)->nullable();
            $table->float('tr_profile_total_mark', 5, 2)->nullable();
            $table->dateTime('tr_profile_date')->useCurrent();
            $table->timestamps();


            // foreigns
            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_trainees')) {
                $table->foreign('bimar_trainee_id')->references('id')->on('bimar_trainees')->cascadeOnDelete();
            }
            if (Schema::hasTable('bimar_enrollment_payments')) {
                $table->foreign('bimar_enrollment_payment_id')->references('id')->on('bimar_enrollment_payments')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_training_profile_statuses')) {
                $table->foreign('bimar_training_profile_status_id')->references('id')->on('bimar_training_profile_statuses')->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_training_profiles');
    }
};
