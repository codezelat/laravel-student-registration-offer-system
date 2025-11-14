<x-layout>
    <x-slot:title>Payment Successful</x-slot:title>

    <div class="flex items-center justify-center min-h-[60vh]">
        <x-card class="max-w-2xl w-full">
            <div class="text-center space-y-6">
                <!-- Success Icon -->
                <div class="mx-auto w-24 h-24 bg-green-100 rounded-full flex items-center justify-center animate-bounce">
                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Congratulations Message -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-3">
                        Congratulations! 🎊
                    </h2>
                    <p class="text-xl text-green-600 font-semibold mb-2">
                        Payment Successful!
                    </p>
                    <p class="text-lg text-gray-600">
                        Welcome to the program, <span class="font-bold text-blue-600">{{ $student->full_name }}</span>!
                    </p>
                </div>

                <!-- Student ID Display -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl p-8 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                    <p class="text-sm font-medium mb-2 opacity-90">Your Student ID</p>
                    <p class="text-5xl font-bold tracking-wide mb-3">
                        {{ $student->student_id }}
                    </p>
                    <p class="text-xs opacity-90">
                        This is your official Student ID - Keep it safe!
                    </p>
                </div>

                <!-- Payment Confirmation -->
                <x-card class="bg-green-50 border-green-200">
                    <div class="space-y-3 text-left">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">Payment Status:</span>
                            <span class="px-3 py-1 bg-green-600 text-white rounded-full text-sm font-bold">PAID</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">Order ID:</span>
                            <span class="font-mono text-sm text-gray-800">{{ $student->payhere_order_id }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">Amount Paid:</span>
                            <span class="font-bold text-green-600 text-xl">LKR {{ number_format($student->amount_paid, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-700 font-medium">Payment Date:</span>
                            <span class="text-gray-800">{{ $student->payment_date->format('F j, Y - g:i A') }}</span>
                        </div>
                    </div>
                </x-card>

                <!-- Registration Details -->
                <x-card class="bg-blue-50 border-blue-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">📚 Registration Details</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Registration ID:</span>
                            <span class="font-semibold text-gray-800">{{ $student->registration_id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Student Name:</span>
                            <span class="font-semibold text-gray-800">{{ $student->full_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selected Course:</span>
                            <span class="font-semibold text-blue-600">Diploma in {{ $student->selected_diploma }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Email:</span>
                            <span class="font-semibold text-gray-800">{{ $student->email }}</span>
                        </div>
                    </div>
                </x-card>

                <!-- Next Steps -->
                <x-card class="bg-purple-50 border-purple-200 text-left">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">🚀 What's Next?</h3>
                    <ul class="space-y-2 text-sm text-gray-700">
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-2">1.</span>
                            <span>Check your email for a detailed confirmation and welcome package</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-2">2.</span>
                            <span>Course materials and schedule will be sent within 24 hours</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-2">3.</span>
                            <span>Our team will contact you with your class start date</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-600 mr-2">4.</span>
                            <span>Keep your Student ID handy for all communications</span>
                        </li>
                    </ul>
                </x-card>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('landing') }}">
                        <x-button variant="primary" class="w-full sm:w-auto px-8">
                            Back to Home
                        </x-button>
                    </a>
                    <button 
                        onclick="window.print()" 
                        class="px-8 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl"
                    >
                        Print Receipt
                    </button>
                </div>

                <!-- Support Information -->
                <div class="pt-6 border-t border-gray-200 text-sm text-gray-600">
                    <p class="font-semibold mb-1">Need Assistance?</p>
                    <p>Email: <span class="font-medium text-blue-600">support@studentportal.com</span></p>
                    <p>Phone: <span class="font-medium text-blue-600">+94 11 234 5678</span></p>
                    <p class="text-xs text-gray-500 mt-2">Student ID: {{ $student->student_id }}</p>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
