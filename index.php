<?php
session_start();

require_once "Controller/TripController.php";
require_once "Database/tripsDB.php";


if (!isset($_SESSION['user_id'])) {

    require_once "View/logScreen.php";

} else {

    
    $controller = new TripController($conn);

    $userId = $_SESSION['user_id'];

    $controller->showUploadTrips($userId);
}
?>