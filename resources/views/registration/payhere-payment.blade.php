<x-layout>
    <x-slot:title>Payment Processing</x-slot:title>

    <div class="space-y-6 max-w-3xl mx-auto">
        <!-- Header -->
        <x-card class="bg-gradient-to-r from-blue-600 to-blue-700 text-white border-0">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-2">Complete Your Payment</h2>
                <p class="text-sm opacity-90">Secure payment with PayHere</p>
            </div>
        </x-card>

        <!-- Payment Info -->
        <x-card class="bg-blue-50 border-blue-200">
            <div class="space-y-3">
                <!-- <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Registration ID:</span>
                    <span class="font-bold text-blue-600">{{ $student->registration_id }}</span>
                </div> -->
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Student Name:</span>
                    <span class="font-semibold text-gray-800">{{ $student->full_name }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-medium text-gray-700">Diploma:</span>
                    <span class="font-semibold text-gray-800">{{ $student->selected_diploma }}</span>
                </div>
                <hr class="my-2 border-blue-300">
                <div class="flex justify-between items-center">
                    <span class="font-bold text-gray-800 text-lg">Total Amount:</span>
                    <span class="font-bold text-green-600 text-2xl">LKR 5,000.00</span>
                </div>
            </div>
        </x-card>

        <!-- Payment Button -->
        <x-card>
            <div class="text-center space-y-4">
                <p class="text-gray-700">Click the button below to proceed with secure payment</p>
                
                <button 
                    type="button" 
                    id="payhere-payment" 
                    class="w-full px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                >
                    Pay LKR 5,000.00 with PayHere
                </button>

                <div class="flex items-center justify-center space-x-2 text-sm text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>Secure Payment Gateway</span>
                </div>
            </div>
        </x-card>

        <!-- Security Info -->
        <x-card class="bg-green-50 border-green-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                Secure Payment
            </h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">✓</span>
                    <span>Your payment is secured with SSL encryption</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">✓</span>
                    <span>All credit/debit card information is handled securely by PayHere</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">✓</span>
                    <span>We do not store your card details</span>
                </li>
            </ul>
        </x-card>

        <!-- Back Button -->
        <div class="text-center">
            <a 
                href="{{ route('payment.options', $student->id) }}"
                class="inline-block px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-medium transition-all duration-300"
            >
                ← Back to Payment Options
            </a>
        </div>
    </div>

    <!-- PayHere Integration Script -->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script>
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            // Redirect to success page for validation
            window.location.href = "{{ route('payment.payhere-success', $student->id) }}?order_id=" + orderId;
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            console.log("Payment dismissed");
            alert("Payment was cancelled. You can try again or choose another payment method.");
        };

        // Error occurred
        payhere.onError = function onError(error) {
            console.log("Error:" + error);
            alert("Payment failed: " + error + ". Please try again or contact support.");
        };

        // Put the payment variables here
        var payment = {
            "sandbox": true, // Change to false for production
            "merchant_id": "{{ config('services.payhere.merchant_id') }}",
            "return_url": undefined, // Important
            "cancel_url": undefined, // Important
            "notify_url": "{{ route('payment.notify') }}",
            "order_id": "{{ $orderId }}",
            "items": "Student Registration - Diploma in {{ $student->selected_diploma }}",
            "amount": "5000.00",
            "currency": "LKR",
            "hash": "{{ $hash }}", // Generated hash from backend
            "first_name": "{{ explode(' ', $student->full_name)[0] }}",
            "last_name": "{{ implode(' ', array_slice(explode(' ', $student->full_name), 1)) ?: explode(' ', $student->full_name)[0] }}",
            "email": "{{ $student->email }}",
            "phone": "{{ $student->contact_number }}",
            "address": "Sri Lanka",
            "city": "Colombo",
            "country": "Sri Lanka",
            "delivery_address": "Sri Lanka",
            "delivery_city": "Colombo",
            "delivery_country": "Sri Lanka",
            "custom_1": "{{ $student->id }}",
            "custom_2": "{{ $student->registration_id }}"
        };

        // Show the payhere.js popup when "Pay with PayHere" button is clicked
        document.getElementById('payhere-payment').onclick = function (e) {
            e.preventDefault();
            payhere.startPayment(payment);
        };
    </script>
</x-layout>
