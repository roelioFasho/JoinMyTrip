<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "1234") {
        $_SESSION["user"] = $username;
        header("Location: ../index.php");
    } else {
        header("Location: ../View/login.php?error=invalid");
    }
}
?>