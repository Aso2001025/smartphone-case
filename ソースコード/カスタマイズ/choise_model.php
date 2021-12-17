<?php session_start(); ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/choise_main.css">
    <meta name=”viewport” content=”width=device-width,initial-scale=1.0″>
</head>
<body>
<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
        <h2>機種を選択</h2>
    <form action="Customize.php" method="post">
        <?php
        $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
                    dbname=LAA1290607-smartphone;charst=UTF8',
            'LAA1290607', 'Pass2525');
        $sql=$pdo->query('select model_code,model_name from m_model order by model_name');
        foreach ($sql as $item){
            echo '<button type="submit" name="model_name" value="',$item['model_code'],'" >',$item['model_name'],'</button>';
        }
        ?>

    </form>
</main>
<footer id="footer">
</footer>
</body>
</html>