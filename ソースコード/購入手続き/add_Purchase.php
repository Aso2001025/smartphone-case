<?php
session_start();

$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');
$customer_code=$_SESSION['name'];
$date = date("y-m-d");
$total=$_POST['total'];
if(isset($_POST['pay_code'])){
    $sql=$pdo->prepare('insert into d_purchase values("",?,?,null,?,?)');
    $sql->execute([$customer_code,$_POST['pay_code'],$date,$total]);
}else{
    $sql=$pdo->prepare('insert into d_purchase values("",?,null,?,?,?)');
    $sql->execute([$customer_code,$_POST['convenience'],$date,$total]);
}

$sql=$pdo->prepare('select MAX(order_id) as order_id from d_purchase where customer_code=?');
$sql->execute([$customer_code]);
$order_id;
foreach ($sql as $item){
    $order_id = $item['order_id'];
}
$sql=$pdo->prepare('select design_code,num,price from d_cart where customer_code=? and del_flag=0');
$sql->execute([$customer_code]);
$i=1;

foreach ($sql as $item){
    $num=$item['num'];
    $price = $item['price'];
    $design=$item['design_code'];
    $sql2 = $pdo->prepare('insert into d_purchase_detail values(?,?,?,?,?)');
    $sql2->execute([$order_id,$i,$design,$price,$num]);
    $i++;
    $sql2 = $pdo->prepare('delete from d_cart where customer_code=? and design_code=?');
    $sql2->execute([$customer_code,$design]);
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Purchase_main.css">
    <!--    <script src="js/Purchase.js"></script>-->
    <title>購入手続き</title>
</head>
<body>
    <?php require 'header.php'; ?>
    <main>
        <p>購入が完了しました</p>
        <a href="toppage.php">買い物を続ける</a>
    </main>
</body>
</html>
