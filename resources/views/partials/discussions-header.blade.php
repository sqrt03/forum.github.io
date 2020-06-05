<div class="card-header">

    <div class="d-flex justify-content-between">
        <div>
            <img src="{{Gravatar::src($discussion->author->email)}}" style="width: 40px;height: 40px; border-radius: 50%" alt="">
            <strong class="ml-2 font-weight-bold">{{$discussion->author->name}}</strong>
        </div>

        <div>

            @if( in_array(request()->path(),['discussions/'.$discussion->slug]) )
                <a href="{{route('discussions.index')}}" class="btn btn-danger btn-small">Back</a>
            @else
                <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-small">View</a>
            @endif

        </div>
    </div>

</div>
