@extends('layouts.app')

@section('title', 'blog - ' . $post->title )

@section('content')

    <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <h1>{{ $post->title }}</h1>

        <h5>{{ $post->published_at->format('M jS Y g:ia') }} by <span class="blog-user">{{ $post->user->name }}</span></h5>

        <h5>
            @if(count($post->tags) > 0)

                Tags:

                @foreach($post->tags as $tag)

                    <a href="/blog/tag/{{ $tag->slug }}"><span class="label label-default hhc-label">{{ $tag->title }}</span></a>

                @endforeach

            @endif
        </h5>

    <div class="panel panel-default hhc-panel">

            <div class="panel-body">

                <p>{!! nl2br(e($post->content)) !!}</p>
                <br />
            <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
            </div>
    </div>

    <button class="btn hhc-btn" onclick="window.location.href='/blog/'">
        « Back
    </button>

    @if(Auth::id() == $post->user_id)

        <button class="btn hhc-btn" onclick="window.location.href='/blog/{{ $post->id }}/edit'">Edit</button>
    @endif

@endsection