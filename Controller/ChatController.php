<?php
require_once "../Model/TripChat.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $chat = new TripChat([
        'trip_id' => $_POST['trip_id'],
        'name' => $_POST['name'],
        'members' => []
    ]);

    echo "Chat created: " . $chat->getName();
}
?>