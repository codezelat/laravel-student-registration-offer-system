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
                        Registration Successful!
                    </h2>
                    <p class="text-lg text-gray-600">
                        Welcome, <span class="font-semibold text-blue-600">{{ $student->name_with_initials ?? $student->full_name }}</span>!
                    </p>
                    <p class="text-md text-gray-500 mt-2">
                        You have successfully registered for the <span class="font-bold text-neutral-800">{{ $student->selected_diploma }}</span>
                    </p>
                </div>

                <!-- Registration ID Display -->
                <div class="bg-linear-to-r from-blue-500 to-blue-600 text-white rounded-xl p-6 shadow-lg">
                    <p class="text-sm font-medium mb-2 opacity-90">Your Registration ID</p>
                    <p class="text-2xl font-bold tracking-wide mb-2">
                        {{ $student->registration_id }}
                    </p>
                    <p class="text-xs opacity-90">
                        Please save this ID for future reference
                    </p>
                </div>

                <!-- WhatsApp Group Link -->
                @if(isset($whatsappLink))
                <x-card class="bg-green-50 border-green-200 text-left">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.592 2.654-.696c1.005.572 1.943.962 3.015.961h.001c3.182 0 5.768-2.586 5.769-5.766 0-1.535-.615-2.924-1.698-4.004-1.052-1.079-2.571-1.637-4.281-1.64zM12 4.103c4.136 0 7.509 3.327 7.51 7.427 0 1.986-.774 3.856-2.181 5.257-1.406 1.4-3.238 2.152-5.12 2.152a7.66 7.66 0 0 1-3.696-.948l-4.102 1.077 1.096-4.002a7.41 7.41 0 0 1-1.127-3.832C4.382 7.432 7.777 4.103 12 4.103M12 2C6.477 2 2 6.477 2 12c0 1.819.497 3.528 1.378 5.013L2 22l5.12-1.318A9.97 9.97 0 0 0 12 22c5.523 0 10-4.477 10-9.998C22 6.476 17.523 2 12 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Join Course WhatsApp Group</h3>
                    </div>
                    <p class="text-gray-700 mb-4 px-1">
                        Get instant updates, class schedules, and connect with other students in your diploma program.
                    </p>
                    <a href="{{ $whatsappLink }}" target="_blank" class="w-full text-center py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                        <span>Join WhatsApp Group</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </x-card>
                @endif

                <!-- Next Steps Information -->
                <x-card class="bg-blue-50 border-blue-200 text-left">
                    <div class="flex items-center space-x-2 mb-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Next Steps</h3>
                    </div>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Check your WhatsApp for confirmation and further instructions</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Keep your Registration ID safe for future correspondence</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Our team will contact you within 2-3 business days</span>
                        </li>
                    </ul>
                </x-card>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('home') }}">
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
            </div>
        </x-card>
    </div>
</x-layout>
