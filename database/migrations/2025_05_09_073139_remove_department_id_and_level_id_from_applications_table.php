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
        Schema::table('applications', function (Blueprint $table) {
            if(Schema::hasColumns("applications", ["department_id", "level_id"])) {
                // Foriegn
                $table->dropForeign('applications_department_id_foreign');
                $table->dropForeign('applications_level_id_foreign');
                $table->dropColumn('department_id');
                $table->dropColumn('level_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if(!Schema::hasColumn('applications', 'department_id')) {
                $table->foreignId('department_id')->after('id_card_number')->constrained();
            }

            if(!Schema::hasColumn('applications', 'level_id')) {
                $table->foreignId('level_id')->after('id_card_number')->constrained();
            }
            
        });
    }
};
