@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        @foreach($discussions as $discussion)
        <div class="card mb-2">

            @include('partials.discussions-header')

            <div class="card-body">
                <div class="card-content text-center">
                    <strong>{{$discussion->title}}</strong>
                </div>
            </div>

        </div>
        @endforeach
        {{$discussions->withQueryString()->links()}}
    </div>

@endsection
