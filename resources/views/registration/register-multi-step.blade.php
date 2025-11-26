<x-layout>
    <x-slot:title>Student Registration</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6" x-data="registrationForm()">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step <span x-text="currentStep"></span> of 3</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary rounded-full transition-all duration-500" 
                     :style="`width: ${(currentStep / 3) * 100}%`"></div>
            </div>
            
            <!-- Step Labels -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold"
                         :class="currentStep >= 1 ? 'bg-primary-500 text-white' : 'bg-neutral-200 text-neutral-500'">
                        1
                    </div>
                    <p class="text-xs font-medium" :class="currentStep >= 1 ? 'text-primary-600' : 'text-neutral-500'">Details</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold"
                         :class="currentStep >= 2 ? 'bg-primary-500 text-white' : 'bg-neutral-200 text-neutral-500'">
                        2
                    </div>
                    <p class="text-xs font-medium" :class="currentStep >= 2 ? 'text-primary-600' : 'text-neutral-500'">Payment</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold"
                         :class="currentStep >= 3 ? 'bg-primary-500 text-white' : 'bg-neutral-200 text-neutral-500'">
                        3
                    </div>
                    <p class="text-xs font-medium" :class="currentStep >= 3 ? 'text-primary-600' : 'text-neutral-500'">Complete</p>
                </div>
            </div>
        </div>

        <!-- Step 1: Registration Form -->
        <div x-show="currentStep === 1" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 transform translate-x-8" 
             x-transition:enter-end="opacity-100 transform translate-x-0">
            @include('registration.partials.step1-form', ['diploma' => $diploma, 'registrationId' => $registrationId, 'districts' => $districts])
        </div>

        <!-- Step 2: Payment Options -->
        <div x-show="currentStep === 2" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 transform translate-x-8" 
             x-transition:enter-end="opacity-100 transform translate-x-0">
            @include('registration.partials.step2-payment')
        </div>

        <!-- Step 3: Success / Payment Processing -->
        <div x-show="currentStep === 3" x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 transform scale-95" 
             x-transition:enter-end="opacity-100 transform scale-100">
            @include('registration.partials.step3-success')
        </div>
    </div>

    <script>
        function registrationForm() {
            return {
                currentStep: 1,
                formData: {},
                registrationId: '{{ $registrationId }}',
                selectedPaymentMethod: null,
                
                init() {
                    // Check if coming back from payment
                    const urlParams = new URLParams(window.location.search);
                    if (urlParams.get('step') === '3') {
                        this.currentStep = 3;
                    }
                },
                
                async submitStep1() {
                    const form = document.getElementById('registration-form');
                    const formData = new FormData(form);
                    
                    try {
                        const response = await fetch('{{ route("register.store") }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        });
                        
                        if (response.ok) {
                            // Store form data
                            this.formData = Object.fromEntries(formData);
                            this.currentStep = 2;
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                        } else {
                            const errors = await response.json();
                            // Handle validation errors
                            console.error(errors);
                            alert('Please fix the errors in the form');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    }
                },
                
                selectPayment(method) {
                    this.selectedPaymentMethod = method;
                    
                    if (method === 'card') {
                        // Submit to PayHere
                        document.getElementById('payhere-form').submit();
                    } else if (method === 'slip') {
                        // Show upload slip form
                        this.currentStep = 3;
                        this.showUploadSlip = true;
                    }
                },
                
                showSuccess(registrationId) {
                    this.currentStep = 3;
                    this.registrationId = registrationId;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            }
        }
    </script>
</x-layout>
