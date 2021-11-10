<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート内</title>
</head>
<body>

    <?php require 'header.php'; ?>
    <h1>カート</h1>

    <?php
        $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8', 
        'LAA1290607', 'Pass2525');


        $sql = $pdo->prepare('select c.design_code as design,design_image,num from d_cart c,d_design d
                                    where c.design_code=d.design_code and c.customer_code=?
                                    and del_flag=0');
        $sql->execute([$_SESSION['user']['name']]);
        echo '<div name="content">';
        foreach($sql as $item){
            echo '<div name="item">';
            echo '<form action="cart-num.php" method="post">';
            echo '<img src="',$item['design_image'],'" name="design_image"><br>';
            echo '<input type="number" name="num" value="',$item['num'],'" readonly>';
            $_SESSION['user']['design'] = $item['design'];
            echo '<button type="submit" name="plus" value="plus">+</button>';
            echo '<button type="submit" name="minus" value="minus">-</button>';
            echo '</form>';
            echo '<form method="post" name="delete" action="cart_delete.php.php">';
            echo '<a href="cart_delete.php" onclick="document.delete.submit();">delete</a>';
            echo '</form>';
            echo '</div>';
        }

        echo '<a href="">購入へ進む</a>';
        echo '</div>';

        ?>



</body>
</html>

