<?php
session_start();
require_once "Controller/ChatController.php";

$controller = new ChatController();

$userId = $_SESSION['user_id'] ?? 1;
$chatId = $_POST['chatId'];
$message = $_POST['message'];

$controller->sendMessage($chatId, $userId, $message);

header("Location: index.php?chatId=" . $chatId);