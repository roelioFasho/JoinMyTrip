<?php

class Trip {

    private $tripId;
    private $tripName;
    private $departure;
    private $returnDate;
    private $destination;
    private $itinerary;
    private $cost;
    private $category;
    private $image;
    private $userId;

    public function __construct(
        $tripId,
        $tripName,
        $departure,
        $returnDate,
        $destination,
        $itinerary,
        $cost,
        $category,
        $image,
        $userId = null
    ) {
        $this->tripId = $tripId;
        $this->tripName = $tripName;
        $this->departure = $departure;
        $this->returnDate = $returnDate;
        $this->destination = $destination;
        $this->itinerary = $itinerary;
        $this->cost = $cost;
        $this->category = $category;
        $this->image = $image;
        $this->userId = $userId;
    }

    public function getTripId() {
        return $this->tripId;
    }

    public function getTripName() {
        return $this->tripName;
    }

    public function getDeparture() {
        return $this->departure;
    }

    public function getReturnDate() {
        return $this->returnDate;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function getItinerary() {
        return $this->itinerary;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getImage() {
        return $this->image;
    }

    public function getUserId() {
        return $this->userId;
    }
}
?>