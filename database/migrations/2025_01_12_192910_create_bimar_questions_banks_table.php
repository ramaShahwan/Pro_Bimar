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
        Schema::create('bimar_questions_banks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_training_program_id');
            $table->Integer('bimar_training_course_id');

            $table->string('tr_bank_name', 200)->nullable();
            $table->Integer('tr_bank_parent_id')->nullable();
            $table->string('tr_bank_path', 255);
            $table->string('tr_bank_desc', 255);

            $table->tinyInteger('tr_bank_status')->default(0);
            $table->timestamp('tr_bank_create_date');

            $table->timestamps();

            if (Schema::hasTable('bimar_training_programs')) {
                $table->foreign('bimar_training_program_id')->references('id')->on('bimar_training_programs')->cascadeOnDelete();
            }

            // if (Schema::hasTable('bimar_training_courses')) {
            //     $table->foreign('bimar_training_course_id')->references('id')->on('bimar_training_courses')->cascadeOnDelete();
            // }
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_questions_banks');
    }
};
