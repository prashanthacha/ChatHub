@props(['chirp'])

<div class="card bg-base-100 shadow-lg border border-gray-200 hover:shadow-xl transition-all duration-300 rounded-2xl">
    <div class="card-body">
        <div class="flex space-x-3 items-start">
            @if ($chirp->user)
                <div class="avatar">
                    <div class="size-10 rounded-full ring ring-indigo-400 ring-offset-base-100 ring-offset-2 transition-all">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                            alt="{{ $chirp->user->name }}'s avatar" class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full ring ring-gray-300">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                            alt="Anonymous User" class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between items-start w-full">
                    <div class="flex items-center gap-1 flex-wrap">
                        <span class="text-sm font-semibold text-gray-800">
                            {{ $chirp->user ? $chirp->user->name : 'Anonymous' }}
                        </span>
                        <span class="text-gray-400">·</span>
                        <span class="text-sm text-gray-500">{{ $chirp->created_at->diffForHumans() }}</span>

                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-gray-400">·</span>
                            <span class="text-sm italic text-gray-500">edited</span>
                        @endif
                    </div>

                    @can('update', $chirp)
                        <div class="flex gap-2">
                            <!-- ✨ Edit Button -->
                            <a href="/chirps/{{ $chirp->id }}/edit"
                                class="btn btn-xs px-3 py-1 text-sm font-semibold rounded-full text-white
                                       bg-gradient-to-r from-indigo-500 to-purple-500
                                       shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                Edit
                            </a>

                            <!-- 🗑️ Delete Button -->
                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this chirp?')"
                                    class="btn btn-xs px-3 py-1 text-sm font-semibold rounded-full text-white
                                           bg-gradient-to-r from-red-500 to-pink-500
                                           shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>

                <p class="mt-2 text-gray-700 leading-relaxed">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>
</div>
