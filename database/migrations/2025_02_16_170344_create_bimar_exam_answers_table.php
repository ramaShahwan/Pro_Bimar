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
        Schema::create('bimar_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_assessment_id');
            $table->unsignedBigInteger('bimar_bank_assess_question_id');
            $table->unsignedBigInteger('bimar_trainee_id');
            $table->unsignedBigInteger('bimar_bank_assess_answer_id');
            $table->tinyInteger('tr_exam_answers_bank_response')->nullable();
            $table->tinyInteger('tr_exam_answers_trainee_response')->nullable();
            $table->string('tr_exam_answers_body')->nullable();
            $table->timestamps();

             // Foreign keys with custom names
     if (Schema::hasTable('bimar_bank_assess_answers')) {
     $table->foreign('bimar_bank_assess_answer_id')->references('id')->on('bimar_bank_assess_answers')->cascadeOnDelete();
     }

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
        Schema::dropIfExists('bimar_exam_answers');
    }
};
