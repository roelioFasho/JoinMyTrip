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
        $user = $this->repo->getUserById($userId);

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