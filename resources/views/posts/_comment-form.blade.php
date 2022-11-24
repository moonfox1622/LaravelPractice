@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comment" method="post">
            @csrf
            <header class="flex item-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" width="40" height="40" class="rounded-full" />

                <h2 class="ml-5">Comment this Post!!!</h2>
            </header>

            <div class="mt-6">
                <textarea name="body" rows="4" placeholder="Things you want to say!"
                    class="text-sm w-full focus:outline-none focus:ring" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end mt-6 pt-5 border-t border-gray-500">
                    <x-submit-button>post</x-submit-button>
                </div>
            </div>
        </form>
    </x-panel>
@else
    <x-panel class="bg-gray-100 font-bold">
        <p><a href="/register" class="hover:underline">Register</a>
            or
            <a href="/login" class="hover:underline">Login</a>
            to leave a comment~
        </p>
    </x-panel>
@endauth
