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
<form action="user%20information.php">

    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
        dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607',
        'Pass2525');

    $flag=false;
    $sql = $pdo->prepare('select mail from m_customers where customer_code<>?');
    $sql->execute([$_SESSION['name']]);
    foreach ($sql as $item){
        if($item['mail'] == $_POST['mail'] ){
            $flag = true;
            break;
        }
    }
    if($flag){
        echo '<p>このメールアドレスは既に登録されています。</p>';
    }else if(!preg_match('/(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]){8,100}/',$_POST['pass'])){//パスワードの確認
        //仕様を満たさないパスワードを除外
        echo '半角英数字大文字を含むパスワードを入力してください';
    }else if($_POST['pass']!=$_POST['pass2']){
        //確認ようパスワードが違うものを除外
        echo '確認用パスワードが違います。';
    }else {


        error_reporting(E_ALL & ~E_NOTICE);

        if (is_uploaded_file($_FILES['user_image']['tmp_name'])) {

            if (!file_exists('user_image')) {
                mkdir('user_image');
            }
            //$fillにimageの名前を挿入
            $file = 'user_image/' . basename($_FILES['user_image']['name']);

            //画像をロりポップにアップロード
            if (move_uploaded_file($_FILES['user_image']['tmp_name'], $file)) {

                echo $file, 'のアップロードに成功しました。';
                echo '<p><img src="', $file, '"></p>';

            } else {
                echo 'アップロードに失敗しました。';
            }
        }


//画像をデータべースに入れる
        $date = date("y-m-d");
        $files = basename($_FILES['user_image']['name']);
        $sql = $pdo->prepare('INSERT INTO d_image VALUE("",?,?,?,"",?)');

        $sql->execute([$_SESSION['name'],$files,$file,$date]);


//ユーザ名、メール、パスワードの変更しデータベースに反映させるSQL
        $sql;
        if (isset($file)) {
            $sql = $pdo->prepare('update m_customers set nickname=?,mail=?,pass=?,image=? where customer_code=?');
            $sql->bindValue(1, $_POST['nickname'], PDO::PARAM_STR);
            $sql->bindValue(2, $_POST['mail'], PDO::PARAM_STR);
            $sql->bindValue(3, $_POST['pass'], PDO::PARAM_STR);
            $sql->bindValue(4, $file, PDO::PARAM_STR);
            $sql->bindValue(5, $_SESSION['name'], PDO::PARAM_STR);
            $sql->execute();
        } else {
            $sql = $pdo->prepare('update m_customers set nickname=?,mail=?,pass=? where customer_code=?');
            $sql->bindValue(1, $_POST['nickname'], PDO::PARAM_STR);
            $sql->bindValue(2, $_POST['mail'], PDO::PARAM_STR);
            $sql->bindValue(3, $_POST['pass'], PDO::PARAM_STR);
            $sql->bindValue(4, $_SESSION['name'], PDO::PARAM_STR);
            $sql->execute();
        }


        if ($sql->rowCOunt() > 0) {

            echo '更新完了<br>';
        } else {
            echo '更新エラー';
        }
    }

$pdo=null;


?>
    <a href="mypage.php">マイページに戻る</a>
</form>
    </div>
</main>
</body>
</html>
