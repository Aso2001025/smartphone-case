<?php session_start(); ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Header Sample</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/top_main.css">
    <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>

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

<main>
    <div class="center">
        <p>
            <a href="choise_model.php">世界に一つだけ。自分だけのスマホケースを作ろう→START</a>
        </p>
    </div>
    <div class="phone"><img src="img/group 6.png" alt="phone"></div>
    <div class="phone2"><img src="img/Group 5.png" alt="phone2"></div>
</main>
<footer id="footer">
</footer>
</body>
</html>