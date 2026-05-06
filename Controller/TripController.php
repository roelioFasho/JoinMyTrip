<?php
require_once "../Model/Trip.php";
require_once "../Database/db.php";
require_once "../Database/TripRepository.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $imagePath = null;

    if (isset($_FILES["trip_image"]) && $_FILES["trip_image"]["error"] === 0) {
        $uploadDir = "../uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES["trip_image"]["name"]);
        $imagePath = "uploads/" . $fileName;

        move_uploaded_file($_FILES["trip_image"]["tmp_name"], $uploadDir . $fileName);
    }

    $trip = new Trip(
        null,
        $_POST['trip_name'] ?? '',
        $_POST['departure'] ?? null,
        $_POST['return_date'] ?? null,
        $_POST['destination'] ?? '',
        $_POST['itinerary'] ?? '',
        $_POST['cost'] ?? 0,
        $_POST['category'] ?? '',
        $imagePath
    );

    $repo = new TripRepository($conn);
    $repo->insertTrip($trip);

    header("Location: ../View/list_trips.php");
    exit();
}
?>