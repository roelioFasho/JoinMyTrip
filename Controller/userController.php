<?php

require_once __DIR__ . "/../Model/userModel.php";
require_once __DIR__ . "/../Database/UserRepository.php";

class UserController {

    private $repo;

    public function __construct($conn)
    {
        $this->repo = new UserRepository($conn);
    }

    public function showProfile($userId)
{
    global $conn;

    $stmt = $conn->prepare("
        SELECT * FROM Users
        WHERE user_id = ?
    ");

    $stmt->execute([$userId]);

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $user = new User($userData);

    $stmt = $conn->prepare("
        SELECT * FROM Trips
        WHERE user_id = ?
        ORDER BY trip_id DESC
    ");

    $stmt->execute([$userId]);

    $userTrips = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once __DIR__ . "/../View/userView.php";
}

    public function updateProfile($userId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $user = new User([
                "user_id" => $userId,
                "name" => $_POST["name"] ?? "",
                "age" => $_POST["age"] ?? null,
                "email" => $_POST["email"] ?? "",
                "password" => $_POST["password"] ?? ""
            ]);

            $this->repo->updateUser($user);

            header("Location: ../index.php?profile=1");
            exit();
        }
    }
}

?>