<?php
session_start();
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$pdo = new PDO('mysql:host=mysql153.phy.lolipop.lan; 
        dbname=LAA1290607-smartphone;charst=UTF8',
    'LAA1290607', 'Pass2525');
//数量を取得
$num = $_POST['num'];

if(isset($_POST['plus'])){
    //数量を増やす
    $num=$num+1;
}else if(isset($_POST['minus'])){
    //数量を減らす
    $num=$num-1;
    //マイナスにならないようにする
    if($num<0){
        $num=0;
    }
}
//DBを更新
$spl = $pdo->prepare('update d_cart set num=? where customer_code=? and design_code=?');
$spl->execute([$num,$_SESSION['name'],$_POST['design']]);
$pdo=null;
//元の画面へ遷移
echo '<META http-equiv="Refresh" content="0.01;URL=cart.php">';

?>

</body>
</html>
