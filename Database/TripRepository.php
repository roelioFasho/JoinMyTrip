<?php
class TripRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertTrip($trip) {
        $sql = "INSERT INTO Trips 
        (trip_name, time, destination, itinerary, cost, trip_photo) 
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $trip->getTripName(),
            $trip->getTime(),
            $trip->getDestination(),
            $trip->getItinerary(),
            $trip->getCost(),
            $trip->getTripPhoto()
        ]);
    }

    public function getAllTrips() {
        $stmt = $this->conn->query("SELECT * FROM Trips");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>