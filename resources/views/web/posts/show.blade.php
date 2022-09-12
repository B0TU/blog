@extends('layouts.web')

@section('content')

<!-- Content -->

<div class="basis-2/3 p-4">

    <div class="basis-2/3 mx-auto bg-white rounded-lg site-drop-shadow p-8">

            <!-- Category Name -->
            <a href="{{ route('web.categories.show', $post->category) }}" class="rounded-lg bg-{{ $post->category->color }}-200 text-{{ $post->category->color }}-500 py-2 px-4 text-sm font-medium">{{ $post->category->name }}</a>
            <!-- Title -->
            <div class="font-medium text-2xl text-center text-neutral-500 leading-10 mb-4 mt-6">
                {{ $post->title }}
            </div>

            <!-- Author and Post Date -->
            <div class="flex justify-center mb-6">
                <div class="flex flew-row space-x-2 text-neutral-400">
                    <div><i class="pr-2 fa fa-pen-nib"></i>
                        <a href="{{ route('web.authors.show', $post->author) }}" class="hover:text-{{ $post->category->color }}-500 ease-in duration-300">
                            {{ $post->author?->name }}
                        </a>
                    </div>
                    <div>|</div>
                    <div>{{ $post->created_at->diffForHumans() }}</div>
                </div>
            </div>

            <!-- Post Featured Image -->
            <div>
                <img class="object-cover rounded-lg mb-6" src="images/post-image.jpg" alt="">
            </div>

            <!-- Content -->
            <div class="text-neutral-500 text-lg leading-8 mb-4">
                {!! $post->content !!}
            </div>
    </div>

</div>

@endsection