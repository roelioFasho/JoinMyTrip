<?php
class User {
    private $userId;
    private $name;
    private $age;
    private $email;
    private $password;

    public function __construct($data = []) {
        $this->userId = $data['user_id'] ?? $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->age = $data['age'] ?? null;
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