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
        Schema::create('bimar_questions_bank_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_questions_bank_id');
            //حقل عادي وليس FK
            $table->unsignedBigInteger('bimar_user_id');

            $table->tinyInteger('tr_questions_user_read')->default(0);
            $table->tinyInteger('tr_questions_user_update')->default(0);
            $table->tinyInteger('tr_questions_user_add')->default(0);

            $table->timestamps();

            if (Schema::hasTable('bimar_questions_banks')) {
                $table->foreign('bimar_questions_bank_id')->references('id')->on('bimar_questions_banks')->cascadeOnDelete();
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
        Schema::dropIfExists('bimar_questions_bank_users');
    }
};
