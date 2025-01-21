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
        Schema::create('bimar_bank_assess_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_bank_assess_question_id');
            $table->string('tr_bank_assess_answers_body', 225);
            $table->tinyInteger('tr_bank_assess_answers_response')->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('bimar__bank__assess__answers');
    }
};
