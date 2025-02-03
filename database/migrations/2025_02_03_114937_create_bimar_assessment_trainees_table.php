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
        Schema::create('bimar_assessment_trainees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_assessment_id');
            $table->unsignedBigInteger('bimar_trainee_id');

            $table->float('tr_assessment_trainee_grade', 5, 2)->nullable();
            $table->timestamp('tr_assessment_trainee_start_time')->nullable();
            $table->timestamp('tr_assessment_trainee_end_time')->nullable();
            $table->string('tr_assessment_trainee_login_ip', 25)->nullable();

            $table->timestamps();

          // foreigns
           if (Schema::hasTable('bimar_assessments')) {
            $table->foreign('bimar_assessment_id')->references('id')->on('bimar_assessments')->cascadeOnDelete();
             }

             if (Schema::hasTable('bimar_trainees')) {
                $table->foreign('bimar_trainee_id')->references('id')->on('bimar_trainees')->cascadeOnDelete();
                 }
         });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_assessment_trainees');
    }
};
