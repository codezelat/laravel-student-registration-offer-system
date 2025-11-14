<x-layout>
    <x-slot:title>Payment Options</x-slot:title>

    <div class="flex items-center justify-center min-h-[60vh]">
        <x-card class="max-w-2xl w-full">
            <div class="text-center space-y-6">
                <!-- Success Icon -->
                <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Success Message -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">
                        Registration Submitted! 🎉
                    </h2>
                    <p class="text-lg text-gray-600">
                        Welcome, <span class="font-semibold text-blue-600">{{ $student->full_name }}</span>!
                    </p>
                </div>

                <!-- Registration ID Display -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-xl p-6 shadow-lg">
                    <p class="text-sm font-medium mb-2 opacity-90">Your Registration ID</p>
                    <p class="text-3xl font-bold tracking-wide mb-2">
                        {{ $student->registration_id }}
                    </p>
                    <p class="text-xs opacity-90">
                        Please save this ID for future reference
                    </p>
                </div>

                <!-- Payment Information -->
                <x-card class="bg-yellow-50 border-yellow-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">💰 Complete Your Payment</h3>
                    <p class="text-gray-700 mb-3">
                        To complete your registration, please pay <span class="font-bold text-xl text-green-600">LKR 5,000.00</span>
                    </p>
                    <p class="text-sm text-gray-600">
                        Choose one of the payment methods below:
                    </p>
                </x-card>

                <!-- Payment Options -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
                    <!-- Pay Now Button -->
                    <form action="{{ route('payment.payhere') }}" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <button type="submit" class="w-full">
                            <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 cursor-pointer">
                                <div class="text-center">
                                    <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    <h3 class="text-xl font-bold mb-2">Pay Now</h3>
                                    <p class="text-sm opacity-90">Pay securely with PayHere</p>
                                    <p class="text-xs mt-2 opacity-75">Credit/Debit Cards accepted</p>
                                </div>
                            </div>
                        </button>
                    </form>

                    <!-- Upload Payment Slip Button -->
                    <a href="{{ route('payment.upload-slip', $student->id) }}">
                        <div class="p-6 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 cursor-pointer h-full">
                            <div class="text-center">
                                <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <h3 class="text-xl font-bold mb-2">Upload Payment Slip</h3>
                                <p class="text-sm opacity-90">Bank transfer payment slip</p>
                                <p class="text-xs mt-2 opacity-75">JPG, PNG, PDF, DOCX accepted</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Bank Details -->
                <x-card class="bg-gray-50 border-gray-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">🏦 Bank Transfer Details</h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p><strong>Bank Name:</strong> Commercial Bank</p>
                        <p><strong>Account Name:</strong> Student Portal PVT LTD</p>
                        <p><strong>Account Number:</strong> 1234567890</p>
                        <p><strong>Branch:</strong> Colombo</p>
                        <p><strong>Amount:</strong> LKR 5,000.00</p>
                    </div>
                    <p class="text-xs text-gray-600 mt-3">
                        * Please include your Registration ID in the payment reference
                    </p>
                </x-card>

                <!-- Support Information -->
                <div class="pt-6 border-t border-gray-200 text-sm text-gray-600">
                    <p>Need help? Contact us at:</p>
                    <p class="font-medium text-blue-600 mt-1">support@studentportal.com</p>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
