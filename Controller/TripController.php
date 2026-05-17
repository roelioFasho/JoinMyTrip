<?php

require_once __DIR__ . "/../Model/tripModel.php";
require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/../Database/TripRepository.php";
require_once __DIR__ . "/../Database/NotificationRepository.php";

class TripController {

    private $repo;
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->repo = new TripRepository($conn);
    }

    public function showUploadTrips($userId)
    {
        require_once __DIR__ . "/../View/UploadTripsView.php";
    }

    public function uploadTrip()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION["user_id"] ?? null;

        if (!$userId) {
            die("No logged-in user found.");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $imagePath = null;

            if (isset($_FILES["trip_image"]) && $_FILES["trip_image"]["error"] === 0) {

                $uploadDir = __DIR__ . "/../uploads/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = time() . "_" . basename($_FILES["trip_image"]["name"]);
                $imagePath = $fileName;

                move_uploaded_file(
                    $_FILES["trip_image"]["tmp_name"],
                    $uploadDir . $fileName
                );
            }

            $trip = new Trip(
                null,
                $_POST['trip_name'] ?? '',
                $_POST['departure'] ?? null,
                $_POST['return_date'] ?? null,
                $_POST['destination'] ?? '',
                $_POST['itinerary'] ?? '',
                $_POST['cost'] ?? 0,
                $_POST['category'] ?? '',
                $imagePath,
                $userId
            );

      $tripId = $this->repo->insertTrip($trip);

      if (!$tripId) {
        die("Trip was not created.");
      }

$notificationRepo = new NotificationRepository($this->conn);

$notificationRepo->createNotification(
    $userId,
    "new_trip",
    "Your trip was created successfully!",
    $tripId
);

            $stmt = $this->conn->prepare("
                INSERT IGNORE INTO trip_chats (trip_id, name)
                VALUES (?, ?)
            ");

            $stmt->execute([
                $tripId,
                ($_POST['trip_name'] ?? 'Trip') . " Chat"
            ]);

            $stmt = $this->conn->prepare("
                SELECT id FROM trip_chats
                WHERE trip_id = ?
            ");

            $stmt->execute([$tripId]);

            $chat = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$chat) {
                die("Chat could not be found or created.");
            }

            $chatId = $chat["id"];

            $stmt = $this->conn->prepare("
                INSERT IGNORE INTO trip_chat_members (chat_id, user_id)
                VALUES (?, ?)
            ");

            $stmt->execute([
                $chatId,
                $userId
            ]);

            header("Location: ../index.php");
            exit();
        }
    }

    public function joinTrip($tripId, $userId)
    {
        $stmt = $this->conn->prepare("
            INSERT IGNORE INTO trip_chats (trip_id, name)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $tripId,
            "Trip Chat"
        ]);

        $stmt = $this->conn->prepare("
            SELECT id FROM trip_chats
            WHERE trip_id = ?
        ");

        $stmt->execute([$tripId]);

        $chat = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$chat) {
            die("Chat could not be found or created.");
        }

        $chatId = $chat["id"];

        $stmt = $this->conn->prepare("
    INSERT IGNORE INTO trip_chat_members (chat_id, user_id)
    VALUES (?, ?)
");

$stmt->execute([
    $chatId,
    $userId
]);

        $stmt = $this->conn->prepare("
            INSERT IGNORE INTO trip_chat_members (chat_id, user_id)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $chatId,
            $userId
        ]);

        header("Location: index.php?chatId=" . $chatId);
        exit();
    }
}
?>