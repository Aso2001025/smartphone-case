<?php session_start() ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--あとでcssで整える-->
<h1>ログイン</h1>
<?php require 'header.php'?>
<form method="post" action="sucsess.php">
    <p>メール</p>
    <p><input type="text" name="mail" value="sample@gmail.com"></p>
    <p>パスワード</p>
    <p><input type="password" name="password" value="Pass2525"></p>
    <p><input type="hidden" name="hidden" value="session_id">
    <p><button type="submit">ログイン</button></p>
    <p><a href="">パスワードを忘れた方</a></p>
    <p><a href="">アカウント新規作成はこちら</a></p>
</form>
</body>
</html>