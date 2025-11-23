<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8 text-center text-indigo-600">Edit Message</h1>

        <div class="card bg-base-100 shadow-lg mt-8 rounded-2xl border border-gray-200">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')
                    {{-- PUT means update existing data --}}

                    <div class="form-control w-full">
                        <textarea name="message" rows="3" maxlength="255" required class="
                                w-[500px]
                                min-h-[80px]
                                max-h-[120px]
                                resize-none
                                text-base
                                rounded-xl
                                px-4 py-3
                                border border-slate-300
                                focus:outline-none
                                focus:border-indigo-500
                                focus:ring-2
                                focus:ring-indigo-300
                                focus:scale-[1.01]
                                transition duration-300 ease-in-out
                                @error('message') border-red-500 focus:ring-red-300 @enderror
                            ">{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="/" class="
                                bg-gray-100
                                text-gray-700
                                font-semibold
                                rounded-full
                                py-2 px-4
                                transition duration-200 ease-in-out
                                hover:bg-gray-200 hover:text-gray-900
                                hover:-translate-y-0.5 hover:shadow
                            ">
                            Cancel
                        </a>

                        <button type="submit" class="
                                bg-gradient-to-r
                                from-indigo-500 to-violet-500
                                text-white
                                font-semibold
                                rounded-full
                                py-2 px-6
                                shadow-md
                                transition duration-200 ease-in-out
                                hover:from-indigo-600 hover:to-violet-600
                                hover:-translate-y-0.5 hover:shadow-lg
                                active:scale-95
                            ">
                            Update Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
