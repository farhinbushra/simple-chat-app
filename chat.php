<?php
// MUST be the very first thing in the file
error_reporting(E_ALL);  // Enable error display (remove in production)
ini_set('display_errors', 1);

session_start();  // Start the session
require __DIR__ . 'db.php';  // Adjust path as needed

if (!isset($_SESSION['user_id'])) {
    die("Redirecting to login - session user_id not set");  // Debug message
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <style>
        #chat { height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px; }
        .message { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
    
    <div id="chat">
        <?php foreach ($messages as $msg): ?>
            <div class="message">
                <strong><?= htmlspecialchars($msg['username']) ?>:</strong>
                <?= htmlspecialchars($msg['content']) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <form action="send.php" method="POST">
        <input type="text" name="content" placeholder="Type your message..." required>
        <button type="submit">Send</button>
    </form>
</body>
</html>