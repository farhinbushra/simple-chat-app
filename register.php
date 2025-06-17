<?
session_start();
require 'include/db.php';
if($_SERVER['Request_method']==='post'){
    $username=$_POST['username'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $stmt=$pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$usernamer,$password]);
    $_SESSION['user_id']=$pdo->lastInsertId();
    $_SESSION['username'] = $username;
    header("Location:chat.php");
    exit;
}
?>
<form method="$_POST">
<input type="text" name="username"placeholder="Username"required>
<input type="password" name="password"placeholder="Password"required>
<input type="submit">Register</button>

</form>