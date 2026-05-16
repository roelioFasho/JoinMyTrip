<?php

require_once __DIR__ . "/../Model/tripModel.php";
require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/../Database/TripRepository.php";

class TripController {

    private $repo;

    public function __construct($conn)
    {
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

    global $conn;

    $userId = $_SESSION["user_id"] ?? null;

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
            $imagePath
        );

        $tripId = $this->repo->insertTrip($trip);

        $stmt = $conn->prepare("
            INSERT INTO trip_chats (trip_id, name)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $tripId,
            $_POST['trip_name'] . " Chat"
        ]);

        $chatId = $conn->lastInsertId();

        $stmt = $conn->prepare("
            INSERT INTO trip_chat_members (chat_id, user_id)
            VALUES (?, ?)
        ");

        $stmt->execute([$chatId, $userId]);

        header("Location: ../index.php");
        exit();
    }
}
}
?>