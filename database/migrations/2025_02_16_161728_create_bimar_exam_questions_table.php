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
        Schema::create('bimar_exam_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_assessment_id');
            $table->unsignedBigInteger('bimar_bank_assess_question_id');
            $table->unsignedBigInteger('bimar_trainee_id');
            $table->float('tr_exam_questions_bank_grade', 5, 2)->nullable();
            $table->float('tr_exam_questions_trainee_grade', 5, 2)->nullable();
            $table->integer('tr_exam_questions_correct')->default(0);
            $table->timestamps();

 // Foreign keys with custom names
 if (Schema::hasTable('bimar_assessments')) {
    $table->foreign('bimar_assessment_id')->references('id')->on('bimar_assessments')->cascadeOnDelete();
     }

     if (Schema::hasTable('bimar_trainees')) {
        $table->foreign('bimar_trainee_id')->references('id')->on('bimar_trainees')->cascadeOnDelete();
         }

         if (Schema::hasTable('bimar_bank_assess_questions')) {
            $table->foreign('bimar_bank_assess_question_id')->references('id')->on('bimar_bank_assess_questions')->cascadeOnDelete();
             }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_exam_questions');
    }
};
