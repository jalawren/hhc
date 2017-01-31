@extends('layouts.app')

@section('title', 'resource - edit '.  $resources->name)

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">edit resource</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="/resources/{{ $resources->id }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">

                                @foreach($categories as $category)

                                    @if($resources->category_id == $category->id)

                                        <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @else

                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $resources->name }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">author:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" value="{{ $resources->author }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description"  rows="4" required>{{ $resources->description }}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="url">url:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url" name="url" value="{{ $resources->url }}">
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
                        <form method="POST" action="/resources/{{ $resources->id }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <button class="btn hhc-btn" type="submit">Delete</button>
                        </form>

                        <button onclick="window.location.href='/resources'" class="btn hhc-btn">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection