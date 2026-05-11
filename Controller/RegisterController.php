<?php

session_start();

require_once __DIR__ . "/../Database/tripsDB.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (
        empty($name) ||
        empty($age) ||
        empty($email) ||
        empty($password)
    ) {

        header("Location: ../View/Register.php?error=empty");
        exit();
    }

    $checkStmt = $conn->prepare("
        SELECT * FROM Users
        WHERE email = ?
    ");

    $checkStmt->execute([$email]);

    $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {

        header("Location: ../View/Register.php?error=exists");
        exit();
    }

    $stmt = $conn->prepare("
        INSERT INTO Users
        (name, age, email, password)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([
        $name,
        $age,
        $email,
        $password
    ]);

    header("Location: ../View/logScreen.php");
    exit();
}
?>