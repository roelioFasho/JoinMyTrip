<?php
class TripRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertTrip($trip) {
        $sql = "INSERT INTO Trips 
        (trip_name, departure, return_date, destination, itinerary, cost, image) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $trip->getTripName(),
            $trip->getDeparture(),
            $trip->getReturnDate(),
            $trip->getDestination(),
            $trip->getItinerary(),
            $trip->getCost(),
            $trip->getImage()
        ]);
    }

    public function getAllTrips() {
        $stmt = $this->conn->query("SELECT * FROM Trips");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>