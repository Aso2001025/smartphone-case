
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--あとでcssで整える-->
<h1>ログイン</h1>
<?php require 'header.php'?>
<form method="post" action="sucsess.php">
    <p>メール</p>
    <p><input type="text" name="mail" value=""></p>
    <p>パスワード</p>
    <p><input type="password" name="password" value=""></p>
    <p><button type="submit">ログイン</button></p>
    <p><a href="">パスワードを忘れた方</a></p>
    <p><a href="register-in.php">アカウント新規作成はこちら</a></p>
</form>
</body>
</html>