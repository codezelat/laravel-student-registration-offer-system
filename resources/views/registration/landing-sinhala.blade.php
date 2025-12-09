<x-layout>
    <x-slot:title>Study Now Pay Later</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-12 py-8">
        <div class="text-center space-y-6">
            <!-- Countdown Timer Card -->
            <div class="bg-linear-to-br from-rose-500 to-pink-600 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden mb-8">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10 text-center">
                    <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full mb-4">
                        <span class="w-2 h-2 bg-white rounded-full animate-pulse mr-2"></span>
                        <span class="text-sm font-medium">Limited Time Opportunity</span>
                    </div>
                    
                    <h3 class="text-xl md:text-2xl font-bold mb-6">Registration Closes In:</h3>
                    
                    <div id="countdown" 
                         data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}"
                         class="flex justify-center gap-4 md:gap-8">
                        <div class="text-center">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-20 md:min-w-[100px]">
                                <div id="days" class="text-3xl md:text-5xl font-bold">00</div>
                                <div class="text-xs md:text-sm opacity-90 mt-2">Days</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-20 md:min-w-[100px]">
                                <div id="hours" class="text-3xl md:text-5xl font-bold">00</div>
                                <div class="text-xs md:text-sm opacity-90 mt-2">Hours</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-20 md:min-w-[100px]">
                                <div id="minutes" class="text-3xl md:text-5xl font-bold">00</div>
                                <div class="text-xs md:text-sm opacity-90 mt-2">Minutes</div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 md:p-6 min-w-20 md:min-w-[100px]">
                                <div id="seconds" class="text-3xl md:text-5xl font-bold">00</div>
                                <div class="text-xs md:text-sm opacity-90 mt-2">Seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="text-4xl md:text-6xl font-black text-transparent bg-clip-text bg-linear-to-r from-red-600 to-rose-600 leading-tight">
                Study Now Pay Later
            </h1>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-neutral-200/50 relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-red-50 rounded-full -translate-y-32 translate-x-32 opacity-50"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-rose-50 rounded-full translate-y-24 -translate-x-24 opacity-50"></div>

            <div class="relative z-10 space-y-8">
                <!-- Points List -->
                <ul class="space-y-6">
                    <li class="flex items-start gap-4 p-4 rounded-2xl hover:bg-red-50/50 transition-colors duration-300">
                        <div class="shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mt-1">
                            <span class="text-red-600 font-bold text-lg">1</span>
                        </div>
                        <p class="text-lg md:text-xl text-neutral-800 leading-relaxed font-medium">
                            මෙය පොළී රහිත ණය යෝජනා ක්‍රමයක් වන අතර, සමස්ථ ඩිප්ලෝමා පාඪමාලාවක්ම වන්නේ රු. 44,000 ක් පමණි.
                        </p>
                    </li>
                    <li class="flex items-start gap-4 p-4 rounded-2xl hover:bg-red-50/50 transition-colors duration-300">
                        <div class="shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mt-1">
                            <span class="text-red-600 font-bold text-lg">2</span>
                        </div>
                        <p class="text-lg md:text-xl text-neutral-800 leading-relaxed font-medium">
                            මෙහිදී 50% ක ශිෂ්‍යත්වයක් නිපුණතා ශිෂ්‍යත්ව අරමුදල මගින් ලබා දෙනු ලැබේ. ඒ අනුව ඔබ ගෙවිය යුතු මුළු මුදල වන්නේ රු. 22000 පමණී.
                        </p>
                    </li>
                    <li class="flex items-start gap-4 p-4 rounded-2xl hover:bg-red-50/50 transition-colors duration-300">
                        <div class="shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mt-1">
                            <span class="text-red-600 font-bold text-lg">3</span>
                        </div>
                        <p class="text-lg md:text-xl text-neutral-800 leading-relaxed font-medium">
                            මෙම රු. 22000 පාඨමාලා ගාස්තුව සිසුන් ගෙවිය යුත්තේ ඩිප්ලෝමා වැඩසටහන අවසානයේදීය. ඉන් පසු ද කිසිදු අමතර මුදලක් ගෙවිය යුතු නැත.
                        </p>
                    </li>
                </ul>

                <!-- CTA Button -->
                <div class="pt-8 flex justify-center">
                    <a href="{{ route('select.diploma') }}" 
                       class="group relative inline-flex items-center justify-center px-8 py-5 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-red-600 to-rose-600 rounded-2xl hover:shadow-2xl hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 overflow-hidden w-full md:w-auto">
                        <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer"></div>
                        <div class="flex items-center gap-3">
                            <span>ඩිප්ලෝමාව තෝරාගන්න (Select Diploma)</span>
                            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </a>
                </div>

                <!-- Convocation Image -->
                <div class="pt-8 flex justify-center">
                    <img src="{{ asset('images/convo-img.jpg') }}" alt="Convocation Ceremony" class="rounded-2xl shadow-xl w-full md:w-3/4 border-4 border-white/50">
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animation for Shimmer Effect -->
    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
        .animate-shimmer {
            animation: shimmer 1.5s infinite;
        }
    </style>

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
