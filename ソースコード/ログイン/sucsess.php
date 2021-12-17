<?php session_start() ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<main>
    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
    dbname=LAA1290607-smartphone;charset=UTF8',
        'LAA1290607',
        'Pass2525');
    //前ページの情報を取得
    $mail = $_POST["mail"];
    $pass = $_POST["password"];

    //ログイン用SQL
    $sql=$pdo->prepare('SELECT customer_code FROM m_customers WHERE mail=? AND pass=?');
    //値を代入
    $sql->execute([$mail,$pass]);

    if($sql->rowCount() > 0){//成功した場合
        echo '成功';
        foreach($sql as $item){
            //セッション変数に顧客番号を保存
            $_SESSION['name']=$item['customer_code'];
        }
        //トップページに戻る
        echo '<META http-equiv="Refresh" content="0.1;URL=toppage.php">';
    }else{//失敗した場合
        echo '失敗<br>';
        echo 'もう一度入力し直して下さい';
        echo '<a href="login.php">ログイン画面に戻る</a>';
    }

    $pdo = null;
    ?>
</main>
</body>
</html>