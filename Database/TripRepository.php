<?php
class TripRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertTrip($trip)
{
    $stmt = $this->conn->prepare("
        INSERT INTO Trips
        (trip_name, departure, return_date, destination, itinerary, cost, category, image, user_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $trip->getTripName(),
        $trip->getDeparture(),
        $trip->getReturnDate(),
        $trip->getDestination(),
        $trip->getItinerary(),
        $trip->getCost(),
        $trip->getCategory(),
        $trip->getImage(),
        $trip->getUserId()
    ]);

    return $this->conn->lastInsertId();
}

    public function getAllTrips() {
        $stmt = $this->conn->query("SELECT * FROM Trips");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>