<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--あとでcssで整える-->
<h1>支払い方法追加画面</h1>
<?php require 'header.php'?>
<form method="post" action="payjudge.php">
    カード番号<input type="text" name="card">
    <button type="submit">追加</button>
</form>
<a href="paymethod.php">戻る</a>
</body>
</html>