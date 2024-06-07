<?php require "module/DBconnect.php"; ?>
<?php require "module/header.php"; ?>

<h1 style="text-align:center; margin-top:10vh;">サインイン</h1>

<form action="signin_output.php" method="POST">
<div style="text-align:center; calc(1em + 1vw); margin-top:10vh;">

<form action="signin_output.php" method="POST">

<input class="inputtext" type="text" placeholder="ユーザーネーム" name="user_name" >
<br>
<input class="inputtext" type="text" placeholder="パスワード" name="user_password" >
<br>

<button type="submit" class="simple_big_button">Go</button>
    
</form>

</div>
</form>

<?php



?>

<?php require "module/footer.php"; ?>