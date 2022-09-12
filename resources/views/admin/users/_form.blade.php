

    <div>
        <x-label for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name ?? old('name')" autofocus />
        @error('name')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />
        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$user->email ?? old('email')"  />
            @error('email')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4">
        <x-label for="role" :value="__('Role')" />
        <x-admin.select name="role">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @selected($role->id == $user->role_id)>{{ $role->name }}</option>
            @endforeach
        </x-admin.select>
        @error('role')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-4 mb-4">
        <x-label for="password" :value="__('Password')" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')"  />
            @error('password')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <x-button>{{ request()->routeIs('admin.users.edit') ? "Update" : "Save" }}</x-button>
