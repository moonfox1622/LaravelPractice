@props(['trigger'])
{{-- Trigger --}}
<div x-data="{ show: false }" @click.away="show=false">

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="px-2 absolute bg-gray-100 w-full rounded-xl mt-2 z-50 overflow-auto max-h-52"
        style="display: none">
        {{ $slot }}
    </div>

</div>
