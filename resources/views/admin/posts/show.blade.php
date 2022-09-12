<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <div>
                <x-admin.link-button type="amber" link="{{ route('admin.posts.edit', $post) }}">Edit</x-admin.link-button>
                <x-admin.link-button type="success" link="{{ route('admin.posts.create') }}">Create</x-admin.link-button>
                <x-admin.link-button type="sky" link="{{ route('admin.posts.index') }}">View All</x-admin.link-button>    
            </div>
        </div>
    </x-slot>

        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif 

            @include('admin.posts._actions')

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                
                <x-admin.show title="Post">

                    <x-slot name="subtitle">{{ "Post information #" . $post->id }}</x-slot>
                    <x-slot name="subtitle">{{ "Author information " . $post->author->name }}</x-slot>
                    <x-slot name="status">{{ $post->formatted_status }}</x-slot>

                    <x-admin.field-display type="gray" name="Title">{{ $post->title }}</x-admin.field-display>
                    <x-admin.field-display name="Excerpt">{{ $post->excerpt }}</x-admin.field-display>
                    <x-admin.field-display type="gray" name="Content">{!! $post->content !!}</x-admin.field-display>

                </x-admin.show>
                
            </div>
        </div>

</x-app-layout>