@extends('layouts.app')

@section('content')

    <div class="col-md-8">

            <div class="card mb-2">

                @include('partials.discussions-header')

                <div class="card-body">

                    <div class="card-content text-center">
                        <strong>{{$discussion->title}}</strong>
                    </div>

                    <hr/>

                    <div class="card-content">{!! $discussion->content !!}</div>

                    @if($discussion->bestReply)
                        <div class="card bg-success">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <img class="mr-2" style="border-radius: 50%;width: 30px;height: 30px" src="{{Gravatar::src($discussion->bestReply->author->email)}}" alt="">
                                        <span>{{$discussion->bestReply->author->name}}</span>
                                    </div>
                                    <div>
                                        <b>Best Reply</b>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    {!! $discussion->BestReply->content !!}
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>

        <hr/>

        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        @foreach($discussion->replies()->simplePaginate(5) as $reply)
            <div class="card my-5">
                <div class="card-header d-flex justify-content-between">

                    <div>
                        <img style="width: 30px; height: 30px; border-radius: 50%" src="{{Gravatar::src($reply->author->email)}}" alt="">
                        <span>{{$reply->author->name}}</span>
                    </div>

                    @auth
                        @if(auth()->user()->id == $discussion->user_id)
                            <form action="{{ route( 'mark-as-best',['discussion'=> $discussion->slug, 'reply' => $reply->id ] ) }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">mark as Best</button>
                            </form>
                        @endif
                    @endauth

                </div>

                <div class="card-body">
                    <div class="card-content">
                        {!! $reply->content !!}
                    </div>
                </div>

            </div>

        @endforeach

        {{ $discussion->replies()->simplePaginate(5)->links() }}

        <div class="card">

            <div class="card-header">Add a Reply</div>

            @auth

            <div class="card-body">
                <form action="{{route('replies.store',$discussion->slug)}}" method="POST">
                    @csrf

                    <input type="hidden" name="content" id="content">
                    <trix-editor input="content"></trix-editor>

                    <button class="btn btn-success">Reply</button>
                </form>

                @else
                    <a class="btn btn-success btn-sm" href="{{route('login')}}">Login to Add Reply</a>
                @endauth

            </div>

        </div>

    </div>

@endsection


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
