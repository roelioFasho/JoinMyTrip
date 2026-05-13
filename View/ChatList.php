<?php
$chats = $chats ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Chats</title>

<style>

html, body {
    margin: 0;
    padding: 0;
    height: 100%;

    font-family: Arial, sans-serif;

    background: linear-gradient(to bottom, #000000, #001f3f);

    color: white;
}


.header {
    padding: 18px;

    font-size: 24px;
    font-weight: bold;

    background: rgba(0,0,0,0.85);

    backdrop-filter: blur(10px);

    border-bottom: 1px solid rgba(255,255,255,0.08);

    position: sticky;
    top: 0;
    z-index: 100;
}


.chat-list {
    display: flex;
    flex-direction: column;

    padding: 12px;

    gap: 12px;
}


.chat-link {
    text-decoration: none;
    color: inherit;
}


.chat-item {
    display: flex;
    align-items: center;

    padding: 14px;

    border-radius: 20px;

    background: rgba(255,255,255,0.06);

    border: 1px solid rgba(255,255,255,0.04);

    transition: all 0.25s ease;

    cursor: pointer;
}


.chat-item:hover {

    transform: translateY(-2px);

    background: rgba(255,255,255,0.10);

    box-shadow: 0 8px 20px rgba(0,0,0,0.35);
}


.avatar {
    width: 55px;
    height: 55px;

    border-radius: 50%;

    background: linear-gradient(
        135deg,
        #0095f6,
        #00c6ff
    );

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
    font-weight: bold;

    color: white;

    margin-right: 14px;

    flex-shrink: 0;

    box-shadow: 0 0 12px rgba(0,149,246,0.4);

    position: relative;
}


.avatar::after {
    content: "";

    position: absolute;

    bottom: 2px;
    right: 2px;

    width: 12px;
    height: 12px;

    border-radius: 50%;

    background: #00d26a;

    border: 2px solid #001f3f;
}


.chat-info {
    flex: 1;

    min-width: 0;
}


.chat-name {
    font-size: 16px;
    font-weight: bold;

    margin-bottom: 5px;
}


.chat-last {
    font-size: 14px;

    color: #b0b3b8;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


.chat-meta {

    display: flex;
    flex-direction: column;
    align-items: flex-end;

    gap: 6px;

    margin-left: 10px;

    flex-shrink: 0;
}


.chat-time {
    font-size: 12px;
    color: #999;
}


.unread {
    background: #0095f6;

    color: white;

    border-radius: 50px;

    min-width: 22px;
    height: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0 6px;

    font-size: 12px;
    font-weight: bold;

    box-shadow: 0 0 10px rgba(0,149,246,0.5);
}


.empty {
    text-align: center;

    margin-top: 100px;

    color: #999;

    font-size: 16px;
}

</style>
</head>

<body>

<div class="header">
    Chats
</div>

<div class="chat-list">

<?php if (empty($chats)): ?>

    <div class="empty">
        No chats yet.
    </div>

<?php endif; ?>


<?php foreach ($chats as $chat): ?>

    <a
        class="chat-link"
        href="index.php?chatId=<?= $chat['id'] ?>"
    >

        <div class="chat-item">

            <div class="avatar">
                <?= strtoupper(substr($chat['name'], 0, 1)) ?>
            </div>


            <div class="chat-info">

                <div class="chat-name">
                    <?= htmlspecialchars($chat['name']) ?>
                </div>

               <div class="chat-last">

    <?php if (!empty($chat['last_message'])): ?>

        <?php
            $isMe = isset($_SESSION['user_id']) && $chat['last_sender_id'] == $_SESSION['user_id'];
        ?>

        <?= $isMe ? "You" : htmlspecialchars($chat['last_sender_name'] ?? $chat['name']) ?>:

        <?= htmlspecialchars($chat['last_message']) ?>

    <?php else: ?>

        Start chatting...

    <?php endif; ?>

                </div>

            </div>


            <div class="chat-meta">

                <div class="chat-time">
                    <?= $chat['time'] ?? '' ?>
                </div>

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