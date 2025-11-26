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
                    <img src="{{ asset('images/sitc-logo.png') }}" alt="Logo" class="h-12">
                    <div>
                        <h1 class="text-lg font-bold text-neutral-900">Special Registration System</h1>
                        <p class="text-xs text-neutral-500">Admin Dashboard</p>
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

                <!-- Diploma Filter -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <select 
                        name="diploma" 
                        class="pl-12 pr-4 py-3 bg-neutral-50 border-2 border-neutral-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 appearance-none">
                        <option value="">All Diplomas</option>
                        @foreach($diplomas as $diploma)
                            <option value="{{ $diploma }}" {{ request('diploma') == $diploma ? 'selected' : '' }}>{{ $diploma }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-3 bg-gradient-primary text-white rounded-xl font-semibold hover:shadow-lg transition-all hover:scale-105 active:scale-95 whitespace-nowrap">
                        Search
                    </button>
                    
                    @if(request('search') || request('diploma'))
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 bg-neutral-200 text-neutral-700 rounded-xl font-semibold hover:bg-neutral-300 transition-all whitespace-nowrap">
                            Clear
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.export') }}?search={{ request('search') }}&diploma={{ request('diploma') }}" 
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
                            <th class="px-6 py-4 text-left text-sm font-semibold">Student ID</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Full Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Selected Diploma</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">NIC</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Contact</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Payment Slip</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-100">
                        @forelse($students as $student)
                            <tr class="hover:bg-neutral-50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="text-sm font-medium text-neutral-900">{{ $student->student_id ?? 'N/A' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm font-medium text-neutral-900">{{ $student->full_name }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->selected_diploma }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->nic }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->contact_number }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-neutral-700">{{ $student->email }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($student->payment_method === 'online' && $student->payment_status === 'completed')
                                        <span class="inline-flex items-center space-x-1 text-sm text-green-600 font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Payment Success</span>
                                        </span>
                                    @elseif($student->payment_slip)
                                        <a href="{{ asset('storage/' . $student->payment_slip) }}" 
                                           target="_blank"
                                           class="inline-flex items-center space-x-1 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            <span>View Slip</span>
                                        </a>
                                    @else
                                        <span class="text-sm text-neutral-400 italic">No slip</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <!-- View Button -->
                                        <button 
                                            onclick="viewStudent({{ $student->id }})"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" 
                                            title="View Details">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                        
                                        <!-- Edit Button -->
                                        <button 
                                            onclick="editStudent({{ $student->id }})"
                                            class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" 
                                            title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        
                                        <!-- Delete Button -->
                                        <button 
                                            onclick="deleteStudent({{ $student->id }}, '{{ $student->full_name }}')"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" 
                                            title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
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
                                <a href="{{ $students->previousPageUrl() }}&search={{ request('search') }}&diploma={{ request('diploma') }}" 
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
                                    <a href="{{ $url }}&search={{ request('search') }}&diploma={{ request('diploma') }}" 
                                       class="px-4 py-2 bg-white border-2 border-neutral-200 text-neutral-700 rounded-lg font-medium hover:border-primary-500 hover:text-primary-600 transition-all">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <div class="flex gap-2">
                            @if ($students->hasMorePages())
                                <a href="{{ $students->nextPageUrl() }}&search={{ request('search') }}&diploma={{ request('diploma') }}" 
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

    <!-- View Modal -->
    <div id="viewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="bg-gradient-primary text-white px-6 py-4 rounded-t-xl flex justify-between items-center">
                <h3 class="text-xl font-bold">Student Details</h3>
                <button onclick="closeViewModal()" class="text-white hover:bg-white hover:bg-opacity-20 rounded-lg p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="viewModalContent" class="p-6"></div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
            <div class="p-6">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-center text-neutral-900 mb-2">Delete Student</h3>
                <p class="text-center text-neutral-600 mb-6">Are you sure you want to delete <strong id="deleteStudentName"></strong>? This action cannot be undone.</p>
                <div class="flex space-x-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-neutral-200 hover:bg-neutral-300 text-neutral-700 rounded-lg font-medium transition-colors">
                        Cancel
                    </button>
                    <button onclick="confirmDelete()" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteStudentId = null;

        function viewStudent(id) {
            fetch(`/admin/student/${id}`)
                .then(response => response.json())
                .then(data => {
                    const content = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Student ID</p>
                                <p class="font-semibold text-neutral-900">${data.student_id || 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Registration ID</p>
                                <p class="font-semibold text-neutral-900">${data.registration_id || 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Full Name</p>
                                <p class="font-semibold text-neutral-900">${data.full_name}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">NIC</p>
                                <p class="font-semibold text-neutral-900">${data.nic}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Date of Birth</p>
                                <p class="font-semibold text-neutral-900">${data.date_of_birth || 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Contact Number</p>
                                <p class="font-semibold text-neutral-900">${data.contact_number}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Email Address</p>
                                <p class="font-semibold text-neutral-900">${data.email}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Selected Diploma</p>
                                <p class="font-semibold text-neutral-900">${data.selected_diploma}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Payment Method</p>
                                <p class="font-semibold text-neutral-900">${data.payment_method ? data.payment_method.charAt(0).toUpperCase() + data.payment_method.slice(1) : 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Payment Status</p>
                                <p class="font-semibold text-neutral-900">${data.payment_status ? data.payment_status.charAt(0).toUpperCase() + data.payment_status.slice(1) : 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Amount Paid</p>
                                <p class="font-semibold text-neutral-900">${data.amount_paid ? 'LKR ' + parseFloat(data.amount_paid).toLocaleString('en-US', {minimumFractionDigits: 2}) : 'N/A'}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm text-neutral-500">Payment Date</p>
                                <p class="font-semibold text-neutral-900">${data.payment_date || 'N/A'}</p>
                            </div>
                            ${data.payment_slip ? `
                            <div class="col-span-2 space-y-1">
                                <p class="text-sm text-neutral-500">Payment Slip</p>
                                <a href="/storage/${data.payment_slip}" target="_blank" class="inline-flex items-center space-x-2 text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <span>View Payment Slip</span>
                                </a>
                            </div>
                            ` : ''}
                        </div>
                    `;
                    document.getElementById('viewModalContent').innerHTML = content;
                    document.getElementById('viewModal').classList.remove('hidden');
                })
                .catch(error => {
                    alert('Error loading student details');
                    console.error(error);
                });
        }

        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }

        function editStudent(id) {
            window.location.href = `/admin/student/${id}/edit`;
        }

        function deleteStudent(id, name) {
            deleteStudentId = id;
            document.getElementById('deleteStudentName').textContent = name;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteStudentId = null;
        }

        function confirmDelete() {
            if (!deleteStudentId) return;

            fetch(`/admin/student/${deleteStudentId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeDeleteModal();
                    location.reload();
                } else {
                    alert('Error deleting student');
                }
            })
            .catch(error => {
                alert('Error deleting student');
                console.error(error);
            });
        }

        // Close modals on outside click
        document.getElementById('viewModal').addEventListener('click', function(e) {
            if (e.target === this) closeViewModal();
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
</body>
</html>