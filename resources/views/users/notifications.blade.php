@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Notifications</div>

            <div class="card-body">
                <ul class="list-group">
                    @forelse($notifications as $notification)
                        <li class="list-group-item">
                            @if($notification->type == 'App\Notifications\NewReplyAdded' )
                                A new reply was added to your Discussion <strong style="color:red">{{$notification->data['discussion']['title']}}</strong>

                                <a href="{{ route( 'discussions.show',$notification->data['discussion']['slug'] ) }}" class="btn btn-sm btn-info float-right">View</a>
                            @endif

                            @if($notification->type == 'App\Notifications\MarkAsBestReply' )
                                Your reply in <strong style="color:red">{{$notification->data['discussion']['title']}}</strong> Marked as best reply.

                                <a href="{{ route( 'discussions.show',$notification->data['discussion']['slug'] ) }}" class="btn btn-sm btn-info float-right">View</a>
                            @endif

                        </li>
                    @empty
                        No Notification
                     @endforelse
                </ul>

            </div>

        </div>
    </div>

@endsection
