<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <x-admin.link-button type="success" link="{{ route('admin.users.create') }}">Create</x-admin.link-button>
        </div>
    </x-slot>

    <form action="{{ route('admin.users.index') }}" method="GET">
        @include('admin.users._filter')
    </form>

        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <x-admin.table>

                    <x-slot name="thead">
                        <x-admin.th>Name</x-admin.th>
                        <x-admin.th>Email</x-admin.th>
                        <x-admin.th>Role</x-admin.th>
                        <x-admin.th>Actions</x-admin.th>
                    </x-slot>

                    @forelse ($users as $user)
                        <tr>
                            <x-admin.td>{{ $user->name }}</x-admin.td>
                            <x-admin.td>{{ $user->email }}</x-admin.td>
                            <x-admin.td>{{ $user->role_name }}</x-admin.td>
                            <x-admin.td>
                                <div class="space-x-2">
                                    <a href="{{ route('admin.users.show', $user) }}" class="text-green-500 text-sm bg-green-100 hover:bg-green-200 rounded-md px-4 py-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-500 text-sm bg-amber-100 hover:bg-amber-200 rounded-md px-4 py-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-user-{{ $user->id }}').submit();" class="text-red-500 text-sm bg-red-100 hover:bg-red-200 rounded-md px-4 py-2">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </x-admin.td>
                        </tr>
                    @empty
                        <tr><x-admin.td aria-colspan="4">No users!</x-admin.td></tr>
                    @endforelse

                </x-admin.table>

                <div class="mt-4">
                    {{ $users->withQueryString()->links() }}
                </div>

            </div>
        </div>

</x-app-layout>
