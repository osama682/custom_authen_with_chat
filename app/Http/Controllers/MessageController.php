<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function broadcast(Request $request){
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
}
