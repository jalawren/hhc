@extends('layouts.app')

@section('title', 'blog - create')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">new blog entry</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/blog">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tags">tags:</label>
                            <div class="col-sm-10">
                                <p>
                                    @foreach($tags as $tag)

                                        <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->title }}</label>

                                    @endforeach
                                </p>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content" name="content" placeholder="Enter content" rows="12" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn hhc-btn">Post</button>
                                <button type="reset" class="btn hhc-btn">Clear</button>
                                {{--<button type="button" id="tag-btn" class="btn hhc-btn">New Tag</button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{--<div class="modal fade" id="tag-modal" role="dialog">--}}
        {{--<tag></tag>--}}
    {{--</div>--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$("#tag-btn").click(function(){--}}
                {{--$("#tag-modal").modal();--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

@endsection