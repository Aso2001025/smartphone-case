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
    <title>注文履歴</title>
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <h1>order</h1>

    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607', 'Pass2525');

    $sql = $pdo->prepare('select * from d_purchase where customer_code=?');
    $sql->execute([$_SESSION['name']]);
    echo '<div name="content">';

    foreach($sql as $item){

        echo '<div name="item">';
            echo '<form action="Order_details.php" method="post">';
            echo '<p>注文番号：',$item['order_id'],'</p>';
            echo '<input type="hidden" name="order" value="',$item['order_id'],'" >';
            echo '<p>注文日：',$item['purchase_date'],'</p>';
            echo '<p>合計金額：',$item['total_price'],'円</p>';
            echo '<button type="submit">注文詳細へ</button>';
            echo '</form>';

            $sql2=$pdo->prepare('select p.design_code as design,design_name,design_image
                                        from d_purchase_detail p,d_design d
                                        where p.design_code=d.design_code and order_id=?');
            $sql2->execute([$item['order_id']]);
            foreach ($sql2 as $item2){
                echo '<form action="syousai.php" method="post">';
                echo '<input type="hidden" name="design" value="',$item2['design'],'" >';
                echo '<input type="image" src="',$item2['design_image'],'" alt="送信する">';
                echo '<p>',$item2['design_name'],'</p>';
                echo '</form>';
            }

        echo '</div>';
    }



    echo '</div>';

    ?>
</main>



</body>
</html>

