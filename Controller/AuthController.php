<?php
session_start();

require_once __DIR__ . "/../Database/tripsDB.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {

        header("Location: ../View/logScreen.php?error=empty");
        exit();
    }

    $stmt = $conn->prepare("
        SELECT * FROM Users
        WHERE email = ?
    ");

    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password == $user["password"]) {

        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["name"] = $user["name"];

        header("Location: ../index.php");
        exit();

    } else {

        header("Location: ../View/logScreen.php?error=invalid");
        exit();
    }
}
?>