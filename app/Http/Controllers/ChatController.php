<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChats()
    {
        $sender = session('user');
//        dd($sender);
        $users = User::where('id', '!=', session('user')->id)->get();
        return view('Chat.chatpage', ['users' => $users, 'sender' => $sender]);
    }

    public function startChat(User $user, $sender)
    {
        $messages = Message::where('sender_id', $sender)->where('receiver_id', $user->id)->get();
        if ($messages->isEmpty()) {
            $messages = Message::where('receiver_id', $sender)->where('sender_id', $user->id)->get();
            return view('Chat.selectchat', ['user' => $user, 'messages' => $messages]);
        } else {
            return view('Chat.selectchat', ['user' => $user, 'messages' => $messages]);
        }
    }
}