<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Activity Logs') }}
            </h2>
        </div>
    </x-slot>

    <form action="{{ route('admin.activities.index') }}" method="GET">
        @include('admin.activities._filter')
    </form>

        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <x-admin.table>

                    <x-slot name="thead">
                        <x-admin.th>Description</x-admin.th>
                        <x-admin.th>Causer</x-admin.th>
                        <x-admin.th>Model</x-admin.th>
                        <x-admin.th>Subject</x-admin.th>
                        <x-admin.th>Logged At</x-admin.th>
                        <x-admin.th>Actions</x-admin.th>
                    </x-slot>

                    @forelse ($activities as $activity)
                        <tr>
                            <x-admin.td class="font-semibold">{{ Str::upper($activity->description) }}</x-admin.td>
                            <x-admin.td>{!! $activity->causer?->admin_link ?? '-' !!}</x-admin.td>
                            <x-admin.td>{{ str($activity->subject_type)->plural()->ucfirst() ?? '-' }}</x-admin.td>
                            <x-admin.td>{!! $activity->subject?->admin_link !!}</x-admin.td>
                            <x-admin.td>{{ $activity->created_at?->format('d M Y H:i') }} ({{ $activity->created_at?->diffForHumans() }})</x-admin.td>
                            <x-admin.td color="{{ $activity->color }}">
                                <span class="rounded-lg bg-{{ $activity->color }}-200 text-{{ $activity->color }}-500 py-2 px-4 text-sm font-medium">
                                    {{ $activity->color }}

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
                                    <a href="{{ route('admin.activities.show', $activity) }}" class="text-green-500 text-sm bg-green-100 hover:bg-green-200 rounded-md px-4 py-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </x-admin.td>
                        </tr>
                    @empty
                        <tr><x-admin.td aria-colspan="4">No activities!</x-admin.td></tr>
                    @endforelse

                </x-admin.table>

                <div class="mt-4">
                    {{ $activities->withQueryString()->links() }}
                </div>

            </div>
        </div>

</x-app-layout>
