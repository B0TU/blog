@extends('layouts.web')

@section('content')

<div class="basis-2/3 p-4">

    <div class="p-5 text-white font-bold bg-gradient-to-r from-{{ $category->color }}-700 to-{{ $category->color }}-500 mb-4 rounded-lg">
        {{ $category->name }}
    </div>

    @foreach ($posts as $post)
        <x-web.post-card :post="$post" />
    @endforeach

    <!-- Pagination -->
    <div class="mt-4">
        @if($posts->isNotEmpty())
            {{ $posts->withQueryString()->onEachSide(0)->links('layouts.pagination') }}
        @endif
    </div>

</div>

@endsection