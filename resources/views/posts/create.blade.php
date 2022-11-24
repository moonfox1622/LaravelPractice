<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel>
            <form action="/admin/post" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Title --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title"
                        value="{{ old('title') }}" required />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug"
                        value="{{ old('slug') }}" required />
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category">
                        Category
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Excerpt --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Excerpt
                    </label>
                    <textarea name="excerpt" rows="4" class="text-sm w-full border border-gray-500 focus:outline-none focus:ring"
                        required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ThumbNail --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Thumbnail
                    </label>
                    <input type="file" name="thumbnail" id="thumbnail" required>
                    @error('Thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Body --}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Body
                    </label>
                    <textarea name="body" rows="4" class="text-sm w-full border border-gray-500 focus:outline-none focus:ring"
                        required></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
