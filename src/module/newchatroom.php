<?php
/*phpで新しいチャットルームを作るまたは既存のチャットルームのIDを返す */
require "DBconnect.php";

$other_user_id = $_POST['other_user_id'];
$user_id = $_POST['user_id'];

$pdo = new PDO($connect,user,pass);
$newchatroom_id = $pdo->query("SELECT MAX(chatroom_id)+1 as newid FROM chatroom;");
$newchatroom_id = $newchatroom_id[0]['newid'];
$sql = $pdo->prepare("INSERT INTO chatroom(chatroom_id,user_id) values(?,?),(?,?)");
$sql->execute([$newchatroom_id,$user_id,$newchatroom_id,$other_user_id]);

?>