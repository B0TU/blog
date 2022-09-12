<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            <div>
                <x-admin.link-button type="amber" link="{{ route('admin.roles.edit', $role) }}">Edit</x-admin.link-button>
                <x-admin.link-button type="success" link="{{ route('admin.roles.create') }}">Create</x-admin.link-button>
                <x-admin.link-button type="sky" link="{{ route('admin.roles.index') }}">View All</x-admin.link-button>    
            </div>
        </div>
    </x-slot>

        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                
                <x-admin.show title="Role">

                    <x-slot name="subtitle">{{ "Role information #" . $role->id }}</x-slot>

                    <x-admin.field-display type="gray" name="Id">{{ $role->id }}</x-admin.field-display>
                    <x-admin.field-display name="Name">{{ $role->name }}</x-admin.field-display>

                </x-admin.show>
                
            </div>
        </div>

        {{-- pink --}}

</x-app-layout>