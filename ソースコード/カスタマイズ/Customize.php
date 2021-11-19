<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Customize_main.css">
    <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
    <script src="script/fabric.min.js"></script>
</head>

<body>

<?php require 'header.php';?>

<main>

    <p class="preview">preview</p>

    <canvas id="myCanvas" width="220" height="436" style="border:3px solid #aaa"></canvas>

    <form method="post" enctype="multipart/form-data" action="">
        <input type="file" name="up">
        <input type="submit" value="アップロード">
    </form>

</main>

<footer id="footer">
</footer>

</body>

</html>