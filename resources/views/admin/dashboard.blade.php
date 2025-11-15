<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Student Portal</title>
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
                    <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-neutral-900">Admin Dashboard</h1>
                        <p class="text-xs text-neutral-500">Student Management</p>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="flex items-center space-x-3">
                    <div class="hidden sm:block text-right mr-4">
                        <p class="text-sm font-medium text-neutral-900">Administrator</p>
                        <p class="text-xs text-neutral-500">new-dip@sitc.com</p>
                    </div>
                    <a href="{{ route('admin.logout') }}" 
                       class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-xl font-medium hover:border-red-300 hover:bg-red-50 hover:text-red-600 transition-all flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Students -->
            <div class="bg-white rounded-2xl p-6 border border-neutral-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-neutral-600 mb-1">Total Students</p>
                <p class="text-3xl font-bold text-neutral-900">{{ $students->total() }}</p>
            </div>

            <!-- Pending Payments -->
            <div class="bg-white rounded-2xl p-6 border border-neutral-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-neutral-600 mb-1">Pending Payments</p>
                <p class="text-3xl font-bold text-neutral-900">{{ \App\Models\Student::where('payment_status', 'pending')->count() }}</p>
            </div>

            <!-- Completed -->
            <div class="bg-white rounded-2xl p-6 border border-neutral-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-neutral-600 mb-1">Completed</p>
                <p class="text-3xl font-bold text-neutral-900">{{ \App\Models\Student::where('payment_status', 'completed')->count() }}</p>
            </div>

            <!-- Today's Registrations -->
            <div class="bg-white rounded-2xl p-6 border border-neutral-200/50 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-neutral-600 mb-1">Today</p>
                <p class="text-3xl font-bold text-neutral-900">{{ \App\Models\Student::whereDate('created_at', today())->count() }}</p>
            </div>
        </div>

        <!-- Controls & Search -->
        <div class="bg-white rounded-2xl p-6 border border-neutral-200/50 shadow-sm">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search by name, ID, NIC, contact, or email..."
                        class="w-full pl-12 pr-4 py-3 bg-neutral-50 border-2 border-neutral-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                    >
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-3 bg-gradient-primary text-white rounded-xl font-semibold hover:shadow-lg transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                        Search
                    </button>
                    
                    @if(request('search'))
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-neutral-200 text-neutral-700 rounded-xl font-semibold hover:bg-neutral-300 transition-all whitespace-nowrap">
                            Clear
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.export') }}?search={{ request('search') }}" 
                       class="px-6 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition-all hover:scale-105 active:scale-95 whitespace-nowrap flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Export</span>
                    </a>
                </div>
            </form>

            <!-- Results count -->
            <div class="mt-4 pt-4 border-t border-neutral-100">
                <p class="text-sm text-neutral-600">
                    Showing <span class="font-semibold text-neutral-900">{{ $students->firstItem() ?? 0 }} - {{ $students->lastItem() ?? 0 }}</span> 
                    of <span class="font-semibold text-neutral-900">{{ $students->total() }}</span> students
                </p>
            </div>
        </div>

        <!-- Students Table -->
        <div class="bg-white rounded-2xl border border-neutral-200/50 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Full Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">NIC</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">DOB</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Contact</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Payment Slip</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100">
                        @forelse($students as $student)
                            <tr class="hover:bg-neutral-50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-neutral-900">{{ $student->id }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-sm font-medium text-neutral-900">{{ $student->full_name }}</p>
                                        <p class="text-xs text-neutral-500">{{ $student->selected_diploma }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->nic }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">
                                        {{ $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->contact_number }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->email }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($student->payment_slip)
                                        <a href="{{ asset('storage/' . $student->payment_slip) }}" 
                                           target="_blank"
                                           class="inline-flex items-center space-x-1 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span>View</span>
                                        </a>
                                    @else
                                        <span class="text-sm text-neutral-400 italic">No slip</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-3">
                                        <div class="w-16 h-16 bg-neutral-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-neutral-900 font-medium">No students found</p>
                                            <p class="text-sm text-neutral-500">Try adjusting your search criteria</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($students->hasPages())
                <div class="px-6 py-4 border-t border-neutral-100 bg-neutral-50">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-2">
                            @if ($students->onFirstPage())
                                <span class="px-4 py-2 bg-neutral-200 text-neutral-400 rounded-lg cursor-not-allowed">Previous</span>
                            @else
                                <a href="{{ $students->previousPageUrl() }}&search={{ request('search') }}" 
                                   class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-lg font-medium hover:border-primary-500 hover:text-primary-600 transition-all">
                                    Previous
                                </a>
                            @endif
                        </div>

                        <div class="flex gap-2">
                            @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                                @if ($page == $students->currentPage())
                                    <span class="px-4 py-2 bg-gradient-primary text-white rounded-lg font-semibold">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}&search={{ request('search') }}" 
                                       class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-lg font-medium hover:border-primary-500 hover:text-primary-600 transition-all">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="flex gap-2">
                            @if ($students->hasMorePages())
                                <a href="{{ $students->nextPageUrl() }}&search={{ request('search') }}" 
                                   class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-lg font-medium hover:border-primary-500 hover:text-primary-600 transition-all">
                                    Next
                                </a>
                            @else
                                <span class="px-4 py-2 bg-neutral-200 text-neutral-400 rounded-lg cursor-not-allowed">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>