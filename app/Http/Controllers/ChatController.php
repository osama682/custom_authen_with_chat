<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Repositories\ChatInterface;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ChatController extends Controller
{
    protected $message;

    public function __construct(ChatInterface $message)
    {
        $this->message = $message;

    }

    public function showChats()
    {
        $sender = session('user');
        $users = $this->message->showChats();
        return view('Chat.chatpage', ['users' => $users, 'sender' => $sender]);
    }

    public function startChat($userId, $senderId)
    {
        $chatData = $this->message->startChat($userId, $senderId);
        return view('Chat.selectchat', $chatData);
    }

    public function search(Request $request)
    {
        $search_query = $request->search;
        $chats = $this->message->search($search_query);
        $empty_chats = 'No user found';
        if ($chats->isEmpty()) {
            return view('Chat.chatpage', ['empty_chats' => $empty_chats]);
        } else {
            return view('Chat.chatpage', ['chats' => $chats]);
        }

    }
}
