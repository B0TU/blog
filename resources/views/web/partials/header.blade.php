
<!-- Header -->
    <div class="container mx-auto flex justify-between p-4 items-center">
        <!-- Logo -->
        <a href="{{ route('web.home.index') }}" class="flex flex-row items-center">
            <img src="{{ asset('images/logo.png') }}" alt="" style="width:42px;height:42px;">
            <span class="text-2xl font-medium text-neutral-500 pl-2">{{ ucwords(str_replace('_', ' ', config('app.name'))) }}</span>
        </a>
        <!-- Navigation -->
        <div class="space-x-12">

            {{-- @foreach ($header_pages as $page)
            
                <a href="{{ route('web.pages.show', $page) }}" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">{{ $page->title }}</a>
            @endforeach  --}}
            
            {{-- <a href="#" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">About</a>
            <a href="#" class="font-medium text-neutral-500 hover:text-sky-500 ease-in duration-300">Contact</a> --}}
        </div>
    </div>