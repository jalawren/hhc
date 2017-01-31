@extends('layouts.app')

@section('title', 'resources')

@section('content')

    {{--<div class="message-box">--}}

        {{--@include('flash::message')--}}

    {{--</div>--}}

    <h3>Healthy Resources</h3>

    @foreach($categories as $category)

        @if(count($category->resource) > 0)

            <div class="panel panel-default hhc-panel">
                <div class="panel-body">
            <h4>{{ $category->name }}</h4>

            @foreach($category->resource as $resource)

                <table width="100%">
                    <tr>
                        <td width="20px">

                            @if(Auth::check())

                                <button onclick="window.location.href='/resources/{{ $resource->id }}/edit'" class="btn hhc-btn">Edit</button>
                            @endif
                        </td>
                        <td>

                            <a href="{{ $resource->url }}" target="_blank">

                                <div class="resource-item">
                                    <h5>{{ $resource->name }}</h5>

                                    <p><span>{{ $resource->description }}</span></p>

                                </div>
                            </a>
                        </td>
                    </tr>
                </table>

            @endforeach
                </div>
            </div>
        @endif
    @endforeach

    @if(Auth::check())

        <button class="btn hhc-btn"  onclick="window.location.href='/resources/create'">
            Create New Resource
        </button>
    @endif
@endsection