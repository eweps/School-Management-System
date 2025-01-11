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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('id_card_number', 255)->unique();
            $table->string('address', 255);
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['married', 'bachelor', 'divorced']);
            $table->string('phone_number', 255);
            $table->date('date_of_birth');
            $table->string('place_of_birth', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
