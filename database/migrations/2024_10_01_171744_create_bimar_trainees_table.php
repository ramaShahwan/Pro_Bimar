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
        Schema::create('bimar_trainees', function (Blueprint $table) {
            // $table->id('trainee_id')->autoIncrement();
            $table->id();
            $table->string('trainee_fname_ar', 100);
            $table->string('trainee_lname_ar', 100);
            $table->string('trainee_fname_en', 100);
            $table->string('trainee_lname_en', 100);
            $table->string('trainee_mobile', 50);
            $table->string('trainee_email', 50);
            $table->unsignedBigInteger('bimar_users_status_id');
            $table->unsignedBigInteger('bimar_users_gender_id');
            $table->string('trainee_address', 255)->nullable();
            $table->string('trainee_personal_img', 200)->nullable();
            $table->string('trainee_pass', 255);
            $table->string('trainee_last_pass', 255)->nullable();
            $table->timestamp('trainee_passchangedate')->nullable();
            $table->timestamp('trainee_createdate')->useCurrent();
            $table->timestamp('trainee_lastaccess')->nullable();

            $table->timestamps();
            // index
            $table->index('trainee_email');
            $table->index('trainee_mobile');


            if (Schema::hasTable('bimar_users_statuses')) {
                $table->foreign('bimar_users_status_id')->references('id')->on('bimar_users_statuses')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users_genders')) {
                $table->foreign('bimar_users_gender_id')->references('id')->on('bimar_users_genders')->cascadeOnDelete();
            }

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_trainees');
    }
};
