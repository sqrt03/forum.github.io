<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notifications(){
        //mark as read
        auth()->user()->unreadNotifications->markAsRead();

        //display all
        return view('users.notifications',[
            'notifications' => auth()->user()->notifications()->paginate(4)
        ]);

    }
}
