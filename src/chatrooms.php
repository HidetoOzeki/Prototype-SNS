<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>

<?php

$pdo = new PDO($connect,user,pass);

if(!empty($_POST)){
    $user_id = $_SESSION['user']['user_id'];
    $other_id = $_POST['user_id'];

}else{

}

?>

<div class="content">

<h1 style="text-align:center; margin-top:10vh;">チャットルーム</h1>

<?php

$sql = $pdo->prepare("select chatroom_id from chatroom where user_id = ?");

$sql->execute([$_SESSION['user']['user_id']]);

foreach($sql as $results){

    echo '<form action="chat.php" method="post">
    <input type="hidden" name="chatroom_id" value="',$results['chatroom_id'],'">';

    echo '<div type="submit" style="width:100%; height:100px; border:1px solid black;" class="chatroom_list_indiv">';

    echo 'チャットルームID : ', $results['chatroom_id'];
    echo '<button type="submit" >チャット開始</button>';

    $query = $pdo->prepare("select user_id from chatroom where chatroom_id = ?");
    $query->execute([$results['chatroom_id']]);

    echo '<br>';

    foreach($query as $users){
        echo '<div style="display:flex; float:left;">';
        $img_path_query = $pdo->prepare("SELECT user_image_path FROM user WHERE user_id = ?");
        $img_path_query->execute([$users['user_id']]);
        $img_path = $img_path_query->fetchAll()[0]['user_image_path'];
        echo '<img class="icon_small" src="uploads/',$img_path,'" alt="">';
        echo '</div>';
    }

    echo '</div>';

    echo '</form>';

}

$group_query = "SELECT * FROM user WHERE user_id IN (SELECT user_id FROM chatroom WHERE chatroom_id = 2);";

?>
    
</form>

</div>

<?php require "module/footermenu.php"; ?>

<?php require "module/footer.php"; ?>