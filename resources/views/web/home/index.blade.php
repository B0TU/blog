
@extends('layouts.web')

@section('content')


        <!-- Content -->
        <div class="basis-2/3 p-4">

            <div class="mb-5 bg-red-600 p-2 text-white animate-pulse">
                <b>Breaking News: </b>
                 Something new for PHP is coming up...
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