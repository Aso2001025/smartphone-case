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
    <h1>確認画面</h1>
    <form action="add_Purchase.php" method="post">
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

        echo '<p>宛先住所</p>';
        echo '<p>',$_POST['address'],'<p>';
        echo '<p>支払い方法</p>';
        $flag=true;
        if($_POST['pay']==0||$_POST['credit']==0) {
            echo '<p>支払い方法が選択されていません</p>';
            $flag=false;
        }else if($_POST['pay']==1){
            echo '<p>クレジットカード支払い</p>';

            $sql = $pdo->prepare('select * from m_credit where customer_code=?');
            $sql->execute([$_SESSION['name']]);
            $card_number;
            $pay_code;
            $i=1;
            foreach ($sql as $item){
                if($i==(int)$_POST['pay']);{
                    $pay_code=$item['pay_code'];
                    $card_number=$item['card_number'];
                    break;
                }
                $i++;
            }

            echo '<p>カード番号</p>';
            echo '<p name="convenience">',$card_number,'</p>';
            echo '<input type="hidden" name="pay_code" value="',$pay_code,'" >';


        }else{
            echo '<p>コンビニ後払い</p>';
            $convenience = array('','セブンイレブン','ファミリーマート','ローソン');
            echo '<p name="convenience">',$convenience[(int)$_POST['credit']],'</p>';
            echo '<input type="hidden" name="convenience" value="',$convenience[(int)$_POST['credit']],'" >';
        }
        echo '<p>金額：',$_POST['total'],'円</p>';
        echo '<input type="hidden" name="total" value="',$_POST['total'],'" >';
        ?>


        <a href="Purchase.php">入力へ戻る</a>
        <?php
            if($flag){
                echo' <button type="submit">購入確定</button>';
            }

        ?>

        </div>
    </form>

</main>



</body>
</html>

