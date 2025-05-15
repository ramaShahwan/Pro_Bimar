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
        Schema::create('tenders', function (Blueprint $table) {

            $table->id();
            $table->string('project_name')->nullable();
            $table->string('note')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('visit_date')->nullable();
            $table->string('visit_status')->nullable();
            $table->string('tender_status')->nullable();
            $table->string('organization')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('check_value')->nullable();
            $table->string('check_status')->nullable();
            $table->string('url')->nullable();
            $table->string('address')->nullable();

           $table->unsignedBigInteger('user_id');


             if (Schema::hasTable('users')) {
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            }

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
