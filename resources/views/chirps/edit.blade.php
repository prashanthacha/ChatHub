<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8 text-center text-indigo-600">Edit Chirp</h1>

        <div class="card bg-base-100 shadow-lg mt-8 rounded-2xl border border-gray-200">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea
                            name="message"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="3"
                            maxlength="255"
                            required
                        >{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-6">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ Custom Styling Overrides -->
    <style>
        /* Make textarea wider and shorter */
        textarea[name="message"] {
            width: 95%;               /* slightly wider inside the card */
            min-height: 80px;         /* shorter height */
            max-height: 120px;        /* restrict growth */
            font-size: 1rem;          /* clean readable text size */
            border-radius: 0.75rem;   /* smoother rounded edges */
            padding: 0.75rem 1rem;    /* inner spacing */
            border: 1px solid #cbd5e1; /* Tailwind gray-300 border */
            transition: all 0.3s ease-in-out;
        }

        textarea[name="message"]:focus {
            outline: none;
            border-color: #6366f1; /* Tailwind indigo-500 */
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.3);
            transform: scale(1.01);
        }

        /* 🎨 Button Enhancements */
        .btn-ghost {
            background-color: #f3f4f6; /* light gray */
            color: #374151; /* dark gray text */
            font-weight: 600;
            border-radius: 9999px; /* fully rounded */
            padding: 0.4rem 1.2rem;
            transition: all 0.25s ease-in-out;
        }

        .btn-ghost:hover {
            background-color: #e5e7eb;
            color: #1f2937;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: linear-gradient(to right, #6366f1, #8b5cf6); /* indigo → violet */
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 9999px;
            padding: 0.45rem 1.5rem;
            box-shadow: 0 2px 10px rgba(99, 102, 241, 0.4);
            transition: all 0.25s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 3px 12px rgba(99, 102, 241, 0.5);
        }
    </style>
</x-layout>
