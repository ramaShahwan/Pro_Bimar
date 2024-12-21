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
        Schema::create('bimar_course_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_enrol_class_id');
            $table->longText('tr_course_session_desc');
            $table->date('tr_course_session_date');
            $table->integer('tr_course_session_arrangement');
            $table->timestamps();
    // foreigns
    if (Schema::hasTable('bimar_enrol_classes')) {
        $table->foreign('bimar_enrol_class_id')->references('id')->on('bimar_enrol_classes')->cascadeOnDelete();
     }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_sessions');
    }
};
