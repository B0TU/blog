<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories') }}
            </h2>
            <x-admin.link-button type="success" link="{{ route('admin.categories.create') }}">Create</x-admin.link-button>
        </div>
    </x-slot>

    <form action="{{ route('admin.categories.index') }}" method="GET">
        @include('admin.categories._filter')
    </form>

        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <x-admin.table>

                    <x-slot name="thead">
                        <x-admin.th>Name</x-admin.th>
                        <x-admin.th>Slug</x-admin.th>
                        <x-admin.th>Color</x-admin.th>
                        <x-admin.th>Actions</x-admin.th>
                    </x-slot>

                    @forelse ($categories as $category)
                        <tr>
                            <x-admin.td>{{ $category->name }}</x-admin.td>
                            <x-admin.td>{{ $category->slug}}</x-admin.td>
                            <x-admin.td color="{{ $category->color }}">
                                <span class="rounded-lg bg-{{ $category->color }}-200 text-{{ $category->color }}-500 py-2 px-4 text-sm font-medium">
                                    {{ $category->color }}

                                    <!-- 
                                        bg-green-200
                                        bg-pink-200
                                        text-pink-500
                                        bg-amber-200
                                    -->
                                </span>
                            </x-admin.td>
                            <x-admin.td>
                                <div class="space-x-2">
                                    <a href="{{ route('admin.categories.show', $category) }}" class="text-green-500 text-sm bg-green-100 hover:bg-green-200 rounded-md px-4 py-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-amber-500 text-sm bg-amber-100 hover:bg-amber-200 rounded-md px-4 py-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-category-{{ $category->id }}').submit();" class="text-red-500 text-sm bg-red-100 hover:bg-red-200 rounded-md px-4 py-2">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-category-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </x-admin.td>
                        </tr>
                    @empty
                        <tr><x-admin.td aria-colspan="4">No categories!</x-admin.td></tr>
                    @endforelse

                </x-admin.table>

                <div class="mt-4">
                    {{ $categories->withQueryString()->links() }}
                </div>

            </div>
        </div>

</x-app-layout>
