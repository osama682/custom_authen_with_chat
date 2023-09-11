<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ChatController extends Controller
{
    public function showChats()
    {
        $sender = session('user');
        $users = User::where('id', '!=', session('user')->id)->get();
        return view('Chat.chatpage', ['users' => $users, 'sender' => $sender]);
    }

    public function startChat(User $user, $sender)
    {
        $messages = Message::where('sender_id', $sender)
            ->where('receiver_id', $user->id)
            ->orWhere('receiver_id', $sender)
            ->where('sender_id', $user->id)->get();
        return view('Chat.selectchat', ['user' => $user, 'messages' => $messages]);

    }

    public function search(Request $request)
    {
        $search_query = $request->search;
        $chats = User::where('name', 'LIKE', "%{$search_query}%")->where('id', '!=', session('user')->id)->get();
        $empty_chats = 'No user found';
        if ($chats->isEmpty()) {
            return view('Chat.chatpage', ['empty_chats' => $empty_chats]);
        } else {
            return view('Chat.chatpage', ['chats' => $chats]);
        }

    }
}
