<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
                        neutral: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-neutral-50">
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-neutral-900">Edit Student</h1>
                    <p class="text-neutral-600 mt-1">Update student information</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" 
                   class="inline-flex items-center space-x-2 px-4 py-2 bg-neutral-200 hover:bg-neutral-300 text-neutral-700 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Dashboard</span>
                </a>
            </div>

            <!-- Edit Form -->
            <div class="bg-white rounded-xl shadow-lg">
                <div class="bg-gradient-primary text-white px-6 py-4 rounded-t-xl">
                    <h2 class="text-xl font-bold">Student Information</h2>
                </div>
                
                <form action="{{ route('admin.student.update', $student->id) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="md:col-span-2">
                            <label for="full_name" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Full Name *
                            </label>
                            <input type="text" 
                                   id="full_name" 
                                   name="full_name" 
                                   value="{{ old('full_name', $student->full_name) }}"
                                   required
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('full_name') border-red-500 @enderror">
                            @error('full_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NIC -->
                        <div>
                            <label for="nic" class="block text-sm font-semibold text-neutral-700 mb-2">
                                NIC Number *
                            </label>
                            <input type="text" 
                                   id="nic" 
                                   name="nic" 
                                   value="{{ old('nic', $student->nic) }}"
                                   required
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('nic') border-red-500 @enderror">
                            @error('nic')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label for="date_of_birth" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Date of Birth *
                            </label>
                            <input type="date" 
                                   id="date_of_birth" 
                                   name="date_of_birth" 
                                   value="{{ old('date_of_birth', $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : '') }}"
                                   required
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('date_of_birth') border-red-500 @enderror">
                            @error('date_of_birth')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contact Number -->
                        <div>
                            <label for="contact_number" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Contact Number *
                            </label>
                            <input type="text" 
                                   id="contact_number" 
                                   name="contact_number" 
                                   value="{{ old('contact_number', $student->contact_number) }}"
                                   required
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('contact_number') border-red-500 @enderror">
                            @error('contact_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Email Address *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $student->email) }}"
                                   required
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Selected Diploma -->
                        <div class="md:col-span-2">
                            <label for="selected_diploma" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Selected Diploma *
                            </label>
                            <select id="selected_diploma" 
                                    name="selected_diploma" 
                                    required
                                    class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('selected_diploma') border-red-500 @enderror">
                                <option value="">Select a diploma</option>
                                <option value="Diploma in Information Technology" {{ old('selected_diploma', $student->selected_diploma) == 'Diploma in Information Technology' ? 'selected' : '' }}>Diploma in Information Technology</option>
                                <option value="Diploma in Software Engineering" {{ old('selected_diploma', $student->selected_diploma) == 'Diploma in Software Engineering' ? 'selected' : '' }}>Diploma in Software Engineering</option>
                                <option value="Diploma in Network Engineering" {{ old('selected_diploma', $student->selected_diploma) == 'Diploma in Network Engineering' ? 'selected' : '' }}>Diploma in Network Engineering</option>
                                <option value="Diploma in Cyber Security" {{ old('selected_diploma', $student->selected_diploma) == 'Diploma in Cyber Security' ? 'selected' : '' }}>Diploma in Cyber Security</option>
                            </select>
                            @error('selected_diploma')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Payment Status -->
                        <div>
                            <label for="payment_status" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Payment Status
                            </label>
                            <select id="payment_status" 
                                    name="payment_status" 
                                    class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors">
                                <option value="pending" {{ old('payment_status', $student->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ old('payment_status', $student->payment_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ old('payment_status', $student->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                        </div>

                        <!-- Read-only fields -->
                        <div class="md:col-span-2 border-t border-neutral-200 pt-6 mt-2">
                            <h3 class="text-lg font-bold text-neutral-900 mb-4">Payment Information (Read Only)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <p class="text-sm text-neutral-500">Student ID</p>
                                    <p class="font-medium text-neutral-900">{{ $student->student_id ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-neutral-500">Payment Method</p>
                                    <p class="font-medium text-neutral-900">{{ $student->payment_method ? ucfirst($student->payment_method) : 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-neutral-500">Amount Paid</p>
                                    <p class="font-medium text-neutral-900">{{ $student->amount_paid ? 'LKR ' . number_format($student->amount_paid, 2) : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-neutral-200">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="px-6 py-2 bg-neutral-200 hover:bg-neutral-300 text-neutral-700 rounded-lg font-medium transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-gradient-primary text-white rounded-lg font-medium hover:opacity-90 transition-opacity">
                            Update Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
