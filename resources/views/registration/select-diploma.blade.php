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
                    Choose Your Program
                </h2>
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                    Select the diploma that aligns with your career goals and aspirations
                </p>
            </div>

            <form class="space-y-6" x-data="{ selected: '' }">
                @csrf
                
                <!-- Diploma Options -->
                <div class="space-y-4">
                    <!-- Diploma in English -->
                    <label 
                        @click="selected = 'English'"
                        class="block cursor-pointer group"
                    >
                        <div 
                            class="relative p-6 md:p-8 rounded-2xl border-2 transition-smooth hover:shadow-lg"
                            :class="selected === 'English' ? 'border-primary-500 bg-primary-50 shadow-lg' : 'border-neutral-200 hover:border-primary-300 bg-white'"
                        >
                            <div class="flex items-start space-x-4">
                                <!-- Radio Button -->
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-smooth"
                                         :class="selected === 'English' ? 'border-primary-600 bg-primary-600' : 'border-neutral-300'">
                                        <svg x-show="selected === 'English'" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-neutral-900">Diploma in English</h3>
                                            <p class="text-sm text-neutral-600">Language & Communication</p>
                                        </div>
                                    </div>
                                    
                                    <p class="text-neutral-700 mb-4 leading-relaxed">
                                        Master the English language and develop exceptional communication skills for global opportunities.
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Writing</span>
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Speaking</span>
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Grammar</span>
                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Literature</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>

                    <!-- Diploma in IT -->
                    <label 
                        @click="selected = 'IT'"
                        class="block cursor-pointer group"
                    >
                        <div 
                            class="relative p-6 md:p-8 rounded-2xl border-2 transition-smooth hover:shadow-lg"
                            :class="selected === 'IT' ? 'border-primary-500 bg-primary-50 shadow-lg' : 'border-neutral-200 hover:border-primary-300 bg-white'"
                        >
                            <div class="flex items-start space-x-4">
                                <!-- Radio Button -->
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-smooth"
                                         :class="selected === 'IT' ? 'border-primary-600 bg-primary-600' : 'border-neutral-300'">
                                        <svg x-show="selected === 'IT'" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-neutral-900">Diploma in IT</h3>
                                            <p class="text-sm text-neutral-600">Information Technology</p>
                                        </div>
                                    </div>
                                    
                                    <p class="text-neutral-700 mb-4 leading-relaxed">
                                        Build your career in technology with comprehensive training in software development and IT systems.
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Programming</span>
                                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Web Development</span>
                                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Databases</span>
                                        <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Networking</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>

                    <!-- Diploma in HR -->
                    <label 
                        @click="selected = 'HR'"
                        class="block cursor-pointer group"
                    >
                        <div 
                            class="relative p-6 md:p-8 rounded-2xl border-2 transition-smooth hover:shadow-lg"
                            :class="selected === 'HR' ? 'border-primary-500 bg-primary-50 shadow-lg' : 'border-neutral-200 hover:border-primary-300 bg-white'"
                        >
                            <div class="flex items-start space-x-4">
                                <!-- Radio Button -->
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-smooth"
                                         :class="selected === 'HR' ? 'border-primary-600 bg-primary-600' : 'border-neutral-300'">
                                        <svg x-show="selected === 'HR'" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                
                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-center space-x-3 mb-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-neutral-900">Diploma in HR</h3>
                                            <p class="text-sm text-neutral-600">Human Resource Management</p>
                                        </div>
                                    </div>
                                    
                                    <p class="text-neutral-700 mb-4 leading-relaxed">
                                        Become an expert in managing people and organizations with strategic HR practices.
                                    </p>
                                    
                                    <div class="flex flex-wrap gap-2">
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Recruitment</span>
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Training</span>
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Performance</span>
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Strategy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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