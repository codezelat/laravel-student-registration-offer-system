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
        // For SQLite, we can't easily check if index exists, so just add composite unique constraints
        // The old unique constraints on nic, email were already dropped in previous migration
        Schema::table('students', function (Blueprint $table) {
            // Add composite unique constraints (per diploma)
            $table->unique(['nic', 'selected_diploma'], 'students_nic_diploma_unique');
            $table->unique(['email', 'selected_diploma'], 'students_email_diploma_unique');
            $table->unique(['whatsapp_number', 'selected_diploma'], 'students_whatsapp_diploma_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop composite constraints
            $table->dropUnique('students_nic_diploma_unique');
            $table->dropUnique('students_email_diploma_unique');
            $table->dropUnique('students_whatsapp_diploma_unique');
            
            // Restore simple unique constraints
            $table->unique('nic');
            $table->unique('email');
            $table->unique('whatsapp_number');
        });
    }
};
