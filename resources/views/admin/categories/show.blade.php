<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <div>
                <x-admin.link-button type="amber" link="{{ route('admin.categories.edit', $category) }}">Edit</x-admin.link-button>
                <x-admin.link-button type="success" link="{{ route('admin.categories.create') }}">Create</x-admin.link-button>
                <x-admin.link-button type="sky" link="{{ route('admin.categories.index') }}">View All</x-admin.link-button>    
            </div>
        </div>
    </x-slot>

        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                
                <x-admin.show title="Post">

                    <x-slot name="subtitle">{{ "Post information #" . $category->id }}</x-slot>

                    <x-admin.field-display type="gray" name="Name">{{ $category->name }}</x-admin.field-display>
                    <x-admin.field-display name="Slug">{{ $category->slug }}</x-admin.field-display>
                    <x-admin.field-display type="gray" name="Color">{{ $category->color }}</x-admin.field-display>

                </x-admin.show>
                
            </div>
        </div>

        {{-- pink --}}

</x-app-layout>