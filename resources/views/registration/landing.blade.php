<x-layout>
    <x-slot:title>Welcome - Student Registration</x-slot:title>

    <!-- Hero Section -->
    <div class="text-center mb-16 animate-fade-in">
        <div class="inline-flex items-center px-4 py-2 bg-primary-50 rounded-full mb-6">
            <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse mr-2"></span>
            <span class="text-sm font-medium text-primary-700">Registration Open</span>
        </div>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-neutral-900 mb-6 text-balance leading-tight">
            දැන්ම ලියාපදිංචි වන්න
            <span class="bg-gradient-primary bg-clip-text text-transparent">Journey Today</span>
        </h1>
    </div>

    <!-- Main Question Card -->
    <div class="max-w-2xl mx-auto" x-data="{ showResponse: false, isNovember: false }">
        <!-- Question Card -->
        <div 
            x-show="!showResponse"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-neutral-200/50 transition-smooth hover:shadow-2xl"
        >
            <!-- Icon -->
            <div class="w-16 h-16 bg-gradient-primary rounded-2xl flex items-center justify-center mb-6 shadow-lg mx-auto">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Question -->
            <h2 class="text-2xl md:text-3xl font-bold text-neutral-900 text-center mb-3">
                Are you a November batch student?
            </h2>
            <p class="text-neutral-600 text-center mb-8">
                Please select your answer to continue with the registration process
            </p>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <!-- Yes Button -->
                <button 
                    @click="showResponse = true; isNovember = true"
                    class="group relative px-8 py-4 bg-gradient-primary text-white rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl transition-smooth hover:scale-105 active:scale-95 overflow-hidden"
                >
                    <span class="relative z-10 flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Yes</span>
                    </span>
                    <div class="absolute inset-0 bg-white/20 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </button>

                <!-- No Button -->
                <button 
                    @click="showResponse = true; isNovember = false"
                    class="group relative px-8 py-4 bg-white border-2 border-neutral-300 text-neutral-900 rounded-2xl font-semibold text-lg hover:border-primary-500 hover:bg-primary-50 transition-smooth hover:scale-105 active:scale-95"
                >
                    <span class="flex items-center justify-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>No</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- Response Cards -->
        <div 
            x-show="showResponse" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            style="display: none;"
        >
            <!-- November Student Response -->
            <div x-show="isNovember" class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-3xl p-8 md:p-12 border border-amber-200/50 shadow-xl">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 mb-4">
                        Thank You for Your Interest!
                    </h3>
                    
                    <p class="text-lg text-neutral-700 mb-6 leading-relaxed">
                        We appreciate your enthusiasm. Registration for the November batch has concluded.
                    </p>
                    
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 mb-6">
                        <p class="text-neutral-800 font-medium mb-2">What's Next?</p>
                        <p class="text-sm text-neutral-600">
                            Stay tuned for our next intake opening. Subscribe to our newsletter to be the first to know!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Non-November Student Response -->
            <div x-show="!isNovember" class="bg-gradient-to-br from-primary-50 to-accent-50 rounded-3xl p-8 md:p-12 border border-primary-200/50 shadow-xl">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg animate-bounce-slow">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl md:text-3xl font-bold text-neutral-900 mb-4">
                        Perfect! Let's Get Started
                    </h3>
                    
                    <p class="text-lg text-neutral-700 mb-8 leading-relaxed">
                        You're eligible to register. Click below to begin your educational journey with us!
                    </p>
                    
                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4">
                            <svg class="w-8 h-8 text-primary-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <p class="text-sm font-medium text-neutral-800">Quick Process</p>
                        </div>
                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4">
                            <svg class="w-8 h-8 text-primary-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <p class="text-sm font-medium text-neutral-800">Secure Payment</p>
                        </div>
                        <div class="bg-white/60 backdrop-blur-sm rounded-xl p-4">
                            <svg class="w-8 h-8 text-primary-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <p class="text-sm font-medium text-neutral-800">Quality Education</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('select.diploma') }}">
                        <button class="group relative px-10 py-4 bg-gradient-primary text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-smooth hover:scale-105 active:scale-95 overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center space-x-2">
                                <span>Register Now</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                            <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <!-- <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div class="text-center p-6">
            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </div>
            <h3 class="font-semibold text-neutral-900 mb-2">Flexible Learning</h3>
            <p class="text-sm text-neutral-600">Study at your own pace with our comprehensive curriculum</p>
        </div>

        <div class="text-center p-6">
            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h3 class="font-semibold text-neutral-900 mb-2">Expert Instructors</h3>
            <p class="text-sm text-neutral-600">Learn from industry professionals with years of experience</p>
        </div>

        <div class="text-center p-6">
            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h3 class="font-semibold text-neutral-900 mb-2">Certified Programs</h3>
            <p class="text-sm text-neutral-600">Receive recognized certifications upon completion</p>
        </div>
    </div> -->

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
    </style>

    @vite('resources/js/app.js')
</x-layout>