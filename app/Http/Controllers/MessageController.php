<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function broadcast(Request $request){
        broadcast(new PusherBroadcast($request->get('message'),$request->get('sender_id'),$request->get('user_id')))->toOthers();
        $message = new Message();
        $message->sender_id = $request['sender_id'];
        $message->receiver_id = $request['user_id'];
        $message->message = $request['message'];
        $message->save();

        $data = [
          'message'=>$message
        ];
        return response()->json($data);
    }

    public function receive(Request $request){
        $data = [
            'message'=>$request->message,
        ];
        return response()->json($data);
    }
}
