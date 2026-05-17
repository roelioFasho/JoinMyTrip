<?php

require_once __DIR__ . "/../Database/tripsDB.php";

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

    public function getId() {
        return $this->TripChatId;
    }

    public function getTripId() {
        return $this->tripId;
    }

    public function getName() {
        return $this->name;
    }

    public function getMembers() {
        return $this->members;
    }

    public function loadMembers() {

        $stmt = $this->conn->prepare("
            SELECT user_id
            FROM trip_chat_members
            WHERE chat_id = ?
        ");

        $stmt->execute([$this->TripChatId]);

        $this->members = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function addMember($userId) {

        $stmt = $this->conn->prepare("
            INSERT IGNORE INTO trip_chat_members (chat_id, user_id)
            VALUES (?, ?)
        ");

        $stmt->execute([
            $this->TripChatId,
            $userId
        ]);

        $this->loadMembers();
    }

    public function removeMember($userId) {

        $stmt = $this->conn->prepare("
            DELETE FROM trip_chat_members
            WHERE chat_id = ? AND user_id = ?
        ");

        $stmt->execute([
            $this->TripChatId,
            $userId
        ]);

        $this->loadMembers();
    }

    public function getMessages() {

        $stmt = $this->conn->prepare("
            SELECT
                m.id,
                m.message,
                m.user_id,
                m.created_at,
                u.name
            FROM messages m
            JOIN Users u
                ON m.user_id = u.user_id
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

        $stmt->execute([
            $this->TripChatId,
            $userId,
            $message
        ]);
    }

    public static function getUserChats($userId) {

        global $conn;

        $stmt = $conn->prepare("
            SELECT DISTINCT
                tc.id,
                tc.trip_id,
                tc.name
            FROM trip_chats tc
            INNER JOIN trip_chat_members tcm
                ON tc.id = tcm.chat_id
            WHERE tcm.user_id = ?
            ORDER BY tc.id DESC
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getLastMessage($chatId) {

        global $conn;

        $stmt = $conn->prepare("
            SELECT
                m.message,
                m.user_id,
                DATE_FORMAT(m.created_at, '%H:%i') AS time,
                u.name
            FROM messages m
            JOIN Users u
                ON u.user_id = m.user_id
            WHERE m.chat_id = ?
            ORDER BY m.created_at DESC
            LIMIT 1
        ");

        $stmt->execute([$chatId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>