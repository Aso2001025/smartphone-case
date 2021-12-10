<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!--あとでcssで整える-->
<?php require 'header.php'?>
<main>
<h1>支払い方法追加画面</h1>
<?php
$pdo=new PDO('mysql:host=mysql153.phy.lolipop.lan;
            dbname=LAA1290602-school2;charset=utf8',
    'LAA1290602',
    'school');

$sql=$pdo->prepare('delete from m_credit where card_number=?');
$sql->bindValue(1,$_POST['card'],PDO::PARAM_STR);
$sql->execute();
echo '削除完了しました<br>';
echo '<META http-equiv="Refresh" content="3;URL=paymethod.php">';
$pdo = null;
?>
</main>
</body>
</html>