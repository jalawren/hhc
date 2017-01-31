@extends('layouts.app')

@section('title', 'blog - edit '.  $post->slug)

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default hhc-row">
            <div class="panel-heading">edit blog entry</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/blog/{{ $post->id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="tags">tags:</label>
                        <div class="col-sm-10">
                            <p>
                                @foreach($tags as $tag)

                                    <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{ $tag['id'] }}" {{ $tag['checked'] }}>{{ $tag['title'] }}</label>

                                @endforeach
                            </p>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="content">content:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content"  rows="12">{{ $post->content }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn hhc-btn">Update</button>
                        </div>
                    </div>
                </form>
                <div class="form-group">
                    <div class="edit-buttons col-sm-offset-2 col-sm-10">
                        <form method="POST" action="/blog/{{ $post->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button class="btn hhc-btn" type="submit">Delete</button>
                        </form>

                        <button onclick="window.location.href='/blog/{{ $post->slug }}'" class="btn hhc-btn">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection