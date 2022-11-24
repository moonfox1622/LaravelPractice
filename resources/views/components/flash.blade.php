@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show">
        <p class="fixed bottom-5 right-5 px-4 py-2 bg-blue-500 text-white text-sm rounded-xl">
            {{ session('success') }}
        </p>
    </div>
@endif
