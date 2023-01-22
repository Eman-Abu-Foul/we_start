<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessagesController extends Controller
{
    public function show($peer_id)
    {
        $user_id = Auth::id();
        $messages = Message::with('sender:id,fname', 'recipient:id,fname')
            ->where(function ($query) use ($user_id , $peer_id) {
            $query->where('sender_id' , '=' , $user_id)
            ->where('recipient_id' , '=' , $peer_id);
        })
        ->orWhere(function ($query) use ($user_id , $peer_id) {
            $query->where('sender_id' , '=' , $peer_id)
                ->where('recipient_id' , '=' , $user_id);
        })->latest()->get();

    }
    public function store(Request $request, $peer_id)
    {
        $request->validate([
            'message' => 'required|string',
        ]);
        $user = Auth::user();
        $messages = $user->sentMessages()->create([
            'recipient_id' => $peer_id,
            'message' => $request->post('message'),
        ]);
        return Response::json($messages,201);
//        $validator = Validator($request->all(), [
//            'message' => 'required|string',
//        ]);
//        $user = Auth::user();
//        if (!$validator->fails()) {
//            $message = new Message();
//            $message->recipient_id = $peer_id;
//            $message->name = $request->message;
//            $isSaved = $message->save();
//
//            return response()->json(['message' => $isSaved ? 'Skill succsess Created' : 'Faield']
//                , $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
//        } else {
//            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
//        }
    }
}
