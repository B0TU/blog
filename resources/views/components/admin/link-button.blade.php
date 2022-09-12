@props([
    'type',
    'link'
])

<a href="{{ $link }}" @class([
    "inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus-outline-none focus:ring disabled:opacity-25 transition",
    "bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:ring-gray-300" => $type == 'dark',
    "bg-green-800 hover:bg-green-700 active:bg-green-900 focus:border-green-900 focus:ring-green-300" => $type == 'success',
    "bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:border-sky-900 focus:ring-sky-300" => $type == 'sky',
    "bg-amber-800 hover:bg-amber-700 active:bg-amber-900 focus:border-amber-900 focus:ring-amber-300" => $type == 'amber',
    "bg-neutral-400 hover:bg-neutral-600 active:bg-neutral-900 focus:border-neutral-600 focus:ring-neutral-100" => $type == 'light',

])>
    {{ $slot }}

</a>