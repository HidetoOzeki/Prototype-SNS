<?php
/*phpで新しいチャットルームを作るまたは既存のチャットルームのIDを返す */
require "DBconnect.php";

$other_user_id = $_POST['other_user_id'];
$user_id = $_POST['user_id'];

$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare("select chatroom from chatroom where user_id = ? ");


?>