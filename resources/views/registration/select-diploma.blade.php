<x-layout>
    <x-slot:title>Select Your Diploma</x-slot:title>

    <div class="space-y-8">
        <!-- Countdown Timer -->
        <x-card class="bg-gradient-to-r from-blue-600 to-blue-700 text-white border-0">
            <div class="text-center">
                <h3 class="text-lg font-semibold mb-3">Registration Closes In:</h3>
                <div id="countdown" class="text-4xl font-bold tracking-wider" data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}">
                    <span id="days">00</span>d 
                    <span id="hours">00</span>h 
                    <span id="minutes">00</span>m 
                    <span id="seconds">00</span>s
                </div>
                <p class="text-sm mt-3 opacity-90">Don't miss your chance to register!</p>
            </div>
        </x-card>

        <!-- Diploma Selection -->
        <x-card>
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Select Your Diploma</h2>
            
            <form id="diplomaForm" class="space-y-4" x-data="{ selected: '' }">
                @csrf
                
                <!-- Diploma Options -->
                <div class="space-y-4">
                    <!-- Diploma in English -->
                    <label 
                        @click="selected = 'English'"
                        class="block cursor-pointer"
                    >
                        <x-card 
                            selectable 
                            :selected="false"
                            x-bind:class="{ 'border-blue-600 bg-blue-50': selected === 'English', 'border-gray-200': selected !== 'English' }"
                        >
                            <div class="flex items-center">
                                <input 
                                    type="radio" 
                                    name="diploma" 
                                    value="English" 
                                    x-model="selected"
                                    class="w-5 h-5 text-blue-600 focus:ring-blue-500"
                                >
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">📚 Diploma in English</h3>
                                    <p class="text-sm text-gray-600 mt-1">Master the English language and communication skills</p>
                                </div>
                            </div>
                        </x-card>
                    </label>

                    <!-- Diploma in IT -->
                    <label 
                        @click="selected = 'IT'"
                        class="block cursor-pointer"
                    >
                        <x-card 
                            selectable 
                            :selected="false"
                            x-bind:class="{ 'border-blue-600 bg-blue-50': selected === 'IT', 'border-gray-200': selected !== 'IT' }"
                        >
                            <div class="flex items-center">
                                <input 
                                    type="radio" 
                                    name="diploma" 
                                    value="IT" 
                                    x-model="selected"
                                    class="w-5 h-5 text-blue-600 focus:ring-blue-500"
                                >
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">💻 Diploma in IT</h3>
                                    <p class="text-sm text-gray-600 mt-1">Build your career in Information Technology</p>
                                </div>
                            </div>
                        </x-card>
                    </label>

                    <!-- Diploma in HR -->
                    <label 
                        @click="selected = 'HR'"
                        class="block cursor-pointer"
                    >
                        <x-card 
                            selectable 
                            :selected="false"
                            x-bind:class="{ 'border-blue-600 bg-blue-50': selected === 'HR', 'border-gray-200': selected !== 'HR' }"
                        >
                            <div class="flex items-center">
                                <input 
                                    type="radio" 
                                    name="diploma" 
                                    value="HR" 
                                    x-model="selected"
                                    class="w-5 h-5 text-blue-600 focus:ring-blue-500"
                                >
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800">👥 Diploma in HR</h3>
                                    <p class="text-sm text-gray-600 mt-1">Become an expert in Human Resource Management</p>
                                </div>
                            </div>
                        </x-card>
                    </label>
                </div>

                <!-- Continue Button -->
                <div 
                    x-show="selected" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="pt-6"
                >
                    <button 
                        type="button"
                        @click="window.location.href = '{{ route('register.form') }}?diploma=' + selected"
                        class="w-full px-6 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-lg text-lg"
                    >
                        Continue to Registration →
                    </button>
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
