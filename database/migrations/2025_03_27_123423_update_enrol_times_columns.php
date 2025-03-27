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
        Schema::table('bimar_course_enrol_times', function (Blueprint $table) {
            $table->time('tr_course_enrol_times_from')->change();
            $table->time('tr_course_enrol_times_to')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bimar_course_enrol_times', function (Blueprint $table) {
            $table->integer('tr_course_enrol_times_from')->change();
            $table->integer('tr_course_enrol_times_to')->change();
        });
    }
};
