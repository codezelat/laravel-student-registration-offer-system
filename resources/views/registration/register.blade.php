<x-layout>
    <x-slot:title>Student Registration Form</x-slot:title>

    <div class="space-y-6">
        <!-- Countdown Timer -->
        <x-card class="bg-gradient-to-r from-blue-600 to-blue-700 text-white border-0">
            <div class="text-center">
                <h3 class="text-lg font-semibold mb-3">Registration Closes In:</h3>
                <div id="countdown" class="text-3xl font-bold tracking-wider" data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}">
                    <span id="days">00</span>d 
                    <span id="hours">00</span>h 
                    <span id="minutes">00</span>m 
                    <span id="seconds">00</span>s
                </div>
            </div>
        </x-card>

        <!-- Selected Diploma Display -->
        <x-card class="bg-gradient-to-r from-green-50 to-blue-50 border-blue-200">
            <div class="text-center">
                <p class="text-sm font-medium text-gray-600 mb-2">You have selected:</p>
                <p class="text-2xl font-bold text-blue-600">Diploma in {{ $diploma }}</p>
                <p class="text-sm text-gray-500 mt-1">Complete your registration below</p>
            </div>
        </x-card>

        <!-- Registration Form -->
        <x-card>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Student Registration Form</h2>
            
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Hidden Fields -->
                <input type="hidden" name="registration_id" value="{{ $registrationId }}">
                <input type="hidden" name="selected_diploma" value="{{ $diploma }}">

                <!-- Full Name -->
                <div>
                    <x-input 
                        label="Full Name" 
                        name="full_name" 
                        type="text"
                        value="{{ old('full_name') }}"
                        :error="$errors->first('full_name')"
                        required
                        placeholder="Enter your full name"
                    />
                </div>

                <!-- NIC -->
                <div>
                    <x-input 
                        label="National Identity Card (NIC)" 
                        name="nic" 
                        type="text"
                        value="{{ old('nic') }}"
                        :error="$errors->first('nic')"
                        required
                        placeholder="e.g., 123456789V or 123456789012"
                    />
                </div>

                <!-- Date of Birth -->
                <div>
                    <x-input 
                        label="Date of Birth" 
                        name="date_of_birth" 
                        type="date"
                        value="{{ old('date_of_birth') }}"
                        :error="$errors->first('date_of_birth')"
                        required
                    />
                </div>

                <!-- Contact Number -->
                <div>
                    <x-input 
                        label="Contact Number" 
                        name="contact_number" 
                        type="tel"
                        value="{{ old('contact_number') }}"
                        :error="$errors->first('contact_number')"
                        required
                        placeholder="e.g., 0771234567"
                    />
                </div>

                <!-- Email -->
                <div>
                    <x-input 
                        label="Email Address" 
                        name="email" 
                        type="email"
                        value="{{ old('email') }}"
                        :error="$errors->first('email')"
                        required
                        placeholder="your.email@example.com"
                    />
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <x-button type="submit" variant="primary" fullWidth class="text-lg py-4">
                        Submit
                    </x-button>
                </div>

                <!-- Back Link -->
                <div class="text-center">
                    <a href="{{ route('select.diploma') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                        ← Go back to diploma selection
                    </a>
                </div>
            </form>
        </x-card>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Countdown Timer
            function updateCountdown() {
                const deadlineElement = document.getElementById('countdown');
                if (!deadlineElement) return;
                
                const deadlineStr = deadlineElement.getAttribute('data-deadline');
                
                // Parse deadline as IST (UTC+5:30)
                // Format: "2025-11-26 23:59:59" -> "2025-11-26T23:59:59+05:30"
                const istDeadlineStr = deadlineStr.replace(' ', 'T') + '+05:30';
                const deadline = new Date(istDeadlineStr);
                
                // Get current time
                const now = new Date();
                
                // Calculate time difference
                const timeDiff = deadline - now;
                
                if (timeDiff <= 0) {
                    document.getElementById('days').textContent = '00';
                    document.getElementById('hours').textContent = '00';
                    document.getElementById('minutes').textContent = '00';
                    document.getElementById('seconds').textContent = '00';
                    return;
                }
                
                const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);
                
                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');
                
                if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
                if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
                if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
                if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
            }
            
            // Update countdown immediately and then every second
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
</x-layout>
