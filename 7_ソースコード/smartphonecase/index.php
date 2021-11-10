<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>SmartphooneCase</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if(isset($_SESSION['user'])){
     require 'header.php';
}else{
    require  'header2.php';
}
?>


<div class="smartphone"><a href="<!-- 作成リンク -->"><img src="img/iphone.png" alt="smartphone"><!--
 ？の画像データ--></a></div>
</body>
</html>