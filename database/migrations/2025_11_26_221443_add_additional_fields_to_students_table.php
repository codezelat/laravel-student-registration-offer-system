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
            // Add new fields
            $table->string('name_with_initials')->after('full_name');
            $table->enum('gender', ['male', 'female', 'other'])->after('name_with_initials');
            $table->text('permanent_address')->after('email');
            $table->string('postal_code', 10)->after('permanent_address');
            $table->string('district')->after('postal_code');
            $table->string('home_contact_number')->nullable()->after('contact_number');
            $table->string('whatsapp_number')->after('home_contact_number');
            $table->boolean('terms_accepted')->default(false)->after('selected_diploma');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'name_with_initials',
                'gender',
                'permanent_address',
                'postal_code',
                'district',
                'home_contact_number',
                'whatsapp_number',
                'terms_accepted'
            ]);
        });
    }
};
