@props([
    'name',
    'type' => 'white'
])

<div @class([
    "px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",
    "bg-gray-50" => $type == 'gray',
    "bg-white" => $type == 'white',
])>
    <dt class="text-sm font-medium text-gray-500">{{ $name }}</dt>
    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $slot }}</dd>
</div>