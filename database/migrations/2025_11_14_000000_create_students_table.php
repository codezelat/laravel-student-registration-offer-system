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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique();
            $table->string('full_name');
            $table->string('nic'); // Removed unique - will be composite unique with diploma
            $table->date('date_of_birth');
            $table->string('contact_number'); // Will be dropped later
            $table->string('email'); // Removed unique - will be composite unique with diploma
            $table->enum('selected_diploma', ['English', 'IT', 'HR']);
            $table->timestamps();

            // Indexes for better query performance
            $table->index('registration_id');
            $table->index('email');
            $table->index('nic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
