<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>SmartphooneCase</title>
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php
    //ログインしているときの画面
    if(isset($_SESSION['name'])){
         require 'header.php';
    }else{
        //ログインしていない時の画面
        require  'header2.php';
    }
    ?>




<div class="smartphone"><a href="<!-- 作成リンク -->"><img src="img/iphone.png" alt="smartphone"><!--
 ？の画像データ--></a></div>
</body>
</html>