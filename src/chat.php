<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>
<?php require "module/showchat.php"; ?>


<script src="module/js/jquery.js" ></script>
<script src="module/js/updatechat.js"></script>

<?php

if(!isset($_POST['chatroom_id'])){
    echo 'チャットルームIDが指定されていません。新しく個人チャットを作成します';
    $pdo = new PDO($connect,user,pass);
    $other_user_id = $_POST['other_user_id'];
    $user_id = $_POST['user_id'];
    $newchatroom_id = $pdo->query("SELECT MAX(chatroom_id)+1 as newid FROM chatroom;");
    $newchatroom_id = $newchatroom_id->fetchAll()[0]['newid'];

    echo 'ユーザID : ' , $user_id , ' 相手のユーザID : ', $other_user_id , ' 新しいチャットルームID : ', $newchatroom_id ;

    $sql = $pdo->prepare("INSERT INTO chatroom(chatroom_id,user_id) VALUES(?,?),(?,?)");
    $sql->execute([$newchatroom_id,$user_id,$newchatroom_id,$other_user_id]);

    $chatroom_id = $newchatroom_id;

}else{
    $chatroom_id = $_POST['chatroom_id'];
}

?>

<div class="content">
    <a href="chatrooms.php"><h2>戻る</h2></a>
    <h1>チャット画面 </h1>
    <h1>(チャットルームID:<?= $chatroom_id ?>)</h1>

    <div id="ajax">

    <?php

    showchat($connect,$chatroom_id);

    ?>

    </div>


    <input type="hidden" id="chatroom_id" value=<?= $chatroom_id?> >
    <input type="hidden" id="user_id" value=<?= $_SESSION['user']['user_id'] ?> >
    <div style="position:absolute; bottom:128px; margin-left:25%; width:50%; height:32px;" ><input id="message" type="text"><button id="sendbutton">送信</button></div>

</div>

<script src="module/js/sendmessage.js"></script>

<?php require "module/footer.php"; ?>