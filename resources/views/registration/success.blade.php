<x-layout>
    <x-slot:title>Registration Successful</x-slot:title>

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
                        Registration Successful! 🎉
                    </h2>
                    <p class="text-lg text-gray-600">
                        Welcome, <span class="font-semibold text-blue-600">{{ session('name') }}</span>!
                    </p>
                </div>

                <!-- Registration ID Display -->
                <!-- <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl p-6 shadow-lg">
                    <p class="text-sm font-medium mb-2 opacity-90">Your Registration ID</p>
                    <p class="text-3xl font-bold tracking-wide mb-2">
                        {{ session('registrationId') }}
                    </p>
                    <p class="text-xs opacity-90">
                        Please save this ID for future reference
                    </p>
                </div> -->

                <!-- Next Steps Information -->
                <x-card class="bg-blue-50 border-blue-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">📋 Next Steps</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Check your email for confirmation and further instructions</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Keep your Registration ID safe for future correspondence</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-blue-600 mr-2">✓</span>
                            <span>Our team will contact you within 2-3 business days</span>
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
                        Print Confirmation
                    </button>
                </div>

                <!-- Support Information -->
                <div class="pt-6 border-t border-gray-200 text-sm text-gray-600">
                    <p>Need help? Contact us at:</p>
                    <p class="font-medium text-blue-600 mt-1">support@studentportal.com</p>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
