<?php

class NotificationRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createNotification($userId, $type, $message, $relatedId = null) {
        $sql = "INSERT INTO notifications 
                (user_id, type, message, related_id) 
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $userId,
            $type,
            $message,
            $relatedId
        ]);
    }

    public function getUserNotifications($userId) {
        $sql = "SELECT * FROM notifications
                WHERE user_id = ?
                ORDER BY created_at DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsRead($notificationId) {
        $sql = "UPDATE notifications 
                SET is_read = 1 
                WHERE notification_id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$notificationId]);
    }
    
    public function countUnread($userId) {
    $sql = "SELECT COUNT(*) FROM notifications 
            WHERE user_id = ? AND is_read = 0";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$userId]);

    return $stmt->fetchColumn();
}

public function markAllAsRead($userId) {
    $sql = "UPDATE notifications 
            SET is_read = 1 
            WHERE user_id = ?";

    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$userId]);
}
    
     }
        
?>
