<?php
namespace App\Repositories;


use Illuminate\Http\Request;

interface ChatInterface{
    public function showChats();
    public function startChat($userId, $senderId);
    public function search($search_query);
}

?>
