<x-layout>
    <x-slot:title>Student Registration Form</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step 1 of 2</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary w-1/2 rounded-full transition-all duration-500"></div>
            </div>
        </div>

        <!-- Countdown Timer -->
        <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full -translate-y-24 translate-x-24"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Registration Closes In</p>
                        <p class="text-xs opacity-75">Complete your form before time runs out</p>
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
                    <p class="text-xl font-bold text-green-900">Diploma in {{ $diploma }}</p>
                </div>
            </div>
        </div>

        <!-- Registration Form Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-neutral-200/50 p-8 md:p-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-neutral-900 mb-2">Personal Information</h2>
                <p class="text-neutral-600">Please fill in your details accurately</p>
            </div>
            
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <input type="hidden" name="registration_id" value="{{ $registrationId }}">
                <input type="hidden" name="selected_diploma" value="{{ $diploma }}">

                <!-- Full Name -->
                <div class="space-y-2">
                    <label for="full_name" class="block text-sm font-semibold text-neutral-700">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="full_name" 
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Enter your full name"
                            class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 @error('full_name') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                        >
                    </div>
                    @error('full_name')
                        <p class="text-sm text-red-600 flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- NIC -->
                <div class="space-y-2">
                    <label for="nic" class="block text-sm font-semibold text-neutral-700">
                        National Identity Card (NIC) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="nic" 
                            name="nic"
                            value="{{ old('nic') }}"
                            placeholder="123456789V or 123456789012"
                            class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 @error('nic') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                        >
                    </div>
                    @error('nic')
                        <p class="text-sm text-red-600 flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="space-y-2">
                    <label for="date_of_birth" class="block text-sm font-semibold text-neutral-700">
                        Date of Birth <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 @error('date_of_birth') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900"
                        >
                    </div>
                    @error('date_of_birth')
                        <p class="text-sm text-red-600 flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Contact Number -->
                <div class="space-y-2">
                    <label for="contact_number" class="block text-sm font-semibold text-neutral-700">
                        Contact Number <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input 
                            type="tel" 
                            id="contact_number" 
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            placeholder="0771234567"
                            class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 @error('contact_number') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                        >
                    </div>
                    @error('contact_number')
                        <p class="text-sm text-red-600 flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-neutral-700">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="your.email@example.com"
                            class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 @error('email') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                        >
                    </div>
                    @error('email')
                        <p class="text-sm text-red-600 flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button 
                        type="submit"
                        class="group flex-1 px-8 py-4 bg-gradient-primary text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-smooth hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden"
                    >
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <span>Continue to Payment</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                    </button>
                    
                    <a href="{{ route('select.diploma') }}" 
                       class="flex-shrink-0 px-6 py-4 bg-white border-2 border-neutral-300 text-neutral-700 rounded-2xl font-semibold text-center hover:border-neutral-400 hover:bg-neutral-50 transition-smooth">
                        Back
                    </a>
                </div>
            </form>
        </div>

        <!-- Help Section -->
        <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200/50">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="font-semibold text-blue-900 mb-1">Need Help?</h3>
                    <p class="text-sm text-blue-800 leading-relaxed">
                        If you have any questions or need assistance with the registration process, 
                        please contact our support team at <a href="mailto:support@studentportal.com" class="font-semibold underline">support@studentportal.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCountdown() {
                const deadlineElement = document.getElementById('countdown');
                if (!deadlineElement) return;
                
                const deadlineStr = deadlineElement.getAttribute('data-deadline');
                const istDeadlineStr = deadlineStr.replace(' ', 'T') + '+05:30';
                const deadline = new Date(istDeadlineStr);
                const now = new Date();
                const timeDiff = deadline - now;
                
                if (timeDiff <= 0) {
                    ['days', 'hours', 'minutes', 'seconds'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.textContent = '00';
                    });
                    return;
                }
                
                const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
                
                const els = {
                    days: document.getElementById('days'),
                    hours: document.getElementById('hours'),
                    minutes: document.getElementById('minutes'),
                    seconds: document.getElementById('seconds')
                };
                
                if (els.days) els.days.textContent = String(days).padStart(2, '0');
                if (els.hours) els.hours.textContent = String(hours).padStart(2, '0');
                if (els.minutes) els.minutes.textContent = String(minutes).padStart(2, '0');
                if (els.seconds) els.seconds.textContent = String(seconds).padStart(2, '0');
            }
            
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
</x-layout>