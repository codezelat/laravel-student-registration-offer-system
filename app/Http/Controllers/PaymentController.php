<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Show payment options page
     */
    public function paymentOptions()
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('landing');
        }
        
        $studentData = session('registration_data');
        
        return view('registration.payment-options', compact('studentData'));
    }

    /**
     * Show upload payment slip page
     */
    public function showUploadSlip()
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('landing');
        }
        
        $studentData = session('registration_data');
        
        return view('registration.upload-slip', compact('studentData'));
    }

    /**
     * Store uploaded payment slip
     */
    public function storeSlip(Request $request)
    {
        $request->validate([
            'payment_slip' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,doc|max:10240', // 10MB max
        ]);

        if (!session()->has('registration_data')) {
            return redirect()->route('landing');
        }

        $studentData = session('registration_data');

        // Upload payment slip
        if ($request->hasFile('payment_slip')) {
            $file = $request->file('payment_slip');
            $filename = 'slip_' . $studentData['registration_id'] . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('payment_slips', $filename, 'public');

            // Generate student ID
            $studentId = $this->generateStudentId();

            // NOW create student record in database with payment info
            $student = Student::create(array_merge($studentData, [
                'student_id' => $studentId,
                'payment_method' => 'slip',
                'payment_slip' => $path,
                'payment_status' => 'pending',
                'amount_paid' => 5000.00,
                'payment_date' => now(),
            ]));

            // Clear session data
            session()->forget(['registration_data', 'registration_id']);

            return view('registration.slip-success', compact('student'));
        }

        return back()->with('error', 'Failed to upload payment slip. Please try again.');
    }

    /**
     * Show PayHere payment page
     */
    public function payhere(Request $request)
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('landing');
        }

        $studentData = session('registration_data');
        
        // Generate unique order ID
        $orderId = 'ORD-' . $studentData['registration_id'] . '-' . time();
        
        // Store order ID in session for later
        session()->put('payhere_order_id', $orderId);
        
        // PayHere payment details
        $merchantId = config('services.payhere.merchant_id');
        $merchantSecret = config('services.payhere.merchant_secret');
        $amount = '5000.00';
        $currency = 'LKR';
        
        // Generate hash for payment security
        // Format: md5(merchant_id + order_id + amount + currency + md5(merchant_secret))
        $hashedSecret = strtoupper(md5($merchantSecret));
        $hash = strtoupper(md5($merchantId . $orderId . $amount . $currency . $hashedSecret));

        return view('registration.payhere-payment', compact('studentData', 'orderId', 'hash'));
    }

    /**
     * Handle PayHere success callback
     */
    public function payhereSuccess(Request $request)
    {
        if (!session()->has('registration_data')) {
            return redirect()->route('landing');
        }

        $studentData = session('registration_data');
        $orderId = $request->query('order_id') ?? session('payhere_order_id');

        // Generate student ID
        $studentId = $this->generateStudentId();

        // NOW create student record in database with payment info
        $student = Student::create(array_merge($studentData, [
            'student_id' => $studentId,
            'payment_method' => 'online',
            'payment_status' => 'completed',
            'payhere_order_id' => $orderId,
            'amount_paid' => 5000.00,
            'payment_date' => now(),
        ]));

        // Clear session data
        session()->forget(['registration_data', 'registration_id', 'payhere_order_id']);

        return view('registration.payment-success', compact('student'));
    }

    /**
     * Handle PayHere notify callback (webhook)
     */
    public function payhereNotify(Request $request)
    {
        // Log the notification for debugging
        \Log::info('PayHere Notification:', $request->all());

        // Verify the payment with PayHere
        $merchant_id = $request->input('merchant_id');
        $order_id = $request->input('order_id');
        $payment_id = $request->input('payment_id');
        $payhere_amount = $request->input('payhere_amount');
        $payhere_currency = $request->input('payhere_currency');
        $status_code = $request->input('status_code');
        $md5sig = $request->input('md5sig');

        // Get merchant secret from config
        $merchant_secret = config('services.payhere.merchant_secret');

        // Generate MD5 hash
        $local_md5sig = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                $payhere_amount . 
                $payhere_currency . 
                $status_code . 
                strtoupper(md5($merchant_secret))
            )
        );

        // Verify signature
        if ($local_md5sig === $md5sig && $status_code == 2) {
            // Payment success
            $customField1 = $request->input('custom_1'); // student ID
            
            if ($customField1) {
                $student = Student::find($customField1);
                if ($student && $student->payment_status !== 'completed') {
                    // Generate student ID if not already done
                    if (!$student->student_id) {
                        $studentId = $this->generateStudentId();
                        $student->student_id = $studentId;
                    }

                    $student->update([
                        'payment_method' => 'online',
                        'payment_status' => 'completed',
                        'payhere_order_id' => $order_id,
                        'amount_paid' => $payhere_amount,
                        'payment_date' => now(),
                    ]);
                }
            }
        }

        return response('OK', 200);
    }

    /**
     * Generate unique student ID in format: 2025-std-2101
     */
    private function generateStudentId(): string
    {
        $year = date('Y');
        $prefix = "{$year}-std-";
        
        // Get the last student ID for this year
        $lastStudent = Student::where('student_id', 'LIKE', "{$prefix}%")
            ->orderBy('student_id', 'desc')
            ->first();

        if ($lastStudent) {
            // Extract the number part and increment
            $lastNumber = (int) substr($lastStudent->student_id, -4);
            $newNumber = $lastNumber + 1;
        } else {
            // Start from 2101 for the first student
            $newNumber = 2101;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
