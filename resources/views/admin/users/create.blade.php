<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <div>
                <x-admin.link-button type="sky" link="{{ route('admin.users.index') }}">View All</x-admin.link-button>    
            </div>
        </div>
    </x-slot>

        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                <div class="p-4">
                    
                    <form action="{{ route('admin.users.store') }}" method="post">

                        @csrf
                        
                        @include('admin.users._form')

                    </form>

                </div>
            </div>
        </div>

</x-app-layout>