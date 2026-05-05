<?php
$messages = $messages ?? [];
?>
<a href="index.php">⬅ Back</a>

<h2>Chat</h2>

<div>
<?php foreach ($messages as $msg): ?>
    <div>
        <b><?= $msg['name'] ?>:</b> <?= $msg['message'] ?>
    </div>
<?php endforeach; ?>
</div>

<form method="POST" action="send.php">
    <input type="hidden" name="chatId" value="<?= $_GET['chatId'] ?>">
    <input type="text" name="message" required>
    <button>Send</button>
</form>