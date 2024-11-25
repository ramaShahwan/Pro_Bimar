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
        Schema::create('bimar_enrol_classes_trainees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->unsignedBigInteger('bimar_enrol_class_id');
            $table->unsignedBigInteger('bimar_trainee_id');

            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_enrol_classes')) {
                $table->foreign('bimar_enrol_class_id')->references('id')->on('bimar_enrol_classes')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_trainees')) {
                $table->foreign('bimar_trainee_id')->references('id')->on('bimar_trainees')->cascadeOnDelete();
            }
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_enrol_classes_trainees');
    }
};
