<x-layout>
    <x-slot:title>Payment Slip Uploaded</x-slot:title>

    <div class="flex items-center justify-center min-h-[60vh]">
        <x-card class="max-w-2xl w-full">
            <div class="text-center space-y-6">
                <!-- Success Icon -->
                <div class="mx-auto w-20 h-20 bg-green-100 rounded-full flex items-center justify-center animate-pulse">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Congratulations Message -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">
                        Congratulations! 🎉
                    </h2>
                    <p class="text-lg text-gray-600">
                        Your payment slip has been uploaded successfully
                    </p>
                </div>

                <!-- Student ID Display -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-6 shadow-lg">
                    <p class="text-sm font-medium mb-2 opacity-90">Your Student ID</p>
                    <p class="text-4xl font-bold tracking-wide mb-2">
                        {{ $student->student_id }}
                    </p>
                    <p class="text-xs opacity-90">
                        Keep this ID safe for all future correspondence
                    </p>
                </div>

                <!-- Payment Details -->
                <x-card class="bg-yellow-50 border-yellow-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">📄 Payment Under Review</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-2">•</span>
                            <span>Your payment slip is being verified by our team</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-2">•</span>
                            <span>Verification typically takes 2-3 business days</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-600 mr-2">•</span>
                            <span>You will receive an email confirmation once approved</span>
                        </li>
                    </ul>
                </x-card>

                <!-- Important Information -->
                <x-card class="bg-blue-50 border-blue-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">📋 Important Information</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Save your Student ID: <strong>{{ $student->student_id }}</strong></span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Check your email for important updates</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Course details will be sent after payment verification</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Use your Student ID for all future communications</span>
                        </li>
                    </ul>
                </x-card>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('landing') }}">
                        <x-button variant="primary" class="w-full sm:w-auto">
                            Back to Home
                        </x-button>
                    </a>
                    <button 
                        onclick="window.print()" 
                        class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-medium transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-gray-300 shadow-lg"
                    >
                        Print Details
                    </button>
                </div>

                <!-- Support Information -->
                <div class="pt-6 border-t border-gray-200 text-sm text-gray-600">
                    <p>Need help? Contact us at:</p>
                    <p class="font-medium text-blue-600 mt-1">support@studentportal.com</p>
                    <p class="text-xs text-gray-500 mt-2">Reference: {{ $student->student_id }}</p>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
