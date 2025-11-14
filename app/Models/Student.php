<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'registration_id',
        'student_id',
        'full_name',
        'nic',
        'date_of_birth',
        'contact_number',
        'email',
        'selected_diploma',
        'payment_method',
        'payment_slip',
        'payment_status',
        'payhere_order_id',
        'amount_paid',
        'payment_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'payment_date' => 'datetime',
        'amount_paid' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
