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
    <title>カート内</title>
</head>
<body>

    <?php require 'header.php';
    if(!isset($_SESSION['name'])){
        echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
    }
    ?>
    <main>
    <h1>カート</h1>

    <?php
        $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8', 
        'LAA1290607', 'Pass2525');

        //カートテーブルから値を取得するSQL
        $sql = $pdo->prepare('select c.design_code as design,design_name,design_image,num,price
                                    from d_cart c,d_design d
                                    where c.design_code=d.design_code and c.customer_code=?
                                    and del_flag=0');
        //セッション変数に登録されている顧客番号を取得
        $sql->execute([$_SESSION['name']]);
        echo '<div name="content">';
        $flag=false;
        foreach($sql as $item){
            //商品ごとの画像と数量を取得
            echo '<div name="item">';
            echo '<form action="syousai.php" method="post">';
            echo '<input type="hidden" name="design" value="',$item['design'],'" >';
            echo '<input type="image" src="',$item['design_image'],'" alt="送信する">';
            echo '<p>',$item['design_name'],'</p>';
            echo '<p>単価: ',$item['price'],'円</p>';
            echo '</form>';
            echo '<form action="cart-num.php" method="post">';
            echo '<input type="number" name="num" value="',$item['num'],'" readonly>';
            //デザインコードを保存
            echo '<input type="hidden" name="design" value="',$item['design'],'" >';
            //数量を変更するページへ遷移
            echo '<button type="submit" name="plus" value="plus">+</button>';
            echo '<button type="submit" name="minus" value="minus">-</button>';
            echo '</form>';
            echo '<p>合計: ',$item['price']*$item['num'],'円</p>';
            //カートから削除するページへ遷移
            echo '<form action="cart_delete.php" method="post" name="delete">';
            echo '<input type="hidden" name="design_code" value="',$item['design'],'" >';
            echo '<button type="submit" name="delete" value="delete">delete</button>';
            echo '</form>';
            echo '</div>';
            $flag=true;
        }

        //購入画面へ遷移
        if($flag){
            echo '<a href="Purchase.php">購入へ進む</a>';
        }else{
            echo '<p>カートに商品がありません</p>';
        }

        echo '</div>';

        ?>
    </main>



</body>
</html>

