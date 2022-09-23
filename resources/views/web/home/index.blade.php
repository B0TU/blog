
@extends('layouts.web')

@section('content')


        <!-- Content -->
        <div class="basis-2/3 p-4">

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