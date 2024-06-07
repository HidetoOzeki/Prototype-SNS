<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>

<h1 style="text-align:center; margin-top:10vh;">サインイン</h1>

<?php

$name = $_POST['user_name'];
$password = $_POST['user_password'];

$pdo = new PDO($connect,user,pass);
$sql = $pdo->prepare("select * from user where user_name = ?");
$sql->execute([$name]);

if(empty($sql->fetchAll())){

    $insert_sql = $pdo->prepare('INSERT INTO user(user_name,user_password,user_image_path) VALUES( ? , ? , ?)');

    if($insert_sql->execute([$name,$password,"GraceDev.png"])){

        echo "ユーザー登録に成功しました";

        echo '<a href="login.php">ログイン画面へ</a>';

    }else{
        echo "ユーザー登録に失敗しました";
    }

}else{
    echo "同じユーザネームのユーザが存在します";
}



?>

<?php require "module/footer.php"; ?>