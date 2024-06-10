<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>
<script src="module/js/jquery.js"></script>

<div class="content">

<h1>ユーザー一覧</h1>

<?php
$pdo = new PDO($connect, user, pass);
$sql = $pdo->prepare("select * from user where user_id != ?");
$sql->execute([$_SESSION["user"]["user_id"]]);
foreach ($sql as $results) {
    echo '
    <div class="user_indiv_list" style="height:128px; border: 1px solid black;">
    <div>
        <img style="float:left; width:64px; height:64px;" class="icon_relative_horizontal" src="uploads/',
        $results["user_image_path"],
        '">
        ',
        $results["user_name"],
        '
        <form action="chat.php" method="post">
        
        <input type="hidden" name="user_id" value="',$_SESSION['user']['user_id'],'">
        <input type="hidden" name="other_user_id" value="',$results['user_id'],'">
        <button id="startchat">チャットする</button>
        </form>
    </div>
    </div>
    ';
}
//
//
?>



</div>

<script src="module/js/newchatroom.js"></script> 

<?php require "module/footermenu.php"; ?>

<?php require "module/footer.php"; ?>
