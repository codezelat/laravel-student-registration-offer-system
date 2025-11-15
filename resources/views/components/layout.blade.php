<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Student Registration' }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="bg-neutral-50 min-h-screen antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Modern Header with Glass Effect -->
        <header class="sticky top-0 z-50 glass-effect border-b border-neutral-200/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold text-neutral-900 tracking-tight">Student Portal</h1>
                            <p class="text-xs text-neutral-500">Registration System</p>
                        </div>
                    </div>
                    
                    <!-- Navigation (if needed) -->
                    <nav class="hidden md:flex items-center space-x-2">
                        <!-- Add nav items here if needed -->
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main Content with Smooth Animations -->
        <main class="flex-1 py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                {{ $slot }}
            </div>
        </main>

        <!-- Modern Footer -->
        <footer class="bg-white border-t border-neutral-200 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- About -->
                    <div>
                        <h3 class="font-semibold text-neutral-900 mb-3">About</h3>
                        <p class="text-sm text-neutral-600 leading-relaxed">
                            Empowering students through quality education and seamless registration experience.
                        </p>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h3 class="font-semibold text-neutral-900 mb-3">Quick Links</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="text-neutral-600 hover:text-primary-600 transition-colors">Help Center</a></li>
                            <li><a href="#" class="text-neutral-600 hover:text-primary-600 transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="text-neutral-600 hover:text-primary-600 transition-colors">Terms of Service</a></li>
                        </ul>
                    </div>
                    
                    <!-- Contact -->
                    <div>
                        <h3 class="font-semibold text-neutral-900 mb-3">Contact</h3>
                        <ul class="space-y-2 text-sm text-neutral-600">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>support@studentportal.com</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>+94 11 234 5678</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-neutral-200 text-center">
                    <p class="text-sm text-neutral-500">
                        © {{ date('Y') }} Student Registration Portal. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>