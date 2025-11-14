<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'registration_id' => ['required', 'string', 'unique:students,registration_id'],
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'nic' => ['required', 'string', 'regex:/^([0-9]{9}[vVxX]|[0-9]{12})$/', 'unique:students,nic'],
            'date_of_birth' => ['required', 'date', 'before:today', 'after:1950-01-01'],
            'contact_number' => ['required', 'string', 'regex:/^0[0-9]{9}$/', 'unique:students,contact_number'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'selected_diploma' => ['required', 'string', 'in:English,IT,HR'],
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Please enter your full name.',
            'full_name.regex' => 'Full name should only contain letters and spaces.',
            'nic.required' => 'Please enter your NIC number.',
            'nic.regex' => 'Please enter a valid NIC number (e.g., 123456789V or 123456789012).',
            'nic.unique' => 'This NIC number is already registered.',
            'date_of_birth.required' => 'Please select your date of birth.',
            'date_of_birth.before' => 'Date of birth must be in the past.',
            'date_of_birth.after' => 'Please enter a valid date of birth.',
            'contact_number.required' => 'Please enter your contact number.',
            'contact_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
            'contact_number.unique' => 'This contact number is already registered.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'selected_diploma.required' => 'Please select a diploma.',
            'selected_diploma.in' => 'Please select a valid diploma option.',
        ];
    }

    /**
     * Get custom attribute names for validation errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'full_name' => 'full name',
            'nic' => 'NIC',
            'date_of_birth' => 'date of birth',
            'contact_number' => 'contact number',
            'selected_diploma' => 'diploma selection',
        ];
    }
}
