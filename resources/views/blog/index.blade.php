@extends('layouts.app')

@section('title', 'blog')

@section('content')


    <div>
        <h3>{{ config('blog.title') }}</h3>

        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>

            <ul class="blog-list">

                @foreach($posts as $post)

                    <a href="/blog/{{ $post->slug }}">

                        <div class="blog-entry">

                            <h4>
                                {{ $post->title }}

                                <span class="post-date">

                                    <em>({{ $post->published_at->format('M jS Y g:ia') }})</em>

                                </span>

                            </h4>

                            <p>{{ str_limit($post->content, 255) }}</p>

                        </div>
                    </a>
                @endforeach
            </ul>

        {{ $posts->links() }}

    </div>

    <div>

        @if(Auth::check())

            <button class="btn hhc-btn"  onclick="window.location.href='/blog/create'">
                Create New Entry
            </button>
        @endif
    </div>

@endsection