<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * Show the landing page with the question
     */
    public function landing()
    {
        return view('registration.landing');
    }

    /**
     * Show the diploma selection page
     */
    public function selectDiploma()
    {
        return view('registration.select-diploma');
    }

    /**
     * Show the registration form
     */
    public function showRegistrationForm(Request $request)
    {
        $diploma = $request->query('diploma');
        
        if (!$diploma || !in_array($diploma, ['English', 'IT', 'HR'])) {
            return redirect()->route('select.diploma')
                ->with('error', 'Please select a valid diploma option.');
        }

        // Generate unique registration ID
        $registrationId = $this->generateRegistrationId();

        return view('registration.register', [
            'diploma' => $diploma,
            'registrationId' => $registrationId
        ]);
    }

    /**
     * Store the student registration
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        $student = Student::create($validated);

        // Redirect to payment options instead of success page
        return redirect()->route('payment.options', $student->id);
    }

    /**
     * Show the success page
     */
    public function success()
    {
        if (!session()->has('registrationId')) {
            return redirect()->route('landing');
        }

        return view('registration.success');
    }

    /**
     * Generate a unique registration ID
     */
    private function generateRegistrationId(): string
    {
        do {
            $id = 'REG-' . date('Y') . '-' . strtoupper(Str::random(5));
        } while (Student::where('registration_id', $id)->exists());

        return $id;
    }
}
