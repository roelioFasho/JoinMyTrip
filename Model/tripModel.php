<?php
require_once "Database.php";

function addTrip($data) {
    global $conn;

    $stmt = $conn->prepare("
        INSERT INTO Trips 
        (trip_name, departure, return_date, destination, itinerary, cost, category, image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) return false;

    return $stmt->execute([
        $data['trip_name'],
        $data['departure'],
        $data['return_date'],
        $data['destination'],
        $data['itinerary'],
        $data['cost'],
        $data['category'],
        $data['image']
    ]);
}

function getAllTrips() {
    global $conn;

    $result = $conn->query("SELECT * FROM Trips ORDER BY trip_id DESC");

    $trips = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $trips[] = $row;
    }

    return $trips;
}
?>