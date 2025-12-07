<x-layout>
    <x-slot:title>Upload Payment Slip</x-slot:title>

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
                    <p class="text-xs font-medium text-primary-600">Upload Slip</p>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Upload Payment Slip</p>
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
                Registration Details
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
                    <p class="text-sm text-green-700 mb-1">Amount to Pay</p>
                    <p class="font-bold text-green-600 text-xl">LKR 4,000.00</p>
                </div>
            </div>
        </div>

        <!-- Bank Details Card -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-200/50">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Bank Transfer Details</h3>
            </div>

            <p class="text-sm text-gray-700 mb-4">You can transfer to any of these bank accounts:</p>
            
            <div class="space-y-3" x-data="{ openBank: null }">
                <!-- Bank 1: Bank of Ceylon -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-blue-200/50 overflow-hidden">
                    <button 
                        @click="openBank = openBank === 1 ? null : 1"
                        class="w-full px-4 py-3 flex items-center justify-between hover:bg-blue-50/50 transition-colors"
                    >
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900">Bank of Ceylon</span>
                        </div>
                        <svg x-show="openBank !== 1" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <svg x-show="openBank === 1" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                    <div x-show="openBank === 1" x-collapse class="px-4 pb-4 space-y-2 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Number:</span>
                            <span class="font-bold text-gray-900">888 05 443</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Name:</span>
                            <span class="font-semibold text-gray-900">SITC CAMPUS</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Branch:</span>
                            <span class="font-semibold text-gray-900">Gampola</span>
                        </div>
                    </div>
                </div>

                <!-- Bank 2: Sampath Bank -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-blue-200/50 overflow-hidden">
                    <button 
                        @click="openBank = openBank === 2 ? null : 2"
                        class="w-full px-4 py-3 flex items-center justify-between hover:bg-blue-50/50 transition-colors"
                    >
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900">Sampath Bank</span>
                        </div>
                        <svg x-show="openBank !== 2" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <svg x-show="openBank === 2" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                    <div x-show="openBank === 2" x-collapse class="px-4 pb-4 space-y-2 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Number:</span>
                            <span class="font-bold text-gray-900">1101 1402 8522</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Name:</span>
                            <span class="font-semibold text-gray-900">SITC CAMPUS</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Branch:</span>
                            <span class="font-semibold text-gray-900">Gampola</span>
                        </div>
                    </div>
                </div>

                <!-- Bank 3: Commercial Bank -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-blue-200/50 overflow-hidden">
                    <button 
                        @click="openBank = openBank === 3 ? null : 3"
                        class="w-full px-4 py-3 flex items-center justify-between hover:bg-blue-50/50 transition-colors"
                    >
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900">Commercial Bank</span>
                        </div>
                        <svg x-show="openBank !== 3" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <svg x-show="openBank === 3" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                    <div x-show="openBank === 3" x-collapse class="px-4 pb-4 space-y-2 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Number:</span>
                            <span class="font-bold text-gray-900">801 41811 04</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Name:</span>
                            <span class="font-semibold text-gray-900">SITC CAMPUS</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Branch:</span>
                            <span class="font-semibold text-gray-900">Gampola</span>
                        </div>
                    </div>
                </div>

                <!-- Bank 4: People's Bank -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl border border-blue-200/50 overflow-hidden">
                    <button 
                        @click="openBank = openBank === 4 ? null : 4"
                        class="w-full px-4 py-3 flex items-center justify-between hover:bg-blue-50/50 transition-colors"
                    >
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-900">People's Bank</span>
                        </div>
                        <svg x-show="openBank !== 4" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                        <svg x-show="openBank === 4" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
                    <div x-show="openBank === 4" x-collapse class="px-4 pb-4 space-y-2 text-sm">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Number:</span>
                            <span class="font-bold text-gray-900">0182 0016 0063 841</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="text-gray-600">Account Name:</span>
                            <span class="font-semibold text-gray-900">SITC CAMPUS</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Branch:</span>
                            <span class="font-semibold text-gray-900">Gampola</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4">
                <p class="text-sm text-green-800 font-medium flex items-start">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Amount to Transfer: <strong class="text-green-700">LKR 4,000.00</strong></span>
                </p>
            </div>
            
            <div class="mt-3 bg-red-50 border border-red-200 rounded-xl p-4">
                <p class="text-sm text-red-700 font-medium flex items-start">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Please include or write your first name in the payment slip for reference</span>
                </p>
            </div>
        </div>

        <!-- Upload Form Card -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                Upload Payment Slip
            </h3>
            
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-start">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('payment.store-slip') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Select Payment Slip <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-500 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="payment_slip" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Upload a file</span>
                                    <input 
                                        id="payment_slip" 
                                        name="payment_slip" 
                                        type="file" 
                                        class="sr-only" 
                                        accept=".jpg,.jpeg,.png,.pdf,.docx,.doc"
                                        required
                                        onchange="displayFileName(this)"
                                    >
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                JPG, PNG, PDF, DOCX up to 10MB
                            </p>
                            <p id="file-name" class="text-sm text-green-600 font-medium mt-2"></p>
                        </div>
                    </div>
                    @error('payment_slip')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Notes -->
                <!-- <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Additional Notes (Optional)
                    </label>
                    <textarea 
                        name="notes" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        placeholder="Any additional information about your payment..."
                    >{{ old('notes') }}</textarea>
                </div> -->

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button 
                        type="submit"
                        class="flex-1 px-6 py-4 bg-gradient-primary hover:shadow-xl text-white rounded-xl font-semibold transition-all duration-300 shadow-lg transform hover:scale-105 flex items-center justify-center"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Submit Payment Slip
                    </button>
                    <a 
                        href="{{ route('payment.options') }}"
                        class="flex-1 px-6 py-4 bg-neutral-100 hover:bg-neutral-200 text-gray-800 rounded-xl font-semibold text-center transition-all duration-300 flex items-center justify-center"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Payment Options
                    </a>
                </div>
            </form>
        </div>

        <!-- Important Notes Card -->
        <div class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl p-6 border border-yellow-200/50">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Important Notes</h3>
            </div>
            
            <ul class="space-y-3 text-sm text-gray-700">
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Ensure the payment slip is clear and all details are visible</span>
                </li>
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>The payment slip will be verified within 2-3 business days</span>
                </li>
                <li class="flex items-start bg-white/60 rounded-lg p-3">
                    <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span>Accepted formats: JPG, PNG, PDF, DOCX (Max 10MB)</span>
                </li>
            </ul>
        </div>
    </div>

    <script>
        // Countdown Timer
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            const deadline = new Date(countdownElement.dataset.deadline).getTime();
            const now = new Date().getTime();
            const distance = deadline - now;

            if (distance < 0) {
                // Deadline has passed - redirect immediately
                window.location.href = '{{ route('offer.ended') }}';
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

        // File Upload Display
        function displayFileName(input) {
            const fileNameDisplay = document.getElementById('file-name');
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2);
                fileNameDisplay.textContent = `Selected: ${fileName} (${fileSize} MB)`;
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
</x-layout>
