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
    public function paymentOptions($studentId)
    {
        $student = Student::findOrFail($studentId);
        
        return view('registration.payment-options', compact('student'));
    }

    /**
     * Show upload payment slip page
     */
    public function showUploadSlip($studentId)
    {
        $student = Student::findOrFail($studentId);
        
        return view('registration.upload-slip', compact('student'));
    }

    /**
     * Store uploaded payment slip
     */
    public function storeSlip(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'payment_slip' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,doc|max:10240', // 10MB max
        ]);

        $student = Student::findOrFail($request->student_id);

        // Upload payment slip
        if ($request->hasFile('payment_slip')) {
            $file = $request->file('payment_slip');
            $filename = 'slip_' . $student->registration_id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('payment_slips', $filename, 'public');

            // Generate student ID
            $studentId = $this->generateStudentId();

            // Update student record
            $student->update([
                'student_id' => $studentId,
                'payment_method' => 'slip',
                'payment_slip' => $path,
                'payment_status' => 'pending',
                'amount_paid' => 5000.00,
                'payment_date' => now(),
            ]);

            return view('registration.slip-success', compact('student'));
        }

        return back()->with('error', 'Failed to upload payment slip. Please try again.');
    }

    /**
     * Show PayHere payment page
     */
    public function payhere(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        $student = Student::findOrFail($request->student_id);
        
        // Generate unique order ID
        $orderId = 'ORD-' . $student->registration_id . '-' . time();
        
        // PayHere payment details
        $merchantId = config('services.payhere.merchant_id');
        $merchantSecret = config('services.payhere.merchant_secret');
        $amount = '5000.00';
        $currency = 'LKR';
        
        // Generate hash for payment security
        // Format: md5(merchant_id + order_id + amount + currency + md5(merchant_secret))
        $hashedSecret = strtoupper(md5($merchantSecret));
        $hash = strtoupper(md5($merchantId . $orderId . $amount . $currency . $hashedSecret));

        return view('registration.payhere-payment', compact('student', 'orderId', 'hash'));
    }

    /**
     * Handle PayHere success callback
     */
    public function payhereSuccess(Request $request, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $orderId = $request->query('order_id');

        // Generate student ID
        $studentId = $this->generateStudentId();

        // Update student record
        $student->update([
            'student_id' => $studentId,
            'payment_method' => 'online',
            'payment_status' => 'completed',
            'payhere_order_id' => $orderId,
            'amount_paid' => 5000.00,
            'payment_date' => now(),
        ]);

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
