<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title)?$title.'-Chirper':'Chirper' }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="http://">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="flex justify-between items-center bg-white border-b border-gray-200 px-6 py-4">
        <div class="flex items-center space-x-2 text-xl font-bold text-gray-800">
            <span>🐦</span>
            <span>Chirper</span>
        </div>

        {{-- <div class="navbar-end gap-2">
            <a href="#" class='btn btn-ghost btn-sm'>Sign In</a>
            <a href="#" class='btn btn-primary btn-sm'>Sign Up</a>

        </div> --}}

        <div class="navbar-end gap-2">
            @auth
            <span class="text-sm">{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
            </form>
            @else
            <a href="/login" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
            @endauth
        </div>
    </nav>

    <!-- Success Toast -->
    @if (session('success'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out flex items-center gap-2 p-4 rounded-lg shadow-lg bg-green-100 text-green-800 border border-green-300">
            <!-- ✅ Correct SVG Namespace -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-green-600" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>

    <!-- ✅ Optional auto-hide animation (Tailwind + CSS) -->
    <style>
        .animate-fade-out {
            animation: fadeOut 3s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            80% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
                display: none;
            }
        }

    </style>
    @endif




    <!-- Main Content -->
    <main class="flex-grow flex justify-center items-center">
        {{ $slot}}
    </main>



    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 text-center py-4 text-gray-600 text-sm">
        © 2025 <span class="font-semibold">Chirper</span> — Built with Laravel and ❤️
    </footer>

</body>
</html>
