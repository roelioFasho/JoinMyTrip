<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/../Database/FriendRepository.php";
require_once __DIR__ . "/../Database/NotificationRepository.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../View/logScreen.php");
    exit();
}

$friendRepo = new FriendRepository($conn);
$notificationRepo = new NotificationRepository($conn);

$userId = (int) $_SESSION["user_id"];
$userName = $_SESSION["name"] ?? "Someone";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["action"] === "add_friend") {

        $receiverId = (int) $_POST["receiver_id"];

        if ($receiverId === $userId) {
            header("Location: ../index.php?friends=1");
            exit();
        }

        $stmt = $conn->prepare("
            SELECT request_id 
            FROM friend_requests 
            WHERE sender_id = ? 
            AND receiver_id = ?
            AND status = 'pending'
            LIMIT 1
        ");
        $stmt->execute([$userId, $receiverId]);

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            header("Location: ../index.php?friends=1");
            exit();
        }

        $requestId = $friendRepo->sendFriendRequest($userId, $receiverId);

        $created = $notificationRepo->createNotification(
            $receiverId,
            "friend_request",
            $userName . " sent you a friend request!",
            $requestId
        );

        if (!$created) {
            die("Friend request was created, but notification failed.");
        }

        header("Location: ../index.php?friends=1");
        exit();
    }
if ($_POST["action"] === "accept_friend") {

    $requestId = $_POST["request_id"];
    
    $friendRepo->acceptRequest($requestId);


    $stmt = $conn->prepare("
        SELECT sender_id, receiver_id 
        FROM friend_requests 
        WHERE request_id = ?
    ");
    $stmt->execute([$requestId]);

    $request = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($request) {

        $user1 = $request["sender_id"];
        $user2 = $request["receiver_id"];

        $stmt = $conn->prepare("
            INSERT INTO friends (user1_id, user2_id)
            VALUES (?, ?)
        ");
        $stmt->execute([$user1, $user2]);
    }

    header("Location: ../index.php?notifications=1");
    exit();
}

    if ($_POST["action"] === "decline_friend") {
        $friendRepo->declineRequest($_POST["request_id"]);
        header("Location: ../index.php?notifications=1");
        exit();
    }
}
?>