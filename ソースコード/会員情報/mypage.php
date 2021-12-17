<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mypage.css">
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <h1 class="userinformation">マイページ</h1>
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
        echo '<p class="username">ようこそ <strong>',$row['nickname'],'</strong> さん</p>';
    }


    ?>
    <!--    各変更画面へ遷移-->
    <p><a href="user_information.php" class="btn">  ユーザ情報編集</a></p>
    <p><a href="editAddress-in.php" class="btn">  宛先住所変更</a></p>
    <p><a href="paymethod.php" class="btn">  支払い方法編集</a></p>
    <p><a href="logout.php" class="btn">  ログアウト</a></p>
</main>
</body>
</html>
