<?php
namespace App\Repositories;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;


class ChatRepository implements ChatInterface{
    public function showChats(){
       return User::where('id', '!=', session('user')->id)->get();
    }
    public function startChat($userId, $senderId){
        $user = User::where('id',$userId)->first();
        $messages = Message::where('sender_id', $senderId)
            ->where('receiver_id', $user->id)
            ->orWhere('receiver_id', $senderId)
            ->where('sender_id', $user->id)->get();
        return ['user'=>$user,'messages'=>$messages];
    }
    public function search($search_query){
        $chats = User::where('name', 'LIKE', "%{$search_query}%")->where('id', '!=', session('user')->id)->get();
        return $chats;
    }
}
?>
