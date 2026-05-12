<?php
$chats = $chats ?? [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Chats</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #fafafa;
}

.header {
    padding: 15px;
    font-weight: bold;
    font-size: 20px;
    border-bottom: 1px solid #ddd;
    background: white;
}

.chat-list {
    display: flex;
    flex-direction: column;
}

.chat-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    background: white;
    cursor: pointer;
}

.chat-item:hover {
    background: #f5f5f5;
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #ccc;
    margin-right: 12px;
}

.chat-info {
    flex: 1;
}

.chat-name {
    font-weight: bold;
    font-size: 16px;
}

.chat-last {
    font-size: 14px;
    color: #777;
}

.chat-meta {
    text-align: right;
    font-size: 12px;
    color: #999;
}

.unread {
    background: #0095f6;
    color: white;
    border-radius: 50%;
    padding: 5px 8px;
    font-size: 12px;
    margin-top: 5px;
    display: inline-block;
}
</style>
</head>

<body>

<div class="header">Chats</div>

<div class="chat-list">

<?php foreach ($chats as $chat): ?>

    <a href="index.php?chatId=<?= $chat['id'] ?>" style="text-decoration:none; color:inherit;">

        <div class="chat-item">

            <div class="avatar"></div>

            <div class="chat-info">
                <div class="chat-name">
                    <?= htmlspecialchars($chat['name']) ?>
                </div>

                <div class="chat-last">
                    <?= htmlspecialchars($chat['last_message'] ?? 'No messages yet') ?>
                </div>
            </div>

            <div class="chat-meta">
                <?= $chat['time'] ?? '' ?>

                <?php if (!empty($chat['unread'])): ?>
                    <div class="unread">
                        <?= $chat['unread'] ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </a>

<?php endforeach; ?>

</div>

</body>
</html>