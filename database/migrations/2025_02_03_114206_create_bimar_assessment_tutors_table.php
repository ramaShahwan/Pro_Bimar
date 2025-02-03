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
        Schema::create('bimar_assessment_tutors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_assessment_id');
            $table->unsignedBigInteger('bimar_user_id');
            $table->timestamps();

            // Foreign keys
            if (Schema::hasTable('bimar_assessments')) {
                $table->foreign('bimar_assessment_id')->references('id')->on('bimar_assessments')->cascadeOnDelete();
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
        Schema::dropIfExists('bimar_assessment_tutors');
    }
};
