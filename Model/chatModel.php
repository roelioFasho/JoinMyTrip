<?php
require_once "Database/tripsDB.php";

class TripChat {

    private $conn;
    private $TripChatId;
    private $tripId;   
    private $name;
    private $members;   

    public function __construct($data = []) {
        global $conn;
        $this->conn = $conn;

        $this->TripChatId = $data['id'] ?? null;
        $this->tripId = $data['trip_id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->members = $data['members'] ?? [];
    }

    public function getId() { return $this->TripChatId; }
    public function getTripId() { return $this->tripId; }
    public function getName() { return $this->name; }
    public function getMembers() { return $this->members; }

    public function loadMembers() {
        $stmt = $this->conn->prepare("
            SELECT user_id FROM trip_chat_members WHERE chat_id = ?
        ");
        $stmt->execute([$this->TripChatId]);

        $this->members = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function addMember($userId) {
        $stmt = $this->conn->prepare("
            INSERT IGNORE INTO trip_chat_members (chat_id, user_id)
            VALUES (?, ?)
        ");
        $stmt->execute([$this->TripChatId, $userId]);

        $this->members[] = $userId;
    }


    public function removeMember($userId) {
        $stmt = $this->conn->prepare("
            DELETE FROM trip_chat_members
            WHERE chat_id = ? AND user_id = ?
        ");
        $stmt->execute([$this->TripChatId, $userId]);

        $this->members = array_filter(
            $this->members,
            fn($m) => $m != $userId
        );
    }

    public function getMessages() {
        $stmt = $this->conn->prepare("
            SELECT m.message, u.name
            FROM messages m
            JOIN Users u ON m.user_id = u.user_id
            WHERE m.chat_id = ?
            ORDER BY m.created_at ASC
        ");
        $stmt->execute([$this->TripChatId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendMessage($userId, $message) {
        $stmt = $this->conn->prepare("
            INSERT INTO messages (chat_id, user_id, message)
            VALUES (?, ?, ?)
        ");
        $stmt->execute([$this->TripChatId, $userId, $message]);
    }

    public static function getUserChats($userId) {

    require "Database/tripsDB.php";

    $stmt = $conn->prepare("
        SELECT tc.*
        FROM trip_chats tc
        JOIN trip_chat_members tm ON tc.id = tm.chat_id
        WHERE tm.user_id = ?
    ");

    $stmt->execute([$userId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}