<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../Database/tripsDB.php";
require_once __DIR__ . "/../Database/NotificationRepository.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: logScreen.php");
    exit();
}

$userId = $_SESSION["user_id"];

$notificationRepo = new NotificationRepository($conn);
$notifications = $notificationRepo->getUserNotifications($userId);
$notificationRepo->markAllAsRead($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Notifications</title>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(180deg, #02070c 0%, #001a2d 55%, #002b4a 100%);
    color: #e8f4ff;
    min-height: 100vh;
}

.top-bar {
    height: 74px;
    background: #03070b;
    border-bottom: 1px solid rgba(45,168,255,0.18);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 42px;
}

.top-bar h1 {
    color: #2da8ff;
    font-size: 2rem;
    font-weight: 800;
}

.top-buttons {
    display: flex;
    gap: 18px;
}

.top-btn {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    background: linear-gradient(145deg, rgba(20,20,25,0.95), rgba(10,10,15,0.95));
    border: 1px solid rgba(45,168,255,0.15);
    color: white;
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 22px;
    transition: 0.25s ease;
}

.top-btn:hover {
    background: linear-gradient(145deg, #003b66, #0066b3);
    border-color: #2da8ff;
    transform: translateY(-4px) scale(1.06);
}


.container {
    padding: 20px;
}

.notification {
    background: rgba(18, 28, 38, 0.92);
    border-radius: 20px;
    padding: 18px 22px;
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification.unread {
    border-left: 5px solid #13a8ff;
}

.notification.read {
    opacity: 0.7;
}

.info {
    max-width: 70%;
}

.info p {
    margin-bottom: 6px;
}

.info small {
    color: #7f98aa;
}

.actions {
    display: flex;
    gap: 8px;
}

.actions button {
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    color: white;
    font-weight: 600;
}

.accept { background: #00c875; }
.decline { background: #e74c3c; }
.mark-read { background: #2da8ff; }

.empty {
    padding: 40px;
    text-align: center;
    color: #8fa7bb;
}
</style>
</head>

<body>


<div class="top-bar">
    <h1>Notifications</h1>

    <div class="top-buttons">
        <a href="index.php" class="top-btn">⌂</a>
        <a href="index.php?profile=1" class="top-btn">👤</a>
        <a href="../index.php?chats=1" class="top-btn">✉</a>
        <a href="index.php?friends=1" class="top-btn">👥</a>
        <a href="index.php?uploadTrip=1" class="top-btn">+</a>
        <a href="Controller/LogoutController.php" class="top-btn">⎋</a>
    </div>
</div>

<div class="container">

<?php if (!empty($notifications)): ?>

    <?php foreach ($notifications as $n): ?>

        <div class="notification <?php echo $n['is_read'] ? 'read' : 'unread'; ?>">

            <div class="info">
                <p><?php echo htmlspecialchars($n["message"]); ?></p>
                <small><?php echo $n["created_at"]; ?></small>
            </div>

            <div class="actions">

<?php if ($n["type"] === "friend_request"): ?>

    <?php
    $stmt = $conn->prepare("
        SELECT status FROM friend_requests WHERE request_id = ?
    ");
    $stmt->execute([$n["related_id"]]);
    $req = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <?php if ($req && $req["status"] === "pending"): ?>

        <form action="../Controller/FriendController.php" method="POST">
            <input type="hidden" name="action" value="accept_friend">
            <input type="hidden" name="request_id" value="<?php echo $n["related_id"]; ?>">
            <button class="accept">Accept</button>
        </form>

        <form action="../Controller/FriendController.php" method="POST">
            <input type="hidden" name="action" value="decline_friend">
            <input type="hidden" name="request_id" value="<?php echo $n["related_id"]; ?>">
            <button class="decline">Decline</button>
        </form>

    <?php elseif ($req && $req["status"] === "accepted"): ?>

        <span style="color:#00c875; font-weight:bold;">Accepted</span>

    <?php elseif ($req && $req["status"] === "declined"): ?>

        <span style="color:#e74c3c; font-weight:bold;">Declined</span>

    <?php endif; ?>

<?php endif; ?>

            </div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="empty">No notifications yet.</div>

<?php endif; ?>

</div>

</body>
</html>