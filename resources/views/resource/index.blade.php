@extends('layouts.app')

@section('title', 'resources')



@section('content')

    <h3>Healthy Resources</h3>

    @foreach($resources as $resource)

        <div class="resource-list">

            <a href="{{ $resource->url }}" target="_blank">
                <h3>{{ $resource->name }}</h3>
            </a>

            <p>{{ $resource->description }}</p>


        </div>

    @endforeach

@endsection