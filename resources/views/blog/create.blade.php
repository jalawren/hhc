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
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">

                                @foreach($categories as $category)

                                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">content:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" placeholder="Enter content" rows="8"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn hhc-btn">Post</button>
                            <button type="reset" class="btn hhc-btn">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection