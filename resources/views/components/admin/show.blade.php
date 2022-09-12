@props([
    'title',
])

<div class="px-4 py-5 sm:px-6">
    <div class="flex justify-between items-center">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $title }}</h3>
            @isset($subtitle)
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $subtitle }}</p>
            @endisset
        </div>
        @isset($status)
        <div class="bg-green-200 border-2 border-green-400 text-green-500 px-4 py-1 rounded-md">
            {{ $status }}
        </div>
        @endisset
    </div>
</div>
<div class="border-t border-gray-200">
    <dl>
        {{ $slot }}
    </dl>
</div>