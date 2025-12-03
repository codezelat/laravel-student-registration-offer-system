<x-layout>
    <x-slot:title>Payment Processing</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step 3 of 3</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary w-full rounded-full transition-all duration-500"></div>
            </div>
            
            <!-- Step Labels -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-green-500 text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-green-600">Details</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-green-500 text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-green-600">Payment</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-primary-500 text-white">
                        3
                    </div>
                    <p class="text-xs font-medium text-primary-600">Card Payment</p>
                </div>
            </div>
        </div>

        <!-- Countdown Timer -->
        <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full -translate-y-24 translate-x-24"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Secure Card Payment</p>
                        <p class="text-xs opacity-75">Complete your registration</p>
                    </div>
                </div>
                
                <div id="countdown" 
                     data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}"
                     class="flex gap-3">
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="days" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Days</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="hours" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Hrs</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="minutes" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Min</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="seconds" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Sec</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Selected Diploma Badge -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200/50">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-green-700 font-medium">Selected Program</p>
                    <p class="text-xl font-bold text-green-900">{{ $studentData['selected_diploma'] }}</p>
                </div>
            </div>
        </div>

        <!-- Registration Details Summary -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Payment Details
            </h3>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-neutral-50 rounded-xl p-4">
                    <p class="text-sm text-neutral-600 mb-1">Registration ID</p>
                    <p class="font-bold text-gray-900">{{ $studentData['registration_id'] }}</p>
                </div>
                <div class="bg-neutral-50 rounded-xl p-4">
                    <p class="text-sm text-neutral-600 mb-1">Student Name</p>
                    <p class="font-semibold text-gray-900">{{ $studentData['full_name'] }}</p>
                </div>
                <div class="bg-neutral-50 rounded-xl p-4">
                    <p class="text-sm text-neutral-600 mb-1">Selected Diploma</p>
                    <p class="font-semibold text-gray-900">{{ $studentData['selected_diploma'] }}</p>
                </div>
                <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                    <p class="text-sm text-green-700 mb-1">Total Amount</p>
                    <p class="font-bold text-green-600 text-2xl">LKR 4,000.00</p>
                </div>
            </div>
        </div>

        <!-- Payment Button Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 md:p-8 border border-neutral-200/50">
            <div class="text-center space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Complete Your Payment
                    </h3>
                    <p class="text-gray-600">Click the button below to proceed with secure payment</p>
                </div>
                
                <button 
                    type="button" 
                    id="payhere-payment" 
                    class="w-full px-8 py-5 bg-gradient-primary hover:shadow-2xl text-white rounded-xl font-bold text-lg transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center"
                >
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Pay LKR 4,000.00 with PayHere
                </button>

                <div class="flex items-center justify-center space-x-2 text-sm text-gray-600">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span class="font-medium">Secure Payment Gateway</span>
                </div>

                <a 
                    href="{{ route('payment.options') }}"
                    class="w-full px-6 py-3 bg-neutral-100 hover:bg-neutral-200 text-gray-800 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Payment Options
                </a>
            </div>
        </div>

        <!-- Security Info Card -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200/50">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Secure Payment</h3>
            </div>
            
            <ul class="space-y-3 text-sm text-gray-700">
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Your payment is secured with SSL encryption</span>
                </li>
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>All credit/debit card information is handled securely by PayHere</span>
                </li>
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-green-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>We do not store your card details</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- PayHere Integration Script -->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script>
        // Countdown Timer
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            const deadline = new Date(countdownElement.dataset.deadline).getTime();
            const now = new Date().getTime();
            const distance = deadline - now;

            if (distance < 0) {
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('minutes').textContent = '00';
                document.getElementById('seconds').textContent = '00';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = String(days).padStart(2, '0');
            document.getElementById('hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);

        // PayHere Payment Integration
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            // Redirect to success page for validation
            window.location.href = "{{ route('payment.payhere-success') }}?order_id=" + orderId;
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
            "sandbox": {{ config('services.payhere.sandbox') ? 'true' : 'false' }},
            "merchant_id": "{{ config('services.payhere.merchant_id') }}",
            "return_url": undefined, // Important
            "cancel_url": undefined, // Important
            "notify_url": "{{ route('payment.notify') }}",
            "order_id": "{{ $orderId }}",
            "items": "Student Registration - {{ $studentData['selected_diploma'] }}",
            "amount": "4000.00",
            "currency": "LKR",
            "hash": "{{ $hash }}", // Generated hash from backend
            "first_name": "{{ explode(' ', $studentData['full_name'])[0] }}",
            "last_name": "{{ implode(' ', array_slice(explode(' ', $studentData['full_name']), 1)) ?: explode(' ', $studentData['full_name'])[0] }}",
            "email": "{{ $studentData['email'] }}",
            "phone": "{{ $studentData['whatsapp_number'] }}",
            "address": "{{ $studentData['permanent_address'] }}",
            "city": "{{ $studentData['district'] }}",
            "country": "Sri Lanka",
            "delivery_address": "{{ $studentData['permanent_address'] }}",
            "delivery_city": "{{ $studentData['district'] }}",
            "delivery_country": "Sri Lanka",
            "custom_1": "{{ $studentData['registration_id'] }}",
            "custom_2": ""
        };

        // Show the payhere.js popup when "Pay with PayHere" button is clicked
        document.getElementById('payhere-payment').onclick = function (e) {
            e.preventDefault();
            payhere.startPayment(payment);
        };
    </script>
</x-layout>
