@extends('layouts.app')

@section('title', 'blog - ' . $post->title )



@section('content')

        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->published_at->format('M jS Y g:ia') }} by <span class="blog-user">{{ $post->user->name }}</span></h5>

        <hr>
        {!! nl2br(e($post->content)) !!}
        <hr>
        <button class="btn hhc-btn" onclick="history.go(-1)">
            « Back
        </button>
        @if(Auth::id() == $post->user_id)
            <button class="btn hhc-btn" onclick="window.location.href='/blog/{{ $post->id }}/edit'">Edit</button>
            <form method="POST" action="/blog/{{ $post->id }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <button class="btn hhc-btn" type="submit">Delete</button>
            </form>
        @endif
@endsection