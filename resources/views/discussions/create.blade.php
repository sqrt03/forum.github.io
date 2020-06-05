@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Create Discussion</div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('discussions.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title">
                    </div>

                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select class="form-control" name="channel">
                            @foreach($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{route('discussions.index')}}" class="btn btn-danger"> Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">

@endsection

@endsection
