<x-layout>
    <x-slot:title>Payment Options</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Success Header -->
        <div class="text-center space-y-4 animate-fade-in">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full shadow-xl animate-bounce-slow">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-2">
                    Registration Submitted!
                </h1>
                <p class="text-lg text-neutral-600">
                    Welcome, <span class="font-semibold text-primary-600">{{ $studentData['full_name'] }}</span>!
                </p>
            </div>
        </div>

        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step 2 of 2</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary w-full rounded-full transition-all duration-500"></div>
            </div>
        </div>

        <!-- Important Notice -->
        <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-3xl p-6 md:p-8 border border-amber-200/50 shadow-lg">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-2">Complete Your Payment</h3>
                    <p class="text-neutral-700 mb-4 leading-relaxed">
                        To complete your registration, please pay the course fee of 
                        <span class="font-bold text-2xl text-green-700">LKR 5,000.00</span>
                    </p>
                    <p class="text-sm text-neutral-600">
                        Choose your preferred payment method below to proceed
                    </p>
                </div>
            </div>
        </div>

        <!-- Student Info Card -->
        <div class="bg-white rounded-3xl shadow-lg p-6 md:p-8 border border-neutral-200/50">
            <h3 class="text-lg font-bold text-neutral-900 mb-4">Registration Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">Full Name</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['full_name'] }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">Program</p>
                        <p class="font-semibold text-neutral-900">Diploma in {{ $studentData['selected_diploma'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 border border-neutral-200/50">
            <h2 class="text-2xl font-bold text-neutral-900 mb-6">Choose Payment Method</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Online Payment -->
                <form action="{{ route('payment.payhere') }}" method="POST" class="h-full">
                    @csrf
                    <button type="submit" class="group w-full h-full text-left">
                        <div class="h-full p-6 bg-gradient-to-br from-primary-50 to-primary-100 border-2 border-primary-200 rounded-2xl hover:shadow-xl transition-smooth hover:scale-[1.02] active:scale-[0.98]">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 bg-gradient-primary rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">RECOMMENDED</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-neutral-900 mb-2">Pay Online Now</h3>
                            <p class="text-sm text-neutral-700 mb-4 leading-relaxed">
                                Quick and secure payment with PayHere. Instant confirmation upon payment.
                            </p>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Instant processing</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Credit/Debit cards accepted</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Secure encryption</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-primary-200">
                                <span class="text-sm font-medium text-neutral-700">Proceed to payment</span>
                                <svg class="w-5 h-5 text-primary-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </form>

                <!-- Bank Transfer -->
                <a href="{{ route('payment.upload-slip') }}" class="group block h-full">
                    <div class="h-full p-6 bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl hover:shadow-xl transition-smooth hover:scale-[1.02] active:scale-[0.98]">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                            </div>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">BANK TRANSFER</span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-neutral-900 mb-2">Upload Payment Slip</h3>
                        <p class="text-sm text-neutral-700 mb-4 leading-relaxed">
                            Pay via bank transfer and upload your payment slip for verification.
                        </p>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>2-3 business days verification</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>JPG, PNG, PDF, DOCX accepted</span>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-neutral-600">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Email confirmation after approval</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-green-200">
                            <span class="text-sm font-medium text-neutral-700">Upload payment slip</span>
                            <svg class="w-5 h-5 text-green-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Bank Details -->
        <div class="bg-gradient-to-br from-neutral-50 to-neutral-100 rounded-3xl p-6 md:p-8 border border-neutral-200/50">
            <div class="flex items-start space-x-4 mb-4">
                <div class="w-12 h-12 bg-neutral-800 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-1">Bank Transfer Details</h3>
                    <p class="text-sm text-neutral-600">Use these details for bank transfer payments</p>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-neutral-100">
                    <span class="text-sm text-neutral-600">Bank Name</span>
                    <span class="font-semibold text-neutral-900">Commercial Bank</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-neutral-100">
                    <span class="text-sm text-neutral-600">Account Name</span>
                    <span class="font-semibold text-neutral-900">Student Portal PVT LTD</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-neutral-100">
                    <span class="text-sm text-neutral-600">Account Number</span>
                    <span class="font-semibold text-neutral-900">1234567890</span>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-neutral-100">
                    <span class="text-sm text-neutral-600">Branch</span>
                    <span class="font-semibold text-neutral-900">Colombo</span>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-sm text-neutral-600">Amount</span>
                    <span class="font-bold text-xl text-green-700">LKR 5,000.00</span>
                </div>
            </div>
        </div>

        <!-- Security Info -->
        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200/50">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <div>
                    <h3 class="font-semibold text-blue-900 mb-2">Secure Payment Guarantee</h3>
                    <ul class="space-y-2 text-sm text-blue-800">
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Your payment is secured with SSL encryption</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>All card information is handled securely by PayHere</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>We never store your card details</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Email confirmation sent after successful payment</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 2s ease-in-out infinite;
        }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
</x-layout>