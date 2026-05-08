<?php
session_start();

require_once "Controller/TripController.php";
require_once "Database/tripsDB.php";

$controller = new TripController($conn);

$userId = $_SESSION['user_id'] ?? 1;

$controller->showUploadTrips($userId);
?>