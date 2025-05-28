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
        Schema::table('diplomas', function (Blueprint $table) {
            $table->foreignId('diploma_type_id')->after('description')->nullable()->constrained();
            $table->foreignId('department_id')->after('diploma_type_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diplomas', function (Blueprint $table) {
             $table->dropForeign(['diploma_type_id', 'department_id']);
             $table->dropColumn(['diploma_type_id', 'department_id']);
        });
    }
};
