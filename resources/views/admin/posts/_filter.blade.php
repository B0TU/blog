
    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
            <div class="bg-gray-200 p-4">
                Filter
            </div>
            <div class="p-4">
                
                <div class="flex flex-row space-x-4">

                    <div class="flex-1">
                        <x-label for="search" :value="__('Search')" />
                        <x-input id="search" class="block mt-1 w-full" type="search" name="search" :value="request()->get('search', old('search'))" autofocus />
                    </div>
                    <div class="flex-1">
                        <x-label for="author" :value="__('Author')" />
                        <x-admin.select name="author">
                            <option value="">All</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ request()->get('author') == $author->id ? 'selected' : '' }}> {{ $author->name }} </option>
                            @endforeach
                        </x-admin.select>
                    </div>
                    
                </div>

                <div class="flex flex-row mt-4 space-x-4">
                    <x-button>Filter</x-button>

                    <x-admin.link-button type="light" link="{{ route('admin.posts.index') }}"> Clear </x-admin.link-button>
                    
                </div>

            </div>
        </div>
    </div>

