<?php
class User {
    private $userId;
    private $name;
    private $age;
    private $trips;
    private $friends;
    private $email;
    private $password;

    public function __construct($data = []) {
        $this->userId = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->age = $data['age'] ?? null;
        $this->trips = $data['trips'] ?? [];
        $this->friends = $data['friends'] ?? [];
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
    }

    public function getId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->userId = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getTrips() {
        return $this->trips;
    }

    public function setTrips($trips) {
        if (is_array($trips)) {
            $this->trips = $trips;
        }
    }

    public function getFriends() {
        return $this->friends;
    }

    public function setFriends($friends) {
        if (is_array($friends)) {
            $this->friends = $friends;
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}?>