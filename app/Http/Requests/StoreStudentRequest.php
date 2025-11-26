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
            'registration_id' => ['required', 'string', 'regex:/^SITC\/2025\/\d+B\/(EN|PC|IT|HR|BM)\/\d{8}$/', 'unique:students,registration_id'],
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'name_with_initials' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'nic' => ['required', 'string', 'regex:/^([0-9]{9}[vVxX]|[0-9]{12})$/', 'unique:students,nic'],
            'date_of_birth' => ['required', 'date', 'before:today', 'after:1950-01-01'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'permanent_address' => ['required', 'string', 'max:500'],
            'postal_code' => ['required', 'string', 'regex:/^[0-9]{5}$/'],
            'district' => ['required', 'string'],
            'home_contact_number' => ['nullable', 'string', 'regex:/^0[0-9]{9}$/'],
            'whatsapp_number' => ['required', 'string', 'regex:/^0[0-9]{9}$/', 'unique:students,whatsapp_number'],
            'terms_accepted' => ['required', 'accepted'],
            'selected_diploma' => ['required', 'string', 'in:Diploma in English,Diploma in Psychology and Counseling,Diploma in Information Technology,Diploma in Human Resource Management,Diploma in Business Management'],
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
            'name_with_initials.required' => 'Please enter your name with initials.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Please select a valid gender option.',
            'nic.required' => 'Please enter your NIC number.',
            'nic.regex' => 'Please enter a valid NIC number (e.g., 123456789V or 123456789012).',
            'nic.unique' => 'This NIC number is already registered.',
            'date_of_birth.required' => 'Please select your date of birth.',
            'date_of_birth.before' => 'Date of birth must be in the past.',
            'date_of_birth.after' => 'Please enter a valid date of birth.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'permanent_address.required' => 'Please enter your permanent address.',
            'permanent_address.max' => 'Address cannot exceed 500 characters.',
            'postal_code.required' => 'Please enter your postal code.',
            'postal_code.regex' => 'Please enter a valid 5-digit postal code.',
            'district.required' => 'Please select your district.',
            'home_contact_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
            'whatsapp_number.required' => 'Please enter your WhatsApp number.',
            'whatsapp_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
            'whatsapp_number.unique' => 'This WhatsApp number is already registered.',
            'terms_accepted.required' => 'You must accept the terms and conditions to proceed.',
            'terms_accepted.accepted' => 'You must accept the terms and conditions to proceed.',
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
            'name_with_initials' => 'name with initials',
            'nic' => 'NIC',
            'date_of_birth' => 'date of birth',
            'permanent_address' => 'permanent address',
            'postal_code' => 'postal code',
            'home_contact_number' => 'home contact number',
            'whatsapp_number' => 'WhatsApp number',
            'terms_accepted' => 'terms and conditions',
            'selected_diploma' => 'diploma selection',
        ];
    }
}
