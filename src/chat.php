<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>
<?php require "module/showchat.php"; ?>


<script src="module/js/jquery.js" ></script>

<div class="content">
    <a href="chatrooms.php"><h2>戻る</h2></a>
    <h1>チャット画面 (チャットルームID:<?= $_POST['chatroom_id'] ?>)</h1>

    <div id="ajax">

    <?php

    showchat($connect);

    ?>

    </div>


    <input type="hidden" id="chatroom_id" value=<?= $_POST['chatroom_id']?> >
    <input type="hidden" id="user_id" value=<?= $_SESSION['user']['user_id'] ?> >
    <div style="position:absolute; bottom:128px; margin-left:25%; width:50%; height:32px;" ><input id="message" type="text"><button id="sendbutton">送信</button></div>

</div>

<script src="module/js/sendmessage.js"></script>
<!--<script src="module/js/updatechat.js"></script>-->

<?php require "module/footer.php"; ?>