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
    <link rel="stylesheet" href="css/Purchase_main.css">
    <script src="js/Purchase.js"></script>
    <title>購入手続き</title>
</head>
<body>

<?php require 'header.php';
if(!isset($_SESSION['name'])) {
    echo '<META http-equiv="Refresh" content="0.01;URL=toppage.php">';
}?>
    <main>
    <h1>購入手続き</h1>
    <form action="Purchase_confirmation.php" method="post">
    <?php
        $pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
        'LAA1290607', 'Pass2525');

        //カートテーブルから値を取得するSQL
        $sql = $pdo->prepare('select design_image,num from d_cart c,d_design d
                                    where c.design_code=d.design_code and c.customer_code=?
                                    and del_flag=0');
        //セッション変数に登録されている顧客番号を取得
        $sql->execute([$_SESSION['name']]);
        echo '<div name="content">';
        $images=array();
        $nums=array();
        foreach ($sql as $item){
            array_push($images,$item['design_image']);
            array_push($nums,$item['num']);
        }

        echo '<div>';
        echo '<a href="#" class="arrow arrow-left" onclick="goBack()">←</a>';
        echo '<img src="',$images[0],'" id="image">';
        echo '<a href="#" class="arrow arrow-right" onclick="goForward()">→</a>';
        echo '<p id="num">',$nums[0],'個</p>';

        echo '</div>';
        $json_images=json_encode($images);
        $json_nums=json_encode($nums);

        ?>
        <script>
            let images=JSON.parse('<?php echo $json_images; ?>');
            let nums=JSON.parse('<?php echo $json_nums; ?>' );
        </script>
        <?php



        $sql = $pdo->prepare('select address from m_customers where customer_code=?');
        $sql->execute([$_SESSION['name']]);
        echo '<p>宛先住所</p>';
        foreach ($sql as $item) {
            echo '<p>', $item['address'], '</p>';
            echo '<input type="hidden" name="address" value="', $item['address'], '" >';
        }
        echo '<a href="editAddress-in.php">住所変更</a>';

        ?>

        <select name="pay" id="pay" class="pay" onchange="select(this);"></select>
        <select id="credit" class="credit" name="credit"></select>
        <?php

        $sql = $pdo->prepare('select card_number from m_credit where customer_code=?');
        $sql->execute([$_SESSION['name']]);
        $i=1;
        $credit = array();
        $credit[0]=array('cd'=>0,'label'=>'クレジットカード選択');
        foreach ($sql as $item){
            $credit[$i]=array('cd'=>$i,'label'=>$item['card_number']);
            $i++;
        }
        $arr_credit=json_encode($credit);
        ?>
        <a href="">支払い方法変更</a>
        <script>
            let arr_credit=JSON.parse('<?php echo $arr_credit; ?>');
        </script>

        <?php
        $sql=$pdo->prepare('select sum(num*price) as total from d_cart where customer_code=?');
        $sql->execute([$_SESSION['name']]);
        foreach ($sql as $item) {
            echo '<p>金額：',$item['total'],'円</p>';
            echo '<input type="hidden" name="total" value="',$item['total'],'" >';
        }

        ?>



        <button type="submit">確認画面へ</button>
        </div>
    </form>

    </main>



</body>
</html>

