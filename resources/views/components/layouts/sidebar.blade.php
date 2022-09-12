
@props([
    'category',
])


<div>
    <a href="#"
    class="ease-in duration-300 bg-white rounded-lg border-2 border-white hover:border-sky-500 site-drop-shadow px-5 py-4 flex justify-between items-center mb-4">
        <div class="font-medium text-neutral-500">{{ $category->name }}</div>
        <div class="text-slate-300 text-sm">
            {{ $category->posts_counts }} {{ Str::plural('post', $category->posts_count) }}
            {!! "something new ahs to update here" !!}
        </div>
        
    </a>
</div>