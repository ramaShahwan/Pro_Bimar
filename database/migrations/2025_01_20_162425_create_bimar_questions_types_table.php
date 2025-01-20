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
        Schema::create('bimar_questions_types', function (Blueprint $table) {
            $table->id();
            $table->string('tr_questions_type_name', 100)->nullable();
            $table->string('tr_questions_type_code', 5);
            $table->string('tr_questions_type_desc', 255)->nullable();
            $table->tinyInteger('tr_questions_type_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_questions_types');
    }
};
