<?php
session_start();

require_once __DIR__ . "/Database/tripsDB.php";

require_once __DIR__ . "/Controller/TripController.php";
require_once __DIR__ . "/Controller/ChatController.php";
require_once __DIR__ . "/Controller/userController.php";

if (!isset($_SESSION['user_id'])) {

    require_once __DIR__ . "/View/logScreen.php";

} else {

    $userId = $_SESSION['user_id'];

    if (isset($_GET['profile'])) {

        $userController = new UserController($conn);
        $userController->showProfile($userId);

    } elseif (isset($_GET['chatId'])) {

        $chatController = new ChatController($conn);
        $chatController->openChat($_GET['chatId']);

    } elseif (isset($_GET['chats'])) {

        $chatController = new ChatController($conn);
        $chatController->showChats($userId);

    } elseif (isset($_GET['upload'])) {

        require_once __DIR__ . "/View/UploadTripsView.php";

    }
    elseif (isset($_GET['trip'])) {

    require_once __DIR__ . "/View/TripDetails.php";

} 
    else {

        require_once __DIR__ . "/View/Home.php";
    }
}
?>