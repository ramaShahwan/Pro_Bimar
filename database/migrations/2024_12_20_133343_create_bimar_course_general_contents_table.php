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
        Schema::create('bimar_course_general_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_training_course_id');
            $table->longText('tr_course_general_content_desc');
            $table->string('tr_course_general_content_path', 200)->nullable();
            $table->integer('tr_course_general_content_status')->default(0);
            $table->timestamps();
    // foreigns
    if (Schema::hasTable('bimar_training_courses')) {
        $table->foreign('bimar_training_course_id')->references('id')->on('bimar_training_courses')->cascadeOnDelete();
     }
   });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_course_general_contents');
    }
};
