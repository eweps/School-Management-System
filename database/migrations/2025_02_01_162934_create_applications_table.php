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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('firsname',255);
            $table->string('lastname',255);
            $table->string('email')->unique();
            $table->foreignId('course_session_id')->constrained();
            $table->foreignId('diploma_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->string('id_card_number',255)->unique();
            $table->string('address',255);
            $table->enum('gender', ['male','female']);
            $table->enum('marital_status', ['married','bachelor'. 'divorced']);
            $table->string('phone_number',255);
            $table->date('date_of_birth',);
            $table->string('place_of_birth',255);
            $table->string('salutation')->comment('Mr, Mrs, Miss, Dr, Prof, Chief, Engr');
            $table->string('preferred_language');
            $table->longText('academic_diploma')->nullable();
            $table->longText('professional_diploma')->nullable();
            $table->longText('professional_experience')->nullable();
            $table->longText('other_relevant_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
