<?php

require_once __DIR__ . "/../Model/userModel.php";

class UserRepository {

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User($data);
    }

    public function getTripsByUserId($userId)
    {
        $sql = "SELECT * FROM Trips WHERE user_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUserName($userId, $name)
    {
        $sql = "UPDATE Users SET name = ? WHERE user_id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $userId]);
    }

    public function updateProfilePicture($userId, $fileName)
    {

        $sql = "UPDATE Users SET profile_picture = ? WHERE user_id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$fileName, $userId]);
    }
}

?>