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
        Schema::create('bimar_class_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('tr_class_status_name_ar', 25)->nullable();
            $table->string('tr_class_status_name_en', 25)->nullable();
            $table->string('tr_class_status_desc', 255)->nullable();
            $table->tinyInteger('tr_class_status')->default(1);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_class_statuses');
    }
};
