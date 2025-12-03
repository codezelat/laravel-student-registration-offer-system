<x-layout>
    <x-slot:title>Payment Successful</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50 mb-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-green-600">Step 3 of 3 - Complete!</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-green-500 to-emerald-600 w-full rounded-full transition-all duration-500"></div>
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
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-green-500 text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-green-600">Complete</p>
                </div>
            </div>
        </div>

        <!-- Success Animation -->
        <div class="text-center mb-8 animate-fade-in">
            <div class="relative inline-flex items-center justify-center mb-6">
                <!-- Outer Ring -->
                <div class="absolute w-32 h-32 bg-green-100 rounded-full animate-ping opacity-75"></div>
                <!-- Inner Circle -->
                <div class="relative w-24 h-24 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full shadow-2xl flex items-center justify-center animate-bounce-slow">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-3">
                Congratulations!
            </h1>
            <p class="text-2xl text-green-600 font-semibold mb-2">Payment Successful!</p>
            <p class="text-lg text-neutral-600">
                Welcome to the program, <span class="font-bold text-primary-600">{{ $student->full_name }}</span>
            </p>
        </div>

        <!-- Student ID Card -->
        <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl p-8 md:p-12 text-white shadow-2xl mb-6 relative overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
            
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                    <span class="text-sm font-medium">Registration ID</span>
                </div>
                
                <p class="text-lg opacity-90 mb-2">Your Registration ID</p>
                <p class="text-2xl md:text-6xl font-bold tracking-wider mb-4 break-all">
                    {{ $student->registration_id }}
                </p>
                <p class="text-sm opacity-75">
                    Keep this ID safe - you'll need it for all communications
                </p>
            </div>
        </div>

        <!-- Payment Confirmation Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 border border-neutral-200/50 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-neutral-900">Payment Confirmation</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-green-50 rounded-xl border border-green-200">
                    <p class="text-sm text-green-700 mb-1">Payment Status</p>
                    <div class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="font-bold text-green-900 text-lg">COMPLETED</span>
                    </div>
                </div>

                <div class="p-4 bg-neutral-50 rounded-xl border border-neutral-200">
                    <p class="text-sm text-neutral-600 mb-1">Order ID</p>
                    <p class="font-semibold text-neutral-900 font-mono text-sm">{{ $student->payhere_order_id }}</p>
                </div>

                <div class="p-4 bg-neutral-50 rounded-xl border border-neutral-200">
                    <p class="text-sm text-neutral-600 mb-1">Amount Paid</p>
                    <p class="font-bold text-2xl text-green-700">LKR {{ number_format($student->amount_paid, 2) }}</p>
                </div>

                <div class="p-4 bg-neutral-50 rounded-xl border border-neutral-200">
                    <p class="text-sm text-neutral-600 mb-1">Payment Date</p>
                    <p class="font-semibold text-neutral-900">{{ $student->payment_date->format('M j, Y - g:i A') }}</p>
                </div>
            </div>
        </div>

        <!-- Registration Details -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 border border-neutral-200/50 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-neutral-900">Registration Details</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">Student Name</p>
                        <p class="font-semibold text-neutral-900">{{ $student->full_name }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">Selected Course</p>
                        <p class="font-semibold text-primary-600">Diploma in {{ $student->selected_diploma }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">Email</p>
                        <p class="font-semibold text-neutral-900">{{ $student->email }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <p class="text-xs text-neutral-500">WhatsApp</p>
                        <p class="font-semibold text-neutral-900">{{ $student->whatsapp_number }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 md:p-10 border border-purple-200/50 mb-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-neutral-900">What's Next?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">1</div>
                    <div>
                        <p class="font-semibold text-neutral-900 mb-1">Check Your Phone</p>
                        <p class="text-sm text-neutral-700">Confirmation details will be sent via a text message</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">2</div>
                    <div>
                        <p class="font-semibold text-neutral-900 mb-1">Course Materials</p>
                        <p class="text-sm text-neutral-700">You'll receive materials through the course WhatsApp group</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">3</div>
                    <div>
                        <p class="font-semibold text-neutral-900 mb-1">Class Schedule</p>
                        <p class="text-sm text-neutral-700">Our team will contact you with start date</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">4</div>
                    <div>
                        <p class="font-semibold text-neutral-900 mb-1">Keep Your ID</p>
                        <p class="text-sm text-neutral-700">Use your Registration ID for all communications</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
            <a href="{{ route('payment.receipt', $student) }}" class="flex-1 group">
                <button class="w-full px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Download Receipt</span>
                    </span>
                    <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                </button>
            </a>
            
            <a href="{{ route('landing') }}" class="flex-1 group">
                <button class="w-full px-8 py-4 bg-white border-2 border-neutral-300 text-neutral-900 rounded-2xl font-bold text-lg hover:border-neutral-400 hover:bg-neutral-50 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Back to Home</span>
                </button>
            </a>
        </div>

        <!-- Contact Support -->
        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200/50 text-center">
            <h3 class="font-bold text-neutral-900 mb-2">Need Assistance?</h3>
            <p class="text-sm text-neutral-700 mb-3">Our support team is here to help you</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-sm">
                <a href="tel:+94114532139" class="flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span>+94 11 453 2139</span>
                </a>
                <a href="mailto:info@sitc.lk" class="flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>info@sitc.lk</span>
                </a>
            </div>
            <p class="text-xs text-neutral-500 mt-4 break-all">Registration ID: {{ $student->registration_id }}</p>
        </div>
    </div>

    <script>
        // Smooth scroll to top and confetti effect
        window.addEventListener('load', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Trigger success sound (optional)
            // new Audio('/sounds/success.mp3').play().catch(() => {});
        });
    </script>

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
            
            /* Hide buttons and non-essential elements */
            button,
            a[href],
            .print-hide,
            header,
            nav,
            .bg-blue-50:last-child {
                display: none !important;
            }
            
            /* Optimize spacing for A4 */
            .mb-6, .mb-8 {
                margin-bottom: 0.5rem !important;
            }
            
            .space-y-6 > * + * {
                margin-top: 0.75rem !important;
            }
            
            .p-6, .p-8, .p-10 {
                padding: 0.75rem !important;
            }
            
            .md\:p-10, .md\:p-12 {
                padding: 1rem !important;
            }
            
            /* Prevent page breaks */
            .bg-gradient-to-br,
            .bg-white,
            .rounded-3xl {
                page-break-inside: avoid;
            }
            
            /* Scale down text for A4 */
            html {
                font-size: 11px;
            }
            
            .text-4xl { font-size: 1.75rem !important; }
            .text-5xl { font-size: 2rem !important; }
            .text-6xl { font-size: 2.5rem !important; }
            .text-2xl { font-size: 1.25rem !important; }
            .text-xl { font-size: 1rem !important; }
            .text-lg { font-size: 0.95rem !important; }
            
            /* Remove decorative effects */
            .shadow-lg, .shadow-xl, .shadow-2xl {
                box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
            }
            
            .animate-pulse,
            .animate-ping,
            .animate-bounce-slow {
                animation: none !important;
            }
            
            .transform,
            .hover\:scale-105 {
                transform: none !important;
            }
            
            /* Simplify decorative circles */
            .absolute.w-64,
            .absolute.w-48 {
                display: none !important;
            }
            
            /* Force white background */
            body {
                background: white !important;
            }
            
            /* Compact grid on print */
            .grid.gap-4 {
                gap: 0.5rem !important;
            }
        }
    </style>
</x-layout>