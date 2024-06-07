<?php session_start(); ?>
<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>

<h1 style="text-align:center; margin-top:10vh;">ログイン</h1>

<?php

if(empty($_POST)){
    
}else{
    $username = $_POST['user_name'];
    $userpass = $_POST['user_password'];

    $pdo = new PDO($connect,user,pass);
    $sql = $pdo->prepare("select * from user where user_name = ? and user_password = ?");
    $sql->execute([$username,$userpass]);
    $result = $sql->fetchAll();

    if(!empty($result)){

        $session_sql = $result[0];

        $_SESSION['user'] = [
            'user_id' => $session_sql['user_id'],
            'user_name' => $session_sql['user_name'],
            'user_password' => $session_sql['user_password'],
            'user_imagepath' => $session_sql['user_image_path'],
            'user_coordinate' => $session_sql['user_coordinate']
        ];

        header("location:profile.php");
        exit();

    }else{
        echo "ユーザーが存在しません";
    }
}

?>

<div style="text-align:center; calc(1em + 1vw); margin-top:10vh;">

<form action="login.php" method="post">

<input class="inputtext" name="user_name" type="text" placeholder="ユーザーネーム">
<br>
<input class="inputtext" name="user_password" type="text" placeholder="パスワード">
<br>
<button type="submit" class="simple_big_button">ログイン</button>
</div>

</form>

<?php require "module/footer.php"; ?>