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
        Schema::create('bimar_course_sessions_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_course_session_id');
            $table->longText('tr_course_session_content_desc');
            $table->string('tr_course_session_content_path', 200)->nullable();
            $table->timestamps();
    // foreigns
    if (Schema::hasTable('bimar_course_sessions')) {
        $table->foreign('bimar_course_session_id')->references('id')->on('bimar_course_sessions')->cascadeOnDelete();
     }

    });

   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_sessions_contents');
    }
};
