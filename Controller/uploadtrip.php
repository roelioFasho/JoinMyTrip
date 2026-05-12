<?php

require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/TripController.php";

$controller = new TripController($conn);
$controller->uploadTrip();

?>