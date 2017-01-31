@extends('layouts.app')

@section('title', 'resource - create')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">new resource</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/resources">
                        {{ csrf_field() }}

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
                            <label class="control-label col-sm-2" for="title">name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="author">author:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="url">URL:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url" name="url" placeholder="URL" required>
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