<x-layout>
    <x-slot:title>Payment Slip Uploaded</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50 mb-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-yellow-600">Step 3 of 3 - Under Review</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-yellow-500 to-orange-500 w-full rounded-full transition-all duration-500"></div>
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
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-yellow-500 text-white">
                        <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-yellow-600">Pending</p>
                </div>
            </div>
        </div>

    <div class="flex items-center justify-center">
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
                        Congratulations!
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
                    <div class="flex items-center space-x-2 mb-3">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Payment Under Review</h3>
                    </div>
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
                    <div class="flex items-center space-x-2 mb-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-800">Important Information</h3>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Save your Student ID: <strong>{{ $student->student_id }}</strong></span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Check your messages for payment confirmation</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Course details will be sent after payment verification</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
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
            </div>
        </x-card>
    </div>
    </div>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .max-w-4xl, .max-w-4xl * {
                visibility: visible;
            }
            .max-w-4xl {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                max-width: 100%;
                padding: 0;
                margin: 0;
            }
            
            /* Hide non-essential elements */
            button:not(.print-keep),
            .print-hide,
            header,
            nav {
                display: none !important;
            }
            
            /* Optimize spacing for A4 */
            .space-y-6 > * + * {
                margin-top: 1rem !important;
            }
            
            .p-6, .p-8 {
                padding: 0.75rem !important;
            }
            
            .md\:p-10, .md\:p-12 {
                padding: 1rem !important;
            }
            
            /* Prevent page breaks inside important elements */
            .bg-gradient-to-r,
            .bg-blue-50,
            .bg-yellow-50 {
                page-break-inside: avoid;
            }
            
            /* Scale down for A4 */
            html {
                font-size: 12px;
            }
            
            .text-3xl { font-size: 1.5rem !important; }
            .text-4xl { font-size: 2rem !important; }
            .text-lg { font-size: 1rem !important; }
            
            /* Remove shadows and decorative elements */
            .shadow-lg, .shadow-xl, .shadow-2xl {
                box-shadow: none !important;
            }
            
            .animate-pulse,
            .animate-spin {
                animation: none !important;
            }
            
            /* Force white background */
            body {
                background: white !important;
            }
        }
    </style>

    <script>
        // Smooth scroll to top on page load
        window.addEventListener('load', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</x-layout>
