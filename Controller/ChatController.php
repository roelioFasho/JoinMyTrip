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

        include __DIR__ . "/../View/ChatList.php";
    }

    public function openChat($chatId) {

        $chat = new TripChat(['id' => $chatId]);

        $messages = $chat->getMessages();

        if (!$messages) {
            $messages = [];
        }

        include __DIR__ . "/../View/ChatView.php";
    }

    public function sendMessage($chatId, $userId, $message) {

        $chat = new TripChat(['id' => $chatId]);

        $chat->sendMessage($userId, $message);

        header("Location: index.php?chatId=" . $chatId);
        exit;
    }
}
?>