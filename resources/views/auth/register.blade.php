<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

        
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                Create Your Account
            </h1>

            <form method="POST" action="/register" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="John Doe"
                           class="w-full input input-bordered border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="mail@example.com"
                           class="w-full input input-bordered border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password"
                           name="password"
                           placeholder="••••••••"
                           class="w-full input input-bordered border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           placeholder="••••••••"
                           class="w-full input input-bordered border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full py-3 bg-black hover:bg-gray-800 text-white font-semibold text-lg rounded-lg shadow transition duration-300">
                        Register
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center justify-center mt-6">
                <div class="border-t border-gray-300 w-1/3"></div>
                <span class="px-3 text-gray-500 text-sm">OR</span>
                <div class="border-t border-gray-300 w-1/3"></div>
            </div>

            <!-- Login Link -->
            <p class="text-center text-gray-600 mt-6 text-sm">
                Already have an account?
                <a href="/login" class="font-semibold text-black hover:underline transition">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</x-layout>
