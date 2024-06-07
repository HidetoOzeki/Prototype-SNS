<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>

<?php

$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare("select user_image_path from user where user_id = ?");
$sql->execute([$_SESSION['user']['user_id']]);

$image_path = $sql->fetchAll()[0]['user_image_path'];

?>

<div class="content">

<h1 style="text-align:center; margin-top:10vh;">プロフィール</h1>

<img style="margin-left:auto; margin-right:auto;" class="icon_relative_vertical" src="uploads/<?=$image_path?>" alt="">

<h3><p style="text-align:center;" ><?=$_SESSION['user']['user_name']?></p></h3>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value=<?= $_SESSION['user']['user_id'] ?> >
    <input type="file" name="filetoupload" id="filetoupload">
    <input type="submit" name="submit" value="アップロード">
</form>

</div>

<?php require "module/footermenu.php"; ?>

<?php require "module/footer.php"; ?>