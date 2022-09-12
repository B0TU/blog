
<!-- Sidebar -->
<div class="basis-1/3 p-4">
    <div class="bg-white rounded-lg p-4 site-drop-shadow bg-left-bottom bg-no-repeat"
         style="background-image: url('{{ asset('images/bg-image.png') }}')">
        <div class="text-sky-500 font-bold text-lg mb-4 mt-4">Categories</div>
        <div>

            @foreach ($categories as $category)

            <a href="{{ route('web.categories.show', $category) }}"
               class="ease-in duration-300 bg-white 
               rounded-lg border-2 border-white 
               hover:border-{{ $category->color }}-500 
               site-drop-shadow px-5 py-4 
               flex justify-between items-center mb-4">
               <div class="font-medium text-neutral-500">{{ Str::title($category->name) }}</div>
               <div class="text-slate-300 text-sm">{{ $category->posts_count }} {{ Str::plural('post', $category->posts_count) }}</div>
            </a>

            @endforeach

        </div>
    </div>

</div>