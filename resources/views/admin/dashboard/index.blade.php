<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <i>Hello, <b> {{ Auth::user()->name }} </b></i>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        
                    <form action="{{ route('admin.dashboard') }}" method="GET">

                        
                        <div class="flex flex-row space-x-4">
                            {{-- <div class="flex-1">
                                <x-label for="year" :value="__('Model')" />
                                <x-admin.select name="model">
                                    <option value="Activity" {{ request()->get('model') == 'Post' ? 'selected' : '' }}> Posts </option>
                                    
                                </x-admin.select>
                            </div> --}}

                            <div class="flex-1">
                                <x-label for="year" :value="__('Year')" />
                            <x-admin.select name="year" autofocus>
                                @foreach ($years as $year)
                                <option value="{{ $year->year }}" {{ request()->get('year') == $year->year ? 'selected' : '' }}> {{ $year->year }} </option>
                                @endforeach
                            </x-admin.select>
                            </div>
                            
                        </div>

                        <div class="flex flex-row mt-4 space-x-4">
                            <x-button>Filter</x-button>
                            <x-admin.link-button type="light" link="{{ route('admin.dashboard') }}"> Clear </x-admin.link-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
