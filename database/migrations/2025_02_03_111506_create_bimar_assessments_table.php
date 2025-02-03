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
        Schema::create('bimar_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_enrol_class_id');
            $table->unsignedBigInteger('bimar_assessment_type_id');
            $table->unsignedBigInteger('bimar_assessment_status_id');

            $table->string('tr_assessment_name', 1000);
            $table->timestamp('tr_assessment_start_time')->nullable();
            $table->timestamp('tr_assessment_end_time')->nullable();

            $table->string('tr_assessment_note', 512)->nullable();
            $table->string('tr_assessment_passcode', 10)->nullable();
            $table->timestamps();

          // foreigns
          if (Schema::hasTable('bimar_enrol_classes')) {
          $table->foreign('bimar_enrol_class_id')->references('id')->on('bimar_enrol_classes')->cascadeOnDelete();
           }
           if (Schema::hasTable('bimar_assessment_types')) {
            $table->foreign('bimar_assessment_type_id')->references('id')->on('bimar_assessment_types')->cascadeOnDelete();
             }

             if (Schema::hasTable('bimar_assessment_statuses')) {
                $table->foreign('bimar_assessment_status_id')->references('id')->on('bimar_assessment_statuses')->cascadeOnDelete();
                 }
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_assessments');
    }
};
