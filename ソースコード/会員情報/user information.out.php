<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form action="user%20information.php">
    <?php
    error_reporting(E_ALL & ~E_NOTICE);
    ?>
    <?php
    if(is_uploaded_file($_FILES['user_image']['tmp_name'])){

        if(!file_exists('user_image')){
            mkdir('user_image');
        }
        //$fillにimageの名前を挿入
        $file='user_image/'.basename($_FILES['user_image']['name']);

        //画像をロりポップにアップロード
        if(move_uploaded_file($_FILES['user_image']['tmp_name'],$file)){

            echo $file,'のアップロードに成功しました。';
            echo'<p><img src="',$file,'"></p>';

        }else{
            echo'アップロードに失敗しました。';
        }
    }

$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607',
    'Pass2525');


//画像をデータべースに入れる
$files=basename($_FILES['user_image']['name']);
$sql=$pdo->prepare('INSERT INTO d_image(customer_code,image_name) VALUE(?,?)');

$sql->bindValue(1,$_SESSION['name'],PDO::PARAM_STR);
$sql->bindValue(2,$files,PDO::PARAM_STR);
$sql->execute();


//ユーザ名、メール、パスワードの変更しデータベースに反映させるSQL
$sql=$pdo->prepare('update m_customers set nickname=?,mail=?,pass=?,image=? where customer_code=?');
$sql->bindValue(1,$_POST['nickname'],PDO::PARAM_STR);
$sql->bindValue(2,$_POST['mail'],PDO::PARAM_STR);
$sql->bindValue(3,$_POST['pass'],PDO::PARAM_STR);
$sql->bindValue(4,$file,PDO::PARAM_STR);
$sql->bindValue(5,$_SESSION['name'],PDO::PARAM_STR);

$sql->execute();
if($sql->rowCOunt()>0) {

    echo '更新完了<br>';
}else{
    echo '更新エラー';
}


$pdo=null;


?>
    <a href="mypage.php">My pageに戻る</a>
</form>
</body>
</html>
