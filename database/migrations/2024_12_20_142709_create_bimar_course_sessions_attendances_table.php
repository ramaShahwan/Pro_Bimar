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
    Schema::create('bimar_course_sessions_attendances', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('bimar_course_session_id');
        $table->unsignedBigInteger('bimar_trainee_id');
        $table->timestamps();

        // Foreign keys with custom names
        if (Schema::hasTable('bimar_course_sessions')) {
            $table->foreign('bimar_course_session_id', 'fk_course_session_id')
                  ->references('id')->on('bimar_course_sessions')->cascadeOnDelete();
        }

        if (Schema::hasTable('bimar_trainees')) {
            $table->foreign('bimar_trainee_id', 'fk_trainee_id')
                  ->references('id')->on('bimar_trainees')->cascadeOnDelete();
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_sessions_attendances');
    }
};
