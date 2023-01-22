<?php

use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('messages.{id}', function ($user,$id){
    $message = Message::findOrFail($id);
    if ($message->sender_id == $user->id || $message->recipient_id == $user->id){
        return $user;
    }

});
