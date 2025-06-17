<?php
session_start();
require __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: chat.php");
        exit;
    } else {
        echo "Invalid credentials!";
    }
}
?>

<form method="POST">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>