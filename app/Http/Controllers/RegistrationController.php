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
        $diplomas = config('diplomas');
        return view('registration.select-diploma', compact('diplomas'));
    }

    /**
     * Show the registration form
     */
    public function showRegistrationForm(Request $request)
    {
        $diploma = $request->query('diploma');
        $diplomas = config('diplomas');
        $diplomaNames = array_column($diplomas, 'name');
        
        if (!$diploma || !in_array($diploma, $diplomaNames)) {
            return redirect()->route('select.diploma')
                ->with('error', 'Please select a valid diploma option.');
        }

        // Generate unique registration ID
        $registrationId = $this->generateRegistrationId();
        $districts = config('districts');

        return view('registration.register', [
            'diploma' => $diploma,
            'registrationId' => $registrationId,
            'districts' => $districts
        ]);
    }

    /**
     * Store the student registration
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        // Store registration data in session (don't save to DB yet)
        session()->put('registration_data', $validated);
        session()->put('registration_id', $validated['registration_id']);

        // Redirect to payment options
        return redirect()->route('payment.options');
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
