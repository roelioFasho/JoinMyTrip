<?php
    class TripChat {
    private $TripChatId;
    private $tripId;   // lidhje me Trip
    private $name;
    private $members;   // array me user IDs (vetëm për logjikë, jo DB)

    public function __construct($data = []) {
        $this->TripChatId = $data['id'] ?? null;
        $this->tripId = $data['trip_id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->members = $data['members'] ?? [];
    }

    public function getId() {
        return $this->TripChatId;
    }

    public function getTripId() {
        return $this->tripId;
    }

    public function getName() {
        return $this->name;
    }

    public function getMembers() {
        return $this->members;
    }

    // SETTERS
    public function setId($id) {
        $this->TripChatId = $id;
    }

    public function setTripId($trip_id) {
        $this->tripId = $trip_id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setMembers($members) {
        if (is_array($members)) {
            $this->members = $members;
        }
    }


    public function addMember($userId) {
        if (!in_array($userId, $this->members)) {
            $this->members[] = $userId;
        }
    }

    public function removeMember($userId) {
        $this->members = array_filter(
            $this->members,
            fn($member) => $member != $userId
        );
    }

    public function hasMember($userId) {
        return in_array($userId, $this->members);
    }
}
?>