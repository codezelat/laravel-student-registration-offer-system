<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4F46E5 0%, #6366F1 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="bg-neutral-50 min-h-screen antialiased">
    <!-- Header -->
    <header class="sticky top-0 z-50 glass-effect border-b border-neutral-200/50 shadow-sm">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo & Title -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/sitc-logo.png') }}" alt="Logo" class="h-12">
                    <div>
                        <h1 class="text-lg font-bold text-neutral-900">Special Registration System</h1>
                        <p class="text-xs text-neutral-500">Edit Student Information</p>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-xl font-medium hover:border-primary-300 hover:bg-primary-50 hover:text-primary-600 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Back to Dashboard</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-neutral-900">Edit Student Record</h2>
            <p class="text-neutral-600 mt-1">Update student information and details</p>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-2xl border border-neutral-200/50 shadow-sm overflow-hidden">
            <div class="bg-gradient-primary px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Student Information</h3>
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

                        <!-- Name with Initials -->
                        <div class="md:col-span-2">
                            <label for="name_with_initials" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Name with Initials
                            </label>
                            <input type="text" 
                                   id="name_with_initials" 
                                   name="name_with_initials" 
                                   value="{{ old('name_with_initials', $student->name_with_initials) }}"
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('name_with_initials') border-red-500 @enderror">
                            @error('name_with_initials')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Gender *
                            </label>
                            <select id="gender" 
                                    name="gender" 
                                    required
                                    class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('gender') border-red-500 @enderror">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
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

                        <!-- WhatsApp Number -->
                        <div>
                            <label for="whatsapp_number" class="block text-sm font-semibold text-neutral-700 mb-2">
                                WhatsApp Number
                            </label>
                            <input type="text" 
                                   id="whatsapp_number" 
                                   name="whatsapp_number" 
                                   value="{{ old('whatsapp_number', $student->whatsapp_number) }}"
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('whatsapp_number') border-red-500 @enderror">
                            @error('whatsapp_number')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Emergency Contact Number (Home Number) -->
                        <div>
                            <label for="home_contact_number" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Emergency Contact Number (Home Number) *
                            </label>
                            <input type="text" 
                                   id="home_contact_number" 
                                   name="home_contact_number" 
                                   value="{{ old('home_contact_number', $student->home_contact_number) }}"
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('home_contact_number') border-red-500 @enderror">
                            @error('home_contact_number')
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

                        <!-- Permanent Address -->
                        <div class="md:col-span-2">
                            <label for="permanent_address" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Permanent Address
                            </label>
                            <textarea id="permanent_address" 
                                      name="permanent_address" 
                                      rows="2"
                                      class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('permanent_address') border-red-500 @enderror">{{ old('permanent_address', $student->permanent_address) }}</textarea>
                            @error('permanent_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Postal Code -->
                        <div>
                            <label for="postal_code" class="block text-sm font-semibold text-neutral-700 mb-2">
                                Postal Code
                            </label>
                            <input type="text" 
                                   id="postal_code" 
                                   name="postal_code" 
                                   value="{{ old('postal_code', $student->postal_code) }}"
                                   class="w-full px-4 py-2 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:outline-none transition-colors @error('postal_code') border-red-500 @enderror">
                            @error('postal_code')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- District -->
                        <div>
                            <label for="district" class="block text-sm font-semibold text-neutral-700 mb-2">
                                District
                            </label>
                            <select id="district" 
                                    name="district" 
                                    class="w-full px-4 py-2.5 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all @error('district') border-red-500 @enderror">
                                <option value="">Select District</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district }}" {{ old('district', $student->district) == $district ? 'selected' : '' }}>{{ $district }}</option>
                                @endforeach
                            </select>
                            @error('district')
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
                                    class="w-full px-4 py-2.5 border-2 border-neutral-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 focus:outline-none transition-all @error('selected_diploma') border-red-500 @enderror">
                                <option value="">Select a diploma</option>
                                @foreach($diplomas as $diploma)
                                    <option value="{{ $diploma['name'] }}" {{ old('selected_diploma', $student->selected_diploma) == $diploma['name'] ? 'selected' : '' }}>{{ $diploma['name'] }}</option>
                                @endforeach
                            </select>
                            @error('selected_diploma')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Read-only fields -->
                        <div class="md:col-span-2 border-t border-neutral-200 pt-6 mt-2">
                            <h3 class="text-lg font-bold text-neutral-900 mb-4">Payment Information (Read Only)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <p class="text-sm text-neutral-500">Registration ID</p>
                                    <p class="font-medium text-neutral-900">{{ $student->registration_id ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-neutral-500">Payment Method</p>
                                    <p class="font-medium text-neutral-900">{{ $student->payment_method ? ucfirst($student->payment_method) : 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-neutral-500">Payment Status</p>
                                    <p class="font-medium text-neutral-900">{{ $student->payment_status ? ucfirst($student->payment_status) : 'N/A' }}</p>
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
