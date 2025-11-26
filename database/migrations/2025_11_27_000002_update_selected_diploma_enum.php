<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SQLite doesn't support direct ALTER COLUMN, so we need to recreate the column
        // First, let's just drop the constraint and make it a string
        DB::statement('PRAGMA foreign_keys=OFF');
        
        Schema::table('students', function (Blueprint $table) {
            $table->string('selected_diploma_temp')->nullable();
        });
        
        // Copy data
        DB::statement('UPDATE students SET selected_diploma_temp = selected_diploma');
        
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('selected_diploma');
        });
        
        Schema::table('students', function (Blueprint $table) {
            $table->string('selected_diploma')->after('district');
        });
        
        // Copy data back
        DB::statement('UPDATE students SET selected_diploma = selected_diploma_temp');
        
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('selected_diploma_temp');
        });
        
        DB::statement('PRAGMA foreign_keys=ON');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to enum if needed
        DB::statement('PRAGMA foreign_keys=OFF');
        
        Schema::table('students', function (Blueprint $table) {
            $table->string('selected_diploma_temp')->nullable();
        });
        
        DB::statement('UPDATE students SET selected_diploma_temp = selected_diploma');
        
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('selected_diploma');
        });
        
        Schema::table('students', function (Blueprint $table) {
            $table->enum('selected_diploma', ['English', 'IT', 'HR'])->after('district');
        });
        
        DB::statement('UPDATE students SET selected_diploma = selected_diploma_temp');
        
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('selected_diploma_temp');
        });
        
        DB::statement('PRAGMA foreign_keys=ON');
    }
};
