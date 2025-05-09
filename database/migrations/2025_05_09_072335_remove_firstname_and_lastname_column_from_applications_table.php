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
            if(Schema::hasColumns("applications", ["firstname", "lastname"])) {
                $table->dropColumn('firstname');
                $table->dropColumn('lastname');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            if(!Schema::hasColumn('applications', 'firstname')) {
                $table->string('firstname', 255)->after('id');
            }
           
            if(!Schema::hasColumn('applications', 'lastname')) {
                $table->string('lastname', 255)->after('id');
            }
            
        });
    }
};
