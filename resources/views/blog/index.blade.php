@extends('layouts.app')

@section('title', 'blog')



@section('content')

        @if(Auth::check())

            <button class="btn hhc-btn"  onclick="window.location.href='/blog/create'">
                Create New Entry
            </button>
        @endif

        @include('flash::message')

        <div>
            <h1>{{ config('blog.title') }}</h1>

            <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>

            <hr>
                <ul class="blog-list">
                    @foreach($posts as $post)

                        <a href="/blog/{{ $post->slug }}">

                            <div class="blog-entry">

                                <h3>{{ $post->title }} <span class="post-date"><em>({{ $post->published_at->format('M jS Y g:ia') }})</em></span></h3>

                                <p>{{ str_limit($post->content) }}</p>

                            </div>
                        </a>
                    @endforeach
                </ul>
            <hr>

            {!! $posts->render() !!}
        </div>



@endsection