<?php

class Trip {

    private $tripId;
    private $tripName;
    private $time;
    private $destination;
    private $itinerary;
    private $cost;

    // Default constructor
    public function __construct(
        $tripId = null,
        $tripName = null,
        $time = null,
        $destination = null,
        $itinerary = null,
        $cost = null
    ) {
        $this->tripId = $tripId;
        $this->tripName = $tripName;
        $this->time = $time;
        $this->destination = $destination;
        $this->itinerary = $itinerary;
        $this->cost = $cost;
    }

    // Getters and Setters

    public function getTripId() {
        return $this->tripId;
    }

    public function setTripId($tripId) {
        $this->tripId = $tripId;
    }

    public function getTripName() {
        return $this->tripName;
    }

    public function setTripName($tripName) {
        $this->tripName = $tripName;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function setDestination($destination) {
        $this->destination = $destination;
    }

    public function getItinerary() {
        return $this->itinerary;
    }

    public function setItinerary($itinerary) {
        $this->itinerary = $itinerary;
    }

    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->cost = $cost;
    }

    // toString equivalent in PHP
    public function __toString() {
        return "Trip{" .
            "tripId=" . $this->tripId .
            ", tripName='" . $this->tripName . "'" .
            ", time='" . $this->time . "'" .
            ", destination='" . $this->destination . "'" .
            ", itinerary='" . $this->itinerary . "'" .
            ", cost=" . $this->cost .
            "}";
    }
}

?>