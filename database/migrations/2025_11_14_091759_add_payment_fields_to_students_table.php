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
            $table->string('student_id')->nullable()->unique()->after('registration_id');
            $table->enum('payment_method', ['online', 'slip'])->nullable()->after('selected_diploma');
            $table->string('payment_slip')->nullable()->after('payment_method');
            $table->enum('payment_status', ['pending', 'completed'])->default('pending')->after('payment_slip');
            $table->string('payhere_order_id')->nullable()->after('payment_status');
            $table->decimal('amount_paid', 10, 2)->nullable()->after('payhere_order_id');
            $table->timestamp('payment_date')->nullable()->after('amount_paid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'student_id',
                'payment_method',
                'payment_slip',
                'payment_status',
                'payhere_order_id',
                'amount_paid',
                'payment_date'
            ]);
        });
    }
};
