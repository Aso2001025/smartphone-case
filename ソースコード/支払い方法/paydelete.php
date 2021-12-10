<?php session_start(); ?>
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
<h1>支払い方法追加画面</h1>
<form method="post" action="paycheck.php">
    カード番号<input type="text" name="card">
    <button type="submit">削除</button>
</form>
<a href="paymethod.php">戻る</a>
</main>
</body>
</html>
