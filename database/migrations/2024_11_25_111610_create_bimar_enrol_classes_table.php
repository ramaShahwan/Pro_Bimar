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
        Schema::create('bimar_enrol_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_enrollment_id');
            $table->unsignedBigInteger('bimar_class_status_id');

            $table->string('tr_enrol_classes_name', 25)->nullable();
            $table->string('tr_enrol_classes_code', 25)->nullable();
            $table->string('tr_enrol_classes_capacity', 255)->nullable();
            $table->tinyInteger('tr_enrol_classes_status')->default(1);
            $table->timestamps();

            if (Schema::hasTable('bimar_course_enrollments')) {
                $table->foreign('bimar_course_enrollment_id')->references('id')->on('bimar_course_enrollments')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_class_statuses')) {
                $table->foreign('bimar_class_status_id')->references('id')->on('bimar_class_statuses')->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_enrol_classes');
    }
};
