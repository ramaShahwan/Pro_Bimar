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
        Schema::create('bimar_banks', function (Blueprint $table) {
            $table->id();
            $table->string('tr_bank_code', 10);
            $table->string('tr_bank_name_ar', 25);
            $table->string('tr_bank_name_en', 25);
            $table->string('tr_bank_desc', 255)->nullable();
            $table->tinyInteger('tr_bank_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar__banks');
    }
};
