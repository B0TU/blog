<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Activity Log') }}
            </h2>
            <div>
                <x-admin.link-button type="sky" link="{{ route('admin.activities.index') }}">View All</x-admin.link-button>    
            </div>
        </div>
    </x-slot>

        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <x-admin.show title="Activity">
                    <x-slot name="subtitle">{{ "Activity information #" . $activity->id }}</x-slot>
                        <x-admin.field-display type="gray" name="Description">{{ Str::upper($activity->description) }}</x-admin.field-display>
                        <x-admin.field-display name="Causer">{!! $activity->causer?->admin_link ?? '-' !!}</x-admin.field-display>
                        <x-admin.field-display type="gray" name="Model">{{ str($activity->subject_type)->plural()->ucfirst() ?? '-' }}</x-admin.field-display>
                        <x-admin.field-display name="Subject">{!! $activity->subject?->admin_link !!}</x-admin.field-display>
                        <x-admin.field-display type="gray" name="Logged At">{{ $activity->created_at?->format('d M Y H:i') }} ({{ $activity->created_at?->diffForHumans() }})</x-admin.field-display>
                </x-admin.show>
            </div>

            <div class="mt-4 mb-12 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <x-admin.show title="Properties">
                    <x-admin.table>
                        <x-slot name="thead">
                            <x-admin.th>Attribute</x-admin.th>
                            <x-admin.th>Previous</x-admin.th>
                            <x-admin.th>New</x-admin.th>
                        </x-slot>
                        @php
                            $new_properties = data_get($activity->properties, 'attributes') ?? [];
                            $old_properties = data_get($activity->properties, 'old') ?? [];
                            $loop_properties = count($new_properties) < count($old_properties) ? $old_properties : $new_properties;
                            $new_properties = collect($new_properties);
                        @endphp
                        @foreach ($loop_properties as $attribute => $property)
                            <tr>
                                <x-admin.td class="font-semibold">{{ Str::title(str_replace("_", ' ', $attribute)) }}</x-admin.td>
                                <x-admin.td class="text-red-500">{!! data_get($old_properties, $attribute) ?? "-"  !!}</x-admin.td>
                                <x-admin.td class="text-green-500">{!! data_get($new_properties, $attribute) ?? "-" !!}</x-admin.td>
                            </tr>
                        @endforeach
                    </x-admin.table>
                </x-admin.show>
            </div>

        </div>

        <!--
            red
            green
        -->

</x-app-layout>