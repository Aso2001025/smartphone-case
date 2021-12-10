<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <title>My Design</title>
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
<h1>My Design</h1>

<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');


$sql = $pdo->prepare('select design_code,design_image,design_name from d_design
                            where customer_code=?');
$sql->execute([$_SESSION['name']]);
echo '<div name="content">';
foreach($sql as $item){
    echo '<div name="item">';
    echo '<form action="syousai.php" method="post">';
    echo '<input type="hidden" name="design" value="',$item['design_code'],'" >';
    echo '<input type="image" src="',$item['design_image'],'" alt="送信する">';
    echo '<p>',$item['design_name'],'</p>';
    echo '</form>';
    echo '</div>';
}

echo '</div>';

?>
</main>



</body>
</html>

