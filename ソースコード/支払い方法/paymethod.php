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
    <a href="payinsert.php">追加</a><br>
    <a href="paydelete.php">削除</a><br>
</body>
<a href="mypage.php">戻る</a>
</main>
</html>