<?php
session_start();
?>
<DOCTYPE html>
<html rang="ja">
<head>
<meta charset="UTF-8">
    <title>詳細</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
<main>
    <form action="cart_add.php" method="post">
    <?php
    $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan;
    dbname=LAA1290607-smartphone;charset=utf8;','LAA1290607','Pass2525');
    $sql =$pdo->prepare('SELECT design_name,design_image, model_name, type_name, price, nickname, design_code
    FROM m_customers c, d_design d, m_type t, m_model m
    WHERE d.customer_code = c.customer_code
    AND d.type_code = t.type_code
    AND d.model_code = m.model_code
    AND design_code =?');
    $sql->execute([$_POST['design']]);
    foreach ($sql as $item){
        echo '<h2>',$item['design_name'],'</h2>';
        echo '<img class="image" src="',$item['design_image'],'"alt="not image">';
        echo '<p>機種 ',$item['model_name'],'</p>';
        echo '<p>タイプ ',$item['type_name'],'</p>';
        echo '<p>価格 ',$item['price'],'</p>';
        echo '<p>製作者 ',$item['nickname'],'</p>';

        echo '<input type="text" value="',$item['design_code'],'" name="design"  hidden>';
        echo '<input type="text" value="',$item['price'],'" name="price"  hidden>';

    }
    ?>
        <button type="submit">カートへ追加</button>
    </form>
</main>
</body>
</html>