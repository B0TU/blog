

    <div>
        <x-label for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name ?? old('name')" autofocus />
        @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4 mb-4">
        <x-label for="color" :value="__('Color')" />
        <x-input id="color" class="block mt-1 w-full" type="text" name="color" :value="$category->color ?? old('color')" autofocus />
            @error('color')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
    </div>

    <x-button>{{ request()->routeIs('admin.categories.edit') ? "Update" : "Save" }}</x-button>
