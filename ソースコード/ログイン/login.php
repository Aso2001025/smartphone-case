
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
    <h1>ログイン</h1>
    <form method="post" action="sucsess.php">
        <p>メール</p>
<!--        メールアドレス入力欄-->
        <p><input type="email" name="mail" value=""></p>
        <p>パスワード</p>
<!--        パスワード入力欄-->
        <p><input type="password" name="password" value=""></p>
<!--        ログイン処理ページへ遷移-->
        <p><button type="submit">ログイン</button></p>
        <p><a href="">パスワードを忘れた方</a></p>
        <p><a href="register-in.php">アカウント新規作成はこちら</a></p>
    </form>
</main>
</body>
</html>