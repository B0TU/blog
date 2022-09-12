

<div class="mb-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ 'Action' }}</h3>    
        <div class="mt-4">
            <form action="{{ route('admin.pages.state-update', $page) }}" method="POST">
                @csrf
                @method('PATCH')

                @if ($page->published)
                <x-button name="action" value="unpublished">Unpublish</x-button>
                @endif

                @if ($page->unpublished)
                <x-button name="action" value="published">Publish</x-button>
                @endif

            </form>
        </div>
    </div>
</div>