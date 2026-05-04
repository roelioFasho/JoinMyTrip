<?php
require_once "../Model/Trip.php";
require_once "../Database/db.php";
require_once "../Database/TripRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $photoPath = "uploads/" . $_FILES["trip_photo"]["name"];
    move_uploaded_file($_FILES["trip_photo"]["tmp_name"], "../" . $photoPath);

    $trip = new Trip(
        null,
        $_POST['trip_name'],
        $_POST['time'],
        $_POST['destination'],
        $_POST['itinerary'],
        $_POST['cost'],
        $photoPath
    );

    $repo = new TripRepository($conn);
    $repo->insertTrip($trip);

    header("Location: ../View/list_trips.php");
}
?>