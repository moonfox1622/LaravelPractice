<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="\images\logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                @auth
                    <span class="text-sm font-bold uppercase">{{ auth()->user()->name }}</span>
                    <form action="/logout" method="post" class="text-sm font-bold text-red-400 ml-6">
                        @csrf
                        <input type="hidden">
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-4">Login</a>
                @endauth

            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="\images\lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>
        </footer>
    </section>

    <x-flash />

</body>
