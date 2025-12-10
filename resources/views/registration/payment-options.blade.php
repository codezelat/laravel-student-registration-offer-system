<x-layout>
    <x-slot:title>Payment Options</x-slot:title>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Progress Indicator -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-neutral-200/50">
            <div class="flex items-center justify-between mb-4">
                <span class="text-sm font-medium text-neutral-600">Registration Progress</span>
                <span class="text-sm font-semibold text-primary-600">Step 2 of 3</span>
            </div>
            <div class="h-2 bg-neutral-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-primary w-2/3 rounded-full transition-all duration-500"></div>
            </div>
            
            <!-- Step Labels -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-green-500 text-white">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-green-600">Details</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-primary-500 text-white">
                        2
                    </div>
                    <p class="text-xs font-medium text-primary-600">Payment</p>
                </div>
                <div class="text-center">
                    <div class="w-8 h-8 rounded-full mx-auto mb-2 flex items-center justify-center text-sm font-bold bg-neutral-200 text-neutral-500">
                        3
                    </div>
                    <p class="text-xs font-medium text-neutral-500">Complete</p>
                </div>
            </div>
        </div>

        <!-- Countdown Timer (same as Step 1) -->
        <div class="bg-linear-to-br from-primary-500 to-primary-600 rounded-3xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full -translate-y-24 translate-x-24"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Complete Payment Before</p>
                        <p class="text-xs opacity-75">Choose your payment method below</p>
                    </div>
                </div>
                
                <div id="countdown" 
                     data-deadline="{{ env('COUNTDOWN_DEADLINE', '2025-11-26 23:59:59') }}"
                     class="flex gap-3">
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="days" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Days</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="hours" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Hrs</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="minutes" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Min</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-3 py-2 min-w-[60px]">
                            <div id="seconds" class="text-2xl font-bold">00</div>
                            <div class="text-xs opacity-90">Sec</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Selected Diploma Badge (same as Step 1) -->
        <div class="bg-linear-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200/50">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 bg-linear-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-green-700 font-medium">Selected Program</p>
                    <p class="text-xl font-bold text-green-900">{{ $studentData['selected_diploma'] }}</p>
                </div>
            </div>
        </div>

        <!-- Student Info Card -->
        <div class="bg-white rounded-3xl shadow-lg p-6 md:p-8 border border-neutral-200/50">
            <h3 class="text-lg font-bold text-neutral-900 mb-6 flex items-center">
                <svg class="w-5 h-5 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Registration Details
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Registration ID -->
                <div class="flex items-start space-x-3 p-4 bg-linear-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200/50">
                    <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Registration ID</p>
                        <p class="font-bold text-neutral-900">{{ $studentData['registration_id'] }}</p>
                    </div>
                </div>

                <!-- Full Name -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Full Name</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['full_name'] }}</p>
                    </div>
                </div>

                <!-- Name with Initials -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Name with Initials</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['name_with_initials'] }}</p>
                    </div>
                </div>

                <!-- Gender -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Gender</p>
                        <p class="font-semibold text-neutral-900">{{ ucfirst($studentData['gender']) }}</p>
                    </div>
                </div>

                <!-- NIC -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">NIC</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['nic'] }}</p>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Date of Birth</p>
                        <p class="font-semibold text-neutral-900">{{ date('F d, Y', strtotime($studentData['date_of_birth'])) }}</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Email</p>
                        <p class="font-semibold text-neutral-900 break-all">{{ $studentData['email'] }}</p>
                    </div>
                </div>

                <!-- Program -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Program</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['selected_diploma'] }}</p>
                    </div>
                </div>

                <!-- WhatsApp Number -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">WhatsApp Number</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['whatsapp_number'] }}</p>
                    </div>
                </div>

                @if(!empty($studentData['home_contact_number']))
                <!-- Home Contact (if provided) -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Emergency Contact</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['home_contact_number'] }}</p>
                    </div>
                </div>
                @endif

                <!-- District -->
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">District</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['district'] }}</p>
                    </div>
                </div>

                <!-- Postal Code -->
                @if(!empty($studentData['postal_code']))
                <div class="flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Postal Code</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['postal_code'] }}</p>
                    </div>
                </div>
                @endif

                <!-- Permanent Address (full width) -->
                <div class="md:col-span-2 flex items-start space-x-3 p-4 bg-neutral-50 rounded-xl">
                    <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-xs text-neutral-500 mb-1">Permanent Address</p>
                        <p class="font-semibold text-neutral-900">{{ $studentData['permanent_address'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 border border-neutral-200/50">
            <h2 class="text-2xl font-bold text-neutral-900 mb-6">Choose Payment Method</h2>
            
                <!-- Study Now Pay Later Option -->
                <div class="col-span-full">
                    <form action="{{ route('payment.agree') }}" method="POST">
                        @csrf
                        <div class="bg-linear-to-br from-red-50 to-rose-50 border-2 border-red-200 rounded-3xl p-8 transition-smooth hover:shadow-xl">
                            <div class="flex items-start justify-between mb-8">
                                <div class="w-16 h-16 bg-linear-to-br from-red-600 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            </div>
                            
                            <h3 class="text-3xl font-bold text-neutral-900 mb-6">Study Now Pay Later</h3>
                            
                            <div class="space-y-6 mb-8">
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mt-1">
                                        <span class="text-red-600 font-bold">1</span>
                                    </div>
                                    <p class="text-lg text-neutral-800 font-medium leading-relaxed">
                                        Students have to pay the examination fee of <span class="font-bold text-red-600">Rs 1,000</span> at the end of the course. Exam will be physical at your nearest center. We have 20+ centers island-wide. If you cannot attend the examination physically, you can request for an online proctored exam. There is only one final examination and revision support will also be provided prior to it. Students residing abroad can also sit for the online proctored exam.
                                    </p>
                                </div>
                                
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mt-1">
                                        <span class="text-red-600 font-bold">2</span>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-lg text-neutral-800 font-medium leading-relaxed">
                                            <span class="inline-block px-4 py-2 bg-gradient-to-r from-yellow-200 via-yellow-300 to-yellow-200 text-red-900 font-black rounded-lg border-2 border-yellow-400 shadow-lg">There are no any additional fees.</span> If you are willing to participate for the convocation you will have to pay the convocation fees to BMICH only. (Approx. Rs.4,500 only if you are attending the convocation) No certificate fees. (We provide your UGC recognized university certificate - free of charge).
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Digital Signature Section -->
                            <div class="bg-white rounded-2xl p-6 border border-red-200 mb-8">
                                <h4 class="text-sm font-bold text-red-600 uppercase tracking-wider mb-4">Digital Agreement</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-xs text-neutral-500 mb-1">Full Name</label>
                                        <input type="text" value="{{ $studentData['full_name'] }}" readonly 
                                               class="w-full bg-red-50 border-red-200 rounded-lg py-2 px-3 text-red-600 font-bold focus:ring-0 focus:border-red-200 cursor-not-allowed">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-neutral-500 mb-1">NIC Number</label>
                                        <input type="text" value="{{ $studentData['nic'] }}" readonly 
                                               class="w-full bg-red-50 border-red-200 rounded-lg py-2 px-3 text-red-600 font-bold focus:ring-0 focus:border-red-200 cursor-not-allowed">
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="group w-full py-5 bg-linear-to-r from-red-600 to-rose-600 text-white rounded-2xl font-bold text-xl shadow-xl hover:shadow-2xl hover:scale-[1.01] active:scale-[0.99] transition-all relative overflow-hidden">
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    I Agree & Complete Registration
                                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Temporarily Disabled Payment Methods -->
                <!-- Temporarily Disabled Payment Methods -->
                {{--
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 opacity-50 pointer-events-none hidden">
                    <!-- Online Payment -->
                    <form action="{{ route('payment.payhere') }}" method="POST" class="h-full">
                        @csrf
                        <button type="submit" class="group w-full h-full text-left">
                            <div class="h-full p-6 bg-linear-to-br from-primary-50 to-primary-100 border-2 border-primary-200 rounded-2xl hover:shadow-xl transition-smooth hover:scale-[1.02] active:scale-[0.98]">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="w-14 h-14 bg-gradient-primary rounded-2xl flex items-center justify-center shadow-lg">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">RECOMMENDED</span>
                                </div>
                                
                                <h3 class="text-xl font-bold text-neutral-900 mb-2">Pay Using Your Card Now</h3>
                                <p class="text-sm text-neutral-700 mb-4 leading-relaxed">
                                    Quick and secure payment with PayHere. Instant confirmation upon payment.
                                </p>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Instant registration to the program</span>
                                    </div>
                                    <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Credit/Debit cards accepted</span>
                                    </div>
                                    <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Immediate access to course WhatsApp group upon payment</span>
                                    </div>
                                    <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Secure encrypted payment processing</span>
                                    </div>
                                    <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span>Central Bank of Sri Lanka approved PayHere payment gateway</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between pt-4 border-t border-primary-200">
                                    <span class="text-sm font-medium text-neutral-700">Proceed to payment</span>
                                    <svg class="w-5 h-5 text-primary-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </form>

                    <!-- Bank Transfer -->
                    <a href="{{ route('payment.upload-slip') }}" class="group block h-full">
                        <div class="h-full p-6 bg-linear-to-br from-green-50 to-emerald-50 border-2 border-green-200 rounded-2xl hover:shadow-xl transition-smooth hover:scale-[1.02] active:scale-[0.98]">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-14 h-14 bg-linear-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">BANK TRANSFER</span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-neutral-900 mb-2">Upload Payment Slip</h3>
                            <p class="text-sm text-neutral-700 mb-4 leading-relaxed">
                                Pay via bank transfer and upload your payment slip for verification.
                            </p>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>2-3 business days verification</span>
                                </div>
                                <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>JPG, PNG, PDF, DOCX accepted</span>
                                </div>
                                <div class="flex items-start space-x-2 text-sm text-neutral-600">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Confirmation only after approval</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-green-200">
                                <span class="text-sm font-medium text-neutral-700">Upload payment slip</span>
                                <svg class="w-5 h-5 text-green-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                --}}

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('register.form') }}?diploma={{ urlencode($studentData['selected_diploma']) }}" 
                   class="inline-flex items-center px-6 py-3 text-neutral-600 hover:text-neutral-900 font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Registration Details
                </a>
            </div>
        </div>
    </div>

    <script>
        // Countdown timer
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
                
                const els = {
                    days: document.getElementById('days'),
                    hours: document.getElementById('hours'),
                    minutes: document.getElementById('minutes'),
                    seconds: document.getElementById('seconds')
                };
                
                if (els.days) els.days.textContent = String(days).padStart(2, '0');
                if (els.hours) els.hours.textContent = String(hours).padStart(2, '0');
                if (els.minutes) els.minutes.textContent = String(minutes).padStart(2, '0');
                if (els.seconds) els.seconds.textContent = String(seconds).padStart(2, '0');
            }
            
            updateCountdown();
            setInterval(updateCountdown, 1000);
        });

        // Smooth scroll to top on page load
        window.addEventListener('load', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Add stagger animation to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.bg-white.rounded-3xl');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in');
            });
        });
    </script>

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

        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down {
            animation: slide-down 0.6s ease-out;
        }

        @keyframes scale-in {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-scale-in {
            animation: scale-in 0.5s ease-out;
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }
        .animate-pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }
    </style>
</x-layout>