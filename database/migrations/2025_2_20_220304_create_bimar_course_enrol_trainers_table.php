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
        Schema::create('bimar_course_enrol_trainers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_user_id');
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->string('tr_course_enrol_trainers_desc', 255)->nullable();

            if (Schema::hasTable('bimar_users')) {
                $table->foreign('bimar_user_id')->references('id')->on('bimar_users')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id', 'fk_bimar_course_enrollment_id')
                 ->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
               }

            // if (Schema::hasTable('bimar_course_enrollments')) {
            //     $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
            // }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_enrol_trainers');
    }
};
