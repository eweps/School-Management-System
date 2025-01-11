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
        Schema::create('fee_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->longText('receipt');
            $table->decimal('amount_paid', 20, 8);
            $table->decimal('total_amount', 20, 8);
            $table->decimal('amount_left', 20, 8); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_records');
    }
};
