
@extends('layouts.web')

@section('content')


        <!-- Content -->
        <div class="basis-2/3 p-4">

            <div class="mb-5 bg-red-600 text-white p-3 animate-pulse">
                <p>Something new is coming up...</p>
            </div>

            <!-- Post Card -->
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