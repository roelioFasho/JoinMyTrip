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
        $sql = "SELECT * FROM Users WHERE user_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User($data);
    }

    public function updateUser($user)
    {
        $sql = "
            UPDATE Users
            SET name = ?, age = ?, email = ?, password = ?
            WHERE user_id = ?
        ";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $user->getName(),
            $user->getAge(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getId()
        ]);
    }
}

?>