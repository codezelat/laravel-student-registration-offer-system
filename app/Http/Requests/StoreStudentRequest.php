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
        $selectedDiploma = $this->input('selected_diploma');
        
        return [
            'registration_id' => ['required', 'string', 'regex:/^SITC\/SC\/2025\/\d+B\/(EN|PC|IT|HR|BM)\/\d{8}$/', 'unique:students,registration_id'],
            'full_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'name_with_initials' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:male,female'],
            'nic' => [
                'required', 
                'string', 
                'regex:/^([0-9]{9}[vVxX]|[0-9]{12})$/',
                function ($attribute, $value, $fail) use ($selectedDiploma) {
                    // Custom validation for Sri Lankan NIC
                    if (!$this->validateSriLankanNIC($value)) {
                        $fail('Please enter a valid Sri Lankan NIC number.');
                        return;
                    }
                    
                    // Check for duplicate NIC for the same diploma
                    $exists = \App\Models\Student::where('nic', strtoupper($value))
                        ->where('selected_diploma', $selectedDiploma)
                        ->exists();
                    if ($exists) {
                        $fail('This NIC is already registered for the selected diploma.');
                    }
                }
            ],
            'date_of_birth' => ['required', 'date', 'before:today', 'after:1950-01-01'],
            'email' => [
                'required', 
                'email', 
                'max:255',
                function ($attribute, $value, $fail) use ($selectedDiploma) {
                    $exists = \App\Models\Student::where('email', $value)
                        ->where('selected_diploma', $selectedDiploma)
                        ->exists();
                    if ($exists) {
                        $fail('This email is already registered for the selected diploma.');
                    }
                }
            ],
            'permanent_address' => ['required', 'string', 'max:500'],
            'postal_code' => ['nullable', 'string', 'regex:/^[0-9]{5}$/'],
            'district' => ['required', 'string'],
            'home_contact_number' => ['required', 'string', 'regex:/^0[0-9]{9}$/'],
            'whatsapp_number' => [
                'required',
                'string',
                'regex:/^07[0-9]{8}$/',
                function ($attribute, $value, $fail) use ($selectedDiploma) {
                    $exists = \App\Models\Student::where('whatsapp_number', $value)
                        ->where('selected_diploma', $selectedDiploma)
                        ->exists();
                    if ($exists) {
                        $fail('This WhatsApp number is already registered for the selected diploma.');
                    }
                }
            ],
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
            'date_of_birth.required' => 'Please select your date of birth.',
            'date_of_birth.before' => 'Date of birth must be in the past.',
            'date_of_birth.after' => 'Please enter a valid date of birth.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'permanent_address.required' => 'Please enter your permanent address.',
            'permanent_address.max' => 'Address cannot exceed 500 characters.',
            'postal_code.regex' => 'Please enter a valid 5-digit postal code.',
            'district.required' => 'Please select your district.',
            'home_contact_number.required' => 'Please enter your emergency contact number.',
            'home_contact_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
            'whatsapp_number.required' => 'Please enter your WhatsApp number.',
            'whatsapp_number.regex' => 'Please enter a valid Sri Lankan mobile number (e.g., 0771234567).',
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
            'home_contact_number' => 'emergency contact number',
            'whatsapp_number' => 'WhatsApp number',
            'terms_accepted' => 'terms and conditions',
            'selected_diploma' => 'diploma selection',
        ];
    }

    /**
     * Validate Sri Lankan NIC number
     */
    private function validateSriLankanNIC(string $nic): bool
    {
        // Remove spaces and convert to uppercase
        $nic = strtoupper(trim($nic));
        
        // Check format
        if (!preg_match('/^([0-9]{9}[VX]|[0-9]{12})$/', $nic)) {
            return false;
        }
        
        if (strlen($nic) === 10) {
            // Old format validation
            return $this->validateOldFormatNIC($nic);
        } else {
            // New format validation
            return $this->validateNewFormatNIC($nic);
        }
    }
    
    /**
     * Validate old format NIC (9 digits + V/X)
     */
    private function validateOldFormatNIC(string $nic): bool
    {
        $digits = substr($nic, 0, 9);
        
        // Extract birth year (first 2 digits + 1900)
        $yearPrefix = (int)substr($digits, 0, 2);
        $birthYear = 1900 + $yearPrefix;
        
        // Extract day of year (next 3 digits)
        $dayOfYear = (int)substr($digits, 2, 3);
        
        // If day > 500, it's female and we subtract 500
        if ($dayOfYear > 500) {
            $dayOfYear -= 500;
        }
        
        // Validate day of year (1-366)
        if ($dayOfYear < 1 || $dayOfYear > 366) {
            return false;
        }
        
        // Validate birth year
        $currentYear = date('Y');
        if ($birthYear < 1900 || $birthYear > $currentYear - 10) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Validate new format NIC (12 digits)
     */
    private function validateNewFormatNIC(string $nic): bool
    {
        // Extract birth year (first 4 digits)
        $birthYear = (int)substr($nic, 0, 4);
        
        // Extract day of year (next 3 digits)
        $dayOfYear = (int)substr($nic, 4, 3);
        
        // If day > 500, it's female and we subtract 500
        if ($dayOfYear > 500) {
            $dayOfYear -= 500;
        }
        
        // Validate day of year (1-366)
        if ($dayOfYear < 1 || $dayOfYear > 366) {
            return false;
        }
        
        // Validate birth year
        $currentYear = date('Y');
        if ($birthYear < 1900 || $birthYear > $currentYear - 10) {
            return false;
        }
        
        return true;
    }
}
