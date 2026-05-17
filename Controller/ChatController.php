<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../Model/chatModel.php";

class ChatController {

    public function showChats($userId) {

        $chats = TripChat::getUserChats($userId);

        if (!$chats) {
            $chats = [];
        }

        foreach ($chats as &$chat) {

            $lastMessage = TripChat::getLastMessage($chat['id']);

            if ($lastMessage) {
                $chat['last_message'] = $lastMessage['message'];
                $chat['last_sender_id'] = $lastMessage['user_id'];
                $chat['last_sender_name'] = $lastMessage['name'];
                $chat['time'] = $lastMessage['time'] ?? '';
            } else {
                $chat['last_message'] = null;
                $chat['last_sender_id'] = null;
                $chat['last_sender_name'] = null;
                $chat['time'] = '';
            }
        }

        unset($chat);

        require_once __DIR__ . "/../View/ChatList.php";
    }

    public function openChat($chatId) {

        $chat = new TripChat(['id' => $chatId]);

        $messages = $chat->getMessages();

        if (!$messages) {
            $messages = [];
        }

        require_once __DIR__ . "/../View/ChatView.php";
    }

    public function sendMessage($chatId, $userId, $message) {

        $chat = new TripChat(['id' => $chatId]);

        $chat->sendMessage($userId, $message);

        header("Location: index.php?chatId=" . $chatId);
        exit();
    }
}
?>