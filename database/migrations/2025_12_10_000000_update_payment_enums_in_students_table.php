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
        Schema::table('students', function (Blueprint $table) {
            // Change enum to string to allow new values and remove checking constraints
            $table->string('payment_method')->change();
            $table->string('payment_status')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We cannot easily revert back to the exact enum constraints without data loss or complex logic
        // leaving as string is safer
    }
};
