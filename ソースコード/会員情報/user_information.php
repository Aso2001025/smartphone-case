<?php session_start();?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
dbname=LAA1290607-smartphone;charst=UTF8',
'LAA1290607',
'Pass2525');

echo '<h1>ユーザ情報編集</h1>';

echo'<form action="user_information.out.php" method="post" enctype="multipart/form-data">';

$sql=$pdo->prepare('select * from m_customers where customer_code=?');
$sql->bindvalue(1,$_SESSION['name']);
$sql->execute();

foreach($sql as $row){
    $name=$row['nickname'];
    $mail=$row['mail'];
    $pass=$row['pass'];
    echo 'ユーザ画像：<input type="file"  name="user_image"><br>';
    echo 'ユーザ名：<input type="text" name="nickname" value=',$name,'><br>';
    echo 'メール：<input type="text" name="mail" value=',$mail,'><br>';
    echo 'パスワード：<input type="password" name="pass" value=',$pass,'><br>';
    echo 'パスワード再入力：<input type="password" name="pass2" ><br>';
}

$pdo=null;

   echo' <button type="submit">変更</button>';
?>

</form>
</main>
</body>
</html>