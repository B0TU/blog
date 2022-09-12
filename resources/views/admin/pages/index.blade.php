<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pages') }}
            </h2>
            <x-admin.link-button type="success" link="{{ route('admin.pages.create') }}">Create</x-admin.link-button>
        </div>
    </x-slot>

    <form action="{{ route('admin.pages.index') }}" method="GET">
        @include('admin.pages._filter')
    </form>

        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <x-admin.table>

                    <x-slot name="thead">
                        <x-admin.th>Title</x-admin.th>
                        <x-admin.th>Section</x-admin.th>
                        <x-admin.th>Order</x-admin.th>
                        <x-admin.th>State</x-admin.th>
                        <x-admin.th>Actions</x-admin.th>
                    </x-slot>

                    @forelse ($pages as $page)
                        <tr>
                            <x-admin.td>{{ $page->title }}</x-admin.td>
                            <x-admin.td>{{ $page->section->value }}</x-admin.td>
                            <x-admin.td>{{ $page->order }}</x-admin.td>
                            <x-admin.td>{{ $page->formatted_status }}</x-admin.td>
                            <x-admin.td>
                                <div class="space-x-2">
                                    <a href="{{ route('admin.pages.show', $page) }}" class="text-green-500 text-sm bg-green-100 hover:bg-green-200 rounded-md px-4 py-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-amber-500 text-sm bg-amber-100 hover:bg-amber-200 rounded-md px-4 py-2">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('delete-post-{{ $page->id }}').submit();" class="text-red-500 text-sm bg-red-100 hover:bg-red-200 rounded-md px-4 py-2">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-post-{{ $page->id }}" action="{{ route('admin.pages.destroy', $page) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </x-admin.td>
                        </tr>
                    @empty
                        <tr><x-admin.td aria-colspan="4">No pages!</x-admin.td></tr>
                    @endforelse

                </x-admin.table>

                <div class="mt-4">
                    {{ $pages->withQueryString()->onEachSide(0)->links() }}
                </div>

            </div>
        </div>

</x-app-layout>
