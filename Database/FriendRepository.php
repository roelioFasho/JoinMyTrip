<?php

class FriendRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function sendFriendRequest($senderId, $receiverId) {
        $sql = "INSERT INTO friend_requests (sender_id, receiver_id, status)
                VALUES (?, ?, 'pending')";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$senderId, $receiverId]);

        return $this->conn->lastInsertId();
    }

    public function acceptRequest($requestId) {
        $sql = "UPDATE friend_requests 
                SET status = 'accepted' 
                WHERE request_id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$requestId]);
    }

    public function declineRequest($requestId) {
        $sql = "UPDATE friend_requests 
                SET status = 'declined' 
                WHERE request_id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$requestId]);
    }
}
?>