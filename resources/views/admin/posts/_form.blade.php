


    <div class="mt-4 mb-4">
        <x-label for="category" :value="__('Category')" />
        <x-admin.select name="category" :value="old('category')" autofocus required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"  @selected($post->category_id == $category->id)>{{ $category->name }}</option>
            @endforeach
            
        </x-admin.select>
    </div>

    <div>
        <x-label for="title" :value="__('Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post->title ?? old('title')" />
        @error('title')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="excerpr" :value="__('Excerpt')" />
        <x-admin.textarea id="excerpt" row="3" name="excerpt">{{ $post->excerpt ?? old('excerpt')}}</x-admin.textarea>
        @error('excerpt')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4 mb-4">
        <x-label for="content" :value="__('Content')" />
        <x-admin.textarea id="content" row="15" name="content">{{ $post->content ?? old('content') }}</x-admin.textarea>
        @error('content')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <x-button>{{ request()->routeIs('admin.posts.edit') ? "Update" : "Save" }}</x-button>
