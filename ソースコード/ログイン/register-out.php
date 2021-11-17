
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>register-out</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<main>
    <?php
    //DB接続
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
    dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607',
        'Pass2525');

    //前ページからの情報を保存
    $data = date("y-m-d");
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $password=$_POST['pass'];

    $flag = false;
    $flagErr = true;

    //メールアドレスの確認
    foreach ($pdo->query('select * from m_customers') as $item) {
        //登録済みのメールアドレスを除外
        if($item['mail'] == $mail ){
            $flag = true;
            break;
        }
    }
    if($flag){
        echo '<p>このメールアドレスは既に登録されています。</p>';
    }else if(!preg_match('/(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]){8,100}/',$password)){//パスワードの確認
        //仕様を満たさないパスワードを除外
        echo '半角英数字大文字？を含むパスワードを入力してください';
    }else if($password!=$_POST['pass2']){
        //確認ようパスワードが違うものを除外
        echo '再確認用パスワードが違います。';
    }else{
        //カスタマーコードの生成
        $customer_code = ($pdo->query('select MAX(customer_code) from m_customers'));
        $new_customer_code = $customer_code -> fetch(PDO::FETCH_COLUMN);
        $new_customer_code++;
        //DB登録SQL作成
        $sql=$pdo->prepare("insert into m_customers value(?,?,null,?,null,null,null,?,0,?)");
        //値を代入
        $res=$sql->execute([$new_customer_code,$password,$name,$mail,$data]);
        if($res){
            $flagErr = false;
            echo '登録完了';
        }
    }

    //登録失敗した場合の遷移先
    if($flagErr){
        echo '<a href = "register-in.php">入力画面に戻る</a>';
    }else{
        echo '<a href = "login.php">ログイン画面に移動</a>';
    }

    //DB切断
    $pdo = null;
    ?>
</main>
</body>
</html>