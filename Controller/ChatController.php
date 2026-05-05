<?php
require_once "Model/chatModel.php";

class ChatController {

    public function showChats($userId) {

        $chats = TripChat::getUserChats($userId);

        if (!$chats) {
            $chats = [];
        }

        include "View/ChatList.php";
    }

    public function openChat($chatId) {

        $chats = new TripChat(['id' => $chatId]);

        $messages = $chats->getMessages();

        if (!$messages) {
            $messages = [];
        }

        include "View/ChatView.php";
    }

    public function sendMessage($chatId, $userId, $message) {

        $chats = new TripChat(['id' => $chatId]);

        $chats->sendMessage($userId, $message);

        header("Location: index.php?chatId=" . $chatId);
        exit;
    }
}