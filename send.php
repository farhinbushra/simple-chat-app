<?
session_start();
require 'inculde/db.php';
if (!isset($_SESSION ['user_id'])
|| empty($_POST['content']));
{
    header("loaction:login.php");
    exit;
}
$stmt=$pdo->prepare("INSERT INTO messeges(sender_id, content)VALUES(?,?)");
$stmt=$pdo->execute([$_SESSION['user_id'],$_POST['content']]);
header("Location:chat.php");
exit;