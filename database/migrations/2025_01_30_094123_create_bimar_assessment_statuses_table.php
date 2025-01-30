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
        Schema::create('bimar_assessment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('tr_assessment_status_name_en', 100);
            $table->string('tr_assessment_status_name_ar', 100);
            $table->tinyInteger('tr_assessment_status_enabled')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_assessment_statuses');
    }
};
