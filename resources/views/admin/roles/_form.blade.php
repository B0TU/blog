

    <div class="mt-4 mb-4">
        <x-label for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$role->name ?? old('name')" autofocus />
        @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <hr class="mt-8 pb-4">
    <h1 class="pt-2 text-center font-bold text-lg">Permissions</h1>
    
    <div class="mb-4 px-6">
        @foreach ($permissions as $model => $model_permissions)
        <h3 class="pt-4 font-bold">{{ Str::title($model) }}</h3>
        <div class="grid grid-cols-4">
            @foreach ($model_permissions as $permission)
                <div class="block mt-4">
                    <label for="{{ Str::snake($permission->name) }}" class="inline-flex items-center">
                        <input type="checkbox" id="{{ Str::snake($permission->name) }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus-ring focus-ring-indigo-200 focus-ring-opacity-50" value="{{ $permission->id }}"
                        @checked($role->hasPermissionTo($permission->name)) name="permissions[]">
                        <span class="ml-2 text-sm text-gray-600">{{ Str::title($permission->name) }}</span>                    
                    </label>
                </div>
            @endforeach
        </div>
        <hr class="mt-4">
        @endforeach
    </div>


    <x-button>{{ request()->routeIs('admin.roles.edit') ? "Update" : "Save" }}</x-button>
