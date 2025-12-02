<x-layout>
    <x-slot:title>Select Your Diploma</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Countdown Timer Card -->
        <div class="bg-gradient-to-br from-rose-500 to-pink-600 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
            
            <div class="relative z-10 text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-4">
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse mr-2"></span>
                    <span class="text-sm font-medium">Limited Time Offer</span>
                </div>
                
                <h3 class="text-xl md:text-2xl font-bold mb-6">Registration Closes In:</h3>
                
                <div id="countdown" 
                     data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}"
                     class="flex justify-center gap-4 md:gap-8">
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-[80px] md:min-w-[100px]">
                            <div id="days" class="text-3xl md:text-5xl font-bold">00</div>
                            <div class="text-xs md:text-sm opacity-90 mt-2">Days</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-[80px] md:min-w-[100px]">
                            <div id="hours" class="text-3xl md:text-5xl font-bold">00</div>
                            <div class="text-xs md:text-sm opacity-90 mt-2">Hours</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-[80px] md:min-w-[100px]">
                            <div id="minutes" class="text-3xl md:text-5xl font-bold">00</div>
                            <div class="text-xs md:text-sm opacity-90 mt-2">Minutes</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-[80px] md:min-w-[100px]">
                            <div id="seconds" class="text-3xl md:text-5xl font-bold">00</div>
                            <div class="text-xs md:text-sm opacity-90 mt-2">Seconds</div>
                        </div>
                    </div>
                </div>
                
                <p class="text-sm md:text-base opacity-90 mt-6">
                    Don't miss your chance to enroll in our prestigious programs!
                </p>
            </div>
        </div>

        <!-- Main Selection Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-neutral-200/50">
            <div class="text-center mb-12">
                <div class="w-16 h-16 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                
                <h2 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-4">
                    Choose Your Preferred Diploma Program
                </h2>
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                    Select the diploma that aligns with your career goals and aspirations
                </p>
            </div>

            <form class="space-y-6" x-data="{ selected: '' }">
                @csrf
                
                <!-- Diploma Options -->
                <div class="space-y-4">
                    @foreach($diplomas as $index => $diploma)
                    <label 
                        @click="selected = '{{ $diploma['name'] }}'"
                        class="block cursor-pointer group"
                    >
                        <div 
                            class="relative p-6 md:p-8 rounded-2xl border-2 transition-smooth hover:shadow-lg"
                            :class="selected === '{{ $diploma['name'] }}' ? 'border-primary-500 bg-primary-50 shadow-lg' : 'border-neutral-200 hover:border-primary-300 bg-white'"
                        >
                            <div class="flex items-start space-x-4">
                                <!-- Radio Button -->
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-smooth"
                                         :class="selected === '{{ $diploma['name'] }}' ? 'border-primary-600 bg-primary-600' : 'border-neutral-300'">
                                        <svg x-show="selected === '{{ $diploma['name'] }}'" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1">
                                    <h3 class="text-lg md:text-xl font-bold text-neutral-900">{{ $diploma['full_name'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </label>
                    @endforeach
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
                        @click="window.location.href = '{{ route('landing') }}?diploma=' + selected"
                        class="group w-full px-8 py-5 bg-gradient-primary text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-smooth hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden"
                    >
                        <span class="relative z-10 flex items-center justify-center space-x-3">
                            <span>Continue to Registration</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                    </button>
                </div>
            </form>
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
                
                const daysEl = document.getElementById('days');
                const hoursEl = document.getElementById('hours');
                const minutesEl = document.getElementById('minutes');
                const secondsEl = document.getElementById('seconds');
                
                if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
                if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
                if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
                if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
            }
            
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
</x-layout>