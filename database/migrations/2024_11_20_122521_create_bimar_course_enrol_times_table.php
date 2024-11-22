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
        Schema::create('bimar_course_enrol_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->string('tr_course_enrol_times_day', 255);
            $table->integer('tr_course_enrol_times_from');
            $table->integer('tr_course_enrol_times_to');
            $table->string('tr_course_enrol_times_desc', 255)->nullable();

            if (Schema::hasTable('bimar_course_Enrollments')) {
                $table->foreign('bimar_course_Enrollment_id')->references('id')->on('bimar_course_Enrollments')->cascadeOnDelete();
            }

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_enrol_times');
    }
};
