<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    private string $username;
    private string $password;
    private string $source;
    private string $apiUrl;

    private array $whatsappLinks;

    public function __construct()
    {
        $this->username = config('services.sms.username');
        $this->password = config('services.sms.password');
        $this->source = config('services.sms.source');
        $this->apiUrl = config('services.sms.api_url');
        $this->whatsappLinks = config('whatsapp.groups', []);
    }

    /**
     * Send SMS to a phone number
     *
     * @param string $phoneNumber The destination phone number
     * @param string $message The SMS message to send
     * @return bool Success status
     */
    public function sendSms(string $phoneNumber, string $message): bool
    {
        try {
            // Clean phone number (remove spaces, dashes, etc.)
            $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

            // Build the query parameters
            $params = [
                'username' => $this->username,
                'password' => $this->password,
                'src' => $this->source,
                'dst' => $phoneNumber,
                'msg' => $message,
                'dr' => '1',
            ];

            // Send the SMS request
            // Disable SSL verification in local environment only
            $http = config('app.env') === 'local' 
                ? Http::withoutVerifying()->timeout(10)
                : Http::timeout(10);
            
            $response = $http->get($this->apiUrl, $params);

            // Log the response
            Log::info('SMS Sent', [
                'phone' => $phoneNumber,
                'message' => $message,
                'status' => $response->successful(),
                'response' => $response->body(),
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            // Log the error
            Log::error('SMS Failed', [
                'phone' => $phoneNumber,
                'message' => $message,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    /**
     * Send payment confirmation SMS
     *
     * @param string $phoneNumber The student's phone number
     * @param string $studentName The student's name
     * @param string $registrationId The registration ID
     * @param string $diplomaName The selected diploma program name
     * @param string $paymentMethod The payment method ('online' or 'slip')
     * @return bool Success status
     */
    public function sendPaymentConfirmation(string $phoneNumber, string $studentName, string $registrationId, string $diplomaName, string $paymentMethod): bool
    {
        if ($paymentMethod === 'online') {
            $message = "Congratulations {$studentName}! Payment SUCCESSFUL for {$diplomaName}. Your Registration ID: {$registrationId}. Welcome to SITC!";
            
            // Add WhatsApp group link if available
            if (isset($this->whatsappLinks[$diplomaName])) {
                $message .= " You can now join the WhatsApp group: {$this->whatsappLinks[$diplomaName]}";
            }
        } elseif ($paymentMethod === 'slip') {
            $message = "Your form has been submitted for {$diplomaName}. Your Registration ID: {$registrationId}. Our support team will add you to the related WhatsApp group soon.";
        } elseif ($paymentMethod === 'study_now_pay_later') {
            $message = "Congratulations {$studentName}! Your Study Now Pay Later registration for {$diplomaName} is confirmed. Your Registration ID: {$registrationId}.";
            
            // Add WhatsApp group link if available
            if (isset($this->whatsappLinks[$diplomaName])) {
                $message .= " Join the WhatsApp group: {$this->whatsappLinks[$diplomaName]}";
            }
        } else {
            // Fallback
            $message = "Payment processed for {$diplomaName}. Your Registration ID: {$registrationId}.";
        }
        
        return $this->sendSms($phoneNumber, $message);
    }
}
