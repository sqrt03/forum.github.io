<?php

namespace App;

use App\Notifications\MarkAsBestReply;

class Discussion extends Model
{
    //

    public function author(){
       return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function markAsBest(Reply $reply){

        $this->update([
           'reply_id' => $reply->id,
        ]);

        $reply->author->notify(new MarkAsBestReply($reply->discussion));

    }

    public function bestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    }

    public function scopeFilterByChannels($builder){

        if(request()->query('channel')){
            $channel = Channel::where('slug',request()->query('channel'))->first();

            if($channel){
                return $builder->where('channel_id',$channel->id);
                // lays cac discussion co channel_id  = $channel->id
            }

            return $builder;
        }

        return $builder;

    }

}
