<?php
session_start();
require_once "Controller/ChatController.php";

$controller = new ChatController();
$userId = $_SESSION['user_id'] ?? 1;

if (isset($_GET['chatId'])) {
    $controller->openChat($_GET['chatId']);
} else {
    $controller->showChats($userId);
}