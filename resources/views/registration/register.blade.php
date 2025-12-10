<x-layout>
    <x-slot:title>Student Registration Form</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step 1 of 3</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary w-1/3 rounded-full transition-all duration-500"></div>
            </div>
            
            <!-- Step Labels -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-primary-500 text-white">
                        1
                    </div>
                    <p class="text-xs font-medium text-primary-600">Details</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-neutral-200 text-neutral-500">
                        2
                    </div>
                    <p class="text-xs font-medium text-neutral-500">Payment</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-neutral-200 text-neutral-500">
                        3
                    </div>
                    <p class="text-xs font-medium text-neutral-500">Complete</p>
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
                    <p class="text-xl font-bold text-green-900">{{ $diploma }}</p>
                </div>
            </div>
        </div>

        <!-- Registration Form Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-neutral-200/50 p-8 md:p-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-neutral-900 mb-2">Student Registration Details</h2>
                <p class="text-neutral-600">Please fill out the form accurately.</p>
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

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-red-800 mb-2">Please fix the following errors:</p>
                            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <input type="hidden" name="registration_id" value="{{ $registrationId }}">
                <input type="hidden" name="selected_diploma" value="{{ $diploma }}">

                <!-- Registration ID Display (Read-only) -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-neutral-700">
                        Register ID <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            value="{{ $registrationId }}"
                            readonly
                            class="w-full pl-12 pr-4 py-3.5 bg-green-50 border-2 border-green-300 rounded-xl text-neutral-900 font-semibold cursor-not-allowed"
                        >
                    </div>
                    <p class="text-xs text-neutral-500">Your unique registration ID. Please save this for future reference.</p>
                </div>

                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-neutral-900 border-b-2 border-neutral-200 pb-2">Personal Information</h3>
                    
                    <!-- Full Name -->
                    <div class="space-y-2">
                        <label for="full_name" class="block text-sm font-semibold text-neutral-700">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="full_name" 
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="Enter Full Name as per NIC/Passport"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('full_name') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('full_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name With Initials -->
                    <div class="space-y-2">
                        <label for="name_with_initials" class="block text-sm font-semibold text-neutral-700">
                            Name With Initials <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="name_with_initials" 
                            name="name_with_initials"
                            value="{{ old('name_with_initials') }}"
                            placeholder="Enter Name with Initials"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('name_with_initials') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('name_with_initials')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="space-y-2">
                        <label for="gender" class="block text-sm font-semibold text-neutral-700">
                            Gender <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="gender" 
                            name="gender"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('gender') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="space-y-2">
                        <label for="date_of_birth" class="block text-sm font-semibold text-neutral-700">
                            Date of Birth <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="date" 
                            id="date_of_birth" 
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            placeholder="yyyy-mm-dd"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('date_of_birth') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('date_of_birth')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIC -->
                    <div class="space-y-2">
                        <label for="nic" class="block text-sm font-semibold text-neutral-700">
                            National ID Number <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                id="nic" 
                                name="nic"
                                value="{{ old('nic') }}"
                                placeholder="Enter valid NIC (e.g., 95xxxxxxxV or 200xxxxxxxx)"
                                maxlength="12"
                                class="w-full px-4 py-3.5 pr-12 bg-neutral-50 border-2 @error('nic') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                                oninput="validateNIC(this)"
                                onblur="validateNIC(this)"
                            >
                            <!-- Validation Icons -->
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <!-- Valid Icon (Hidden by default) -->
                                <svg id="nic-valid-icon" class="w-6 h-6 text-green-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <!-- Invalid Icon (Hidden by default) -->
                                <svg id="nic-invalid-icon" class="w-6 h-6 text-red-500 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        <!-- Validation Messages -->
                        <div id="nic-validation-message" class="text-sm hidden">
                            <!-- Dynamic validation messages will appear here -->
                        </div>
                        @error('nic')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <!-- Help Text -->
                        <div class="text-xs text-neutral-500 space-y-1">
                            <p><strong>Old Format:</strong> 9 digits + V/X (e.g., 123456789V)</p>
                            <p><strong>New Format:</strong> 12 digits (e.g., 200012345678)</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="space-y-6">
                    <h3 class="text-xl font-bold text-neutral-900 border-b-2 border-neutral-200 pb-2">Contact Information</h3>
                    
                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-neutral-700">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('email') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permanent Address -->
                    <div class="space-y-2">
                        <label for="permanent_address" class="block text-sm font-semibold text-neutral-700">
                            Permanent Address <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="permanent_address" 
                            name="permanent_address"
                            rows="3"
                            placeholder="Enter your full permanent address"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('permanent_address') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all resize-none"
                        >{{ old('permanent_address') }}</textarea>
                        @error('permanent_address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Postal Code -->
                    <div class="space-y-2">
                        <label for="postal_code" class="block text-sm font-semibold text-neutral-700">
                            Postal Code <span class="text-neutral-400 text-xs">(Optional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="postal_code" 
                            name="postal_code"
                            value="{{ old('postal_code') }}"
                            placeholder="e.g., 10200"
                            maxlength="10"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('postal_code') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('postal_code')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- District -->
                    <div class="space-y-2">
                        <label for="district" class="block text-sm font-semibold text-neutral-700">
                            District <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="district" 
                            name="district"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('district') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                            <option value="">Select District</option>
                            @foreach($districts as $dist)
                                <option value="{{ $dist }}" {{ old('district') == $dist ? 'selected' : '' }}>{{ $dist }}</option>
                            @endforeach
                        </select>
                        @error('district')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Emergency Contact Number (Home Number) -->
                    <div class="space-y-2">
                        <label for="home_contact_number" class="block text-sm font-semibold text-neutral-700">
                            Emergency Contact Number (Home Number) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="home_contact_number" 
                            name="home_contact_number"
                            value="{{ old('home_contact_number') }}"
                            placeholder="e.g., 0112XXXXXX"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('home_contact_number') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('home_contact_number')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- WhatsApp Number -->
                    <div class="space-y-2">
                        <label for="whatsapp_number" class="block text-sm font-semibold text-neutral-700">
                            WhatsApp Number <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="whatsapp_number" 
                            name="whatsapp_number"
                            value="{{ old('whatsapp_number') }}"
                            placeholder="e.g., 07XXXXXXXX (Active number)"
                            class="w-full px-4 py-3.5 bg-neutral-50 border-2 @error('whatsapp_number') border-red-300 @else border-neutral-200 @enderror rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all"
                        >
                        @error('whatsapp_number')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="space-y-4 bg-neutral-50 rounded-xl p-6 border-2 border-neutral-200">
                    <label class="flex items-start space-x-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="terms_accepted" 
                            value="1"
                            {{ old('terms_accepted') ? 'checked' : '' }}
                            class="mt-1 w-5 h-5 text-primary-600 border-neutral-300 rounded focus:ring-primary-500"
                        >
                        <span class="text-sm text-neutral-700 leading-relaxed">
                            I confirm that the information provided is accurate and I agree to the terms and conditions provided by SITC Campus via their support channels. <span class="text-red-500">*</span>
                        </span>
                    </label>
                    @error('terms_accepted')
                        <p class="text-sm text-red-600 ml-8">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button 
                        type="submit"
                        class="group flex-1 px-8 py-4 bg-gradient-primary text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-smooth hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden"
                    >
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <span>Continue to Agreement</span>
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
                        please contact our support team via WhatsApp at 
                        <a href=" https://wa.me/+94715258653" 
                           class="font-medium text-green-900 underline hover:text-green-700" 
                           target="_blank"
                        >+94715258653</a>.
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
                    // Deadline has passed - redirect immediately
                    window.location.href = '{{ route('offer.ended') }}';
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

        // NIC Validation Function
        function validateNIC(input) {
            const nicValue = input.value.toUpperCase().trim();
            const nicField = document.getElementById('nic');
            const validIcon = document.getElementById('nic-valid-icon');
            const invalidIcon = document.getElementById('nic-invalid-icon');
            const messageDiv = document.getElementById('nic-validation-message');
            
            // Reset states
            validIcon.classList.add('hidden');
            invalidIcon.classList.add('hidden');
            messageDiv.classList.add('hidden');
            nicField.classList.remove('border-green-500', 'border-red-500', 'bg-green-50', 'bg-red-50');
            
            // If empty, reset to neutral state
            if (!nicValue) {
                nicField.classList.add('border-neutral-200');
                return;
            }
            
            let isValid = false;
            let message = '';
            let extractedInfo = null;
            
            // Validate NIC format and extract information
            const validation = validateSriLankanNIC(nicValue);
            isValid = validation.isValid;
            message = validation.message;
            extractedInfo = validation.info;
            
            // Update UI based on validation
            if (isValid) {
                // Valid NIC
                nicField.classList.remove('border-neutral-200', 'border-red-500', 'bg-red-50');
                nicField.classList.add('border-green-500', 'bg-green-50');
                validIcon.classList.remove('hidden');
                
                // Show extracted information
                if (extractedInfo) {
                    messageDiv.innerHTML = `
                        <div class="text-green-600">
                            <p class="font-medium">✓ Valid Sri Lankan NIC</p>
                        </div>
                    `;
                    messageDiv.classList.remove('hidden');
                }
            } else {
                // Invalid NIC
                nicField.classList.remove('border-neutral-200', 'border-green-500', 'bg-green-50');
                nicField.classList.add('border-red-500', 'bg-red-50');
                invalidIcon.classList.remove('hidden');
                
                messageDiv.innerHTML = `<p class="text-red-600">${message}</p>`;
                messageDiv.classList.remove('hidden');
            }
            
            // Update input value to uppercase
            input.value = nicValue;
        }
        
        // Sri Lankan NIC Validation Logic
        function validateSriLankanNIC(nic) {
            // Remove any spaces and convert to uppercase
            nic = nic.replace(/\s/g, '').toUpperCase();
            
            // Check for old format (9 digits + V/X)
            const oldFormatRegex = /^[0-9]{9}[VX]$/;
            // Check for new format (12 digits)
            const newFormatRegex = /^[0-9]{12}$/;
            
            if (oldFormatRegex.test(nic)) {
                return validateOldFormatNIC(nic);
            } else if (newFormatRegex.test(nic)) {
                return validateNewFormatNIC(nic);
            } else {
                return {
                    isValid: false,
                    message: 'Invalid NIC format. Use either 9 digits + V/X or 12 digits.',
                    info: null
                };
            }
        }
        
        // Validate Old Format NIC (9 digits + V/X)
        function validateOldFormatNIC(nic) {
            const digits = nic.substring(0, 9);
            const suffix = nic.charAt(9);
            
            // Extract birth year (first 2 digits + 1900)
            const yearPrefix = parseInt(digits.substring(0, 2));
            const birthYear = 1900 + yearPrefix;
            
            // Extract day of year (next 3 digits)
            let dayOfYear = parseInt(digits.substring(2, 5));
            let gender = 'Male';
            
            // If day > 500, it's female and we subtract 500
            if (dayOfYear > 500) {
                gender = 'Female';
                dayOfYear -= 500;
            }
            
            // Validate day of year (1-366)
            if (dayOfYear < 1 || dayOfYear > 366) {
                return {
                    isValid: false,
                    message: 'Invalid day of year in NIC.',
                    info: null
                };
            }
            
            // Additional validation: Check if year makes sense
            const currentYear = new Date().getFullYear();
            if (birthYear < 1900 || birthYear > currentYear - 10) {
                return {
                    isValid: false,
                    message: 'Invalid birth year in NIC.',
                    info: null
                };
            }
            
            return {
                isValid: true,
                message: 'Valid old format NIC',
                info: {
                    birthYear: birthYear,
                    dayOfYear: dayOfYear,
                    gender: gender,
                    format: 'Old Format'
                }
            };
        }
        
        // Validate New Format NIC (12 digits)
        function validateNewFormatNIC(nic) {
            // Extract birth year (first 4 digits)
            const birthYear = parseInt(nic.substring(0, 4));
            
            // Extract day of year (next 3 digits)
            let dayOfYear = parseInt(nic.substring(4, 7));
            let gender = 'Male';
            
            // If day > 500, it's female and we subtract 500
            if (dayOfYear > 500) {
                gender = 'Female';
                dayOfYear -= 500;
            }
            
            // Validate day of year (1-366)
            if (dayOfYear < 1 || dayOfYear > 366) {
                return {
                    isValid: false,
                    message: 'Invalid day of year in NIC.',
                    info: null
                };
            }
            
            // Validate birth year
            const currentYear = new Date().getFullYear();
            if (birthYear < 1900 || birthYear > currentYear - 10) {
                return {
                    isValid: false,
                    message: 'Invalid birth year in NIC.',
                    info: null
                };
            }
            
            return {
                isValid: true,
                message: 'Valid new format NIC',
                info: {
                    birthYear: birthYear,
                    dayOfYear: dayOfYear,
                    gender: gender,
                    format: 'New Format'
                }
            };
        }
    </script>
</x-layout>