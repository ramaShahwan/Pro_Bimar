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
        Schema::create('bimar_bank_assess_questions_useds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_assessment_id');
            $table->unsignedBigInteger('bimar_bank_assess_question_id');
            $table->unsignedBigInteger('bimar_user_id');
            $table->timestamp('tr_bank_assess_questions_used_insertdate');
            
          
        // Foreign keys with custom names
          if (Schema::hasTable('bimar_assessments')) {
         $table->foreign('bimar_assessment_id', 'fk_bimar_assessment_id')
          ->references('id')->on('bimar_assessments')->cascadeOnDelete();
        }
        if (Schema::hasTable('bimar_bank_assess_questions')) {
        $table->foreign('bimar_bank_assess_question_id', 'fk_bimar_bank_assess_question_id')
              ->references('id')->on('bimar_bank_assess_questions')->cascadeOnDelete();
        }
        if (Schema::hasTable('bimar_users')) {
            $table->foreign('bimar_user_id', 'fk_bimar_user_id')
                  ->references('id')->on('bimar_users')->cascadeOnDelete();
            }
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_bank_assess_questions_useds');
    }
};
