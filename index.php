<?php
session_start();

require_once "Database/tripsDB.php";

require_once "Controller/TripController.php";
require_once "Controller/ChatController.php";

if (!isset($_SESSION['user_id'])) {

    require_once "View/logScreen.php";

} else {

    $userId = $_SESSION['user_id'];

   

    if (isset($_GET['chatId'])) {

        $chatController = new ChatController();
        $chatController->openChat($_GET['chatId']);

    } elseif (isset($_GET['chats'])) {

        $chatController = new ChatController();
        $chatController->showChats($userId);

    } else {

        

        $tripController = new TripController($conn);
        $tripController->showUploadTrips($userId);
    }
}
?>