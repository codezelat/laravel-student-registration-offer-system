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
        
        /* Page transition animations */
        @keyframes pageEnter {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        main {
            animation: pageEnter 0.5s ease-out;
        }
        
        /* Smooth transitions for all interactive elements */
        a, button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Glass effect for header */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
                        <img src="{{ asset('images/sitc-logo.png') }}" alt="Logo" class="h-10">
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
    </div>
</body>
</html>