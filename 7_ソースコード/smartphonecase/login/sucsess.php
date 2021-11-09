<?php session_start() ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<?php require 'header.php'?>
<body>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
dbname=LAA1290607-smartphone;charset=UTF8',
    'LAA1290607',
    'Pass2525');

$mail = $_POST["mail"];
$pass = $_POST["password"];
$seid = $_POST["hidden"];

$sql=$pdo->prepare('SELECT customer_code FROM m_customers WHERE mail=? AND pass=?');
$sql->execute([$mail,$pass]);
if($sql->rowCount() > 0){
    echo '成功';
    echo '<META http-equiv="Refresh" content="3;URL=index.html">';
}else{
    echo '失敗<br>';
    echo 'もう一度入力し直して下さい';
    echo '<META http-equiv="Refresh" content="3;URL=login.php">';
}
foreach($sql as $item){
    $_SESSION["name"] = $item["customer_code"];
    echo $_SESSION['name'];
}
$pdo = null;
?>
</body>
</html>