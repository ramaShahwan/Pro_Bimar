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
        Schema::create('bimar_enrol_classes_trainers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->unsignedBigInteger('bimar_enrol_class_id');
            $table->unsignedBigInteger('bimar_user_id');

            $table->integer('tr_enrol_classes_trainer_percent')->nullable();
            $table->string('tr_enrol_classes_trainer_desc', 255)->nullable();

            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_enrol_classes')) {
                $table->foreign('bimar_enrol_class_id')->references('id')->on('bimar_enrol_classes')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users')) {
                $table->foreign('bimar_user_id')->references('id')->on('bimar_users')->cascadeOnDelete();
            }
            $table->timestamps();
        });
    }
     
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_enrol_classes_trainers');
    }
};
