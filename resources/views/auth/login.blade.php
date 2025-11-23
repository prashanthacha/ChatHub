<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <!-- Clean white background -->
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

        <!-- Simple white card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
                Welcome Back
            </h1>

            <form method="POST" action="/login" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="mail@example.com"
                           class="input input-bordered w-full border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required
                           autofocus>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           placeholder="••••••••"
                           class="input input-bordered w-full border-gray-300 bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-black rounded-lg"
                           required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm border-gray-400">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-gray-600 hover:text-black transition">Forgot password?</a>
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full py-3 bg-black hover:bg-gray-800 text-white font-semibold text-lg rounded-lg shadow transition duration-300">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Divider -->
            <div class="flex items-center justify-center mt-6">
                <div class="border-t border-gray-300 w-1/3"></div>
                <span class="px-3 text-gray-500 text-sm">OR</span>
                <div class="border-t border-gray-300 w-1/3"></div>
            </div>

            <!-- Register Redirect -->
            <p class="text-center text-gray-600 mt-6 text-sm">
                Don’t have an account?
                <a href="/register" class="font-semibold text-black hover:underline transition">
                    Create one
                </a>
            </p>
        </div>
    </div>
</x-layout>
