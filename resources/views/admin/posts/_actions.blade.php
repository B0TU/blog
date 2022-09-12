

<div class="mb-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ 'Action' }}</h3>    
        <div class="mt-4">
            <form action="{{ route('admin.posts.state-update', $post) }}" method="POST">
                @csrf
                @method('PATCH')

                @if (! $post->is_draft)
                <x-button name="action" value="draft">Mark As Draft</x-button>
                @endif

                @if (! $post->is_pending)
                <x-button name="action" value="pending">Mark As Pending</x-button>
                @endif

                @can('approve posts')

                @if (! $post->is_approved)
                <x-button name="action" value="approve">Approve</x-button>
                @endif
                    
                @endcan

            </form>
        </div>
    </div>
</div>