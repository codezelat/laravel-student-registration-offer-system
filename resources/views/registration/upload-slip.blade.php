<x-layout>
    <x-slot:title>Upload Payment Slip</x-slot:title>

    <div class="space-y-6 max-w-3xl mx-auto">
        <!-- Header -->
        <x-card class="bg-gradient-to-r from-green-600 to-green-700 text-white border-0">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-2">Upload Payment Slip</h2>
                <p class="text-sm opacity-90">Please upload proof of payment</p>
            </div>
        </x-card>

        <!-- Student Info -->
        <x-card class="bg-blue-50 border-blue-200">
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Registration ID:</span>
                    <span class="font-bold text-blue-600">{{ $student->registration_id }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Student Name:</span>
                    <span class="font-semibold text-gray-800">{{ $student->full_name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium text-gray-700">Amount to Pay:</span>
                    <span class="font-bold text-green-600 text-xl">LKR 5,000.00</span>
                </div>
            </div>
        </x-card>

        <!-- Bank Details -->
        <x-card class="bg-gray-50 border-gray-300">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">🏦 Bank Transfer Details</h3>
            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>Bank Name:</strong> Commercial Bank</p>
                <p><strong>Account Name:</strong> Student Portal PVT LTD</p>
                <p><strong>Account Number:</strong> 1234567890</p>
                <p><strong>Branch:</strong> Colombo</p>
                <p><strong>Amount:</strong> LKR 5,000.00</p>
            </div>
            <p class="text-xs text-red-600 mt-3 font-medium">
                * Please include your Registration ID ({{ $student->registration_id }}) in the payment reference
            </p>
        </x-card>

        <!-- Upload Form -->
        <x-card>
            <h3 class="text-xl font-bold text-gray-800 mb-4">Upload Payment Slip</h3>
            
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('payment.store-slip') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Select Payment Slip <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-500 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="payment_slip" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Upload a file</span>
                                    <input 
                                        id="payment_slip" 
                                        name="payment_slip" 
                                        type="file" 
                                        class="sr-only" 
                                        accept=".jpg,.jpeg,.png,.pdf,.docx,.doc"
                                        required
                                        onchange="displayFileName(this)"
                                    >
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                JPG, PNG, PDF, DOCX up to 10MB
                            </p>
                            <p id="file-name" class="text-sm text-green-600 font-medium mt-2"></p>
                        </div>
                    </div>
                    @error('payment_slip')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Additional Notes (Optional)
                    </label>
                    <textarea 
                        name="notes" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        placeholder="Any additional information about your payment..."
                    >{{ old('notes') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button 
                        type="submit"
                        class="flex-1 px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105"
                    >
                        Submit Payment Slip
                    </button>
                    <a 
                        href="{{ route('payment.options', $student->id) }}"
                        class="flex-1 px-6 py-4 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-semibold text-center transition-all duration-300"
                    >
                        Back to Payment Options
                    </a>
                </div>
            </form>
        </x-card>

        <!-- Important Notes -->
        <x-card class="bg-yellow-50 border-yellow-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">⚠️ Important Notes</h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-start">
                    <span class="text-yellow-600 mr-2">•</span>
                    <span>Ensure the payment slip is clear and all details are visible</span>
                </li>
                <li class="flex items-start">
                    <span class="text-yellow-600 mr-2">•</span>
                    <span>The payment slip will be verified within 2-3 business days</span>
                </li>
                <li class="flex items-start">
                    <span class="text-yellow-600 mr-2">•</span>
                    <span>You will receive a confirmation email once verified</span>
                </li>
                <li class="flex items-start">
                    <span class="text-yellow-600 mr-2">•</span>
                    <span>Accepted formats: JPG, PNG, PDF, DOCX (Max 10MB)</span>
                </li>
            </ul>
        </x-card>
    </div>

    <script>
        function displayFileName(input) {
            const fileNameDisplay = document.getElementById('file-name');
            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                const fileSize = (input.files[0].size / 1024 / 1024).toFixed(2); // Convert to MB
                fileNameDisplay.textContent = `Selected: ${fileName} (${fileSize} MB)`;
            } else {
                fileNameDisplay.textContent = '';
            }
        }
    </script>
</x-layout>
