<?php
require 'Database/tripsDB.php';

$currentUserID = 1;

if (isset($_POST['add_friend'])) {
    $friendId = $_POST['friend_id'];
    $insert = $conn->prepare(
        "INSERT INTO friends (user_id, friend_id) VALUES (:user_id, :friend_id)"
    );
    $insert->execute(['user_id' => $currentUserID, 'friend_id' => $friendId]);
}

$addedStmt = $conn->prepare(
    "SELECT friend_id FROM friends WHERE user_id = :user_id"
);
$addedStmt->execute(['user_id' => $currentUserID]);
$addedFriends = $addedStmt->fetchAll(PDO::FETCH_COLUMN);

$stmt = $conn->prepare(
    "SELECT user_id, name, age FROM Users WHERE user_id != :id LIMIT 10"
);
$stmt->execute(['id' => $currentUserID]);
$suggestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suggested Friends</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #0a0a0f; color: #e0e0f0; min-height: 100vh; padding: 2rem 1rem; }
        .container { max-width: 700px; margin: 0 auto; }
        h1 { font-size: 2rem; font-weight: 800; color: #fff; margin-bottom: .4rem; }
        h1 span { color: #4a90ff; }
        .subtitle { color: #5a5a80; font-size: .9rem; margin-bottom: 2rem; }
        .card { background: #13131f; border: 1px solid #1e1e35; border-radius: 10px; padding: 1.2rem 1.5rem; margin-bottom: .75rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; transition: border-color .2s, transform .15s; }
        .card:hover { border-color: #4a90ff; transform: translateY(-2px); }
        .avatar { width: 46px; height: 46px; border-radius: 50%; background: #1e1e45; border: 2px solid #4a90ff; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; font-weight: 700; color: #4a90ff; flex-shrink: 0; }
        .info { flex: 1; }
        .info h3 { font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: .2rem; }
        .info p { font-size: .8rem; color: #5a5a80; }
        .btn-add { background: #4a90ff; color: #fff; border: none; border-radius: 7px; padding: .5rem 1.1rem; font-size: .85rem; font-weight: 600; cursor: pointer; }
        .btn-add:hover { background: #3a7ae0; }
        .btn-added { background: transparent; color: #2ecc71; border: 1px solid #2ecc71; border-radius: 7px; padding: .5rem 1.1rem; font-size: .85rem; font-weight: 600; cursor: default; }
        .no-results { text-align: center; padding: 3rem; color: #3a3a60; }
    </style>
</head>
<body>
<div class="container">
    <h1>People You <span>Might Know</span></h1>
    <p class="subtitle">Connect with other travelers</p>

    <?php if ($suggestions): ?>
        <?php foreach ($suggestions as $user): ?>
            <div class="card">
                <div class="avatar"><?= strtoupper(substr($user['name'], 0, 1)) ?></div>
                <div class="info">
                    <h3><?= htmlspecialchars($user['name']) ?></h3>
                    <p>Age <?= htmlspecialchars($user['age']) ?></p>
                </div>
                <?php if (in_array($user['user_id'], $addedFriends)): ?>
                    <button class="btn-added" disabled>✓ Added</button>
                <?php else: ?>
                    <form method="POST">
                        <input type="hidden" name="friend_id" value="<?= $user['user_id'] ?>">
                        <button type="submit" name="add_friend" class="btn-add">+ Add</button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="no-results"><p>No suggestions available yet.</p></div>
    <?php endif; ?>
</div>
</body>
</html>