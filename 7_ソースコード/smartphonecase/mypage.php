<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <script src="header.js"></script>
</header>
<?php require 'header.php';?>
<h1>My page</h1>
<p>--------------------------------------------------</p>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 

dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607',
    'Pass2525');
$sql=$pdo->prepare('select image from m_customers where customer_code=?');
$sql->execute([$_SESSION['user']['name']]);
foreach ($sql as $row){
    $img= $row['image'];
    echo '<img src="',$img,'"><br>';
}


?>

<a href="user%20information.php"><ユーザ情報編集></a><br>
<a href="change%20of%20address.php"><宛先住所変更></a><br>
<a href="Change%20payment%20method.php"><支払い方法編集></a><br>
<a href="logout.php"><ログアウト></a><br>
</body>
</html>
