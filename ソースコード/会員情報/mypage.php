<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php require 'header.php';?>
<main>
    <h1>My page</h1>
    <p>--------------------------------------------------</p>
    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607', 'Pass2525');
    //会員の情報を取得するSQL
    $sql=$pdo->prepare('select image,nickname from m_customers where customer_code=?');
    //セッション変数から顧客番号を取得
    $sql->execute([$_SESSION['name']]);
    //会員情報表示
    foreach ($sql as $row){
        $img= $row['image'];
        echo '<img src="',$img,'"><br>';
        echo '<p>',$row['nickname'],'</p>';
    }


    ?>
    <!--    各変更画面へ遷移-->
    <a href="user%20information.php"><ユーザ情報編集></a><br>
    <a href="change%20of%20address.php"><宛先住所変更></a><br>
    <a href="Change%20payment%20method.php"><支払い方法編集></a><br>
    <a href="logout.php"><ログアウト></a><br>
</main>
</body>
</html>
