<?php

require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/../Database/NotificationRepository.php";

class NotificationController {

    private $notification;

    public function __construct($conn) {
        $this->notification = new NotificationRepository($conn);
    }

    public function getNotifications($userId) {
        $notifications = $this->notification->getUserNotifications($userId);
        echo json_encode($notifications);
    }

    public function getUnreadCount($userId) {
        $count = $this->notification->countUnread($userId);

        echo json_encode([
            "count" => $count
        ]);
    }

    public function markRead($notificationId) {
        $this->notification->markAsRead($notificationId);
    }

    public function markAll($userId) {
        $this->notification->markAllAsRead($userId);
    }
}
?>

echo json_encode($result);