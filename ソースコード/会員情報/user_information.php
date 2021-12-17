<?php session_start();?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/infometion.css">

</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <div class="bg-color">
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
dbname=LAA1290607-smartphone;charst=UTF8',
'LAA1290607',
'Pass2525');

echo '<h2>ユーザ情報編集</h2>';

echo'<form action="user_information.out.php" method="post" enctype="multipart/form-data">';

$sql=$pdo->prepare('select * from m_customers where customer_code=?');
$sql->bindvalue(1,$_SESSION['name']);
$sql->execute();

foreach($sql as $row){
    $name=$row['nickname'];
    $mail=$row['mail'];
    $pass=$row['pass'];
    echo 'ユーザ画像<br><input type="file"  name="user_image"><br>';
    echo 'ユーザ名<br><input type="text" name="nickname" value=',$name,'><br>';
    echo 'メール<br><input type="text" name="mail" value=',$mail,'><br>';
    echo 'パスワード<br><input type="password" name="pass" value=',$pass,'><br>';
    echo 'パスワード再入力<br><input type="password" name="pass2" ><br><br>';
}

$pdo=null;

   echo' <button type="submit">変更</button>';
?>

</form>
    </div>
</main>
</body>
</html>