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

    public function __construct(
        $tripId = null,
        $tripName = null,
        $departure = null,
        $returnDate = null,
        $destination = null,
        $itinerary = null,
        $cost = null,
        $category = null,
        $image = null
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
    }

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

    public function getDeparture() {
        return $this->departure;
    }

    public function setDeparture($departure) {
        $this->departure = $departure;
    }

    public function getReturnDate() {
        return $this->returnDate;
    }

    public function setReturnDate($returnDate) {
        $this->returnDate = $returnDate;
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

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function __toString() {
        return "Trip{" .
            "tripId=" . $this->tripId .
            ", tripName='" . $this->tripName . "'" .
            ", departure='" . $this->departure . "'" .
            ", returnDate='" . $this->returnDate . "'" .
            ", destination='" . $this->destination . "'" .
            ", itinerary='" . $this->itinerary . "'" .
            ", cost=" . $this->cost .
            ", category='" . $this->category . "'" .
            ", image='" . $this->image . "'" .
            "}";
    }
}

?>