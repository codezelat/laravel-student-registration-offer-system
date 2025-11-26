<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md px-8">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('images/sitc-logo.png') }}" alt="Logo" class="h-24">
            </div>
            
            <!-- System Name -->
            <h1 class="text-2xl font-bold text-center text-neutral-900 mb-8">Special Registration System</h1>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 p-3 bg-red-50 border border-red-200 rounded-lg text-center">
                    @foreach($errors->all() as $error)
                        <p class="text-sm text-red-600">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <input 
                        type="email" 
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Email"
                        required
                        class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    >
                </div>

                <div>
                    <input 
                        type="password" 
                        name="password"
                        placeholder="Password"
                        required
                        class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                >
                    Sign In
                </button>
            </form>
        </div>
    </div>
</body>
</html>
