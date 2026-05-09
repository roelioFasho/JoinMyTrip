<?php
$messages = $messages ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Chat</title>

<style>

html, body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #000000, #001f3f);
    color: white;
}

/* HEADER (like WhatsApp / IG DM top bar) */
.chat-header {
    display: flex;
    align-items: center;
    padding: 15px;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.1);
    position: sticky;
    top: 0;
}

.back-btn {
    margin-right: 15px;
    text-decoration: none;
    color: #00aaff;
    font-size: 22px;
}

.chat-user {
    font-weight: bold;
    font-size: 16px;
}

/* CHAT AREA */
.chat-container {
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;

    height: calc(100vh - 140px);
    overflow-y: auto;
}

/* MESSAGE BUBBLES */
.message {
    max-width: 70%;
    padding: 10px 14px;
    border-radius: 18px;
    font-size: 14px;
    word-wrap: break-word;
    line-height: 1.4;
}

/* OTHER USER (left like WhatsApp) */
.other {
    background: rgba(255,255,255,0.1);
    align-self: flex-start;
    border-top-left-radius: 5px;
}

/* YOU (right side like Instagram DM) */
.me {
    background: #0095f6;
    color: white;
    align-self: flex-end;
    border-top-right-radius: 5px;
}

/* INPUT BAR (modern fixed bottom bar) */
.message-form {
    position: fixed;
    bottom: 0;
    width: 100%;
    display: flex;
    padding: 10px;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(255,255,255,0.1);
}

.message-input {
    flex: 1;
    padding: 12px;
    border-radius: 25px;
    border: none;
    outline: none;
    background: #111;
    color: white;
}

.message-input:focus {
    box-shadow: 0 0 5px #00aaff;
}

.send-btn {
    margin-left: 10px;
    border: none;
    background: #0095f6;
    color: white;
    padding: 0 18px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: bold;
}

.send-btn:hover {
    background: #007dd1;
}

</style>
</head>

<body>

<div class="chat-header">
    <a class="back-btn" href="index.php?chats=1">←</a>
    <div class="chat-user">Trip Chat</div>
</div>

<div class="chat-container">

<?php foreach ($messages as $msg): ?>

    <!-- IMPORTANT: you should later switch between "me" and "other" dynamically -->
    <div class="message other">
        <b><?= htmlspecialchars($msg['name']) ?></b><br>
        <?= htmlspecialchars($msg['message']) ?>
    </div>

<?php endforeach; ?>

</div>

<form class="message-form" method="POST" action="send.php">

    <input type="hidden" name="chatId" value="<?= $_GET['chatId'] ?>">

    <input
        class="message-input"
        type="text"
        name="message"
        placeholder="Message..."
        required
    >

    <button class="send-btn">Send</button>

</form>

</body>
</html>