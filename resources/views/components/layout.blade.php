<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title)?$title.' - Chirper':'Chirper' }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans selection:bg-indigo-200 selection:text-indigo-900">

    <!-- 🌟 Navbar -->
    <nav class="flex justify-between items-center bg-white/90 backdrop-blur-md border-b border-gray-200 px-6 py-4 shadow-sm">
        <div class="flex items-center space-x-2 text-xl font-bold text-indigo-600 hover:text-indigo-700 transition">
            <span>🐦</span>
            <span>Chirper</span>
        </div>

        <div class="navbar-end flex items-center gap-3">
            @auth
                <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>

                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-1.5 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" 
                   class="px-4 py-1.5 text-sm font-semibold text-indigo-600 border border-indigo-500 rounded-full hover:bg-indigo-600 hover:text-white shadow-sm hover:shadow-md transition-all duration-200">
                    Sign In
                </a>

                <a href="{{ route('register') }}" 
                   class="px-4 py-1.5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                    Sign Up
                </a>
            @endauth
        </div>
    </nav>

    <!-- ✅ Success Toast -->
    @if (session('success'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out flex items-center gap-2 p-4 rounded-lg shadow-lg bg-green-100 text-green-800 border border-green-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-green-600" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>

    <style>
        .animate-fade-out {
            animation: fadeOut 3s ease-in-out forwards;
        }
        @keyframes fadeOut {
            0% { opacity: 1; transform: translateY(0); }
            80% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-20px); display: none; }
        }
    </style>
    @endif

    <!-- 💬 Main Content -->
    <main class="flex-grow flex justify-center items-center px-4 py-6">
        {{ $slot }}
    </main>

    <!-- 🌈 New Footer -->
    <footer class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white py-6 mt-8 shadow-inner">
        <div class="max-w-5xl mx-auto px-4 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p class="text-sm">
                © 2025 <span class="font-semibold text-white/90">Chirper</span> — Built with 
                <span class="text-yellow-300 font-semibold">Laravel</span>
            </p>

            <div class="flex space-x-4">
                <a href="#" class="text-white/80 hover:text-yellow-200 text-sm transition-all duration-200">Privacy Policy</a>
                <a href="#" class="text-white/80 hover:text-yellow-200 text-sm transition-all duration-200">Terms</a>
                <a href="#" class="text-white/80 hover:text-yellow-200 text-sm transition-all duration-200">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>
