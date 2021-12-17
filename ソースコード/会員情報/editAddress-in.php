<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>editAddress</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/infometion.css">
</head>
<body>
<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <div class="bg-color">
    <h2>住所変更</h2>

    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
    dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607',
        'Pass2525');

    $sql = $pdo->prepare('select address from m_customers where customer_code = ?');
    $sql->execute([$_SESSION['name']]);

    echo '<form action="editAddress-result.php" method="post">';
    foreach($sql as $item){
        echo '<p><input type="text" name="address" value="',$item['address'],'"></p>';
    }
    echo '<button type="submit">更新</button>';
    echo '</form>';

    $pdo=null;
    ?>
    </div>
</main>
</body>
</html>