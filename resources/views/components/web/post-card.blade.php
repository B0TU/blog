

@props([
    'post'
])

<!-- Post Card -->
<div {{ $attributes->merge(['class' => 'rounded-lg bg-white px-6 py-8 site-drop-shadow bg-right-top bg-no-repeat mb-5']) }}
style="background-image: url({{ asset('images/post-bg-image.png') }})">
<!-- Meta Info -->
<div class="flex flex-row justify-between mb-4 items-center">
    <!-- Category Name -->
    <a href="{{ route('web.categories.show', $post->category) }}" class="rounded-lg bg-{{ $post->category?->color ?? 'sky' }}-200 text-{{ $post->category->color ?? 'sky' }}-500 py-2 px-4 text-sm font-medium">{{ $post->category->name ?? 'None' }}</a>
    <!-- Author and Post Date -->
    <div class="flex flew-row space-x-2 text-neutral-400">
        <div><i class="pr-2 fa fa-pen-nib"></i><a href="{{ route('web.authors.show', $post->author->name) }}" class="hover:text-sky-500 ease-in duration-300">
            {{ $post->author->name }}</a></div>
        <div>|</div>
        <div>{{ $post->created_at }}</div>
    </div>
</div>
<!-- Title -->
<div class="font-medium text-neutral-500 leading-6 mb-4">
    {{ $post->title }}
</div>
<!-- Content -->
<div class="text-neutral-400 leading-6 mb-4">
    {!! Str::words($post->content, 30, '...') !!}
</div>
<!-- Read More-->
<a href="{{ route('web.posts.show', $post) }}"
class="text-sky-500 inline-block border border-sky-500 rounded px-4 py-2 text-sm hover:text-white hover:bg-sky-500 ease-in duration-300">
Read More <i class="pl-1 text-sm fa fa-chevron-right"></i></a>
</div>