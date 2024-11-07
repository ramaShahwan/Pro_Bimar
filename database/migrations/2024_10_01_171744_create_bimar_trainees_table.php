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

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            $table->timestamps();
            // index
            $table->index('trainee_email');
            $table->index('trainee_mobile');

            // foreign
            // $table->foreignId('bimar_users_status_id')->constrained()->cascadeOnDelete()->nullable();
            // $table->foreignId('bimar_users_gender_id')->constrained()->cascadeOnDelete()->nullable();

            if (Schema::hasTable('bimar_users_statuses')) {
                $table->foreign('bimar_users_status_id')->references('id')->on('bimar_users_statuses')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users_genders')) {
                $table->foreign('bimar_users_gender_id')->references('id')->on('bimar_users_genders')->cascadeOnDelete();
            }

            // $table->foreign('trainee_status')
            //       ->references('tr_users_status_id')
            //       ->on('bimar_users_status')
            //       ->onDelete('cascade');

            // $table->foreign('trainee_gender')
            //       ->references('tr_users_gender_id')
            //       ->on('bimar_users_gender')
            //       ->onDelete('cascade');

            // $table->primary('trainee_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_trainees');
    }
};
