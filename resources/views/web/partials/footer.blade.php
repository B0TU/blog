<!-- Footer -->
<div class="flex flex-col bg-white bg-right-top bg-no-repeat"
     style="background-image: url('images/footer-bg-image.png')">
    <div style="height:5px;" class="bg-sky-500 w-100"></div>
    <div class="flex flex-row justify-between container mx-auto py-8">
        <div class="text-neutral-400">Copyright © {{ now()->format('Y') }} {{ ucwords(str_replace('_', ' ', config('app.name'))) }}</div>
        <div class="space-x-12">
            {{-- @foreach ($footer_pages as $page)
                <a href="{{ route('web.pages.show', $page) }}" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">{{ $page->title }}</a>
            @endforeach --}}
            
            {{-- <a href="#" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">About</a>
            <a href="#" class="font-medium text-neutral-400 hover:text-sky-500 ease-in duration-300">Contact</a> --}}
        </div>
    </div>
</div>