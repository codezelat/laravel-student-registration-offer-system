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
    public function landing(Request $request)
    {
        $diploma = $request->query('diploma');
        return view('registration.landing', compact('diploma'));
    }

    /**
     * Show the Sinhala landing page (New Home)
     */
    public function showSinhalaLanding()
    {
        return view('registration.landing-sinhala');
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

        // Find the diploma config
        $diplomaConfig = collect($diplomas)->firstWhere('name', $diploma);
        
        // Generate unique registration ID with diploma-specific prefix
        $registrationId = $this->generateRegistrationId($diplomaConfig['reg_prefix']);
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
        session()->put('current_step', 2); // Move to payment step

        // Return JSON for AJAX handling
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration data saved. Please proceed to payment.'
            ]);
        }

        // Redirect to payment options (fallback)
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
    private function generateRegistrationId(string $prefix): string
    {
        do {
            // Generate 8-digit unique number
            $uniqueCode = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);
            $id = $prefix . '/' . $uniqueCode;
        } while (Student::where('registration_id', $id)->exists());

        return $id;
    }
}
