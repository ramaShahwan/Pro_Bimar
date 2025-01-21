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
        Schema::create('bimar_bank_assess_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bimar_questions_bank_id');
            $table->unsignedBigInteger('bimar_questions_type_id');
            $table->unsignedBigInteger('bimar_user_id');

            $table->string('tr_bank_assess_questions_name', 225);
            $table->string('tr_bank_assess_questions_body', 225);
            $table->float('tr_bank_assess_questions_grade', 5, 2);
            $table->string('tr_bank_assess_questions_note', 255)->nullable();
            $table->tinyInteger('tr_bank_assess_questions_status')->default(0);
            $table->timestamps();

            if (Schema::hasTable('bimar_questions_banks')) {
                $table->foreign('bimar_questions_bank_id')->references('id')->on('bimar_questions_banks')->cascadeOnDelete();
            }
            if (Schema::hasTable('bimar_questions_types')) {
                $table->foreign('bimar_questions_type_id')->references('id')->on('bimar_questions_types')->cascadeOnDelete();
            }
            if (Schema::hasTable('bimar_users')) {
                $table->foreign('bimar_user_id')->references('id')->on('bimar_users')->cascadeOnDelete();
            }
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_bank_assess_questions');
    }
};
