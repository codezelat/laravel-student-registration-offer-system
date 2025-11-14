<x-layout>
    <x-slot:title>Welcome - Student Registration</x-slot:title>

    <div class="flex items-center justify-center min-h-[60vh]">
        <x-card class="max-w-2xl w-full text-center">
            <div class="space-y-8">
                <!-- Question Section -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Welcome to Student Registration
                    </h2>
                    <p class="text-xl text-gray-600 mb-8">
                        Are you a November batch student?
                    </p>
                </div>

                <!-- Buttons Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" x-data="{ showMessage: false, isNovember: false }">
                    <x-button 
                        variant="primary" 
                        @click="showMessage = true; isNovember = true"
                        class="w-full text-lg py-4"
                    >
                        Yes
                    </x-button>
                    
                    <x-button 
                        variant="secondary" 
                        @click="showMessage = true; isNovember = false"
                        class="w-full text-lg py-4"
                    >
                        No
                    </x-button>

                    <!-- Response Message -->
                    <div 
                        x-show="showMessage" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="col-span-full mt-6"
                        style="display: none;"
                    >
                        <!-- November Student Message -->
                        <div x-show="isNovember">
                            <x-card class="bg-gradient-to-r from-blue-500 to-blue-600 text-white border-0">
                                <div class="space-y-4">
                                    <div class="text-5xl">🎓</div>
                                    <h3 class="text-2xl font-bold">Thank You!</h3>
                                    <p class="text-lg">
                                        We appreciate your interest. Registrations will resume next year.
                                    </p>
                                    <p class="text-sm opacity-90">
                                        Stay tuned for updates!
                                    </p>
                                </div>
                            </x-card>
                        </div>

                        <!-- Non-November Student - Register Button -->
                        <div x-show="!isNovember">
                            <x-card class="bg-gradient-to-r from-green-50 to-blue-50 border-blue-300">
                                <div class="space-y-4">
                                    <div class="text-5xl">✨</div>
                                    <h3 class="text-2xl font-bold text-gray-800">Great! Let's get started</h3>
                                    <p class="text-gray-600 mb-6">
                                        You're eligible to register. Click below to begin your journey!
                                    </p>
                                    <a href="{{ route('select.diploma') }}">
                                        <x-button variant="primary" class="text-lg py-4 px-8">
                                            Register Now 🚀
                                        </x-button>
                                    </a>
                                </div>
                            </x-card>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>
    </div>

    @vite('resources/js/app.js')
</x-layout>
