<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Student Portal</title>
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
    </style>
</head>
<body class="bg-neutral-50 min-h-screen antialiased">
    <div class="min-h-screen flex">
        <!-- Left Side - Branding -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-primary relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE5YzAtNi42MjctNS4zNzMtMTItMTItMTJzLTEyIDUuMzczLTEyIDEyIDUuMzczIDEyIDEyIDEyIDEyLTUuMzczIDEyLTEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
            
            <div class="relative z-10 flex flex-col justify-between p-12 text-white w-full">
                <div>
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold">Student Portal</span>
                    </div>
                    
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        Admin<br/>Dashboard
                    </h1>
                    <p class="text-xl text-white/90 leading-relaxed max-w-md">
                        Manage student registrations, view analytics, and oversee enrollment processes with ease.
                    </p>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 text-white/80">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span>Secure authentication</span>
                    </div>
                    <div class="flex items-center space-x-3 text-white/80">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Real-time data access</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center justify-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-neutral-900">Student Portal</span>
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-neutral-900 mb-2">Welcome Back</h2>
                    <p class="text-neutral-600">Sign in to access the admin dashboard</p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="flex-1">
                                @foreach($errors->all() as $error)
                                    <p class="text-sm text-red-800">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-semibold text-neutral-700">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                id="username" 
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="admin@example.com"
                                required
                                class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 border-neutral-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-neutral-700">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password"
                                placeholder="Enter your password"
                                required
                                class="w-full pl-12 pr-4 py-3.5 bg-neutral-50 border-2 border-neutral-200 rounded-xl focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all text-neutral-900 placeholder:text-neutral-400"
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="group w-full px-6 py-4 bg-gradient-primary text-white rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all hover:scale-[1.02] active:scale-[0.98] relative overflow-hidden"
                    >
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <span>Sign In</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                    </button>
                </form>

                <!-- Back to Home -->
                <div class="mt-8 text-center">
                    <a href="{{ route('landing') }}" class="text-sm text-neutral-600 hover:text-primary-600 transition-colors inline-flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Back to Home</span>
                    </a>
                </div>

                <!-- Security Notice -->
                <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-200/50">
                    <div class="flex items-start space-x-2">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-xs text-blue-800 leading-relaxed">
                            Your session is encrypted and secure. Never share your admin credentials with anyone.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>