
    <div>
        <x-label for="title" :value="__('Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$page->title ?? old('title')" autofocus/>
        @error('title')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="order" :value="__('Order')" />
        <x-input id="order" class="block mt-1 w-full" type="text" name="order" :value="$page->order ?? old('order')" />
        @error('order')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="section" :value="__('Section')" />
        <x-admin.select name="section">
            <option value="">-- Select --</option>
            @foreach ( App\Support\Enums\PageSection::cases() as $section)
                <option value="{{ $section->value }}" {{ request()->get('section') == $section->value ? 'selected' : '' }}> {{ $section->name }} </option>
            @endforeach
        </x-admin.select>
    </div>

    <div class="mt-4 mb-4">
        <x-label for="content" :value="__('Content')" />
        <x-admin.textarea id="content" row="15" name="content">{{ $page->content ?? old('content') }}</x-admin.textarea>
        @error('content')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <x-button>{{ request()->routeIs('admin.pages.edit') ? "Update" : "Save" }}</x-button>
